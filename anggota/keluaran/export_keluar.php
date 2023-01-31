<?php
header("Content-type: application/vnd-ms-word");
header("Content-Disposition: attachment; filename=Data Pengeluaran.doc");
?>
<h3>Data Pengeluaran</h3>
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
<br>