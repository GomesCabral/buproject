<?php
  $conn = mysqli_connect('localhost', 'root', '', 'movies');
  if($conn ) {
      echo 'Connected successfuly<br>';
   } else {
    echo 'Problem connecting to the DB<br>';
}
//var_dump($conn);
