<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = $_GET['id'];

    // Delete the venue from the database
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $response = ['success' => true, 'message' => 'User deleted successfully'];
    } else {
        $response = ['success' => false, 'message' => 'Error deleting venue'];
    }

    // Close connection
    $stmt->close();
    $conn->close();

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
} else {
    http_response_code(405);
    echo 'Method not allowed';
    exit;
}
?>