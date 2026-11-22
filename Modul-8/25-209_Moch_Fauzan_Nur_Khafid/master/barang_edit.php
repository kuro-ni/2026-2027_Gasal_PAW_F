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
$pesan = "";

if(isset($_POST['simpan'])){
    $kode     = $_POST['kode_barang'];
    $nama     = $_POST['nama_barang'];
    $harga    = (int) $_POST['harga'];
    $stok     = (int) $_POST['stok'];
    $supplier = (int) $_POST['supplier_id'];

    try {
        mysqli_query($conn, "UPDATE barang SET kode_barang='$kode', nama_barang='$nama',
                             harga=$harga, stok=$stok, supplier_id=$supplier WHERE id=$id");
        header("Location: barang.php");
        exit;
    } catch (Exception $e) {
        $pesan = "Gagal menyimpan: supplier tidak ditemukan!";
    }
}

$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM barang WHERE id=$id"));
$supplier_list = mysqli_query($conn, "select * from supplier");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
</head>
<body>

<?php if($pesan != ''){ ?>
    <script>alert("<?= $pesan ?>");</script>
<?php } ?>

<?php include('../navbar.php'); ?>

<div class="konten">
    <h3>Edit Barang</h3>
    <form method="post">
        <input type="text" name="kode_barang" value="<?php echo $row['kode_barang']; ?>" required><br>
        <input type="text" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" required><br>
        <input type="number" name="harga" value="<?php echo $row['harga']; ?>" required><br>
        <input type="number" name="stok" value="<?php echo $row['stok']; ?>" required><br>
        <select name="supplier_id" required>
            <?php while($s = mysqli_fetch_assoc($supplier_list)){ ?>
                <option value="<?php echo $s['id']; ?>" <?php if($s['id'] == $row['supplier_id']) echo 'selected'; ?>>
                    <?php echo $s['nama']; ?>
                </option>
            <?php } ?>
        </select><br><br>
        <button type="submit" name="simpan">Simpan</button>
        <a href="barang.php">Batal</a>
    </form>
</div>

</body>
</html>