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
    <link rel="icon" href="../assets/AZ.ico">
    <title>AnharZtore</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        .boxPesanan {
            padding-top: 20px;
            margin: auto;
            width: 90%;
            display: flex;
            flex-wrap: wrap;
        }
        .pesanan {
            margin: auto;
            margin-bottom: 30px;
            width: 29%;
            padding: 10px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            display: flex;
            justify-content: space-between;
            flex-direction: row;
            align-items: center;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            color: #ffffff;
            border-radius: 13px;
        }
        .deskripsi {
            margin: 0;
            margin-left: 10px;
            display: flex;
            text-align: left;
            flex-direction: column;
        }
        .pesanan p {
            padding: 0;
            margin-bottom: 3px;
            font-weight: 400;
            border: 1px solid transparent;
        }
        .action {
            margin-top: 5px;
            display: flex;
            justify-content: space-between;
        }
        .action button {
            cursor: pointer;
            transition: all 0.3s;
            margin: 0;
            width: 47%;
            padding: 0;
            font-size: 14px;
            font-weight: 600;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(3px);
            color: #ffffff;
        }
        .pesanan .status {
            font-weight: 600;
            font-size: 15px;
            letter-spacing: 1px;
            margin-top: 5px;
            padding-top: 2px;
            padding-bottom: 5px;
            border: 1px solid transparent;
            border-radius: 8px; 
            text-align: center;
        }
    </style>
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
                    <li> <a href='../kontak.php?id=<?php echo $id ?>'> KONTAK </a></li>
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
            
            <div class="boxPesanan">
                <?php 
                    // $cekPesanan = mysqli_query($conn, "SELECT * FROM pesanan WHERE id_user = ")
                    $result = mysqli_query($conn, 
                                "SELECT * FROM pesanan 
                                INNER JOIN user ON pesanan.id_user = user.id_user
                                INNER JOIN produk ON pesanan.id_produk = produk.id_produk
                                WHERE pesanan.id_user = '$id'");
                    if (mysqli_num_rows($result) === 0){
                        echo "<p
                        style='
                            color: #ffffff;
                            font-size: 24px;
                            width: 100%;
                        '> 
                        Tidak Ada Pesanan </p>";
                    }
                    else {
                        $pesanan = [];
                        while ($row = mysqli_fetch_assoc($result)) {
                            $pesanan[] = $row;
                        }
                        foreach ($pesanan as $pesan):
                ?>
                <div class="pesanan">
                    <img src="../img/<?php echo $pesan['gambar'];?>" alt="Gambar Produk">
                    <div class="deskripsi">
                        <p style="font-weight: 600;"><?php echo ucwords($pesan['nama']);?></p>
                        <p>Jumlah : <?php echo $pesan['jumlah'];?></p>
                        <p>Total Harga</p>
                        <p style="font-weight: 600;">Rp <?php echo number_format($pesan['total_harga'], 0, ".", ".") ?></p>
                        <?php 
                            $status = ucwords($pesan['status']);
                            if ($pesan['status'] == "berhasil"){
                                echo "<p class='status'
                                style='
                                    width: 90px;
                                    background: #28a745;'
                                >$status</p>";
                            }
                            else if ($pesan['status'] == "gagal"){
                                echo "<p class='status'
                                style='
                                    width: 70px;
                                    background: #dc3545;'
                                >$status</p>";
                            }
                            else {
                                echo "<p class='status' 
                                style='
                                    width: 105px;
                                    background: #ffc107;
                                    color: #000000;'
                                >$status</p>";
                            }
                        ?>
                        <div class="action">
                            <button>
                                <a href="../pesanan/edit_pesanan_user.php?id=<?php echo $pesan['id_pesanan']; ?>" 
                                class="updt"> 
                                    <i class="material-icons" 
                                    style=" padding: 0; 
                                            font-size:32px;
                                            color:green;
                                            margin-top: 2px"
                                    >update</i>
                                </a>
                            </button>
                            <button>
                            <!-- <a href="../pesanan/hapus.php?id=<?php echo $pesan['id_pesanan']; ?>" class = "dlt"> <i class="material-icons" style="font-size:26px;color:red">delete</i> </a> </td> -->
                                <a href="../pesanan/hapus.php?id=<?php echo $pesan['id_pesanan']; ?>" 
                                    class="dlt"> 
                                    <i class="material-icons" 
                                    style=" padding: 0; 
                                            font-size:32px;
                                            color:red;
                                            margin-top: 2px"
                                    >delete</i>
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
                    <?php 
                        endforeach;
                    }
                ?>
            </div>
            <!-- <div class="boxPesanan">
                <div class="pesanan">
                    <img src="../img/iPhone 14 Pro Max.png" alt="">
                    <div class="deskripsi">
                        <p style="font-weight: 600;">Xiaomi Poco X4 Pro 5G</p>
                        <p>Jumlah : 4</p>
                        <p>Total Harga</p>
                        <p style="font-weight: 600;">Rp 2.000.000</p>
                        <p style="font-weight: 600;
                                font-size: 15px;
                                letter-spacing: 1px;
                                margin-top: 5px;
                                padding-top: 2px;
                                padding-bottom: 5px;
                                border: 1px solid transparent;
                                border-radius: 8px; 
                                width: 90px;
                                background: #ffc107;
                                color: #000000;
                                text-align: center;"
                                >Menunggu</p>
                        <div class="action">
                            <button>Edit</button>
                            <button>Hapus</button>
                        </div>
                    </div>
                </div>
                
                <div class="pesanan">
                    <img src="../img/iPhone 14 Pro Max.png" alt="">
                    <div class="deskripsi">
                        <p style="font-weight: 600;">Vivo V25 Pro Max</p>
                        <p>Jumlah : 4</p>
                        <p>Total Harga</p>
                        <p style="font-weight: 600;">Rp 2.000.000</p>
                        <p style="font-weight: 600;
                            font-size: 15px;
                            letter-spacing: 2px;
                            margin-top: 5px;
                            padding-top: 2px;
                            padding-bottom: 5px;
                            border: 1px solid transparent;
                            border-radius: 8px; 
                            width: 60px;
                            background: #dc3545;
                            text-align: center;"
                            >Gagal</p>
                        <div class="action">
                            <button>Edit</button>
                            <button>Hapus</button>
                        </div>
                    </div>
                </div>
                <div class="pesanan">
                    <img src="../img/iPhone 14 Pro Max.png" alt="">
                    <div class="deskripsi">
                        <p style="font-weight: 600;">Vivo V25 Pro Max</p>
                        <p>Jumlah : 4</p>
                        <p>Total Harga</p>
                        <p style="font-weight: 600;">Rp 2.000.000</p>
                        <p style="font-weight: 600;
                            font-size: 15px;
                            letter-spacing: 2px;
                            margin-top: 5px;
                            padding-top: 2px;
                            padding-bottom: 5px;
                            border: 1px solid transparent;
                            border-radius: 8px; 
                            width: 75px;
                            background: #28a745;
                            text-align: center;"
                            >Berhasil</p>
                        <div class="action">
                            <button>Edit</button>
                            <button>Hapus</button>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- <table border="1">
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
            </table> -->
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
