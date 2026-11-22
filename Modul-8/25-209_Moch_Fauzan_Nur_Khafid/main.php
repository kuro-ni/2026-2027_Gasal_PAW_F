<?php
session_start();

if(!isset($_SESSION['idusr'])){
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>

<?php include('navbar.php'); ?>

<div class="konten">
    <h3>Selamat datang, <?php echo $_SESSION['nama']; ?></h3>
</div>

</body>
</html>