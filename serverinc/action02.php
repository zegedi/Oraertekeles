<?php 

   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
      #test_input
      function test_input($data) {
         $data = htmlspecialchars($data);
         $data = stripslashes($data);
         $data = trim($data);
         return $data;
      }

      $valid = true;

      #name
      if (!empty($_POST['name'])) {
         $name = test_input($_POST['name']);
      } else {
         $valid = false;
      }

      if ($valid) {
         
         require_once 'dbconn.php';

         $name = mysqli_real_escape_string($conn, $name);
         $sql = "INSERT INTO ertekeles(name) VALUES ('".$name."');";
         $result = mysqli_query($conn, $sql);

         if ($result) {
            header('Location: ../szerkesztes.php');
         } else {
            header('Location: ../szerkesztes.php?status=failed');
         }

      } else {
         header('Location: ../szerkesztes.php');
      }

   } else {
      header('Location: ../index.php');
   }

?>