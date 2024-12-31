<?php //keluarkan produk dari bakul

include('webdb.php');//masukkan rujukan pangkalan data

//terima data 
session_start();//log masuk berjalan
$idpengguna = $_SESSION['id'];
$iditem = $_GET['recordID'];

if(!isset($_SESSION['id']))//if sesi log masuk tidak ada, href index (log keluar)
{
header("Location: index.php"); 
} 


//buat sambungan ke pangkalan data & padam data dari bakul berdasarkan idpengguna log masuk $ iditem
mysqli_query($conntodb,"DELETE FROM tbl_bakul WHERE idpengguna = '$idpengguna' and iditem= '$iditem'");

mysqli_close($conntodb); //tutup sambungan pangkalan data
?>
<script language="javascript">
		alert("Produk telah dikeluarkan dari bakul anda");
    	window.location.href = "bakul.php"; 
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