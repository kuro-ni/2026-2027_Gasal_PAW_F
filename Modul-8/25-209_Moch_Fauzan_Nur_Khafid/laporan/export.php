<?php
session_start();

if(!isset($_SESSION['idusr'])){
    header("Location: ../login.php");
    exit;
}

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=rekap_penjualan.xls");

include('koneksi.php');

$tmulai = $_GET['mulai'] ?? '';
$tselesai = $_GET['selesai'] ?? '';

$hasil = mysqli_query($conn, "SELECT date(waktu_transaksi) tgl, sum(total) total_harian
from transaksi where waktu_transaksi between '$tmulai' and '$tselesai'
group by tgl
order by tgl asc");

?>

<table border="1">
    <tr>
        <th>No</th>
        <th>Total Pendapatan</th>
        <th>Tanggal Transaksi</th>
    </tr>
    <?php $no = 1; while ($row = mysqli_fetch_assoc($hasil)): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['total_harian']; ?></td>
            <td><?= $row['tgl']; ?></td>
        </tr>
    <?php endwhile; ?>
</table>