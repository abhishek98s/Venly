<?php
include './db.php';

$_SESSION['edit_error'] = '';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid request method. Only POST requests are allowed.";
    exit;
}

try {
    if (
        !isset(
        $_POST['name'],
        $_POST['location'],
        $_POST['email'],
        $_POST['no_of_person'],
        $_POST['about'],
        $_POST['facility'],
        $_POST['map_link'],
        $_POST['service'],
        $_POST['food']
    )
    ) {
        throw new Exception("All field required!");
    }

    $id = $_POST['id'];

    $name = $_POST['name'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $no_of_person = $_POST['no_of_person'];
    $about = $_POST['about'];
    $facility = $_POST['facility'];
    $map_link = $_POST['map_link'];
    $service_price = $_POST['service'];
    $food_price = $_POST['food'];

    // Update the venue details in the database
    $sql = "UPDATE venue SET name = ?, location = ?, email = ?, no_of_person = ?, about = ?, facility = ?, map_link = ?, service_price = ?, food_price = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $params = array($name, $location, $email, $no_of_person, $about, $facility, $map_link, $service_price, $food_price, $id);

    if (!$stmt->execute($params)) {
        throw new Exception("Error updating venue: " . $conn->error);
    }

    if (!($conn->affected_rows > 0)) {
        $_SESSION['edit_error'] = "No rows updated";
    }
    
    // Close connection
    $stmt->close();
    $conn->close();

    header('Location: ../venue-list.php');
} catch (Exception $e) {
    $_SESSION['edit_error'] = $e->getMessage();
    echo $e->getMessage();
    header('Location: ../edit.php');
}
exit;
?>