<?php //fastkop update "pesanan siap" selepas item siap dibungkus

include('webdb.php');//masukkan rujukan pangkalan data

//terima data 
session_start();//log masuk berjalan
$idpengguna = $_SESSION['id'];
$idresit = $_GET['idresit'];

if(!isset($_SESSION['id']))//jika sesi log masuk tidak ada, href index (log keluar)
{
header("Location: index.php"); 
} 

//buat sambungan ke pangkalan data & update statusfastkop resit berdasarkan idresit
mysqli_query($conntodb,"UPDATE tbl_resit SET statusfastkop = 'Pesanan siap' WHERE idresit = '$idresit'");

mysqli_close($conntodb);//tutup sambungan pangkalan data
?>


<script language="javascript">
		alert("Pesanan telah disediakan");
    	window.location.href = "adminBELIANsenarai.php"; 
</script>



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