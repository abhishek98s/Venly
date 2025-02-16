<?php
include './db.php';

$_SESSION['about_error'] = '';
$_SESSION['facility_error'] = '';
$_SESSION['map_link_error'] = '';
$_SESSION['pricing_error'] = '';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid request method. Only POST requests are allowed.";
    exit;
}


try {
    if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        throw new Exception("No file uploaded or upload error");
    }
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

    $name = $_POST['name'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $no_of_person = $_POST['no_of_person'];
    $about = $_POST['about'];
    $facility = $_POST['facility'];
    $map_link = $_POST['map_link'];
    $service_price = $_POST['service'];
    $food_price = $_POST['food'];

    $image = $_FILES['image'];
    $imageType = $image['type'];
    $imageName = $image['name'];

    $allowedTypes = array('image/jpg', 'image/jpeg', 'image/png', 'image/gif');
    if (!in_array($imageType, $allowedTypes)) {
        throw new Exception("Invalid image type");
    }

    $uploadDir = '../images/';
    $imagePath = $uploadDir . $imageName;
    $imagename = 'images/' . $imageName;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
        throw new Exception("Error uploading image");
    }

    $sql = "INSERT INTO venue (name, location, email, no_of_person, about, facility, map_link, service_price, food_price, img_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssisssiis", $name, $location, $email, $no_of_person, $about, $facility, $map_link, $service_price, $food_price, $imagename);

    if ($stmt->execute()) {
        echo "Query executed successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $_SESSION['insert_venue_error'] = '$e->getMessage()';
    $result = $stmt->get_result();

    $stmt->close();
    $conn->close();

    header('Location: ../venue-list.php');
} catch (Exception $e) {
    $_SESSION['insert_venue_error'] = $e->getMessage();
    echo $e->getMessage();
    header('Location: ../add-venue.php');
}
exit;
?>