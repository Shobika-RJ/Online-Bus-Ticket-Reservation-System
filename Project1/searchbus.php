<!DOCTYPE html>
<html>
<head>
    <title>Bus Search Results</title>
    <style>
	body {
		background-image: url("p1.jpg");
		background-size: cover;
}
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #333;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .reserve-btn {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
.gallary{
    margin-top: 50px;
}
.gallary .card{
    border-radius: 10px;
    box-shadow: rgba(0,0,0,0.1) 0px 4px 12px;
    cursor: pointer;
}
.gallary .card img{
    border-radius: 10px;
    transition: 0.5s;
}
.gallary .card img:hover{
    transform: scale(1.1);
}
    </style>
</head>
<body>

<?php
$from = $_POST["from"];
$to = $_POST["to"];

// TODO: Validate and sanitize the form data

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bus_booking_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement with placeholders
$sql = "SELECT * FROM buses WHERE origin=? AND destination=?";
$stmt = $conn->prepare($sql);

// Bind the parameters to the placeholders
$stmt->bind_param("ss", $from, $to);

// Execute the query
$stmt->execute();

// Get the query results
$result = $stmt->get_result();

// Display the search results to the user
if ($result->num_rows > 0) {
    //echo "<h1>Book Your Tickets Now...</h1>";

    echo "<table>";
    echo "<tr><th>Bus ID</th><th>Origin</th><th>Destination</th><th>Departure Date</th><th>Departure Time</th><th>Fare</th><th>Seats Availability</th><th>Action</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["origin"] . "</td>";
        echo "<td>" . $row["destination"] . "</td>";
        echo "<td>" . $row["departure_date"] . "</td>";
        echo "<td>" . $row["departure_time"] . "</td>";
        echo "<td>" . $row["fare"] . "</td>";
        echo "<td><a href='viewseats.php?id=" . urlencode($row["id"]) . "' class='reserve-btn'>View Seats</a></td>";
      echo "<td><a href='book1.php?id=" . urlencode($row["id"]) . "&origin=" . urlencode($row["origin"]) . "&destination=" . urlencode($row["destination"]) . 
"&departure_date=" . urlencode($row["departure_date"]) . "&fare=" . urlencode($row["fare"])  . "' class='reserve-btn'>Reserve</a></td>";

        echo "</tr>";
    }
       
    echo "</table>";
  //  echo "<h3>Please <a href='log.html'>login</a> to reserve</td>";
}  else {
    echo "No buses found for the selected origin and destination.";
}

// Close the database connection
$stmt->close();
$conn->close();
?>

</body>
</html>
