
<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid request method. Only POST requests are allowed.";
    exit;
}

try {
    // Check if required parameters are set
    if (!isset($_POST['username'], $_POST['password'], $_POST['email'], $_POST['phone'])) {
        throw new Exception("Missing required parameters");
    }

    // Check if parameters are of the correct type
    if (!is_string($_POST['username']) || !is_string($_POST['password']) || !is_string($_POST['email']) || !is_string($_POST['phone'])) {
        throw new Exception("Invalid parameter type");
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Phone validation
    if (!preg_match('/^98[0-9]{8}$/', $phone)) {
        throw new Exception('Phone number should start with 98 and be 10 digits long');
    }

    // Password validation
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
        throw new Exception('Password should be at least 8 characters long, contain one uppercase letter, one lowercase letter, one number, and one special character');
    }

    // Check if user with same email is already registered
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        throw new Exception('Email is already registered');
    }
    
    // Hash password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into database
    $sql = "INSERT INTO users (username, password, email, phone) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $username, $password_hash, $email, $phone);
    $stmt->execute();

    // Close connection
    $stmt->close();
    $conn->close();

    $_SESSION['error'] = '';
    echo "User created successfully!";
    header('Location: ../../login.php');
} catch (mysqli_sql_exception $e) {
    $_SESSION['error'] = "Error creating user: " . $e->getMessage();
} catch (Exception $e) {
    $_SESSION['error'] = "An error occurred: " . $e->getMessage();
    header('Location: ../../register.php');
}
exit;
?>
