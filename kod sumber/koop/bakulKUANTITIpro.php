<?php //periksa jika stok tak cukup nak beli & jika pelanggan keyin kuantiti = 0

include('webdb.php');//masukkan rujukan pangkalan data

//terima data 
session_start();//log masuk berjalan
$idpengguna = $_SESSION['id'];

if(!isset($_SESSION['id']))//if sesi log masuk tidak ada, href index (log keluar)
{
header("Location: index.php"); 
} 


for( $i = 0; $i < count($_POST['iditem']); $i++)//kira iditem yg post & ulangan
{
	$iditem = $_POST['iditem'][$i];//loop tatatsusunan iditem yang terima dari bakul
	$kuantiti = $_POST['kuantiti'][$i];//loop tatatsusunan kuantiti yang terima dari bakul
	
	//buat sambungan ke pangkalan data & ambil stok item berdasarkan iditem
	$stoksql = mysqli_query($conntodb, "SELECT stok FROM tbl_item WHERE iditem = '$iditem'"); 
	$row = mysqli_fetch_array($stoksql);//jadikan tatasusunan
	$stok = $row['stok'];
	
	if ($kuantiti > $stok) //jika stok tidak cukup
	{ 
	mysqli_close($conntodb); //tutup sambungan pangkalan data
	?>
	<script language="javascript">
		alert("Maaf. Stok tidak mencukupi");
    	window.location.href = "bakul.php"; 
	</script>
    <?php
	}
	
	
	if ($kuantiti == 0) //jika kuantiti yang diterima = 0
	{ 
	mysqli_close($conntodb); //tutup sambungan pangkalan data
	?>
	<script language="javascript">
		alert("Maaf. Sila masukkan kuantiti yang betul atau keluarkan produk dari bakul");
    	window.location.href = "bakul.php"; 
	</script>
    <?php
	}
	
//buat sambungan ke pangkalan data & update kuantiti bakul berdasarkan idpengguna log masuk & iditem
mysqli_query($conntodb,"UPDATE tbl_bakul SET  kuantiti = '$kuantiti' WHERE idpengguna = '$idpengguna' AND iditem = '$iditem'");

} //tamat ulangan
mysqli_close($conntodb);//tutup sambungan pangkalan data
?> 

<script language="javascript">
    	window.location.href = "bakulBAYAR.php"; 
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