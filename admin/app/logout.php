<?php
$_SESSION = null;
session_destroy();

session_start();
$token = bin2hex(random_bytes(50));
$_SESSION['token'] = $token;
header('Location: /admin/login?s=' . $token);
