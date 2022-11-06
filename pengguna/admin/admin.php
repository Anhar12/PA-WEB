<?php 
    session_start();
    if ($_SESSION["priv"] != "admin") {
        header("Location: ../../login.php");
    }

    require '../../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/AZ.ico">
    <title>AnharZtore</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- header -->
    <div class="atas">
        <nav>
            <a href="index.php" id="logo"> Anhar <font color="#f86909"> Ztore </font> </a>
            <div class="navbar">
                <ul>
                    <li> <a href="" style="color: #FA022E;"> HOME </a></li>
                    <li> <a href="kelola.php"> DASHBOARD </a></li>
                    <li> <a href="../../logout.php"> LOGOUT </a></li>
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
        <div class="deskripsi">
            <h1> AnharZtore SmartPhone </h1>
            <p> Smartphone store terbaik di Samarinda, dapat memberikan layanan terbaik mulai dari penjualan yang murah meriah, aman di kantong, serta amanah dan istiqomah </p>
            <p> Ayo! Tunggu apalagi, segera belanja di AnharZtore! </p>
        </div>

        <form action="hasil_search.php" method="post">
            <div class="search">
                <input type="text" placeholder="Cari produk yang anda inginkan" maxlength="50" class="anu_search" name="cari">
                <input type="submit" value="SEARCH" name="search" class="searching">
            </div>
        </form>
    </div>

    <div class="bawahHome">
    <div class="container" id="product">
            <h1> Best Seller Dari AnharZtore </h1>
            <p class="best-seller"> Berbagai macam produk smarthphone dengan berbagai variasi harga yang pastinya murah meriah, aman di kantong, dan pastinya amanah, serta istiqomah </p>
            <div class="box-produk">
                <?php
                    $result = mysqli_query($conn, "SELECT * FROM produk");
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='produk'>";
                            echo "<img src='../../img/$row[gambar]' alt='Gambar Produk'>";
                            echo "<div class='deskripsi-produk'>";
                                echo "<h4 class='judul'>$row[nama]</h4>";
                                echo "<p class='harga'>Rp $row[harga]</p>";
                                echo "<a href='../../cek_login.php' class='btn-produk'>Beli Sekarang</a>";
                            echo "</div>";
                        echo "</div>";
                    }
                ?>
            </div>

            <!-- review -->
            <div class="review">
                <h1> Review Dari Para Customer Kami </h1>
                <div class="baris">
                    <div class="kolomReview">
                        <img src="../../assets/rizky.jpg">
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
                        <img src="../../assets/rangga.jpg">
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
                        <img src="../../assets/terkadang.jpg">
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
