<?php
$host = 'localhost';
$db = 'airline_reservation';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$destination = $_GET['destination'];
$date = $_GET['date'];
$airline = $_GET['airline'];

$query = "SELECT * FROM flights WHERE destination LIKE '%$destination%' AND date='$date'";
if (!empty($airline)) {
  $query .= " AND airline LIKE '%$airline%'";
}

$result = $conn->query($query);
$flights = [];
while ($row = $result->fetch_assoc()) {
  $flights[] = $row;
}
header('Content-Type: application/json');
echo json_encode($flights);
?>