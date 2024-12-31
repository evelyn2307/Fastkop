<?php //masukkan item ke dalam pangkalan data

include('webdb.php');//masukkan rujukan pangkalan data

//terima data 
session_start();//log masuk berjalan
$id = $_SESSION['id'];

if(!isset($_SESSION['id']))//jika sesi log masuk tidak ada, href index (log keluar)
{
header("Location: index.php"); 
} 


$item = $_SESSION['item'];
$hargaitem = $_SESSION['hargaitem'];
$stok = $_SESSION['stok'];
$namagambaritem = $_SESSION['namagambaritem'];

//gabung nama fail & folder
$awalangambar = "gambar/"; //pembolehubah nama fail yang nak disimpan 
$namainput = $namagambaritem; //pembolehubah nama gambar yang dimasukkan berdasarkan input 
$awalangambar .= $namainput; // string function menggabungkan pembolehubah nama file dan pembolehubah nama gambar 
$gambaritem = $awalangambar .".jpg"; //menggabungkan pembolehubah folder & file dengan perkataan .jpg 

//buat sambungan ke pangkalan data & masukkan data item
mysqli_query($conntodb,"INSERT INTO tbl_item (item, hargaitem, stok, gambaritem) VALUES ('$item', '$hargaitem', '$stok', '$gambaritem')");

mysqli_close($conntodb);//tutup sambungan pangkalan data
?>
<script language="javascript">
		alert("Produk telah berjaya dimasukkan ke dalam sistem");
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