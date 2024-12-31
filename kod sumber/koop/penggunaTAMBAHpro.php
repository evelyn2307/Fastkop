<?php //periksa format ic & masukkan pengguna baru

include('webdb.php');//masukkan rujukan pangkalan data

//terima data 
$idpengguna = $_POST['idpengguna'];
$nama = $_POST['nama'];
$ic = $_POST['ic'];
$katalaluan = $_POST['katalaluan'];
$nilai = $_POST['nilai'];
$jenispengguna = $_POST['jenispengguna'];


$panjangic = strlen($ic); 
if (($panjangic == 12) && (is_numeric($ic))) //periksa no ic ialah nombor & cukup tak 12 digit
{
//buat sambungan ke pangkalan data & ambil idpengguna berdasarkan idpengguna log masuk
$checkpmsql = mysqli_query($conntodb,"SELECT idpengguna FROM tbl_pengguna WHERE idpengguna = '$idpengguna'");

if (mysqli_num_rows($checkpmsql) == 1) //jika ada id yg sama
{
mysqli_close($conntodb); //tutup sambungan pangkalan data
?>
<script language="javascript">
		alert("Maaf. ID DELIMa KPM ini telah digunakan");
    	window.location.href = "penggunaTAMBAH.php";
</script>
<?php
}


//buat sambungan ke pangkalan data & masukkan data pengguna baru
mysqli_query($conntodb,"INSERT INTO tbl_pengguna (idpengguna, nama, ic, katalaluan, nilai, jenispengguna) VALUES ('$idpengguna', '$nama', '$ic', '$katalaluan', '$nilai', '$jenispengguna')");

mysqli_close($conntodb); //tutup sambungan pangkalan data
?>
<script language="javascript">
		alert("Pengguna telah berjaya didaftarkan");
    	window.location.href = "login.php";
</script>
<?php
}
else
{
?>
<script language="javascript">
    	alert("Maaf. Masukkan no kad pengenalan anda dengan betul");
    	top.location.href = "penggunaTAMBAH.php";
</script>
<?php
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1" name="viewport" /><!--viewport phone-->
<title>Untitled Document</title>
</head>
<body>
</body>
</html>