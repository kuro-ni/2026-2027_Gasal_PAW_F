<?php
session_start();

if(!isset($_SESSION['idusr'])){
    header("Location: ../login.php");
    exit;
}
if($_SESSION['level'] != 1){
    header("Location: ../main.php");
    exit;
}

include('../koneksi.php');

$id = (int) $_GET['id'];

if($id != $_SESSION['idusr']){
    mysqli_query($conn, "DELETE FROM user WHERE id_user=$id");
}

header("Location: user.php");
exit;