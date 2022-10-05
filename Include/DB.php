<?php


      $dbhost = 'localhost';
      $dbuser = 'root';
      $dbpass = '123';
      $dbname='test';
      $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

      if(! $conn ) {
         die('Could not connect: ' . mysqli_error());
      }



?>
