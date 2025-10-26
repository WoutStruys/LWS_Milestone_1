<?php
$host = getenv('DB_HOST') ?: 'contsql-m1-WS';
$db   = getenv('DB_NAME') ?: 'milestone';
$user = getenv('DB_USER') ?: 'appuser';
$pass = getenv('DB_PASSWORD') ?: 'apppass';

$mysqli = @new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_errno) {
    http_response_code(500);
    die("DB connection failed: " . $mysqli->connect_error);
}