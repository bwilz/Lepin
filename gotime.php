<?php
include('header.html');

$servername = 'localhost';
$username = 'user@localhost';
$password = 'password';
$dbname = 'heroku_533c44dbd04c1b5';

//checks to see if the set already exists and has been modified in modify.php
if($_POST['id'] == true) {
  $lid = $_POST['id'];
}else{
  //else it assigns the next auto-incr id
  $lid = "DEFAULT";
}
$lnumber = addslashes($_POST['number']);
$lcatagory = addslashes($_POST['catagory']);
$lname = addslashes($_POST['name']);
$lparts = addslashes($_POST['parts']);

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if($conn->connect_error){
  die('connection failed: ' . $conn->connect_error);
}

//insert into database
$sql = "INSERT INTO sets (id, number, catagory, name, parts) VALUES ('$lid', '$lnumber', '$lcatagory', '$lname', '$lparts') ON DUPLICATE KEY UPDATE number='$lnumber', catagory='$lcatagory', name='$lname', parts='$lparts'";

if ($conn->query($sql) === TRUE) {

  echo "<div class='added'><h1>New set added!</h1></br><h2>(or updated)</h2></div>";

  header('Refresh: 2; URL = collection.php');
}else{
  echo 'Error: ' . $sql . '<br>' . $conn->error;
}

$conn->close();

?>