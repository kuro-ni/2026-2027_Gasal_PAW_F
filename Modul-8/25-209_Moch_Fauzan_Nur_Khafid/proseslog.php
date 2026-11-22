<?php
session_start();

include('koneksi.php');

if(isset($_POST['log'])){
    $usernm = $_POST['usm'];
    $pw = $_POST['pass'];

    $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$usernm' AND password='$pw'");
    $hasil = mysqli_num_rows($query);

    
    if($hasil > 0){
        $data = mysqli_fetch_assoc($query);
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['idusr'] = $data['id_user'];
        $_SESSION['level'] = $data['level'];
        header("Location: main.php");
        exit;
    }else{
        header("Location: login.php?error=1");
        exit;
    }
}

?>