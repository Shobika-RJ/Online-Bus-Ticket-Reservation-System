<!DOCTYPE html>
<html>
<head>
	<title>Bus Ticket Booking</title>
	<style>
		body {
			background-color: #f5f5f5;
			font-family: Arial, sans-serif;
			background-image: url("tic.jpg");
            background-size: cover;
		}
		fieldset {
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 10px;
  margin-bottom: 20px;
}

legend {
  font-weight: bold;
  font-size: 18px;
  margin-bottom: 10px;
}

		h1 {
			color: #ff8c00;
			text-align: center;
			margin-top: 50px;
		}
		p {
			font-size: 18px;
			line-height: 1.5;
			margin: 10px 0;
			color: #333;
		}
		.ticket-details {
			max-width: 600px;
			margin: 50px auto;
			padding: 30px;
			background-color: #fff;
			box-shadow: 0px 0px 5px rgba(0,0,0,0.2);
		}
		.ticket-details p strong {
			font-weight: bold;
			margin-right: 10px;
		}
		.ticket-details p:last-child {
			margin-bottom: 0;
		}
		.button {
			display: inline-block;
			padding: 10px 20px;
			background-color: #ff8c00;
			color: #fff;
			border-radius: 5px;
			text-decoration: none;
			margin-top: 20px;
			font-size: 18px;
		}
		.button:hover {
			background-color: #ffa54c;
		}
	</style>
</head>
<body>
<?php
// Retrieve the values submitted in the form
$name =$_POST["passenger_name"];
$email =$_POST["passenger_email"];
$phone =$_POST["passenger_phone"];
$busid = $_POST['busid'];
$origin = $_POST['origin'];
$destination = $_POST['destination'];
$departure_date = $_POST['departure_date'];
$num_tickets = $_POST['num_tickets'];
$fare = $_POST['fare'];

// Generate a unique ticket ID
$ticket_id = uniqid();

// Calculate the total fare for the given number of tickets
$total_fare = $fare * $num_tickets;

$dsn = 'mysql:host=localhost;dbname=bus_booking_system';
$username = 'root';
$password = '';
$dbh = new PDO($dsn, $username, $password);

// Prepare a SQL query to insert the ticket data into the database
$sql = "INSERT INTO bookings (passenger_name, passenger_email, passenger_phone, busid, origin, destination, num_tickets) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $dbh->prepare($sql);

// Execute the SQL query with the form data as parameters
$stmt->execute([$name, $email, $phone, $busid, $origin, $destination,$num_tickets]);

// Close the database connection
$dbh = null;

// Output a success message to the user
echo '<h1>Ticket Booked Successfully!</h1>';
echo '<p>Thank you for booking your ticket with us. Your booking details have been saved in our database.</p>';

// Output the ticket details to the user
echo '<fieldset>';
echo '<legend><h1>Ticket Details</h1></legend>';
echo '<p><strong>Ticket ID:</strong> ' . $ticket_id . '</p>';
echo '<p><strong>Passenger Name:</strong>' .$name . '</p>';
echo '<p><strong>Passenger Email:</strong>' .$email . '</p>';
echo '<p><strong>Passenger phone:</strong>' .$phone . '</p>';
echo '<p><strong>Bus ID:</strong> ' . $busid . '</p>';
echo '<p><strong>Origin:</strong> ' . $origin . '</p>';
echo '<p><strong>Destination:</strong> ' . $destination . '</p>';
echo '<p><strong>Departure Date:</strong> ' . $departure_date . '</p>';
echo '<p><strong>Number of Tickets:</strong> ' . $num_tickets . '</p>';
echo '<p><strong>Total Fare:</strong> ' . $total_fare . '</p>';
echo '</fieldset>';
?>
</body>
</html>
