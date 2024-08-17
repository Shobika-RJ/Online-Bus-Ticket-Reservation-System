<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bus_booking_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Insert data into bus table
$sql = "INSERT INTO buses (origin, destination, departure_date, departure_time, fare, seating_capacity)
VALUES ('".$_POST["origin"]."', '".$_POST["destination"]."', '".$_POST["departure_date"]."', '".$_POST["departure_time"]."', '".$_POST["fare"]."', '".$_POST["seating_capacity"]."')";

if ($conn->query($sql) === TRUE) {
  echo '<script>alert("Bus details added successfully"); window.location = "bus.php";</script>';
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>