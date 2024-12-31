<?php //periksa stok & kredit cukup tak

include('webdb.php');//masukkan rujukan pangkalan data

//terima data 
session_start();//log masuk berjalan
$id = $_SESSION['id'];// terima masa log masuk
$_SESSION['iditem'] = $_POST['iditem'];//terima dari bakul bayar & jadikan session var
$_SESSION['jumlahharga'] = $_POST['jumlahharga'];//terima dari bakul bayar & jadikan session var
$_SESSION['kuantiti'] = $_POST['kuantiti'];//terima dari bakul bayar & jadikan session var

if(!isset($_SESSION['id']))//if sesi log masuk tidak ada, href index (log keluar)
{
header("Location: index.php"); 
} 


$jumlahbayar = 0;//isytihar pembolehubah

for($i = 0; $i < count($_SESSION['iditem']); $i++)//kira iditem yg post & ulangan
{
	//kira jumlah bayaran
	$jumlahharga = $_SESSION['jumlahharga'][$i];//ulangan tatatsusunan jumlah harga yang terima dari bakul bayar
	$jumlahbayar = $jumlahbayar + $jumlahharga;;//kira jumlah bayaran
	
	//periksa stok setiap produk cukup atau tidak
	$iditem = $_SESSION['iditem'][$i];//ulangan tatatsusunan iditem yang terima dari bakul bayar
	$kuantiti = $_SESSION['kuantiti'][$i];//ulangan tatatsusunan kuantiti yang terima dari bakul bayar

	//buat sambungan ke pangkalan data & ambil stok dari item berdasarkan tatatsusunan iditem
	$stoksql = mysqli_query($conntodb, "SELECT stok FROM tbl_item WHERE iditem = '$iditem'");
	$rowstok = mysqli_fetch_array($stoksql);//jadikan tatasusunan
	$stok = $rowstok['stok'];
	
	if ($kuantiti > $stok) { //jika stok tidak cukup
	mysqli_close($conntodb);
	?>
	<script language="javascript">
		alert("Maaf. Stok tidak mencukupi");
    	window.location.href = "bakul.php"; 
	</script>
    <?php
	}
} //tamat ulangan

	//check kredit cukup atau tidak
	//buat sambungan ke pangkalan data & ambil nilai dari pengguna berdasarkan idpengguna log masuk
	$nilaisql = mysqli_query($conntodb,"SELECT nilai FROM tbl_pengguna WHERE idpengguna = '$id'");
	$row = mysqli_fetch_array($nilaisql);//jadikan tatasusunan
	$nilai = $row['nilai'];

	if ($nilai < $jumlahbayar)//jika nilai kredit tidak cukup untuk bayar
	{
	unset($_SESSION['iditem']);//unset pembolehubah
	unset($_SESSION['jumlahharga']);//unset pembolehubah
	unset($_SESSION['kuantiti']);//unset pembolehubah
	
	mysqli_close($conntodb); //tutup sambungan pangkalan data
	?>
	<script language="javascript">
		alert("Maaf. Nilai kredit anda tidak mencukupi");
    	window.location.href = "bakul.php"; 
	</script>
    <?php 
	}
	else //kalau nilai kredit cukup
	{
	mysqli_close($conntodb); //tutup sambungan pangkalan data
	?>
	<script language="javascript">
    	 window.location.href = "bakulKESELAMATAN.php";
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