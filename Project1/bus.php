 <!DOCTYPE html>
<html>
<head>
    <title>Bus Search Results</title>
    <style>
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
  </style>
</head>
<body>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bus_booking_system";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM buses";

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
    echo "td form {";
    echo "    display: inline-block;";
    echo "}";
    echo "td form input[type='submit'] {";
    echo "    background-color: #4CAF50;";
    echo "    border: none;";
    echo "    color: white;";
    echo "    padding: 5px 10px;";
    echo "    text-align: center;";
    echo "    text-decoration: none;";
    echo "    display: inline-block;";
    echo "    font-size: 12px;";
    echo "    margin: 4px 2px;";
    echo "    cursor: pointer;";
    echo "}";
    echo "</style>";
    echo "<table>";
    echo "<tr>";
    echo "<th>BUS_ID</th>";
    echo "<th>ORIGIN</th>";
    echo "<th>DESTINATION</th>";
    echo "<th>DEPARTURE DATE</th>";
    echo "<th>DEPARTURE TIME</th>";
    echo "<th>FARE</th>";
    echo "<th>SEATING CAPACITY</th>";
echo "<th></th>";
    echo "<th>Action</th>";
    echo "<th></th>";
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["origin"]."</td>";
        echo "<td>".$row["destination"]."</td>";
        echo "<td>".$row["departure_date"]."</td>";
        echo "<td>".$row["departure_time"]."</td>";
        echo "<td>".$row["fare"]."</td>";
        echo "<td>".$row["seating_capacity"]."</td>";
         echo "<td><a href='update.php?id=" . urlencode($row["id"]) . "' class='reserve-btn'>Update</a></td>";
        echo "<td><a href='delete.php?id=" . urlencode($row["id"]) . "' class='reserve-btn'>Delete</a></td>";
         echo "<td><a href='bookedpercent.php?id=" . urlencode($row["id"]) . "' class='reserve-btn'>Booked Percentage</a></td>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No results found";
}
echo "<br>";
echo "<center><a href='add.html' class='reserve-btn'>Add Bus</a></center>";

// Close the database connection
mysqli_close($conn);
?>

</body>
</html>