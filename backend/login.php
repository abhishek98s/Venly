<?php
include './db.php';

$_SESSION['login_error'] = '';
$_SESSION['isAuthenticated'] = false;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid request method. Only POST requests are allowed.";
    exit;
}

try {
    if (!isset($_POST['username'], $_POST['password'])) {
        throw new Exception("Missing required parameters");
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_data = $result->fetch_assoc();

    if ($user_data && password_verify($password, $user_data['password'])) {
        $_SESSION['id'] = $user_data['id'];
        $_SESSION['email'] = $user_data['email'];
        $_SESSION['role'] = $user_data['role'];
        $_SESSION['username'] = $username;
        $_SESSION['isAuthenticated'] = true;

        if ($user_data['role'] === 'admin') {
            header('Location: ../user-list.php');
        } else {
            header('Location: ../index.php');
        }
        $stmt->close();
        exit;
    } else {
        throw new Exception('Invalid username or password');
    }

} catch (Exception $e) {
    $_SESSION['login_error'] = "An error occurred: " . $e->getMessage();
    header('Location: ../login.php');
}
?>