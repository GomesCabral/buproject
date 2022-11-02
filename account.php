<?php

session_start();

require('dbh.php');

// SQL query
$strSQL = "SELECT name, email FROM users WHERE id = '".$_SESSION['newsession']."'";


$rs = mysqli_query($conn, $strSQL);


while($row = mysqli_fetch_array($rs)) {

  
  echo $row['name'] . "<br />";
  echo $row['email'] . "<br />";

}

mysqli_close($conn);

?>