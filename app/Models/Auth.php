<?php
namespace App\Models;

class Auth
{
    public static function emailOrCpfExists(string $email, string $cpf): bool
    {
        $stmt = Database::connect()->prepare(
            'SELECT 1 FROM pessoa WHERE email = ? OR cpf = ? LIMIT 1'
        );
        $stmt->execute([$email, $cpf]);
        return (bool) $stmt->fetchColumn();
    }

    public static function createUser(array $data): int
    {
        $db = Database::connect();
        $db->beginTransaction();

        try {
            $stmt = $db->prepare(
                'INSERT INTO pessoa (nome_pessoa, email, senha, cpf, dt_nasc)
                 VALUES (?, ?, ?, ?, ?)'
            );
            $stmt->execute([
                $data['name'],
                $data['email'],
                password_hash($data['password'], PASSWORD_DEFAULT),
                $data['cpf'],
                $data['birth_date'],
            ]);
            $id = (int) $db->lastInsertId();

            $stmt = $db->prepare('INSERT INTO usuario (id_pessoa) VALUES (?)');
            $stmt->execute([$id]);
            $db->commit();

            return $id;
        } catch (\Throwable $e) {
            if ($db->inTransaction()) {
                $db->rollBack();
            }
            throw $e;
        }
    }

    public static function findByEmail(string $email): ?array
    {
        $stmt = Database::connect()->prepare(
            'SELECT p.id_pessoa, p.nome_pessoa, p.email, p.senha, u.foto_de_perfil,
                    CASE WHEN a.id_pessoa IS NOT NULL THEN "administrador" ELSE "usuario" END AS role
             FROM pessoa p
             LEFT JOIN usuario u ON u.id_pessoa = p.id_pessoa
             LEFT JOIN administrador a ON a.id_pessoa = p.id_pessoa
             WHERE p.email = ? AND (u.id_pessoa IS NOT NULL OR a.id_pessoa IS NOT NULL)
             LIMIT 1'
        );
        $stmt->execute([$email]);
        return $stmt->fetch() ?: null;
    }

    public static function updateProfilePhoto(int $userId, string $photoPath): void
    {
        $stmt = Database::connect()->prepare(
            'UPDATE usuario SET foto_de_perfil = ? WHERE id_pessoa = ?'
        );
        $stmt->execute([$photoPath, $userId]);
    }
}
