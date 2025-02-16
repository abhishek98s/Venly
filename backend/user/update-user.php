<?php
include '../db.php';

$_SESSION['edit_error'] = '';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid request method. Only POST requests are allowed.";
    exit;
}

try {
    if (
        !isset(
        $_POST['username'],
        $_POST['email'],
        $_POST['phone']
    )
    ) {
        throw new Exception("All field required!");
    }

    $id = $_POST['id'];

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE users SET username = ?, email = ?, phone = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $params = array($username, $email, $phone, $id);

    if (!$stmt->execute($params)) {
        throw new Exception("Error updating user: " . $conn->error);
    }

    $stmt->close();
    $conn->close();

    header('Location: ../../user-list.php');
} catch (Exception $e) {
    $_SESSION['edit_error'] = $e->getMessage();
    echo $e->getMessage();
    header('Location: ../../edit-user.php');
}
exit;
?>