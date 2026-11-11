<?php

namespace App\Models;

class User
{
    public static function all(): array
    {
        return Database::connect()
            ->query(
                'SELECT 
                    p.id_pessoa AS id,
                    p.nome_pessoa AS name,
                    "" AS last_name,
                    p.email,
                    p.cpf,
                    p.dt_nasc AS birth_date,
                    u.foto_de_perfil
                 FROM usuario u
                 INNER JOIN pessoa p ON p.id_pessoa = u.id_pessoa
                 ORDER BY p.nome_pessoa'
            )
            ->fetchAll();
    }

    public static function find(int $id): ?array
    {
        $stmt = Database::connect()->prepare(
            'SELECT 
                p.id_pessoa AS id,
                p.nome_pessoa AS name,
                "" AS last_name,
                p.email,
                p.cpf,
                p.dt_nasc AS birth_date,
                u.foto_de_perfil
             FROM usuario u
             INNER JOIN pessoa p ON p.id_pessoa = u.id_pessoa
             WHERE p.id_pessoa = ?'
        );
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public static function emailExists(string $email, ?int $ignoreId = null): bool
    {
        $sql = 'SELECT 1 FROM pessoa WHERE email = ?';
        $params = [$email];

        if ($ignoreId !== null) {
            $sql .= ' AND id_pessoa <> ?';
            $params[] = $ignoreId;
        }

        $stmt = Database::connect()->prepare($sql);
        $stmt->execute($params);
        return (bool) $stmt->fetchColumn();
    }

    public static function cpfExists(string $cpf, ?int $ignoreId = null): bool
    {
        $sql = 'SELECT 1 FROM pessoa WHERE cpf = ?';
        $params = [$cpf];

        if ($ignoreId !== null) {
            $sql .= ' AND id_pessoa <> ?';
            $params[] = $ignoreId;
        }

        $stmt = Database::connect()->prepare($sql);
        $stmt->execute($params);
        return (bool) $stmt->fetchColumn();
    }

    public static function create(array $data): int
    {
        $db = Database::connect();
        $db->beginTransaction();

        try {
            $nomeCompleto = trim(($data['name'] ?? '') . ' ' . ($data['last_name'] ?? ''));
            $senhaRaw = $data['senha'] ?? $data['password'] ?? '123456';
            $senhaHash = password_hash($senhaRaw, PASSWORD_DEFAULT);

            $stmtPessoa = $db->prepare(
                'INSERT INTO pessoa (nome_pessoa, email, cpf, dt_nasc, senha) VALUES (?, ?, ?, ?, ?)'
            );
            $stmtPessoa->execute([
                $nomeCompleto,
                $data['email'],
                $data['cpf'],
                $data['birth_date'],
                $senhaHash,
            ]);

            $idPessoa = (int) $db->lastInsertId();

            $stmtUsuario = $db->prepare(
                'INSERT INTO usuario (id_pessoa, foto_de_perfil) VALUES (?, ?)'
            );
            $stmtUsuario->execute([
                $idPessoa,
                $data['foto_de_perfil'] ?? null,
            ]);

            $db->commit();
            return $idPessoa;
        } catch (\Throwable $e) {
            $db->rollBack();
            throw $e;
        }
    }

    public static function update(int $id, array $data): bool
    {
        $nomeCompleto = trim(($data['name'] ?? '') . ' ' . ($data['last_name'] ?? ''));

        $stmt = Database::connect()->prepare(
            'UPDATE pessoa 
             SET nome_pessoa = ?, email = ?, cpf = ?, dt_nasc = ? 
             WHERE id_pessoa = ?'
        );

        return $stmt->execute([
            $nomeCompleto,
            $data['email'],
            $data['cpf'],
            $data['birth_date'],
            $id,
        ]);
    }
}
