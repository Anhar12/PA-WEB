<?php 
    session_start();
    if ($_SESSION["priv"] != "user" and $_SESSION["priv"] != "admin") {
        header("Location: ../login.php");
    }

    require '../koneksi.php';
    $id = $_GET['id'];

    $result = mysqli_query($conn, "DELETE FROM pesanan WHERE id_pesanan = '$id'");

    if ($result) {
        echo"
            <script>
                alert('Data berhasil dihapus');
                document.location.href = '../pengguna/admin/kelola-pesanan.php';
            </script>
        ";
    }else{  
        echo"
            <script>
                alert('Data gagal dihapus');
                document.location.href = '../pengguna/admin/kelola-pesanan.php';
            </script>
        ";
    }
?>
