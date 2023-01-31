<?php 
include '../config.php';
?>
 
<h3>Form Pencarian</h3>
 
<form action="cari.php" method="get">
 <label>Cari :</label>
 <input type="text" name="cari">
 <input type="submit" value="Cari">
</form>
 
<?php 
if(isset($_GET['cari'])){
 $cari = $_GET['cari'];
 echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>
 
<table border="1">
 <?php 
 if(isset($_GET['cari'])){
  $cari = $_GET['cari'];
  $data = mysqli_query($conn,"SELECT * from warga where nama like '%".$cari."%'");    
 }else{
  $data = mysqli_query($conn,"SELECT * from warga");  
 }
 $no = 1;
 while($d = mysqli_fetch_array($data)){
 ?>
 <tr>
  <td><?php echo $no++; ?></td>
  <td><?php echo $d['nama']; ?></td>
  <td><?php echo $d['ktp']; ?></td>
  <td><?php echo $d['telp']; ?></td>
  <td><?php echo $d['email']; ?></td>
 </tr>
 <?php } ?>
</table>

<!-------------------------------------------------------------------------------------------------------------------------------->
<!-- Bagian Index -->
<?php
        $sqlGet = "SELECT * FROM warga";
        $query = mysqli_query($conn, $sqlGet);
        while($data = mysqli_fetch_array($query)){
            echo"
            <tbody>
                <tr>
                    <td>$data[id]</td>
                    <td><img src='images/".$data['foto']."' width='100' height='100'></td>
                    <td>$data[nama]</td>
                    <td>$data[ktp]</td>
                    <td>$data[email]</td>
                    <td>$data[telp]</td>
                    <td>
                        <div class='row'>
                            <div class='col d-flex justify-content-center'>
                                <a href='' class='btn btn-sm btn-success'>Detail</a>
                            </div>|
                            <div class='col d-flex justify-content-center'>
                                <a href='' class='btn btn-sm btn-warning'>Update</a>
                            </div>|
                            <div class='col d-flex justify-content-center'>
                                <a href='delete.php?id=$data[id]' class='btn btn-sm btn-danger'>Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
            ";
        }
        ?>
<!-- ----------------------------------------------------------------------------------------- -->