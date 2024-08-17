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
        input[type="text"], input[type="submit"], input[type="date"] {
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
echo '<form method="post" action="deletebus.php">';
echo '<h1>Delete Bus Info</h1>';
echo 'Bus ID: <input type="text" name="busid" value="' . $busid . '"><br>';
echo '<input type="submit" name="delete" value="Delete">';
echo '</form>';
?>

</body>
</html>