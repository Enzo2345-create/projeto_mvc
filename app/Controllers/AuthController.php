<?php
namespace App\Controllers;

use App\Models\Auth;

class AuthController
{
    public function login(): void
    {
        $this->startSession();
        $csrf = $this->csrfToken();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->checkCsrf();
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $user = filter_var($email, FILTER_VALIDATE_EMAIL) ? Auth::findByEmail($email) : null;

            if ($user && password_verify($password, $user['senha'])) {
                session_regenerate_id(true);
                $_SESSION['user'] = [
                    'id' => (int) $user['id_pessoa'],
                    'name' => $user['nome_pessoa'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'photo' => $user['foto_de_perfil'],
                ];
                header('Location: ' . url('home/index'));
                exit;
            }

            http_response_code(401);
            $error = 'E-mail ou senha inválidos.';
        } else {
            $error = '';
        }

        $this->render('auth/login', [
            'title' => 'Entrar | Raízes',
            'error' => $error,
            'email' => $email ?? '',
            'csrf' => $csrf,
        ]);
    }

    public function register(): void
    {
        $this->startSession();
        $input = [
            'name' => trim($_POST['name'] ?? ''),
            'email' => strtolower(trim($_POST['email'] ?? '')),
            'cpf' => preg_replace('/\D/', '', $_POST['cpf'] ?? ''),
            'birth_date' => trim($_POST['birth_date'] ?? ''),
        ];
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->checkCsrf();
            $password = $_POST['password'] ?? '';
            $confirmation = $_POST['password_confirmation'] ?? '';

            if ($input['name'] === '' || mb_strlen($input['name']) > 150) {
                $errors['name'] = 'Informe seu nome (até 150 caracteres).';
            }
            if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL) || mb_strlen($input['email']) > 150) {
                $errors['email'] = 'Informe um e-mail válido.';
            }
            if (strlen($input['cpf']) !== 11) {
                $errors['cpf'] = 'Informe um CPF com 11 números.';
            }
            $date = \DateTime::createFromFormat('!Y-m-d', $input['birth_date']);
            if (!$date || $date->format('Y-m-d') !== $input['birth_date'] || $input['birth_date'] > date('Y-m-d')) {
                $errors['birth_date'] = 'Informe uma data de nascimento válida.';
            }
            if (strlen($password) < 8) {
                $errors['password'] = 'A senha deve ter pelo menos 8 caracteres.';
            } elseif ($password !== $confirmation) {
                $errors['password_confirmation'] = 'As senhas não conferem.';
            }
            if (!$errors && Auth::emailOrCpfExists($input['email'], $input['cpf'])) {
                $errors['duplicate'] = 'Este e-mail ou CPF já está cadastrado.';
            }

            if (!$errors) {
                $id = Auth::createUser($input + ['password' => $password]);
                session_regenerate_id(true);
                $_SESSION['user'] = [
                    'id' => $id,
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'role' => 'usuario',
                ];
                header('Location: ' . url('home/index'));
                exit;
            }

            http_response_code(422);
        }

        $this->render('auth/register', [
            'title' => 'Criar conta | Raízes',
            'errors' => $errors,
            'old' => $input,
            'csrf' => $this->csrfToken(),
        ]);
    }

    public function logout(): void
    {
        $this->startSession();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            exit('Método não permitido');
        }
        $this->checkCsrf();

        $_SESSION = [];
        session_regenerate_id(true);
        session_destroy();
        header('Location: ' . url('home/index'));
        exit;
    }

    public function photo(): void
    {
        $this->startSession();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            exit('Método não permitido');
        }
        $this->checkCsrf();
        if (empty($_SESSION['user']['id'])) {
            http_response_code(401);
            exit('Faça login para alterar sua foto.');
        }

        $file = $_FILES['photo'] ?? null;
        if (!$file || $file['error'] !== UPLOAD_ERR_OK || $file['size'] > 3 * 1024 * 1024) {
            $this->photoError('Escolha uma imagem de até 3 MB.');
        }

        $mime = (new \finfo(FILEINFO_MIME_TYPE))->file($file['tmp_name']);
        $extensions = [
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/webp' => 'webp',
        ];
        if (!isset($extensions[$mime]) || @getimagesize($file['tmp_name']) === false) {
            $this->photoError('Use uma imagem JPG, PNG ou WEBP válida.');
        }

        $directory = __DIR__ . '/../../public/uploads/avatars';
        if (!is_dir($directory) && !mkdir($directory, 0755, true) && !is_dir($directory)) {
            $this->photoError('Não foi possível salvar a foto no servidor.');
        }
        $filename = bin2hex(random_bytes(16)) . '.' . $extensions[$mime];
        if (!move_uploaded_file($file['tmp_name'], $directory . '/' . $filename)) {
            $this->photoError('Não foi possível salvar a foto no servidor.');
        }

        $relativePath = 'uploads/avatars/' . $filename;
        Auth::updateProfilePhoto((int) $_SESSION['user']['id'], $relativePath);
        $_SESSION['user']['photo'] = $relativePath;
        header('Location: ' . url('home/index'));
        exit;
    }

    private function photoError(string $message): void
    {
        $_SESSION['photo_error'] = $message;
        header('Location: ' . url('home/index'));
        exit;
    }

    private function startSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    private function csrfToken(): string
    {
        return $_SESSION['csrf'] ??= bin2hex(random_bytes(32));
    }

    private function checkCsrf(): void
    {
        if (!hash_equals($_SESSION['csrf'] ?? '', $_POST['csrf'] ?? '')) {
            http_response_code(403);
            exit('Token inválido. Atualize a página e tente novamente.');
        }
    }

    private function render(string $view, array $data = []): void
    {
        $base = __DIR__ . '/../Views/';
        extract($data, EXTR_SKIP);
        ob_start();
        require $base . $view . '.php';
        $content = (string) ob_get_clean();
        require $base . 'layouts/main.php';
    }
}
