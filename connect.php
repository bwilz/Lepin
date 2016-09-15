<?php
//this php file connects to the database and can be included in other pages to reduce the amount of code
$servername = 'sp6xl8zoyvbumaa2.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
$username = 'vyua2i5bdn2qbd4i';
$password = 'lobj7o4an18siirj';
$dbname = 'zgg0lmpxcal453vw';

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if($conn->connect_error){
  die('connection failed: ' . $conn->connect_error);
}

?>