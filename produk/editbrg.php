<?php
    session_start();
    // if ($_SESSION["priv"] != "admin") {
    //     header("Location: login.php");
    // }

    require '../koneksi.php';

    $id = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM produk WHERE id = '$id'");
    $barang = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $barang[] = $row;
    }

    if (isset($_POST["ubah"])) {
        date_default_timezone_set("asia/kuala_lumpur");
        $nama = $_POST["nama"];
        $harga = $_POST["harga"];
        $kategori = $_POST["kategori"];
        $deskripsi = $_POST["deskripsi"];
        $stock = $_POST["stock"];
        $waktu = date("y-m-d h:i:s");
        $gambar = $_FILES["gambar"]["name"];
        $gambarBaru = "$nama.png";
        $tmp = $_FILES["gambar"]["tmp_name"];
        
        if(move_uploaded_file($tmp, '../img/' . $gambarBaru)){
            $sql = "UPDATE produk SET 
                    nama = '$nama', 
                    harga = '$harga', 
                    kategori = '$kategori', 
                    deskripsi = '$deskripsi', 
                    stock = '$stock', 
                    keterangan = '$waktu', 
                    gambar = '$gambarBaru' 
                    WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);
            if ( $result ) {
                echo"
                    <script>
                        alert('Data berhasil diubah');
                        document.location.href = '../pengguna/admin/kelola-barang.php';
                    </script>
                ";
            }else{
                echo"
                    <script>
                        alert('Data gagal diubah');
                        document.location.href = '../pengguna/admin/kelola-barang.php';
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
    <link rel="stylesheet" href="../style.css">
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
                    <?php $i = 1; foreach ($barang as $brg);?>
                    <div class="input">
                        <span class="detail">Nama</span>
                        <input name="nama" type="text" value="<?php echo $brg['nama']?>" required>
                    </div>
                    <div class="input">
                        <span class="detail">Kategori</span>
                        <input name="kategori" type="text" value="<?php echo $brg['kategori']?>" required>
                    </div>
                    <div class="input">
                        <span class="detail">Harga</span>
                        <input name="harga" type="text" value="<?php echo $brg['harga']?>" required>
                    </div>
                    <div class="input">
                        <span class="detail">Stock</span>
                        <input name="stock" type="text" value="<?php echo $brg['stock']?>" required>
                    </div>
                    <div class="input">
                        <span class="detail">Gambar</span>
                        <input name="gambar" type="file" value="<?php echo $brg['gambar'] ?>" required>
                    </div>
                    <div class="input">
                        <span class="detail">Deskripsi</span>
                        <textarea name="deskripsi" id="" cols="30" rows="10" ><?php echo $brg['deskripsi'] ?></textarea>
                    </div>
                    <div class="submitButton">
                        <input type="submit" value="Submit" name="ubah">
                    </div>
                    <div class="kelola">
                        <button><a href="../pengguna/admin/kelola-barang.php">Kembali</a> </button>
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