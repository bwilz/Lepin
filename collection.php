<?php
include('header.html');
include('addAnother.php');

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

//getting total parts
$totalparts = "select sum(parts) as total from sets";
$tpResults = $conn->query($totalparts);
$tps=$tpResults->fetch_assoc();


$result = $conn->query($showSets);


  if($result->num_rows > 0){
    echo "<table class='center'>";

      echo "<tr>";
              echo "<td class='totals' colspan='3'>Total Sets: ".$result->num_rows."</td>";
              echo "<td class='totals2' colspan='2'>Total Parts: ".$tps['total']."</td>";
            echo "</tr>";

      echo "<tr class='headrow'>";
          echo "<th><a class='thead' href='collection.php?sorter=".$sort."&field=number'>Set Number</a></th>";
          echo "<th><a class='thead' href='collection.php?sorter=".$sort."&field=catagory'>Catagory</a></th>";
          echo "<th><a class='thead' href='collection.php?sorter=".$sort."&field=name'>Set Name</a></th>";
          echo "<th><a class='thead' href='collection.php?sorter=".$sort."&field=parts'>Number of Parts</a></th>";
          echo "<th class='thead'>Modify/Delete</th>";
    echo "</tr>";


  //output data of each row //number, catagory, name, parts
  while($row = $result->fetch_assoc()){
    echo "<tr>";
      echo "<td>" . stripslashes($row['number']) . "</td>";
      echo "<td>" . stripslashes($row['catagory']) . "</td>";
      echo "<td>" . stripslashes($row['name']) . "</td>";
      echo "<td>" . stripslashes($row['parts']) . "</td>";
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