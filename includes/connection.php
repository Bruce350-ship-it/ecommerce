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

$host = getenv('DB_HOST') ?: '127.0.0.1';
$user = getenv('DB_USERNAME') ?: 'root';
$password = getenv('DB_PASSWORD') ?: '12345678';
$database = getenv('DB_DATABASE') ?: 'ecommecs';
$port = getenv('DB_PORT') ?: 3306;

// Initialize mysqli
$link = mysqli_init();

// Enable SSL (required for TiDB Cloud)
mysqli_ssl_set($link, NULL, NULL, NULL, NULL, NULL);

// Connect with SSL
mysqli_real_connect(
    $link,
    $host,
    $user,
    $password,
    $database,
    $port,
    NULL,
    MYSQLI_CLIENT_SSL
);

if (!$link) {
    die('Connection failed: ' . mysqli_connect_error());
}
?>