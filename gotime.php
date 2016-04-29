<?php
$servername = 'localhost';
$username = 'user@localhost';
$password = 'password';
$dbname = 'lepinbase';

$lnumber = $_POST['number'];
$lcatagory = $_POST['catagory'];
$lname = $_POST['name'];
$lparts = $_POST['parts'];

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if($conn->connect_error){
  die('connection failed: ' . $conn->connect_error);
}

$sql = "INSERT INTO sets (number, catagory, name, parts) VALUES ('$lnumber', '$lcatagory', '$lname', '$lparts')";

if ($conn->query($sql) === TRUE) {
  echo "New set added!";
}else{
  echo 'Error: ' . $sql . '<br>' . $conn->error;
}

$conn->close();

?>