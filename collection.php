<?php
include('header.html');


$servername = 'localhost';
$username = 'user@localhost';
$password = 'password';
$dbname = 'lepinbase';

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if($conn->connect_error){
  die('connection failed: ' . $conn->connect_error);
}

$showSets = "Select * from sets";


//put function here maybe
$result = $conn->query($showSets);


  if($result->num_rows > 0){
    echo "<table class='center'>";
      echo "<tr>";
          echo "<th>Set Number</th>";
          echo "<th>Catagory</th>";
          echo "<th>Set Name</th>";
          echo "<th>Number of Parts</th>";
    echo "</tr>";
  

  //output data of each row //number, catagory, name, parts
  while($row = $result->fetch_assoc()){
    echo "<tr>";
      echo "<td>" . $row['number'] . "</td>";
      echo "<td>" . $row['catagory'] . "</td>";
      echo "<td>" . $row['name'] . "</td>";
      echo "<td>" . $row['parts'] . "</td>";
      //button to modify the record
      echo "<td><form action='modify.php' method='post'><button type='submit' name='button' value=".$row['id'].">Modify</button></form>";
    echo "</tr>";
  }
    echo "</table>";

  }

$conn->close();

include('footer.html');
?>