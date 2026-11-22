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

if(isset($_POST['tambah'])){
    $kode     = $_POST['kode_barang'];
    $nama     = $_POST['nama_barang'];
    $harga    = (int) $_POST['harga'];
    $stok     = (int) $_POST['stok'];
    $supplier = (int) $_POST['supplier_id'];

    try {
        mysqli_query($conn, "INSERT INTO barang (kode_barang, nama_barang, harga, stok, supplier_id)
                             VALUES ('$kode', '$nama', $harga, $stok, $supplier)");
        header("Location: barang.php");
        exit;
    } catch (Exception $e) {
        $pesan = "Gagal menambah barang: supplier tidak ditemukan!";
    }
}

if(isset($_POST['hapus'])){
    $idh = (int) $_POST['hapus'];

    $sqlh = mysqli_query($conn, "select count(*) jumlah from transaksi_detail where barang_id = $idh");
    $hasilh = mysqli_fetch_assoc($sqlh);

    if($hasilh['jumlah'] > 0){
        $pesan = "Barang gak bisa di hapus karena masih digunakan dalam Transaksi!";
    }else{
        mysqli_query($conn, "delete from barang where id = $idh");
    }
}

$data = mysqli_query($conn, "select * from barang");

$supplier_list = mysqli_query($conn, "select * from supplier");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
</head>
<body>

<?php if($pesan != ''){ ?>
    <script>alert("<?= $pesan ?>");</script>
<?php } ?>

<?php include('../navbar.php'); ?>

<div class="konten">
    <h3>Data Barang</h3>

    <form method="post">
        <input type="text" name="kode_barang" placeholder="Kode Barang" required>
        <input type="text" name="nama_barang" placeholder="Nama Barang" required>
        <input type="number" name="harga" placeholder="Harga" required>
        <input type="number" name="stok" placeholder="Stok" required>
        <select name="supplier_id" required>
            <option value="">-- Pilih Supplier --</option>
            <?php while($s = mysqli_fetch_assoc($supplier_list)){ ?>
                <option value="<?php echo $s['id']; ?>"><?php echo $s['nama']; ?></option>
            <?php } ?>
        </select>
        <button type="submit" name="tambah">Tambah</button>
    </form>
    <br>

    <form method="post">
    <table border="1" cellpadding="6" cellspacing="0">
        <tr>
            <th>ID</th><th>Kode Barang</th><th>Nama Barang</th><th>Harga</th><th>Stok</th><th>ID Supplier</th><th>Aksi</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($data)){ ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['kode_barang']; ?></td>
            <td><?php echo $row['nama_barang']; ?></td>
            <td><?php echo $row['harga']; ?></td>
            <td><?php echo $row['stok']; ?></td>
            <td><?php echo $row['supplier_id']; ?></td>
            <td>
                <a href="barang_edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <button type="submit" name="hapus" value="<?php echo $row['id']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</button>
            </td>
        </tr>
        <?php } ?>
    </table>
    </form>
</div>

</body>
</html>