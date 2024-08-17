<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bus_booking_system";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the username and password from the form
  $adminn = $_POST["username"];
  $adminpassword = $_POST["password"];

  // Prepare and execute the query
  $stmt = $conn->prepare("SELECT * FROM adminns WHERE admin_name = ? AND admin_password = ?");
  $stmt->bind_param("ss", $adminn, $adminpassword);
  $stmt->execute();

  // Get the result
  $result = $stmt->get_result();

  // Check if the user exists in the database
  if ($result->num_rows > 0) {
    // User is signed up, redirect to your website
    header("Location: http://localhost/IP/a2.html");
    exit;
  } else {
    // User is not signed up, show an error message
    echo "<script>alert('Invalid username or password.');
   window.location.href='admin.html';</script>";

  }

  // Close the connection
  $stmt->close();
  $conn->close();
}
?>
