<?php
function e(?string $value): string {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
function url(string $path = ''): string {
    return BASE_URL . '/' . ltrim($path, '/');
}
function asset(string $path): string {
    $file = __DIR__ . '/../public/' . ltrim($path, '/');
    $version = is_file($file) ? filemtime($file) : time();
    return BASE_URL . '/' . ltrim($path, '/') . '?v=' . $version;
}

// 52998224725 -> 529.982.247-25
function format_cpf(?string $cpf): string
{
    $cpf = (string) $cpf;
    return strlen($cpf) === 11
        ? substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' .
          substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2)
        : $cpf;
}

// 2008-03-15 -> 15/03/2008
function format_date(?string $date): string
{
    $d = $date ? \DateTime::createFromFormat('!Y-m-d', $date) : false;
    return $d ? $d->format('d/m/Y') : '';
}
