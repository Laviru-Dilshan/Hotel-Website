<?php
// connect to MySQL database
$host = 'localhost';
$username = 'admin';
$password = 'admin';
$dbname = "hotel";
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dd =  $_POST['dd'];
$nn = $_POST['nn'];
$yyyy = $_POST['yyyy'];
$date = '' . $yyyy . '-' . $nn . '-' . $dd . '' ;
$uname = $_POST['uname'];
$pword = $_POST['pword'];

$sql = "INSERT INTO user (first, last, mail, phone, date, usern, password)
VALUES ('$fname', '$lname', '$email', '$phone', '$date', '$uname', '$pword')";

// execute INSERT statement
if (mysqli_query($conn, $sql)) {
    echo "Record added successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

$conn->close();

?>
