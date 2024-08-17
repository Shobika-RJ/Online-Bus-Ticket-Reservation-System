<?php

// Establish connection to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bus_booking_system";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$full_name = $_POST['full-name'] ?? '';
$email = $_POST['email'] ?? '';
$phone_number = $_POST['phone-number'] ?? '';
$origin_city = $_POST['origin-city'] ?? '';
$destination_city = $_POST['destination-city'] ?? '';
$seats = $_POST['nseats'] ?? '';

// Insert form data into database
$sql = "INSERT INTO bus_reservations (full_name, email, phone_number, origin_city, destination_city, seats)
VALUES ('$full_name', '$email', '$phone_number', '$origin_city', '$destination_city', '$seats')";

if (mysqli_query($conn, $sql)) {
 echo "<script>alert('Reservation added successfully.');</script>";
  // Print ticket button
  echo "<button onclick='printTicket()'>Print Ticket</button>";
  // Ticket iframe
  echo "<iframe id='ticket-frame' src='ticket.php'></iframe>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
?>
