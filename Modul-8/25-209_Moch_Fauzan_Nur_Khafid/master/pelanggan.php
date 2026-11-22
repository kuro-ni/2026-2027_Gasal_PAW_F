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

$pesan = "";

// tambah pelanggan
if(isset($_POST['tambah'])){
    $nama   = $_POST['nama'];
    $jk     = $_POST['jenis_kelamin'];
    $telp   = $_POST['telp'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn, "INSERT INTO pelanggan (nama, jenis_kelamin, telp, alamat)
                         VALUES ('$nama', '$jk', '$telp', '$alamat')");
    header("Location: pelanggan.php");
    exit;
}

// hapus pelanggan
if(isset($_POST['hapus'])){
    $idh = (int) $_POST['hapus'];

    try {
        mysqli_query($conn, "DELETE FROM pelanggan WHERE id = $idh");
    } catch (Exception $e) {
        $pesan = "Pelanggan gak bisa dihapus karena masih digunakan dalam Transaksi!";
    }
}

// tampil pelanggan
$data = mysqli_query($conn, "SELECT * FROM pelanggan");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Pelanggan</title>
</head>
<body>

<?php if($pesan != ''){ ?>
    <script>alert("<?= $pesan ?>");</script>
<?php } ?>

<?php include('../navbar.php'); ?>

<div class="konten">
    <h3>Data Pelanggan</h3>

    <form method="post">
        <input type="text" name="nama" placeholder="Nama" required>
        <select name="jenis_kelamin">
            <option value="L">L</option>
            <option value="P">P</option>
        </select>
        <input type="text" name="telp" placeholder="Telp">
        <input type="text" name="alamat" placeholder="Alamat">
        <button type="submit" name="tambah">Tambah</button>
    </form>
    <br>

    <form method="post">
    <table border="1" cellpadding="6" cellspacing="0">
        <tr>
            <th>ID</th><th>Nama</th><th>Jenis Kelamin</th><th>Telp</th><th>Alamat</th><th>Aksi</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($data)){ ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['jenis_kelamin']; ?></td>
            <td><?php echo $row['telp']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td>
                <a href="pelanggan_edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <button type="submit" name="hapus" value="<?php echo $row['id']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</button>
            </td>
        </tr>
        <?php } ?>
    </table>
    </form>
</div>

</body>
</html>