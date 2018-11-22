<?php

   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
      require_once 'dbconn.php';

      $sql = "SELECT * FROM ertekeles;";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
         
         #1
         while ($row = mysqli_fetch_assoc($result)) {
            $p = $row['id']."_pluses";
            $pluses = $_POST[$p];
            
            $m = $row['id']."_minuses";
            $minuses = $_POST[$m];

            $sql = "UPDATE ertekeles SET pluses=".$pluses.", minuses=".$minuses." WHERE id=".$row['id'].";";
            $result = mysqli_query($conn, $sql);

         }

         header('Location: ../index.php');

      } else {
         header('Location: ../szerkesztes.php');
      }

   } else {
      header('Location: ../index.php');
   }

?>