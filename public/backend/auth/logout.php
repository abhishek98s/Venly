<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid request method. Only POST requests are allowed.";
    exit;
}

session_start();
session_destroy();
unset($_SESSION['isAuthenticated']);
unset($_SESSION['username']);
?>