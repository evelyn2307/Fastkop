<?php //sahkan pengguna, tolak stok item, kosongkan bakul yang tiada stok & tolak kredit

include('webdb.php');//masukkan rujukan pangkalan data

//terima data 
session_start();//log masuk berjalan
$id = $_SESSION['id'];
$iditem = $_SESSION['iditem'];
$jumlahharga = $_SESSION['jumlahharga'];
$kuantiti = $_SESSION['kuantiti'];
$noic = $_POST['noic'];
$katalaluan = $_POST['katalaluan'];

if(!isset($_SESSION['id']))//if sesi log masuk tidak ada, href index (log keluar)
{
header("Location: index.php"); 
} 


$jumlahbayar = 0; //isytihar pembolehubah

//buat sambungan ke pangkalan data & ambil data dari pengguna berdasarkan idpengguna log masuk, ic & katalaluan (serupa)
$penggunasql = mysqli_query($conntodb, "SELECT * FROM tbl_pengguna WHERE idpengguna = '$id' AND ic = '$noic' AND BINARY katalaluan = BINARY '$katalaluan'");

if (mysqli_num_rows($penggunasql) == 1) { //jika jumpa di pangkalan data / pengguna yang sah

	for($i = 0; $i < count($_SESSION['iditem']); $i++)//kira iditem yg post & ulangan
	{
	$jumlahharga = $_SESSION['jumlahharga'][$i];//ulangan tatatsusunan jumlah harga yang terima dari bakul bayar
	$jumlahbayar = $jumlahbayar + $jumlahharga; //kira jumlah bayaran
	
	
	//tolak stok item
	$iditem = $_SESSION['iditem'][$i];//ulangan tatatsusunan iditem yang terima dari bakul bayar
	$kuantiti = $_SESSION['kuantiti'][$i];//ulangan tatatsusunan kuantiti yang terima dari bakul bayar
	
	//buat sambungan ke pangkalan data & ambil stok dari item berdasarkan iditem
	$stoksql = mysqli_query($conntodb, "SELECT stok FROM tbl_item WHERE iditem = '$iditem'"); 
	$rowstok = mysqli_fetch_array($stoksql);//jadikan tatasusunan
	$stok = $rowstok['stok'];
	$stok = $stok - $kuantiti;//kira baki stok
	
		//jika stok habis, padam bakul pengguna yang ada iditem
		if($stok == 0)
		{ 
			//buat sambungan ke pangkalan data & padam data bakul berdasarkan iditem
			mysqli_query($conntodb,"DELETE FROM tbl_bakul WHERE iditem = '$iditem'");  
		}
	
	//buat sambungan ke pangkalan data & update stok item berdasarkan iditem
	mysqli_query($conntodb,"UPDATE tbl_item SET stok = '$stok' WHERE iditem = '$iditem'");
	} //tamat ulangan


	//tolak kredit pengguna
	//buat sambungan ke pangkalan data & ambil nilai dari pengguna berdasarkan idpengguna log masuk
	$nilaikreditsql = mysqli_query($conntodb,"SELECT nilai FROM tbl_pengguna WHERE idpengguna = '$id'");
	$row = mysqli_fetch_array($nilaikreditsql);//jadikan tatasusunan
	$nilai = $row['nilai'];
	$bakikredit = $nilai - $jumlahbayar;//kira baki kredit
	
	//buat sambungan ke pangkalan data & update nilai pengguna berdasarkan idpengguna log masuk
	mysqli_query($conntodb,"UPDATE tbl_pengguna SET nilai = '$bakikredit' WHERE idpengguna = '$id'");
	
	mysqli_close($conntodb); //tutup sambungan pangkalan data
	?>
	<script language="javascript">
    	 window.location.href = "bakulBAYARpro.php";
	</script>
    <?php
}
else
{ 
	unset($_SESSION['iditem']);//unset pembolehubah
	unset($_SESSION['jumlahharga']);//unset pembolehubah
	unset($_SESSION['kuantiti']);//unset pembolehubah
	
	mysqli_close($conntodb); //tutup sambungan pangkalan data
	?> 
	<script language="javascript">
		alert("Maaf. Sila masukkan kod keselamatan dan kata laluan yang betul");
    	window.location.href = "bakul.php"; 
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