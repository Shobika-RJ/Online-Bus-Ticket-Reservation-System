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
  // Get the username, password, and confirm password from the form
  $user = $_POST["username"];
  $pass = $_POST["password"];
  $confpass = $_POST["confpassword"];

  // Check if the passwords match
  if ($pass !== $confpass) {
    echo "<script>alert('Passwords do not match.');
    window.location.href='sign.html';</script>";
  } else {
    // Check if the username already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
      // Username already exists, show an error message
      echo "<script>alert('Username already exists.');
      window.location.href='sign.html';</script>";
    } else {
      // Prepare and execute the query
      $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
      $stmt->bind_param("ss", $user, $pass);
      $stmt->execute();

      // Close the connection
      $stmt->close();
      $conn->close();

      // Redirect the user to the login page
      header("Location: http://localhost/IP/b1.html");
      exit;
    }
  }
}
?>
