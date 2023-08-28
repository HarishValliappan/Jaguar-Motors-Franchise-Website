<?php
  $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
  $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
  $carType = filter_var($_POST['car_type'], FILTER_SANITIZE_STRING);
  $nearestArea = filter_var($_POST['nearest_area'], FILTER_SANITIZE_STRING);
  $date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "jaguar";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $insertSql = "INSERT INTO testdrive (Firstname, Lastname, Mail, PhoneNo, CarType, Area, Date)
                VALUES ('$firstname', '$lastname', '$email', '$phone', '$carType', '$nearestArea', '$date')";
  if ($conn->query($insertSql) === TRUE) {
    echo "Successfully registered!";
  } else {
    echo "Error: " . $insertSql . "<br>" . $conn->error;
  }

  $conn->close();
?>

