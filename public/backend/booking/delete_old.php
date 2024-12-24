<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

    $currentDateTime = date('Y-m-d H:i:s');

    $sql = "DELETE FROM bookings WHERE booking_date < NOW()+10 LIMIT 1";

    $result = $conn->query($sql);
}
?>