<?php
require __DIR__ . '/backend/db.php';

$flight_id = $_GET['flight_id'];
$passenger_name = $_GET['passenger_name'];
$seat_number = $_GET['seat_number'];
$amount = $_GET['amount'];

$sql = "INSERT INTO bookings (flight_id, passenger_name, seat_number, amount, payment_status)
        VALUES ('$flight_id', '$passenger_name', '$seat_number', '$amount', 'Paid')";

if ($conn->query($sql)) {
  echo "<h2>Booking Confirmed!</h2>";
  echo "<p>Thank you, $passenger_name. Your seat $seat_number has been booked.</p>";
} else {
  echo "Error: " . $conn->error;
}
