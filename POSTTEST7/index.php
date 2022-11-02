<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/AZ.ico">
    <title>AnharZtore</title>
    <link rel="stylesheet" href="style.css">
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
                    <li> <a href="index.php"> HOME </a></li>
                    <li> <a href="#product"> PRODUCT </a></li>
                    <li> <a href="about.php"> ABOUT </a></li>
                    <li> <a href="login.php"> LOGIN </a></li>
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
        <form action="search_user.php" method="post">
            <div class="search">
                <input type="text" placeholder="Cari produk yang anda inginkan" maxlength="50" class="anu_search" name="cari">
                <input type="submit" value="SEARCH" name="search" class="searching">
            </div>
        </form>
    </div>

    <div class="bawahHome">
        <div class="produk">
            <h1 id="product"> Best Seller Dari AnharZtore </h1>
            <p> Berbagai macam produk smarthphone dengan berbagai variasi harga yang pastinya murah meriah, aman di kantong, dan pastinya amanah, serta istiqomah </p>
            <div class="baris1">
                <div class="kolom">
                    <div class="produk-detail">
                        <div class="produk-img">
                            <img src="img/samsung.png">
                        </div>
                        <div class="desc-produk">
                            Rp 3.456.000  
                            <br>
                            1080x2400 px
                            <br>
                            6/8GB RAM
                            <br>
                            Snapdragon 730
                            <br>
                            48MP
                            <br>
                            4500mAh
                        </div>
                    </div>
                    <div class="merk">
                        Samsung Galaxy A71
                    </div>
                </div>
                <div class="kolom">
                    <div class="produk-detail">
                        <div class="produk-img">
                            <img src="img/ipon.png">
                        </div>
                        <div class="desc-produk">
                            Rp 3.456.000 
                            <br>
                            1284x2778 px
                            <br>
                            6GB RAM
                            <br>
                            Apple A15 Bionic
                            <br>
                            12MP
                            <br>
                            4352mAh
                        </div>
                    </div>
                    <div class="merk">
                        Apple iPhone 14 Pro Max
                    </div>
                </div>
                <div class="kolom">
                    <div class="produk-detail">
                        <div class="produk-img">
                            <img src="img/vivo.png">
                        </div>
                        <div class="desc-produk">
                            Rp 3.456.000 
                            <br>
                            1080x2376 px
                            <br>
                            8/12GB RAM
                            <br>
                            Dimensity 1300
                            <br>
                            64MP
                            <br>
                            4830mAh
                        </div>
                    </div>
                    <div class="merk">
                        Vivo V25 Pro Max
                    </div>
                </div>
            </div>
            <div class="baris2">
                <div class="kolom">
                    <div class="produk-detail">
                        <div class="produk-img">
                            <img src="img/realme.png">
                        </div>
                        <div class="desc-produk">
                            Rp 3.456.000 
                            <br>
                            1080x2400 px
                            <br>
                            6/8GB RAM
                            <br>
                            Dimensity 920
                            <br>
                            50MP
                            <br>
                            4500mAh
                        </div>
                    </div>
                    <div class="merk">
                        Realme GT Neo 3T
                    </div>
                </div>
                <div class="kolom">
                    <div class="produk-detail">
                        <div class="produk-img">
                            <img src="img/oppo.png">
                        </div>
                        <div class="desc-produk">
                            Rp 3.456.000 
                            <br>
                            1080x2412 px
                            <br>
                            8/12GB RAM
                            <br>
                            Dimensity 8100-Max
                            <br>
                            50MP
                            <br>
                            4500mAh
                        </div>
                    </div>
                    <div class="merk">
                        Oppo Reno8 Pro
                    </div>
                </div>
                <div class="kolom">
                    <div class="produk-detail">
                        <div class="produk-img">
                            <img src="img/xiaomi.png">
                        </div>
                        <div class="desc-produk">
                            Rp 3.456.000 
                            <br>
                            1080x2400 px
                            <br>
                            6/8GB RAM
                            <br>
                            Snapdragon 695 5G
                            <br>
                            108MP
                            <br>
                            5000mAh
                        </div>
                    </div>
                    <div class="merk">
                        Xiaomi Poco X4 Pro 5G
                    </div>
                </div>
            </div>
        </div>

    <!-- review -->
        <div class="review">
            <h1> Review Dari Para Customer Kami </h1>
            <div class="baris">
                <div class="kolomReview">
                    <img src="img/rizky.jpg">
                    <div>
                        <p>
                            Tempatnya trusted, adminnya fast respon, terbaeklah pokonya, never gonna give u up
                        </p>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star-half-o" ></i>
                        <h2> Rizky Slebew </h2>
                    </div>
                </div>
                <div class="kolomReview">
                    <img src="img/rangga.jpg">
                    <div>
                        <p>
                            Saya awalnya dapat ingfo dari andri, tempatnya trusted, sayangnya gaada gratis rokok
                        </p>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star-o" ></i>
                        <i class="fa fa-star-o" ></i>
                        <h2> Rangga Banyak tanya </h2>
                    </div>
                </div>
            </div>
            <div class="baris2Review">
                <div class="kolomReview">
                    <img src="img/terkadang.jpg">
                    <div>
                        <p>
                            Awalnya saya coba coba cukur mullet, eh ternyata membuatku kepelet, bintang 5 deh
                        </p>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
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
    <script src="scriptidx.js"></script>
</body>
</html>