<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    echo "Invalid request method. Only GET requests are allowed.";
    exit;
}

?>