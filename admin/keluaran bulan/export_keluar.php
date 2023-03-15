<?php ob_start(); ?>
<html>

<head>
    <title>Cetak PDF</title>
    <style>
        .table {
            border-collapse: collapse;
            table-layout: fixed;
            width: 630px;
        }

        .table th {
            padding: 5px;
        }

        .table td {
            word-wrap: break-word;
            width: 20%;
            padding: 5px;
        }
    </style>
</head>

<body>
    <?php
    // Load file koneksi.php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'ukk';

    $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $database, $username, $password);

    $bulan = $_GET['bulan'] ?? null;
    $tahun = $_GET['tahun'] ?? null;

    if (!$bulan || !$tahun) {
        $query = "SELECT * FROM kas_keluar";

        $label = "Semua Data Pemasukan";
    } else {
        $query = "SELECT * FROM kas_keluar WHERE MONTH(tanggal_keluar) = $bulan AND YEAR(tanggal_keluar ) = $tahun";
        $label = "Data yang ada di bulan " . date('m Y', strtotime("01-$bulan-$tahun"));
    }
    ?>
    <h4 style="margin-bottom: 5px;">Data Transaksi</h4>
    <?php echo $label ?>

    <table class="table" border="1" width="100%" style="margin-top: 10px;">
        <tr>
            <th>ID</th>
            <th>Sumber</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>keterangan</th>
        </tr>

        <?php
        $sql = $pdo->prepare($query); // Eksekusi/Jalankan query dari variabel $query
        $sql->execute(); // Ambil jumlah data dari hasil eksekusi $sql
        $row = $sql->rowCount(); // Ambil jumlah data dari hasil eksekusi $sql

        if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
            while ($data = $sql->fetch()) { // Ambil semua data dari hasil eksekusi $sql
                $tgl = date('d-m-Y', strtotime($data['tanggal_keluar'])); // Ubah format tanggal jadi dd-mm-yyyy

                echo "<tr>";
                echo "<td>" . $data['id_keluar'] . "</td>";
                echo "<td>" . $data['sumber'] . "</td>";
                echo "<td>" . $tgl . "</td>";
                echo "<td>" . $data['jumlah'] . "</td>";
                echo "<td>" . $data['keterangan'] . "</td>";
                echo "</tr>";
            }
        } else { // Jika data tidak ada
            echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
        }
        ?>
    </table>
</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();

require 'libraries/html2pdf/autoload.php';

$pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
$pdf->WriteHTML($html);
$pdf->Output('Data Transaksi.pdf', 'D');
?>