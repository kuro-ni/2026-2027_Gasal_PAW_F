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
    $nama   = $_POST['nama'];
    $telp   = $_POST['telp'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn, "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id=$id");
    header("Location: supplier.php");
    exit;
}

$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM supplier WHERE id=$id"));
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Supplier</title>
</head>
<body>

<?php include('../navbar.php'); ?>

<div class="konten">
    <h3>Edit Supplier</h3>
    <form method="post">
        <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>
        <input type="text" name="telp" value="<?php echo $row['telp']; ?>"><br>
        <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>"><br><br>
        <button type="submit" name="simpan">Simpan</button>
        <a href="supplier.php">Batal</a>
    </form>
</div>

</body>
</html>