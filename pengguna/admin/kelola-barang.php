<?php
    session_start();
    // if ($_SESSION["priv"] != "admin") {
    //     header("Location: login.php");
    // }

    require "../../koneksi.php";

    $result = mysqli_query($conn, "SELECT * FROM produk");
    $barang = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $barang[] = $row;
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
    <link rel="stylesheet" href="../../style.css">
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
        <div class="crud">
            <h1> Kelola Data HP AnharZtore </h1>
            <div class="btn-kelola">
                <button> <a href="kelola.php">Kembali</a> </button>
                <button> <a href="../../produk/tambah.php">Tambah Data</a> </button>
            </div>
            <table border="1">
                <tr height="50px">
                    <th width=""> No </th>
                    <th width=""> Nama </th>
                    <th width=""> Gambar </th>
                    <th width=""> Stok </th>
                    <th width=""> Harga </th>
                    <th width=""> Kategori </th>
                    <th width=""> Deskripsi </th>
                    <th width=""> Waktu Ditambahkan </th>
                    <th width="" colspan="2"> Kelola </th>
                </tr>
                <?php $i = 1; foreach ($barang as $brg):?>
                <tr>
                    <td> <?php echo $i ;?> </td>
                    <td> <?php echo $brg['nama'] ;?> </td>
                    <td> <img src="../../img/<?php echo $brg['gambar']; ?>" id="gmbr_tbl" alt="Gambar Produk"></td>
                    <td> <?php echo $brg['stock'] ;?> </td>
                    <td> <?php echo 'Rp. '.$brg['harga'] ;?> </td>
                    <td> <?php echo $brg['kategori'] ;?> </td>
                    <td> <?php echo $brg['deskripsi'] ;?> </td>
                    <td> <?php echo $brg['keterangan'] ;?> </td>
                    <td width="5%"> <a href="../../produk/editbrg.php?id=<?php echo $brg['id']; ?>" class="updt"> <i class="material-icons" style="font-size:26px;color:green">update</i> </td> </a>
                    <td width="5%"> <a href="../../produk/hapusbrg.php?id=<?php echo $brg['id']; ?>" class = "dlt"> <i class="material-icons" style="font-size:26px;color:red">delete</i> </a> </td>
                </tr>
                <?php $i++; endforeach;?>
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
    
    <script src="../../scriptabout.js"></script>
</body>
</html>