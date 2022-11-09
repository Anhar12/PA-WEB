<?php
    session_start();
    if ($_SESSION["priv"] != "user") {
        header("Location: ../login.php");
    }
    
    require "../koneksi.php";
    $username = $_SESSION["username"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    $data = [];
    while ($row = mysqli_fetch_array($result)) {
        $data[] = $row;
    }
    foreach ($data as $user);
    $id = $user["id_user"];
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <!-- header -->
    <div class="atas">
        <nav>
            <a href="index.html" id="logo"> Anhar <font color="#f86909"> Ztore </font> </a>
            <div class="navbar">
                <ul>
                    <li> <a href="../pengguna/user/user.php"> HOME </a></li>
                    <li> <a href="../produk/list_barang.php"> PRODUCT </a></li>
                    <li> <a href="" style="color: #fa022e;"> ORDER </a></li>
                    <li> <a href="../pengguna/user/profile.php?id=<?php echo $id; ?>"> PROFILE </a></li>
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
        <div class="crud">
            <h1> Daftar Pesanan Anda </h1>
            <div class="btn-kelola">
                <button><a href="../pengguna/user/user.php">Kembali</a> </button>
                <button><a href="../produk/list_barang.php">Tambah</a> </button>
            </div>
            <table border="1">
                <tr height="50px">
                    <th> No. </th>
                    <th> Nama </th>
                    <th> No. Telp </th>
                    <th> Nama HP </th>
                    <th> Jumlah </th>
                    <th> Alamat </th>
                    <th> Pembayaran </th>
                    <th> Atas Nama </th>
                    <th> Keterangan </th>
                    <th> Status </th>
                    <th colspan="2"> Kelola </th>
                </tr>
                <?php 
                    $result = mysqli_query( $conn, "SELECT * FROM pesanan 
                                        INNER JOIN user ON pesanan.id_user = user.id_user
                                        INNER JOIN produk ON pesanan.id_produk = produk.id_produk
                                        WHERE pesanan.id_user = '$id'");
                    $pesanan = [];
                    while ($row = mysqli_fetch_assoc($result)) {
                        $pesanan[] = $row;
                    }
                    $i = 1; 
                    foreach ($pesanan as $pesan):
                ?>
                <tr>
                    <td> <?php echo $i ;?> </td>
                    <td> <?php echo ucwords($pesan['username']) ;?> </td>
                    <td> <?php echo $pesan['no_hp'] ;?> </td>
                    <td> <?php echo $pesan['nama'] ;?> </td>
                    <td> <?php echo $pesan['jumlah'] ;?> </td>
                    <td> <?php echo $pesan['alamat'] ;?> </td>
                    <td> <?php echo $pesan['metode_pembayaran'] ;?> </td>
                    <td> <?php echo $pesan['atas_nama'] ;?> </td>
                    <td> <?php echo $pesan['keterangan_waktu'] ;?> </td>
                    <td> <?php echo ucwords($pesan['status']) ;?> </td>
                    <td width="4%"> <a href="../pesanan/edit_pesanan_user.php?id=<?php echo $pesan['id_pesanan']; ?>" class="updt"> <i class="material-icons" style="font-size:26px;color:green">update</i> </td> </a>
                    <td width="4%"> <a href="../pesanan/hapus.php?id=<?php echo $pesan['id_pesanan']; ?>" class = "dlt"> <i class="material-icons" style="font-size:26px;color:red">delete</i> </a> </td>
                </tr>
                <?php 
                    $i++; 
                    endforeach;
                ?>
            </table>
        </div>

    </div>

    <!-- footer -->
    <div class="bawah">
        <footer class="footerAbout">
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
    
    <script src="../scriptabout.js"></script>
</body>
</html>
