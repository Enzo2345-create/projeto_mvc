<?php
namespace App\Validators;

class UserValidator {
    /** @return array<string,string> */
    public function validate(array $input): array {
        $errors = [];
        $name = $input['name'] ?? '';
        if (!is_string($name) || trim($name) === '') {
            $errors['name'] = 'Informe o nome.';
        } elseif (mb_strlen($name) > 100) {
            $errors['name'] = 'O nome deve ter no máximo 100 caracteres.';
        }
        $email = $input['email'] ?? '';
        if (!is_string($email) || mb_strlen($email) > 150 ||
            !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Informe um e-mail válido.';
        }
        $cpf = $input['cpf'] ?? '';
        if (!is_string($cpf) || strlen($cpf) !== 11 || !ctype_digit($cpf)) {
            $errors['cpf'] = 'Informe um CPF com 11 números.';
        }
        $birthDate = $input['birth_date'] ?? '';
        $date = is_string($birthDate)
            ? \DateTime::createFromFormat('!Y-m-d', $birthDate)
            : false;
        if (!$date || $date->format('Y-m-d') !== $birthDate || $birthDate > date('Y-m-d')) {
            $errors['birth_date'] = 'Informe uma data de nascimento válida.';
        }
        return $errors;
    }
}
