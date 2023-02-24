<!DOCTYPE html>
<html>

<head>
    <title>Laporan Keuangan</title>
</head>

<body>
    <h1>Laporan Keuangan</h1>
    <form method="post" action="modal.php">
        <label for="tanggal_awal">Tanggal Awal:</label>
        <input type="date" name="tanggal_awal" id="tanggal_awal">

        <label for="tanggal_akhir">Tanggal Akhir:</label>
        <input type="date" name="tanggal_akhir" id="tanggal_akhir">

        <input type="submit" name="submit" value="Tampilkan">
    </form>

    <?php
    // Cek apakah tombol submit telah ditekan
    if (isset($_POST['submit'])) {
        // Ambil nilai tanggal awal dan akhir dari input form atau variabel lainnya
        $tanggal_awal = $_POST['tanggal_awal'];
        $tanggal_akhir = $_POST['tanggal_akhir'];

        // Buat koneksi ke database Anda
        $koneksi = mysqli_connect('localhost', 'root', '', 'dblatihan');

        // Validasi input pengguna
        if (!$koneksi) {
            die('Koneksi gagal: ' . mysqli_connect_error());
        }

        // Buat format tanggal keuangan dari tanggal awal dan akhir
        $format_tanggal_awal = date('Y-m-d', strtotime($tanggal_awal));
        $format_tanggal_akhir = date('Y-m-d', strtotime($tanggal_akhir));

        // Buat query SQL untuk mengambil data dari tabel transaksi pada range tanggal yang telah diformat
        $query = "SELECT *
                  FROM tabel_transaksi
                  WHERE tanggal BETWEEN '$format_tanggal_awal' AND '$format_tanggal_akhir'";

        // Jalankan query dan simpan hasilnya dalam variabel
        $result = mysqli_query($koneksi, $query);

        // Tampilkan hasil query dan hitung total uang
        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr><th>Tanggal</th><th>Keterangan</th><th>Jumlah</th></tr>";

            $total_uang = 0;

            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . date('d M Y', strtotime($row['tanggal'])) . "</td>";
                echo "<td>" . $row['keterangan'] . "</td>";
                echo "<td>" . $row['jumlah'] . "</td>";
                echo "</tr>";

                $total_uang += $row['jumlah'];
            }

            echo "<tr>";
            echo "<td colspan='2' style='text-align: right;'>Total Uang:</td>";
            echo "<td>" . $total_uang . "</td>";
            echo "</tr>";

            echo "</table>";
        } else {
            echo "Tidak ada data yang ditemukan.";
        }

        // Tutup koneksi ke database Anda
        mysqli_close($koneksi);
    }
    ?>
</body>

</html>