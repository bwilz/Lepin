<?php
include('header.html');

$servername = 'sp6xl8zoyvbumaa2.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
$username = 'vyua2i5bdn2qbd4i';
$password = 'lobj7o4an18siirj';
$dbname = 'zgg0lmpxcal453vw';

$selected = $_POST['button'];

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if($conn->connect_error){
  die('connection failed: ' . $conn->connect_error);
}

//querys for specific record
$showSet = "Select * from sets where id = '$selected'";


$result = $conn->query($showSet);


  if($result->num_rows > 0){
   echo "<form action='gotime.php' id='adder' class='inps' method='post'>";

  while($row = $result->fetch_assoc()){
    echo "<input type='hidden' value='". $row['id'] ."'name='id'>";
    echo "<input type='text' value='". $row['number'] . "' name='number'>";
    echo "<input type='text' value='". $row['catagory'] . "' name='catagory'>";
    echo "<input type='text' value='". $row['name'] . "' name='name'>";
    echo "<input type='text' value='". $row['parts'] . "' name='parts'>";
      //button to delete the record
   // echo "<form action='modify.php' method='post'><button type='submit' name='button' value='delete'>Delete</button></form>";
  }
    echo "<button type='submit' formaction='gotime.php' name='save' value='save'>Save</button>";
    echo "<button type='submit' formaction='delete.php' name='delete' value='delete'>Delete</button>";
    echo "</form>";

  }

include('footer.html');
?>