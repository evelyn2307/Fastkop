<?php //sahkan pengguna & jika sah, tukar kata laluan pengguna

include('webdb.php');//masukkan rujukan pangkalan data

//terima data 
session_start();//log masuk berjalan
$id = $_SESSION['id'];
$noic = $_POST ['noic'];
$katalaluan = $_POST['katalaluan'];
$katalaluanbaru = $_POST['katalaluanbaru'];

if(!isset($_SESSION['id']))//if sesi log masuk tidak ada, href index (log keluar)
{
header("Location: index.php"); 
} 


//buat sambungan ke pangkalan data & ambil data pengguna berdasarkan idpengguna log masuk, ic & kata laluan "casesensitive"
$penggunasql = mysqli_query($conntodb, "SELECT * FROM tbl_pengguna WHERE idpengguna = '$id' AND ic = '$noic' AND BINARY katalaluan = BINARY '$katalaluan'");

if (mysqli_num_rows($penggunasql) == 1) //jika jumpa
{
//buat sambungan ke pangkalan data & update katalaluan pengguna berdasarkan idpengguna log masuk
mysqli_query($conntodb,"UPDATE tbl_pengguna SET katalaluan = '$katalaluanbaru' WHERE idpengguna = '$id'");

mysqli_close($conntodb);//tutup sambungan pangkalan data
?>
<script language="javascript">
		alert("Kata laluan telah berjaya ditukar");
    	window.location.href = "logoutPRO.php"; 
</script>
<?php
}
else
{
?>
<script language="javascript">
		alert("Maaf. Sila masukkan kod keselamatan dan katalaluan lama yang betul");
    	window.location.href = "penggunaKEMASKINI.php"; 
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