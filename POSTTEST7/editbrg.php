<?php
    session_start();
    if ($_SESSION["priv"] != "admin") {
        header("Location: login.php");
    }

    require 'koneksi.php';

    $nama = $_GET['nama'];

    if (isset($_POST["tambah"])) {
        $merk = htmlspecialchars($_POST["merk"]);
        $stok = htmlspecialchars($_POST["stok"]);
        $waktu = htmlspecialchars($_POST["waktu"]);
        $nama_file = htmlspecialchars($_POST["nama_file"]);
        $gambar = $_FILES["gambar"]['name'];
        $x = explode('.', $gambar);
        $ekstensi = strtolower(end($x));
        $gambar_baru = "$nama_file.$ekstensi";
        $temp = $_FILES['gambar']['tmp_name'];

        if(move_uploaded_file($temp, 'img/' . $gambar_baru)){
            $sql = "UPDATE barang SET nama = '$merk', stok = $stok, nama_file = '$gambar_baru', waktu = '$waktu' WHERE nama = '$nama'";
            $result = mysqli_query($conn, $sql);
            if ( $result ) {
                echo"
                    <script>
                        alert('Data berhasil diubah');
                        document.location.href = 'barang.php';
                    </script>
                ";
            }else{
                echo"
                    <script>
                        alert('Data gagal diubah');
                        document.location.href = 'tambah.php';
                    </script>
                ";
            }
        }
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- header -->
    <div class="atas">
        <nav>
            <a href="index.html" id="logo"> Anhar <font color="#f86909"> Ztore </font> </a>
            <div class="navbar">
                <ul>
                    <li> <a href="admin.php"> HOME </a></li>
                    <li> <a href="admin.php"> PRODUCT </a></li>
                    <li> <a href="kelola.php"> KELOLA </a></li>
                    <li> <a href="logout.php"> LOGOUT </a></li>
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
        <div class="form">
            <form method="post" action="" enctype="multipart/form-data">
                <h2>Form Edit Data Barang</h2>
                <div class="order-detail">
                    <div class="input">
                        <span class="detail"> Merk HP </span>
                        <input name="merk" type="text" maxlength="40" placeholder="Masukkan Merk HP Baru" required>
                    </div>
                    <div class="input">
                        <span class="detail"> Jumlah Stok </span>
                        <input name="stok" min="1" type="number" placeholder="Masukkan Jumlah Stok HP" required>
                    </div>
                    <div class="input">
                        <span class="detail"> Nama File </span>
                        <input name="nama_file" type="text" maxlength="40" placeholder="Masukkan Nama File" required>
                    </div>
                    <div class="input">
                        <span class="detail"> Upload Gambar HP </span>
                        <input name="gambar" type="file" id="input_gmbr" placeholder="Masukkan Gambar HP" required>
                    </div>
                    <div class="input">
                        <span class="detail"> Waktu Upload </span>
                        <input type="datetime-local" name="waktu" value="" required>
                    </div>
                    <div class="submitButton">
                        <input type="submit" value="Submit" name="tambah">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="bawah">
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
        
    <script src="scriptorder.js"></script>
</body>
</html>