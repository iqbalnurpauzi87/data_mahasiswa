<?php
include 'koneksi.php';
$data_edit = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim = '".$_GET['nim']."' ");
$result = mysqli_fetch_array($data_edit);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT data MAHASISWA</title>
</head>
<body>
    <h2>EDIT data MAHASISWA</h2>
    <a href="index.php" style="padding: 0.4% 0.8%; background-color:#090; color:#fff; border-radius:2px; text-decoration:none; ">Home</a>
<br><br>
    <form action="" method="POST">
    <table>
        <tr>
            <td>NIM</td>
            <td>:</td>
            <td><input type="text" name="nim" value="<?php echo $result['nim'] ?>"   > </td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama" required value="<?php echo $result['nama_lengkap'] ?>"></td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td>:</td>
            <td><input type="text" name="telepon" required value="<?php echo $result['telepon'] ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><input type="email" name="email" required value="<?php echo $result['email'] ?>"></td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td>:</td>
            <td>
            <select name="jurusan">
                <option value="<?php echo $result['jurusan'] ?>"><?php echo $result['jurusan'] ?></option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Pend ELKA">Pend ELKA</option>
            </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><input type="submit" name="edit" value="Simpan Perubahan"></td>
        </tr>
    </table>
</form>
<?php
if(isset($_POST['edit'])){
        $update = mysqli_query($conn, "UPDATE mahasiswa SET nama_lengkap = '".$_POST['nama']."',
        telepon = '".$_POST['telepon']."', email = '".$_POST['email']."', jurusan = '".$_POST['jurusan']."'
        WHERE nim = '".$_GET['nim']."'");
        if($update){
            echo 'berhasil edit';

        }   else {
            echo 'gagal edit';
        }  
}
?>

</body>
</html>