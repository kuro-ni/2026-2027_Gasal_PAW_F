<style>
    body { margin: 0; font-family: Arial, sans-serif; }
    .nav { background: #1a3c7a; padding: 12px 16px; }
    .nav a, .nav summary { color: #fff; text-decoration: none; margin-right: 16px; }
    .nav details { display: inline-block; position: relative; margin-right: 16px; }
    .nav summary { cursor: pointer; list-style: none; margin: 0; }
    .nav .isi { position: absolute; background: #1a3c7a; padding: 8px 12px; min-width: 140px; z-index: 10; }
    .nav .isi a, .nav .isi div { display: block; margin: 6px 0; color: #fff; }
    .kanan { float: right; margin-right: 0 !important; }
    .kanan .isi { right: 0; }
    .konten { padding: 20px; }
</style>

<div class="nav">
    <details class="kanan">
        <summary><?php echo $_SESSION['nama']; ?> ▾</summary>
        <div class="isi">
            <div>Level: <?php echo $_SESSION['level']; ?></div>
            <a href="/lastprak/logout.php">Logout</a>
        </div>
    </details>

    <a href="/lastprak/main.php"><b>Sistem Penjualan</b></a>
    <a href="/lastprak/main.php">Home</a>

    <?php if($_SESSION['level'] == 1){ ?>
    <details>
        <summary>Data Master ▾</summary>
        <div class="isi">
            <a href="/lastprak/master/barang.php">Data Barang</a>
            <a href="/lastprak/master/supplier.php">Data Supplier</a>
            <a href="/lastprak/master/pelanggan.php">Data Pelanggan</a>
            <a href="/lastprak/master/user.php">Data User</a>
        </div>
    </details>
    <?php } ?>

    <a href="/lastprak/transaksi/transaksi.php">Transaksi</a>
    <a href="/lastprak/laporan/laporan.php">Laporan</a>
</div>