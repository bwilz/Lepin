<?php
include('header.html');
//this file includes a php file that connects to the database
include('connect.php');

if($_POST['id'] == true) {
  $selected = $_POST['id'];
}else{
  //else it assigns the next auto-incr id
  echo "<h2>That record seems dodgey</h2>";
  header('Refresh: 2; URL = collection.php');  
}



$delete = "delete from sets where id = '$selected'";



$result = $conn->query($deleted);

if ($conn->query($delete) === TRUE) {

  echo "<h1>Set Deleted!</h1>";
  echo "set id: " . $selected;
  header('Refresh: 2; URL = collection.php');
}else{
  echo 'Error: ' . $delete . '<br>' . $conn->error;
}


include('footer.html');
?>