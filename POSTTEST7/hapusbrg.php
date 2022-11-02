<?php 
    session_start();
    if ($_SESSION["priv"] != "admin") {
        header("Location: login.php");
    }

    require 'koneksi.php';

    $nama = $_GET['nama'];

    $result = mysqli_query($conn, "DELETE FROM barang WHERE nama = '$nama'");

    if ($result) {
        echo"
            <script>
                alert('Data berhasil dihapus');
                document.location.href = 'barang.php';
            </script>
        ";
    }else{  
        echo"
            <script>
                alert('Data gagal dihapus');
                document.location.href = 'barang.php';
            </script>
        ";
    }

?>