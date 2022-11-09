<?php
session_start();
require '../koneksi.php';
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
  <link rel="icon" href="img/AZ.ico">
  <title>AnharZtore</title>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <!-- header -->
  <div class="atas" >
    <nav>
      <a href="index.php" id="logo"> Anhar <font color="#f86909"> Ztore </font> </a>
      <div class="navbar">
        <ul>
          <?php 
              if (isset($_SESSION["username"])){
                echo "<li> <a href='../pengguna/user/user.php'> HOME </a></li>";
                echo "<li> <a href='' style='color: #FA022E;'> PRODUCT </a></li>";
                echo "<li> <a href='../pesanan/pesanan_user.php'> ORDER </a></li>";
                echo "<li> <a href='../pengguna/user/profile.php?id=<?php echo $id; ?>'> PROFILE </a></li>";
                echo "<li> <a href='../logout.php'> LOGOUT </a></li>";
              }
              else {
                echo "<li> <a href='../index.php'> HOME </a></li>";
                echo "<li> <a href='' style='color: #FA022E;'> PRODUCT </a></li>";
                echo "<li> <a href='../about.php'> ABOUT </a></li>";
                echo "<li> <a href='../login.php'> LOGIN </a></li>";
              }
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

    <!-- main content -->
    <div class="container" id="product">
      <h1> Produk AnharZtore </h1>
      <p class="best-seller" style="color: #eeeeee;"> Berbagai macam produk smarthphone dengan berbagai variasi harga yang pastinya murah meriah, aman di kantong, dan pastinya amanah, serta istiqomah </p>
      <form action="" method="GET" style="margin: 20px 0;">
            <div class="search" style="width: 94%; margin-left: 3%;">
                <input type="text" placeholder="Cari produk yang anda inginkan" maxlength="50" class="anu_search" name="cari" style="color: #ffffff;">
                <button type="submit" name="search" class="searching">Search</button>
            </div>
      </form>
      <div  class="box-produk">
        <?php
        if (isset($_GET["search"])) {
          $keyword = $_GET["cari"];
          $result = mysqli_query($conn, "SELECT * FROM produk WHERE
                    nama LIKE '%$keyword%' OR
                    harga LIKE '%$keyword%' OR
                    kategori LIKE '%$keyword%' OR
                    deskripsi LIKE '%$keyword%' OR
                    stock LIKE '%$keyword%'");
        }
        else {
          $result = mysqli_query($conn, "SELECT * FROM produk");
        }
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<div  class='produk' 
                      style='
                          background: rgba(255, 255, 255, 0.25);'>";
          echo "<a href='../detail-produk.php?id=$row[id_produk]'><img src='../img/$row[gambar]' alt='Gambar Produk'></a>";
          echo "<div  class='deskripsi-produk' 
                      style='
                      background: rgba(255, 255, 255, 0.25);'>";
          echo "<a href='../detail-produk.php?id=$row[id_produk]'><h4 class='judul' style='color: #ffffff;'>$row[nama]</h4></a>";
          $harga = number_format($row['harga'],0,'.','.');
          echo "<p class='harga'>Rp $harga</p>";
          echo "<a href='../cek_login.php?id=$row[id_produk]' class='btn-produk'>Beli Sekarang</a>";
          echo "</div>";
          echo "</div>";
        }
        ?>
      </div>
    </div>
  </div>

    <!-- review -->
    <div class="review">
      <h1> Review Dari Para Customer Kami </h1>
      <div class="baris">
        <div class="kolomReview">
          <img src="../assets/rizky.jpg">
          <div>
            <p>
              Tempatnya trusted, adminnya fast respon, terbaeklah pokonya, never gonna give u up
            </p>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-o"></i>
            <h2> Rizky Slebew </h2>
          </div>
        </div>
        <div class="kolomReview">
          <img src="../assets/rangga.jpg">
          <div>
            <p>
              Saya awalnya dapat ingfo dari andri, tempatnya trusted, sayangnya gaada gratis rokok
            </p>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
            <i class="fa fa-star-o"></i>
            <h2> Rangga Banyak tanya </h2>
          </div>
        </div>
      </div>
      <div class="baris2Review">
        <div class="kolomReview">
          <img src="../assets/terkadang.jpg">
          <div>
            <p>
              Awalnya saya coba coba cukur mullet, eh ternyata membuatku kepelet, bintang 5 deh
            </p>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <h2> Terkadang Mullet </h2>
          </div>
        </div>
      </div>
    </div>

    <!-- footer -->
    <footer>
      <div class="footer">
        <p class="best-seller">
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
  <script src="../scriptidx.js"></script>
</body>

</html>