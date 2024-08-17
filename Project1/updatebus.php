<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bus_booking_system";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['update'])) {
  $busid = $_POST['busid'];
  $destination = $_POST['destination'];
  $departure_date = $_POST['departure_date'];

  $sql = "UPDATE buses SET destination='$destination', departure_date='$departure_date' WHERE id='$busid'";

  if (mysqli_query($conn, $sql)) {
   echo '<script>alert("Reservation record updated successfully"); window.location = "bus.php";</script>';
  } else {
    echo "Error updating reservation record: " . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>
