<!DOCTYPE html>
<html>
<head>
    <title>Book Ticket</title>
    <style>
        body {
            background-image: url("tpic.jpg");
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255,255,255,0.8);
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
        }
        input[type="text"], input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: none;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>

<?php
// Check if the "busid" key exists in the $_REQUEST array before accessing it
if (isset($_REQUEST["id"])) {
    $busid = $_REQUEST["id"];
} else {
    // Handle the case where the "busid" key is not defined
    $busid = null; // or some default value
}

// Repeat the same for other variables
if (isset($_REQUEST["origin"])) {
    $origin = $_REQUEST["origin"];
} else {
    $origin = null;
}

if (isset($_REQUEST["destination"])) {
    $destination = $_REQUEST["destination"];
} else {
    $destination = null;
}

if (isset($_REQUEST["departure_time"])) {
    $departure_date = $_REQUEST["departure_time"];
} else {
    $departure_date = null;
}

//if (isset($_REQUEST["arrival_date"])) {
//   $arrival_date = $_REQUEST["arrival_date"];
//} else {
  //  $arrival_date = null;
//}

if (isset($_REQUEST["fare"])) {
    $fare = $_REQUEST["fare"];
} else {
    $fare = null;
}


// Set the value of the busid, origin, destination, departure-date, and arrival-date fields in the booking form using the retrieved values
echo '<form method="post" action="book_ticket.php">';
echo '<h1>Fill Your Details Here!!!</h1>';
echo 'Name: <input type="text" name="passenger_name"><br>';
echo 'Email: <input type="text" name="passenger_email"><br>';
echo 'Phone: <input type="text" name="passenger_phone"><br>';

echo 'Bus ID: <input type="text" name="busid" value="' . $busid . '"><br>';
echo 'Origin: <input type="text" name="origin" value="' . $origin . '"><br>';
echo 'Destination: <input type="text" name="destination" value="' . $destination . '"><br>';
echo 'Departure Date: <input type="text" name="departure_date" value="' . $departure_date . '"><br>';
//echo 'Arrival Date: <input type="text" name="arrival_date" value="' . $arrival_date . '"><br>';
echo 'Number of Tickets: <input type="text" name="num_tickets"><br>';
echo 'Fare: <input type="text" name="fare" value="' . $fare . '"><br>';
echo '<input type="submit" value="Book Ticket">';
echo '</form>';
?>
</body>
</html>