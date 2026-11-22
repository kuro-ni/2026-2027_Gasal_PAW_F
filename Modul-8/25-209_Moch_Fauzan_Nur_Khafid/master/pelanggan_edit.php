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
    $jk     = $_POST['jenis_kelamin'];
    $telp   = $_POST['telp'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn, "UPDATE pelanggan SET nama='$nama', jenis_kelamin='$jk',
                         telp='$telp', alamat='$alamat' WHERE id=$id");
    header("Location: pelanggan.php");
    exit;
}

$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pelanggan WHERE id=$id"));
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Pelanggan</title>
</head>
<body>

<?php include('../navbar.php'); ?>

<div class="konten">
    <h3>Edit Pelanggan</h3>
    <form method="post">
        <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>
        <select name="jenis_kelamin">
            <option value="L" <?php if($row['jenis_kelamin'] == 'L') echo 'selected'; ?>>L</option>
            <option value="P" <?php if($row['jenis_kelamin'] == 'P') echo 'selected'; ?>>P</option>
        </select><br>
        <input type="text" name="telp" value="<?php echo $row['telp']; ?>"><br>
        <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>"><br><br>
        <button type="submit" name="simpan">Simpan</button>
        <a href="pelanggan.php">Batal</a>
    </form>
</div>

</body>
</html>