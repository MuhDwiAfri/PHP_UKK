<?php
include_once "./config.php";

if (isset($_POST['submit'])) {
    $tgl_laporan = $_POST['tgl_laporan'];
    $info = $_POST['info'];

    $query = "INSERT INTO laporan VALUES('', '$info', '$tgl_laporan')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Success insert data')</script>";
    } else {
        echo "<script>alert('Success insert data')</script>";
    }
}


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="input-info">Tanggal Kegiatan : </label>
                            <input type="date" class="form-control" id="input-nama" name="tgl_laporan" required>
                        </div>
                        <div class="form-group">
                            <label for="input-tgl_laporan">Informasi Kegiatan : </label>
                            <textarea type="text" class="form-control" id="input-email" name="info" required></textarea>
                        </div>
                        <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <table>
        <td>
            <tr>
                info
            </tr>
            <tr>
                tanggal
            </tr>
        </td>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>