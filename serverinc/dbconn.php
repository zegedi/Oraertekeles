<?php

   $serverAddress = '127.0.0.1';
   $serverUsername = 'root';
   $serverPassword = '';
   $serverDB = 'oraertekeles';

   $conn = mysqli_connect($serverAddress, $serverUsername, $serverPassword, $serverDB);

   mysqli_set_charset($conn, 'uft8');

?>