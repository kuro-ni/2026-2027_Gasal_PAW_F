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

if(isset($_POST['simpan'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama     = $_POST['nama'];
    $alamat   = $_POST['alamat'];
    $hp       = $_POST['hp'];
    $level    = $_POST['level'];

    mysqli_query($conn, "UPDATE user SET username='$username', password='$password', nama='$nama',
                         alamat='$alamat', hp='$hp', level='$level' WHERE id_user=$id");
    header("Location: user.php");
    exit;
}

$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE id_user=$id"));
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

<?php include('../navbar.php'); ?>

<div class="konten">
    <h3>Edit User</h3>
    <form method="post">
        <input type="text" name="username" value="<?php echo $row['username']; ?>" required><br>
        <input type="text" name="password" value="<?php echo $row['password']; ?>" required><br>
        <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>
        <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>"><br>
        <input type="text" name="hp" value="<?php echo $row['hp']; ?>"><br>
        <select name="level">
            <option value="1" <?php if($row['level'] == 1) echo 'selected'; ?>>1 (Owner)</option>
            <option value="2" <?php if($row['level'] == 2) echo 'selected'; ?>>2 (Kasir)</option>
        </select><br><br>
        <button type="submit" name="simpan">Simpan</button>
        <a href="user.php">Batal</a>
    </form>
</div>

</body>
</html>