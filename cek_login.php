<?php
  if(!isset($_SESSION["priv"])){
    header("location: login.php");
    return;
  }
  else if($_SESSION["priv"] == "user"){
    header("Location: pengguna/user/order.php");
  }
?>