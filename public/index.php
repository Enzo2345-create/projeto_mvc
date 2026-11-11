<?php
declare(strict_types=1);

$base = dirname(dirname($_SERVER['SCRIPT_NAME']));
define('BASE_URL', rtrim(str_replace('\\', '/', $base), '/'));

spl_autoload_register(function (string $class) {
    $file = __DIR__ . '/../app/' .
        str_replace(['App\\', '\\'], ['', '/'], $class) . '.php';

    if (is_file($file)) {
        require $file;
    }
});

require __DIR__ . '/../app/helpers.php';

$url = explode('/', trim(($_GET['url'] ?? '') ?: 'home/index', '/'));

$controller = 'App\\Controllers\\' . ucfirst($url[0]) . 'Controller';
$method = $url[1] ?? 'index';
$params = array_slice($url, 2);

if (
    !class_exists($controller) ||
    !method_exists($controller, $method) ||
    !(new ReflectionMethod($controller, $method))->isPublic()
) {
    http_response_code(404);
    exit('Página não encontrada');
}

(new $controller())->$method(...$params);