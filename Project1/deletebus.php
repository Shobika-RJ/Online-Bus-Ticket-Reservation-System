<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bus_booking_system";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the "busid" key exists in the $_POST array before accessing it
if (isset($_POST["busid"])) {
    $busid = $_POST["busid"];
} else {
    // Handle the case where the "busid" key is not defined
    $busid = null; // or some default value
}

// Construct the DELETE query
$sql = "DELETE FROM buses WHERE id = '$busid'";

// Execute the query and check for errors
if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Record deleted successfully"); window.location = "bus.php";</script>';
} else {
    echo "Error deleting record: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
