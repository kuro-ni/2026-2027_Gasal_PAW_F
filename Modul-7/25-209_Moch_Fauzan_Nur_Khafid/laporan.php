<?php

include('koneksi.php');

$labels = [];
$data_total = [];
$rekap = [];
$total_pendapatan = 0;
$total_pelanggan = 0;
$tmulai = $_GET['mulai'] ?? '';
$tselesai = $_GET['selesai'] ?? '';


if (!empty($tmulai) && !empty($tselesai)) {
    $hasil = mysqli_query($conn, "SELECT date(waktu_transaksi) tgl, sum(total) total_harian
    from transaksi where waktu_transaksi between '$tmulai' and '$tselesai'
    group by tgl
    order by tgl asc");

    while($row = mysqli_fetch_assoc($hasil)){
        $labels[] = $row['tgl'];
        $data_total[] = $row['total_harian'];
        $rekap[] = $row;
        $total_pendapatan += $row['total_harian'];
    }

    $query = mysqli_query($conn, "SELECT count(distinct pelanggan_id) jumlah 
    from transaksi where waktu_transaksi between '$tmulai' and '$tselesai'");
    $hasilp = mysqli_fetch_assoc($query);
    $total_pelanggan = $hasilp['jumlah'];


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <style>
        @media print { .no-print { display: none !important; } }
        .grafik{
            width: 500px;
        }

    </style>
</head>
<body>
    <div class="no-print">
        <form method="get">
            <label>Tanggal mulai</label>
            <input type="date" name="mulai" value="<?= $_GET['mulai'] ?? '' ?>">

            <label>Tanggal selesai</label>
            <input type="date" name="selesai" value="<?= $_GET['selesai'] ?? '' ?>">

            <button type="submit">Tampilkan</button>
        </form>
        <button onclick="window.print()">Cetak</button>
        <a href="export.php?mulai=<?= $tmulai; ?>&selesai=<?= $tselesai; ?>"><button>Excel</button></a>
    </div>

    <?php if (!empty($labels)): ?>

        <h2>Grafik Penjualan</h2>
        <div class="grafik">
            <canvas id="myChart"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?= json_encode($labels); ?>,
                    datasets: [{
                        label: 'Total Pendapatan',
                        data: <?= json_encode($data_total); ?>,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

        <h2>Rekapitulasi</h2>
        <table border="1px">
            <tr>
                <th>No</th>
                <th>Total Pendapatan</th>
                <th>Tanggal Transaksi</th>
            </tr>
            <?php $no = 1; foreach ($rekap as $row): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td>Rp. <?= number_format($row['total_harian'], 0, ',', '.'); ?></td>
                    <td><?= $row['tgl']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <div>
            <div class="card">
                <b>Jumlah Pelanggan Unik</b><br>
                <?= $total_pelanggan; ?> Orang
            </div>
            <div class="card">
                <b>Total Pendapatan Keseluruhan</b><br>
                Rp. <?= number_format($total_pendapatan, 0, ',', '.'); ?>
            </div>
        </div>

    <?php endif; ?>
</body>
</html>