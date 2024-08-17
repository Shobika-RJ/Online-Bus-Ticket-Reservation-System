<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bus_booking_system";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the "busid" key exists in the $_POST array before accessing it
if (isset($_POST["busid"])) {
    $busid = $_POST["busid"];

    // Query to get the seating capacity of the selected bus
    $sql1 = "SELECT seating_capacity FROM buses WHERE id = $busid";

    // Execute the query and get the result
    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
        $row1 = $result1->fetch_assoc();
        $seating_capacity = $row1["seating_capacity"];
    } else {
        // Handle the case where the bus ID is not found in the buses table
        echo "Bus ID not found in the database";
        exit();
    }

    // Query to get the number of tickets booked for the selected bus
    $sql2 = "SELECT SUM(num_tickets) AS total_tickets FROM bookings WHERE busid = $busid";

    // Execute the query and get the result
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
        $row2 = $result2->fetch_assoc();
        $num_tickets = $row2["total_tickets"];
    } else {
        // Handle the case where no bookings are found for the selected bus
        $num_tickets = 0;
    }

    // Calculate the booked percentage
    $booked_percentage = round(($num_tickets / $seating_capacity) * 100, 2);

    // Display the result
    echo "<html>";
    echo "<head>";
    echo "<title>Booked Percentage</title>";
    echo "</head>";
    echo "<body>";
    echo "<div style='display: flex; justify-content: center;'>";
    echo "<fieldset style='text-align: center; width: 400px;'>";
    echo "<legend><h1>Booked Percentage</h1></legend>";
    echo "<div style='background-color: lightblue; padding: 10px;'>";
    echo "<p><strong>Bus ID:</strong> $busid</p>";
    echo "<p><strong>Seating Capacity:</strong> $seating_capacity</p>";
    echo "<p><strong>Number of Tickets Booked:</strong> $num_tickets</p>";
    echo "<p><strong>Booked Percentage:</strong> $booked_percentage%</p>";
    echo "</div>";
    echo "</fieldset>";
    echo "</div>";
    echo "</body>";
    echo "</html>";

    // Close the database connection
    $conn->close();

} else {
    // Handle the case where the "busid" key is not defined
    echo "Bus ID not provided";
    exit();
}
