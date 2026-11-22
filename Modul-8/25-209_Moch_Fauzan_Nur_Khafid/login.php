<?php
session_start();

if(isset($_SESSION['idusr'])){
    header("Location: main.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f3f5f7; }
        .kotak { width: 300px; margin: 100px auto; background: #fff; padding: 24px; border: 1px solid #ccc; }
        .judul { margin-top: 0; text-align: center; color: #1a3c7a; }
        .kotak label { font-size: 14px; }
        .kotak input { width: 100%; padding: 8px; margin: 4px 0 14px; box-sizing: border-box; }
        .tombol { width: 100%; padding: 9px; background: #1a3c7a; color: #fff; border: 0; cursor: pointer; }
        .tombol:hover { background: #12306a; }
        .pesan { background: #f8d7da; color: #842029; padding: 8px; margin-bottom: 14px; font-size: 14px; }
    </style>
</head>
<body>
    <div class="kotak">
        <h3 class="judul">Login Sistem Penjualan</h3>

        <?php if(isset($_GET['error'])){ ?>
        <div class="pesan">Username atau password salah.</div>
        <?php } ?>

        <form action="proseslog.php" method="post">
            <label>Username</label>
            <input type="text" name="usm">

            <label>Password</label>
            <input type="password" name="pass">

            <button type="submit" name="log" class="tombol">LOGIN</button>
        </form>
    </div>
</body>
</html>