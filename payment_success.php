<?php
$host = 'localhost';
$db = 'airline_reservation';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);

$booking_id = $_GET['booking_id'];

$conn->query("UPDATE bookings SET payment_status = 'Paid' WHERE id = '$booking_id'");

header("Location: ../confirmation.html");
exit;
?>
