<?php
include('header.html');
include('connect.php');

echo '<h1>Search Results</h1>';

$query = 'Select * from sets where '. addslashes($_POST['list']).' LIKE "%'. addslashes($_POST['search']).'%"';


$result = $conn->query($query);

  if($result->num_rows > 0){
     echo "<table class='center'>";
      echo "<tr class='headrow'>";
          echo "<th><a class='thead' href='collection.php?sorter=".$sort."&field=number'>Set Number</a></th>";
          echo "<th><a class='thead' href='collection.php?sorter=".$sort."&field=catagory'>Catagory</a></th>";
          echo "<th><a class='thead' href='collection.php?sorter=".$sort."&field=name'>Set Name</a></th>";
          echo "<th><a class='thead' href='collection.php?sorter=".$sort."&field=parts'>Number of Parts</a></th>";
          echo "<th class='thead'>Modify/Delete</th>";
    echo "</tr>";
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
    
        header('Refresh: 1; URL = home.html');
  }


include('footer.html');
?>