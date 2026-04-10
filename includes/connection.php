<?php
$envFile = dirname(__DIR__) . '/.env';
if (is_file($envFile)) {
    foreach (file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        if (preg_match('/^([A-Za-z_][A-Za-z0-9_]*)=(.*)$/', $line, $m)) {
            putenv(trim($m[1]) . '=' . trim($m[2], " \t\"'"));
        }
    }
}
$link = new mysqli(
    getenv('DB_HOST') ?: '127.0.0.1',
    getenv('DB_USERNAME') ?: 'root',
    getenv('DB_PASSWORD') ?: '12345678',
    getenv('DB_DATABASE') ?: 'ecommecs',
    getenv('DB_PORT') ?: 3306
);
if ($link->connect_error) {
    die('Connection failed: ' . $link->connect_error);
}
?>