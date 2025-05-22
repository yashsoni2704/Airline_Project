<?php
// Basic placeholder for admin functions: list flights, delete, etc.
echo "Admin dashboard - add/edit/remove flights, manage bookings.";
?>

<?php
$host = 'localhost';
$db = 'airline_reservation';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);

if (isset($_POST['add_flight'])) {
    $airline = $_POST['airline'];
    $destination = $_POST['destination'];
    $date = $_POST['date'];
    $seats = $_POST['seats'];
    $conn->query("INSERT INTO flights (airline, destination, date, seats_available) VALUES ('$airline', '$destination', '$date', $seats)");
}
?>

<h2>Admin Dashboard</h2>
<form method="POST">
    <input name="airline" placeholder="Airline" required>
    <input name="destination" placeholder="Destination" required>
    <input type="date" name="date" required>
    <input type="number" name="seats" placeholder="Seats" required>
    <button name="add_flight">Add Flight</button>
</form>

<h3>Existing Flights</h3>
<ul>
<?php
$result = $conn->query("SELECT * FROM flights");
while ($row = $result->fetch_assoc()) {
    echo "<li>{$row['airline']} to {$row['destination']} on {$row['date']} ({$row['seats_available']} seats)</li>";
}
?>
</ul>
