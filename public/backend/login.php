<?php
include './db.php';

$_SESSION['login_error'] = '';
$_SESSION['isAuthenticated'] = false;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid request method. Only POST requests are allowed.";
    exit;
}

try {
    // Check if required parameters are set
    if (!isset($_POST['username'], $_POST['password'])) {
        throw new Exception("Missing required parameters");
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query database to retrieve user data
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_data = $result->fetch_assoc();

    // Check if user exists and password is correct
    if ($user_data && password_verify($password, $user_data['password'])) {
        // Login successful, start session and redirect to protected page
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

    // Close connection
} catch (Exception $e) {
    $_SESSION['login_error'] = "An error occurred: " . $e->getMessage();
    header('Location: ../login.php');
}
?>