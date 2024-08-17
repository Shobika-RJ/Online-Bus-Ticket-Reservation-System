<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bus_booking_system";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM bookings";

// Execute the query and store the result in a variable
$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Display the data in a table format
    echo "<style>";
    echo "body {";
    echo "    background-image: url('seat6.jpg');";
    echo "    background-repeat: no-repeat;";
    echo "    background-size: cover;";
    echo "}";
    echo "table {";
    echo "    border-collapse: collapse;";
    echo "    width: 100%;";
    echo "}";
    echo "th, td {";
    echo "    text-align: left;";
    echo "    padding: 8px;";
    echo "}";
    echo "th {";
    echo "    background-color: #333;";
    echo "    color: white;";
    echo "}";
    echo "tr:nth-child(even) {";
    echo "    background-color: #f2f2f2";
    echo "}";
    echo "</style>";
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Email</th>";
    echo "<th>Phone</th>";
    echo "<th>Bus ID</th>";
    echo "<th>Origin</th>";
    echo "<th>Destination</th>";
    echo "<th>Number of Tickets</th>";
    echo "<th>Booking Date</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["passenger_name"]."</td>";
        echo "<td>".$row["passenger_email"]."</td>";
        echo "<td>".$row["passenger_phone"]."</td>";
        echo "<td>".$row["busid"]."</td>";
        echo "<td>".$row["origin"]."</td>";
        echo "<td>".$row["destination"]."</td>";
        echo "<td>".$row["num_tickets"]."</td>";
        echo "<td>".$row["booking_date"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No results found";
}

// Close the database connection
mysqli_close($conn);
?>
