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

$field = 'id';
$sort = 'DESC';

if(isset($_GET['sorter'])){
  $field = $_GET['field'];
  if($_GET['sorter']=='ASC')
  {
    $sort='DESC';
  }else{
    $sort='ASC';
  }
}


//querys the database for all records
$showSets = "Select * from sets order by $field $sort";



$result = $conn->query($showSets);


  if($result->num_rows > 0){
    echo "<table class='center'>";
      echo "<tr class='headrow'>";
          echo "<th><a class='thead' href='collection.php?sorter=".$sort."&field=number'>Set Number</a></th>";
          echo "<th><a class='thead' href='collection.php?sorter=".$sort."&field=catagory'>Catagory</a></th>";
          echo "<th><a class='thead' href='collection.php?sorter=".$sort."&field=name'>Set Name</a></th>";
          echo "<th><a class='thead' href='collection.php?sorter=".$sort."&field=parts'>Number of Parts</a></th>";
          echo "<th class='thead' colspan=2>Modify/Delete</th>";
    echo "</tr>";


  //output data of each row //number, catagory, name, parts
  while($row = $result->fetch_assoc()){
    echo "<tr>";
      echo "<td>" . $row['number'] . "</td>";
      echo "<td>" . $row['catagory'] . "</td>";
      echo "<td>" . $row['name'] . "</td>";
      echo "<td>" . $row['parts'] . "</td>";
      //button to modify the record
      echo "<td><form action='modify.php' method='post'><button type='submit' name='button' value=".$row['id'].">Modify/Delete</button></form>";
    echo "</tr>";
  }
    echo "</table>";

  }else{
    echo '<h1>No sets found</h1>';
  }




$conn->close();

include('footer.html');
?>