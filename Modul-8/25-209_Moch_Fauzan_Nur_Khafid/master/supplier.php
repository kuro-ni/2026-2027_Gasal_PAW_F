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

// tambah supplier
if(isset($_POST['tambah'])){
    $nama   = $_POST['nama'];
    $telp   = $_POST['telp'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn, "INSERT INTO supplier (nama, telp, alamat)
                         VALUES ('$nama', '$telp', '$alamat')");
    header("Location: supplier.php");
    exit;
}

// hapus supplier
if(isset($_POST['hapus'])){
    $idh = (int) $_POST['hapus'];

    $sqlh = mysqli_query($conn, "select count(*) jumlah from barang where supplier_id = $idh");
    $hasilh = mysqli_fetch_assoc($sqlh);

    if($hasilh['jumlah'] > 0){
        $pesan = "Supplier gak bisa dihapus karena masih digunakan oleh data Barang!";
    }else{
        mysqli_query($conn, "delete from supplier where id = $idh");
    }
}

// tampil supplier
$data = mysqli_query($conn, "select * from supplier");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Supplier</title>
</head>
<body>

<?php if($pesan != ''){ ?>
    <script>alert("<?= $pesan ?>");</script>
<?php } ?>

<?php include('../navbar.php'); ?>

<div class="konten">
    <h3>Data Supplier</h3>

    <form method="post">
        <input type="text" name="nama" placeholder="Nama Supplier" required>
        <input type="text" name="telp" placeholder="Telp">
        <input type="text" name="alamat" placeholder="Alamat">
        <button type="submit" name="tambah">Tambah</button>
    </form>
    <br>

    <form method="post">
    <table border="1" cellpadding="6" cellspacing="0">
        <tr>
            <th>ID</th><th>Nama</th><th>Telp</th><th>Alamat</th><th>Aksi</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($data)){ ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['telp']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td>
                <a href="supplier_edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <button type="submit" name="hapus" value="<?php echo $row['id']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</button>
            </td>
        </tr>
        <?php } ?>
    </table>
    </form>
</div>

</body>
</html>