<?php
$host = 'localhost';
$db = 'airline_reservation';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$flight_id = $_POST['flight_id'];
$passenger_name = $_POST['passenger_name'];
$seat_number = $_POST['seat_number'];

$sql = "INSERT INTO bookings (flight_id, passenger_name, seat_number, payment_status) 
        VALUES ('$flight_id', '$passenger_name', '$seat_number', 'Pending')";

if ($conn->query($sql) === TRUE) {
  header("Location: ../confirmation.html");
  exit;
} else {
  echo "Error: " . $conn->error;
}
?>
