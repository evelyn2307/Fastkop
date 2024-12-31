<?php //kemaskini item, jika stok = 0, kosongkan bakul

include('webdb.php');//masukkan rujukan pangkalan data

//terima data 
session_start();//log masuk berjalan
$id = $_SESSION['id'];
$iditem = $_POST['iditem'];
$hargaitem = $_POST['hargaitem'];
$stok = $_POST['stok'];

if(!isset($_SESSION['id']))//jika sesi log masuk tidak ada, href index (log keluar)
{
header("Location: index.php"); 
} 


//buat sambungan ke pangkalan data & update hargaitem & stok item berdasarkan iditem
mysqli_query($conntodb,"UPDATE tbl_item SET hargaitem = '$hargaitem', stok = '$stok' WHERE iditem = '$iditem'");

//delete item di bakul pelanggan jika tiada stok
if($stok == 0)
{ 
//buat sambungan ke pangkalan data & delete data bakul berdasarkan iditem
mysqli_query($conntodb,"DELETE FROM tbl_bakul WHERE iditem = '$iditem'");   
}

mysqli_close($conntodb);//tutup sambungan pangkalan data
?>

<script language="javascript">
		alert("Produk telah berjaya dikemaskini");
    	window.location.href = "adminITEMsenarai.php"; 
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