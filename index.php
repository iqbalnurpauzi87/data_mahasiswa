<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman data mahasiswa</title>
</head>
<body>
    <h2>Data Mahasiswa ELKA UNJ 2018</h2>
    <a href="form_input.php" style="padding: 0.4% 0.8%; background-color:#090; color:#fff; border-radius:2px; text-decoration:none; ">Tambah data</a>
<br>
<br>
    <table border="1" cellspacing="0" width="50%";>
    <tr style= "text-align:center;font-weight:bold; background-color:#eee;"> 
        <td>No</td>
        <td>NIM</td>
        <td>Nama mahasiswa</td>
        <td>Email</td>
        <td>No Telepon</td>
        <td>Jurusan</td>
        <td>Opsi</td>
    </tr>

<?php
include 'koneksi.php';
$no = 1;
$select = mysqli_query($conn, "SELECT * FROM mahasiswa");
if(mysqli_num_rows($select) > 0){
while($hasil = mysqli_fetch_array($select)){
?>
 
 <tr style= "text-align:center;"> 
        <td><?php echo $no++ ?></td>
        <td><?php echo $hasil['nim'] ?></td>
        <td><?php echo $hasil['nama_lengkap'] ?></td>
        <td><?php echo $hasil['email'] ?></td>
        <td><?php echo $hasil['telepon'] ?></td>
        <td><?php echo $hasil['jurusan'] ?></td>
        <td>
            <a href="form-edit.php">EDIT</a> |
            <a href="delete.php?nim=<?php echo $hasil['nim'] ?>">Hapus</a>
        </td>
    </tr>
    <?php }} else{ ?>
        <tr>
            <td colspan="7" align="center">Data Kosong</td>
        </tr>
<?php    } ?>
    </table>
</body>
</html>