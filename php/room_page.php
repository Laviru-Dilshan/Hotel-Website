<?php
// check if form submitted
if(isset($_POST['submit'])) {
  //retrieve user input
  $username = $_POST['usern'];
  $password = $_POST['password'];
  $meal = $_POST['meal'];
  $colour = $_POST['colour']; 
  $customization = $_POST['customization'];

  // connect to MySQL database
  $host = "localhost";
  $dbusername = "admin";
  $dbpassword = "admin";
  $dbname = "samplehotel";
  $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

  // check connection
  if (mysqli_connect_error()) {
    die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
  } else {
    // query database for user
    $query = "SELECT * FROM user WHERE usern='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) { // if user found

      $sql = "INSERT INTO room (usern, colour, meal, customization) 
      VALUES ('$username', '$colour', '$meal', '$customization')";

      // execute INSERT statement
      if (mysqli_query($conn, $sql)) {
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      $conn->close();
      echo "Your order send";
      exit();
    } else { // if user not found
      // display error message
      echo "Invalid username or password.";
    }

    // close database connection
    mysqli_close($conn);
  }
}
?>
