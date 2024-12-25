<?php
include '../db.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid request method. Only POST requests are allowed.";
    exit;
}

try {
    // Check if required parameters are set
    if (!isset($_POST['booking_message'], $_POST['user_id'], $_POST['venue_id'], $_POST['booking_date'])) {
        throw new Exception("Missing required parameters");
    }

    $venueId = $_POST['venue_id'];
    $userId = $_POST['user_id'];
    $booking_message = $_POST['booking_message'];
    $booking_date = $_POST['booking_date'];

    echo $_POST['venue_id'];
    echo $_POST['user_id'];

    // Check if user with same email is already registered
    $sql = "SELECT * FROM bookings WHERE venue_id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $venueId, $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        throw new Exception('Already Booked');
    }

    // Insert data into database
    $sql = "INSERT INTO bookings (user_id, venue_id, booking_message, booking_date) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiss", $userId, $venueId, $booking_message, $booking_date);
    $stmt->execute();

    // Close connection
    $stmt->close();
    $conn->close();

    $_SESSION['error'] = '';
    echo "Venue booked successfully!";
    header('Location: ../../detail.php?id=' . urlencode($venueId));
} catch (mysqli_sql_exception $e) {
    $_SESSION['error'] = "Error creating user: " . $e->getMessage();
} catch (Exception $e) {
    $_SESSION['error'] = "An error occurred: " . $e->getMessage();
    header('Location: ../../detail.php?id=' . urlencode($venueId));
}

echo $_SESSION['error'];
exit;
?>