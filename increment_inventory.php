<?php
  session_start();
  if(isset($_SESSION))
  {
    if(isset($_GET)){
      include 'connectDB.php';

      $sql = "UPDATE inventory SET qty = qty+1 WHERE material_id = ".$_GET["id"];
      if(mysqli_query($conn,$sql)){
        echo "ok";
      }

      mysqli_close($conn);
    }
  }
  header("Location: inventory.php");
 ?>
