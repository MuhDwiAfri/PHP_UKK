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
    $host = 'localhost'; // Nama hostnya
    $username = 'root'; // Username
    $password = ''; // Password (Isi jika menggunakan password)
    $database = 'ukk';

    $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $database, $username, $password);

    $tgl_awal = @$_GET['tgl_awal'];
    $tgl_akhir = @$_GET['tgl_akhir'];

    if (empty($tgl_awal) or empty($tgl_akhir)) {
        $query = "SELECT * FROM kas_masuk";

        $label = "Semua Data Pemasukan";
    } else { // Jika terisi
        // Buat query untuk menampilkan data transaksi sesuai periode tanggal
        $query = "SELECT * FROM kas_masuk WHERE (tanggal_masuk BETWEEN '" . $tgl_awal . "' AND '" . $tgl_akhir . "')";

        $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
        $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
        $label = 'Periode Tanggal ' . $tgl_awal . ' s/d ' . $tgl_akhir;
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
                $tgl = date('d-m-Y', strtotime($data['tanggal_masuk'])); // Ubah format tanggal jadi dd-mm-yyyy

                echo "<tr>";
                echo "<td>" . $data['id_masuk'] . "</td>";
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