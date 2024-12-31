<?php //masukkan resit & belian baru 

include('webdb.php');//masukkan rujukan pangkalan data

//terima data 
session_start();//log masuk berjalan
$id = $_SESSION['id'];

if(!isset($_SESSION['id']))//if sesi log masuk tidak ada, href index (log keluar)
{
header("Location: index.php"); 
} 


$jumlahbayar = 0; //isytihar pembolehubah

//buat sambungan ke pangkalan data & masukkan data ke resit
mysqli_query($conntodb,"INSERT INTO tbl_resit (idpengguna) VALUES ('$id')"); //buka idresit sahaja
$idresit = mysqli_insert_id($conntodb);//ambil idresit yang baru dimasukkan

//buat sambungan ke pangkalan data & ambil idresit dari berdasarkan idpengguna login & idresit
//$resitsql =  mysqli_query($conntodb, "SELECT idresit FROM tbl_resit WHERE idpengguna = '$id' AND idresit = '$idresit'");


for($i = 0; $i < count($_SESSION['iditem']); $i++)//kira iditem yg post & ulangan
{
	//kira jumlah bayaran
	$jumlahharga = $_SESSION['jumlahharga'][$i];//ulangan tatatsusunan jumlah harga yang terima dari bakul bayar
	$iditem = $_SESSION['iditem'][$i];//ulangan tatatsusunan iditem yang terima dari bakul bayar
	$jumlahbayar = $jumlahbayar + $jumlahharga; //kira jumlah bayaran
	
	//buat sambungan ke pangkalan data & ambil kuantiti dari bakul berdasarkan idpengguna log masuk & iditem
	$kuantitibakul = mysqli_query($conntodb, "SELECT kuantiti FROM tbl_bakul WHERE idpengguna = '$id' AND iditem = '$iditem'");
	$row = mysqli_fetch_array($kuantitibakul);//jadikan tatasusunan
	$kuantiti = $row['kuantiti'];
	
	//buat sambungan ke pangkalan data & masukkan belian baru ke dalam pangkalan data
	mysqli_query($conntodb,"INSERT INTO tbl_belian (idpengguna, iditem, kuantitibelian, idresit) VALUES ('$id','$iditem','$kuantiti', '$idresit')");
} //tamat ulangan

//buat sambungan ke pangkalan data & update jumlah bayaran ke dalam resit terkini
mysqli_query($conntodb,"UPDATE tbl_resit SET jumlahbayar = '$jumlahbayar' WHERE idresit = '$idresit'");

unset($_SESSION['iditem']);//unset pembolehubah
unset($_SESSION['jumlahharga']);//unset pembolehubah
unset($_SESSION['kuantiti']);//unset pembolehubah

mysqli_close($conntodb); //tutup sambungan pangkalan data
?>

<script language="javascript">
		alert("Pembayaran anda telah berjaya");
    	window.location.href = "belianSENARAI.php"; 
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