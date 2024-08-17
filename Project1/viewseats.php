<!DOCTYPE html>
<html>
<head>
	<title>Bus Booking System</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-image: url("p4.jpg");
			background-size: cover;
			background-color: #f2f2f2;
			margin: 0;
			padding: 0;
		}
		.container {
			max-width: 800px;
			margin: 0 auto;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
			border-radius: 5px;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
		}
		h1 {
			margin-top: 0;
			font-size: 36px;
			color: #333;
		}
		table {
			width: 100%;
			border-collapse: collapse;
			margin-bottom: 20px;
		}
		th, td {
			padding: 10px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #f2f2f2;
			font-weight: normal;
		}
		.bookings {
			font-size: 24px;
			font-weight: bold;
			color: #333;
		}
		.available-seats {
			font-size: 24px;
			font-weight: bold;
			color: #007bff;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Bus Booking System</h1>
<?php
// Establish database connection
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "bus_booking_system";
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check if connection is successful
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Get bus ID from URL parameter
if (isset($_GET['id'])) {
    $bus_id = $_GET['id'];
} else {
    echo "Bus ID not specified!";
    exit();
}

// Query the buses table for the seating capacity
$sql_capacity = "SELECT seating_capacity FROM buses WHERE id = $bus_id";
$result_capacity = mysqli_query($conn, $sql_capacity);

// Check if query was successful
if (mysqli_num_rows($result_capacity) > 0) {
    $row_capacity = mysqli_fetch_assoc($result_capacity);
    $seating_capacity = $row_capacity['seating_capacity'];
} else {
    echo "Bus ID not found!";
    exit();
}

// Query the bookings table for the number of seats booked for the given bus ID
$sql_bookings = "SELECT SUM(num_tickets) AS total_booked FROM bookings WHERE busid = $bus_id";
$result_bookings = mysqli_query($conn, $sql_bookings);

// Check if query was successful
if (mysqli_num_rows($result_bookings) > 0) {
    $row_bookings = mysqli_fetch_assoc($result_bookings);
    $num_booked = $row_bookings['total_booked'];
} else {
    $num_booked = 0;
}

// Calculate the available seats
$available_seats = $seating_capacity - $num_booked;

// Output the results
echo "Bus ID: $bus_id<br>";
echo "Seating capacity: $seating_capacity<br>";
echo "Number of seats booked: $num_booked<br>";
echo "Available seats: $available_seats<br>";
echo '<a href="list.php"><button>List</button></a>';
 


// Close database connection
mysqli_close($conn);
?>
</div>
</body>
</html>
