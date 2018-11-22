<!DOCTYPE html>
<html lang="en">
<head>
   <?php require_once 'serverinc/meta.php'?>
</head>
<body>
   <div id="container">
      <h1>11D - Óraértékelés</h1>
      <h1>-Szerkesztés-</h1>
      <form action="serverinc/action01.php" method="post" style="display: grid; justify-content: center; margin-bottom: 20px;">
         <table id="results">
            <tr id="heading">
               <td><b>Név:</b></td>
               <td><b>Pluszok (+):</b></td>
               <td><b>Minuszok (-):</b></td>
               <td><b>Különbség:</b></td>
            </tr>
            
            <?php 
            
               require 'serverinc/dbconn.php';

               $sql = "SELECT * FROM ertekeles;";
               $result = mysqli_query($conn, $sql);

               if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                     $diff = $row['pluses'] - $row['minuses'];
                     echo '
                     <tr>
                     <td>'.$row['name'].'</td>
                     <td><input type="number" name="'.$row["id"].'_pluses" value="'.$row['pluses'].'"></td>
                     <td><input type="number" name="'.$row["id"].'_minuses" value="'.$row['minuses'].'"></td>
                     <td></td>
                     </tr>';
                  } 
               }

               mysqli_close($conn);

            ?>
         </table>
         <input type="submit" value="Változtatások mentése!" class="button" style="margin: auto;">
      </form>

      <table>
         <form action="serverinc/action02.php" method="post">
         <tr>
            <td>Új tanuló hozzáadása:</td>
            <td><input type="text" name="name" placeholder="Tanúló neve"></td>
            <td><input type="submit" value="Hozzáadás"></td>
         </tr>
         </form>
         <form action="serverinc/action03.php" method="post">
         <tr>
            <td>Tanuló eltávolítása:</td>
            <td>
               <select name="name">
                  <option></option>
                  <?php 

                     require 'serverinc/dbconn.php';

                     $sql = "SELECT * FROM ertekeles;";
                     $result = mysqli_query($conn, $sql);

                     if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                           echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                        }
                     }
                  
                  ?>
               </select>
            </td>
            <td><input type="submit" value="Eltávolítás"></td>
         </tr>
         </form>
      </table>
      <a href="index.php" class="button">Vissza</a>
   </div>

   <?php require_once 'serverinc/footer.php'?>

</body>
</html>