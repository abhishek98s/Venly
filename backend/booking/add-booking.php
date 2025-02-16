<?php
include '../db.php';
require_once('./sendmail.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid request method. Only POST requests are allowed.";
    exit;
}

try {
    if (!isset($_POST['booking_message'], $_POST['user_id'], $_POST['venue_id'], $_POST['booking_date'])) {
        throw new Exception("Missing required parameters");
    }

    $venueId = $_POST['venue_id'];
    $userId = $_POST['user_id'];
    $booking_message = $_POST['booking_message'];
    $booking_date = $_POST['booking_date'];

    echo $_POST['venue_id'];
    echo $_POST['user_id'];

    $sql = "SELECT * FROM bookings WHERE venue_id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $venueId, $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $booked_venue = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        throw new Exception('Already Booked');
    }

    $sql = "INSERT INTO bookings (user_id, venue_id, booking_message, booking_date) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiss", $userId, $venueId, $booking_message, $booking_date);
    $stmt->execute();



    $email_sql = "SELECT u.username, u.email, v.name AS venue_name, b.booking_date
FROM users u
INNER JOIN bookings b ON b.user_id = u.id
INNER JOIN venue v ON b.venue_id = v.id
WHERE u.id = $userId";

    $email_res = mysqli_query($conn, $email_sql);

    if ($email_res && mysqli_num_rows($email_res) > 0) {
        $row = mysqli_fetch_assoc($email_res);

        $person_name = $row['username'];
        $person_email = $row['email'];
        $venue_name = $row['venue_name'];
        $booking_date = $row['booking_date'];
        $body = "Dear $person_name, your $venue_name venue is booked on $booking_date.";

        sendEmail($person_email, 'Venue Booked', $body);
    } else {
        echo "No booking found for user ID: $userId.";
    }

    
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