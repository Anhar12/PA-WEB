<?php
session_start();
require 'koneksi.php';
if ($_SESSION["priv"] != "admin" and $_SESSION["priv"] != "user"){
    header("Location: index.php?id=$_GET[id]");
    return;
}
if (isset($_SESSION["username"])){
  $username = $_SESSION["username"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
  $data = [];
  while ($row = mysqli_fetch_array($result)) {
    $data[] = $row;
  }
  foreach ($data as $user);
  $id = $user["id_user"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/AZ.png">
    <title>AnharZtore</title>
    <link rel="stylesheet" href="style-detail-produk.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    .contact input{
      width: 100px;
      height:50px;
    }

    .contact .row{
      display: flex;
      align-items: center;
      flex-wrap: wrap;
      gap:1.5rem;
    }

    .contact .row .image{
      flex:0 1 50%;
    }

    .contact .row .image img{
      width: 70%;
      padding-left:20%;
    }

    .contact .row form{
      border: 0.2rem solid #222;
      flex: 0 1 30%;
      padding: 0.5rem 2rem;
      text-align: center;
      background-color:#fff;
    }

    .contact .row form h3{
      font-size: 2.5rem;
      color:#222;
      margin-bottom: 1rem;
      text-transform: capitalize;
    }

    .contact .row form .box{
      margin: 0.7rem 0;
      font-size: 1rem;
      color: #222;
      border: 0.2rem solid #222;
      padding: 0.5rem;
      width: 90%;
      height: 5%;
    }

    .contact .row form textarea{
      height: 7rem;
      resize: none;
    }

    .btn{
      background-color: #f86909;
      color:#222;
    }
    </style>
  </head>

<body>
    <!-- header -->
    <div class="atas">
        <nav>
            <a href="index.php" id="logo"> Anhar <font color="#f86909"> Ztore </font> </a>
            <div class="navbar">
                <ul>
                <?php 
                    $username = $_SESSION["username"];
                    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
                    $data = [];
                    while ($row = mysqli_fetch_array($result)) {
                        $data[] = $row;
                    }
                    foreach ($data as $user);
                    $id = $user["id_user"];
                    echo "<li> <a href='pengguna/user/user.php'> HOME </a></li>";
                    echo "<li> <a href='produk/list_barang.php' '> PRODUCT </a></li>";
                    echo "<li> <a href='pesanan/pesanan_user.php'> ORDER </a></li>";
                    echo "<li> <a href='kontak.php' style='color: #FA022E;'> KONTAK </a></li>";
                    echo "<li> <a href='pengguna/user/profile.php?id= $id'> PROFILE </a></li>";
                    echo "<li> <a href='logout.php'> LOGOUT </a></li>";

                ?>  
                    <li>
                        <label>
                            <input type="checkbox" class="checkbox" id="tombol">
                            <span class="check"></span>
                        </label>
                    </li>
                </ul>
            </div>
        </nav> 
       <!-- formulir kontak -->
    <section class="contact">

      <div class="row">

          <div class="image">
            <img src="img/Contact us-pana.svg" alt="">
          </div>

          <form action="" method="post">
            <h3>tell us something!</h3>
            <input type="text" name="name" maxlength="50" class="box" placeholder="enter your name" required>
            <input type="email" name="email" maxlength="50" class="box" placeholder="enter your email" required>
            <textarea name="msg" class="box" required placeholder="enter your message" maxlength="500" cols="30" rows="10"></textarea>
            <input type="submit" value="send message" name="send" class="btn">
          </form>

      </div>

      </section> 
    </div>

<?php

if(isset($_POST['send'])){

   $nama = $_POST['name'];
   $nama = filter_var($nama, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $saran = $_POST['msg'];
   $saran = filter_var($saran, FILTER_SANITIZE_STRING);

   $result = mysqli_query($conn, "INSERT INTO `saran` VALUES('','$id','$nama','$email','$saran')");


}

?>
<!-- formulir kontak -->
            <!-- footer -->
            <footer>
                <div class="footer">
                    <p>
                        Jangan lupa belanja di AnharZtore, serta follow akun ig saya <a href="https://www.instagram.com/anharrrrrr_/" id="ig"> @anharrrrrr_ </a>
                        <br>
                        Demikian tampilan web Posttest 5 saya, wassalamualaikum warahmatullahi wabarakatuh
                    </p>
                </div>
                <div id="kontak">
                    <i class="fa fa-whatsapp"> 085845723207 </i>
                    <i class="fa fa-instagram"> anharrrrrr_ </i>
                    <i class="fa fa-envelope-o"> anharkhoirun@gmail.com </i>
                    <i class="fa fa-github"> Anhar12 </i>
                </div>
                <p> @Copyright 2022 - anharrrslbw - Made with HTML, CSS, JS, & PHP </p>
            </footer>

        </div>
    </div>
    <script src="scriptidx.js"></script>
</body>

</html>
