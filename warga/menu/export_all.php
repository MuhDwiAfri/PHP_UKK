<?php
include '../config.php';
header("Content-type: application/vnd-ms-word");
header("Content-Disposition: attachment;  filename=Data Semua Keuangan.doc");

$result_pemasukan = mysqli_query($conn, "SELECT SUM(jumlah) AS 'total' FROM kas_masuk");
$pemasukan = mysqli_fetch_assoc($result_pemasukan);

$result_pengeluaran = mysqli_query($conn, "SELECT SUM(jumlah) AS 'total' FROM kas_keluar");
$pengeluaran = mysqli_fetch_assoc($result_pengeluaran);
?>
<h1>Data Semua Keuangan</h1>

<h2>Sisa Total : <?= "Rp. " . number_format($pemasukan['total'] - $pengeluaran['total']); ?></h2>

<h3>Dana Masuk</h3>
<table border="1" cellpadding="5">
    <tr>
        <th>ID Pemasukan</th>
        <th> Sumber</th>
        <th>Tgl Pemasukan</th>
        <th>keterangan</th>
        <th>Jumlah</th>
    </tr>
    <?php
    include "../config.php";
    $query = mysqli_query($conn, "SELECT * FROM kas_masuk");
    while ($data = mysqli_fetch_array($query)) {
        echo "<tr>";
        echo "<td>" . $data['id_masuk'] . "</td>";
        echo "<td>" . $data['sumber'] . "</td>";
        echo "<td align='center'>" . $data['tanggal_masuk'] . "</td>";
        echo "<td>" . $data['keterangan'] . "</td>";
        echo "<td> Rp. " . number_format($data['jumlah']) . "</td>";
        echo "</tr>";
    }
    ?>
</table>
<h4>Total Dana Masuk :
    <?php
    $jumlah = mysqli_query($conn, "SELECT SUM(jumlah) FROM kas_masuk");
    while ($seluruh = mysqli_fetch_array($jumlah)) {
        echo "<tr>";
        echo "<td>Rp. " . $seluruh['SUM(jumlah)'] . "</td>";
        echo "</tr>";
    }
    ?>
</h4>
<br>
<h3>Dana Keluar</h3>
<table border="1" cellpadding="5">
    <tr>
        <th>ID pengeluaran</th>
        <th>Sumber</th>
        <th>Tgl pengeluaran</th>
        <th>keterangan</th>
        <th>Jumlah</th>
    </tr>
    <?php
    include "../config.php";
    $query = mysqli_query($conn, "SELECT * FROM kas_keluar");
    while ($data = mysqli_fetch_array($query)) {
        echo "<tr>";
        echo "<td>" . $data['id_keluar'] . "</td>";
        echo "<td>" . $data['sumber'] . "</td>";
        echo "<td align='center'>" . $data['tanggal_keluar'] . "</td>";
        echo "<td>" . $data['keterangan'] . "</td>";
        echo "<td> Rp. " . number_format($data['jumlah']) . "</td>";
        echo "</tr>";
    }
    ?>
</table>
<h3>Total Dana Keluar :

    <?php
    $jumlah = mysqli_query($conn, "SELECT SUM(jumlah) FROM kas_keluar");
    while ($seluruh = mysqli_fetch_array($jumlah)) {
        echo "<tr>";
        echo "<td>Rp. " . $seluruh['SUM(jumlah)'] . "</td>";
        echo "</tr>";
    }
    ?>
</h3>