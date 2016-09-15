<?php
//this php file connects to the database and can be included in other pages to reduce the amount of code
$servername = 'localhost';
$username = 'user@localhost';
$password = 'password';
$dbname = 'heroku_533c44dbd04c1b5';

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if($conn->connect_error){
  die('connection failed: ' . $conn->connect_error);
}

?>