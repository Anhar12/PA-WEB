<?php 
    session_start();
    if ($_SESSION["priv"] != "user" and $_SESSION["priv"] != "admin") {
        header("Location: login.php");
    }

    require 'koneksi.php';
    $id = $_GET['id'];

    $result = mysqli_query($conn, "DELETE FROM pesanan WHERE id = '$id'");

    if ($result) {
        echo"
            <script>
                alert('Data berhasil dihapus');
            </script>
        ";
    }else{  
        echo"
            <script>
                alert('Data gagal dihapus');
            </script>
        ";
    }
    if ($_SESSION["priv"] == "user"){
        header("Location: order_user.php");
    } else {
        header("Location: pesan.php");
    }

?>