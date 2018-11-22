<!DOCTYPE html>
<html lang="en">
<head>
   <?php require_once 'serverinc/meta.php'?>
</head>
<body>
   <div id="container">
      <h1>11D - Óraértékelés</h1>
      <table id="results">
         <tr id="heading">
            <td><b>Név:</b></td>
            <td><b>Pluszok (+):</b></td>
            <td><b>Minuszok (-):</b></td>
            <td><b>Különbség:</b></td>
         </tr>
         <?php 
         
            require_once 'serverinc/dbconn.php';

            $sql = "SELECT * FROM ertekeles;";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
                  $diff = $row['pluses'] - $row['minuses'];
                  if ($diff > 0) {
                     $diff = "+".$diff;
                  }
                  echo '<tr><td>'.$row['name'].'</td><td>'.$row['pluses'].'</td><td>'.$row['minuses'].'</td><td>'.$diff.'</td></tr>';
               } 
            }

         ?>
      </table>
      <a href="szerkesztes.php" class="button">Szerkesztés</a>
   </div>

   <?php require_once 'serverinc/footer.php'?>

</body>
</html>