<?php
    session_start();
    if ($_SESSION["priv"] != "admin") {
        header("Location: ../login.php");
    }

    require '../koneksi.php';
    $id = $_GET['id'];

    $result = mysqli_query( $conn, "SELECT * FROM pesanan
                            INNER JOIN user ON pesanan.id_user = user.id
                            INNER JOIN produk ON pesanan.id_produk = produk.id
                            WHERE id_pesanan = '$id'"
                            );

    if (isset($_POST["tambah"])) {
        $status = $_POST["status"];

        $sql = "UPDATE pesanan SET `status` = '$status' WHERE id_pesanan = '$id'";

        $result = mysqli_query($conn, $sql);

        if ( $result ) {
            echo"
                <script>
                    alert('Data berhasil diubah');
                    document.location.href = '../pengguna/admin/kelola-pesanan.php';
                </script>
            ";
        }else{
            echo"
                <script>
                    alert('Data gagal diubah');
                    document.location.href = '../pengguna/admin/kelola-pesanan.php';
                </script>
            ";
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
                    <li> <a href="../pengguna/admin/admin.php"> HOME </a></li>
                    <li> <a href="../pengguna/admin/admin.php"> PRODUCT </a></li>
                    <li> <a href='../pengguna/admin/kelola.php'> KELOLA </a></li>
                    <li> <a href="../logout.php"> LOGOUT </a></li>
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
            <form method="post" action="">
                <h2>Form Update Data Pesanan</h2>
                <div class="order-detail">
                    <?php 
                        $pesanan = [];
                        while ($row = mysqli_fetch_array($result)) {
                            $pesanan[] = $row;
                        }
                        foreach ($pesanan as $pesan);
                    ?>
                    <div class="input">
                        <span class="detail"> Nama Lengkap </span>
                        <input name="nama" type="text" value="<?php echo $pesan['username'] ?>" readonly>
                    </div>
                    <div class="input">
                        <span class="detail"> Nomor HP </span>
                        <input name="no_hp" type="tel" value="<?php echo $pesan['no_hp'] ?>" readonly>
                    </div>
                    <div class="input">
                        <span class="detail"> Merk HP </span>
                        <input name="merk" type="text" value="<?php echo $pesan['nama'] ?>" readonly>
                    </div>
                    <div class="input">
                        <span class="detail"> Jumlah Order </span>
                        <input name="jumlah" type="number" value="<?php echo $pesan['jumlah'] ?>" readonly>
                    </div>
                    <div class="input">
                        <span class="detail"> Total Harga </span>
                        <input name="jumlah" type="text" value="Rp. <?php echo $pesan['total_harga'] ?>" readonly>
                    </div>
                    <div class="input">
                        <span class="detail"> Alamat Lengkap </span>
                        <input name="alamat" type="text" value="<?php echo $pesan['alamat'] ?>" readonly>
                    </div>
                    <div class="input">
                        <span class="detail">Pembayaran </span>
                        <input name="alamat" type="text" value="<?php echo $pesan['metode_pembayaran'] ?>" readonly>
                    </div>
                    <div class="input">
                        <span class="detail">Atas Nama </span>
                        <input name="alamat" type="text" value="<?php echo $pesan['atas_nama'] ?>" readonly>
                    </div>
                    <div class="input">
                        <span class="detail">Status </span>
                        <select name="status" id="">
                            <option value="">-</option>
                            <option value="menunggu">Menunggu</option>
                            <option value="berhasil">Berhasil</option>
                            <option value="gagal">Gagal</option>
                        </select>
                    </div>
                    <div class="submitButton">
                        <input type="submit" value="Submit" name="tambah">
                    </div>
                    <div class="kelola">
                        <button><a href="../pengguna/admin/kelola-pesanan.php">Kembali</a> </button>
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
