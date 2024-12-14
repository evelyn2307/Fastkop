<?php //masukkan item ke dlm bakul

include('webdb.php');//masukkan rujukan pangkalan data

//terima data 
session_start();//log masuk berjalan
$idpengguna = $_SESSION['id'];
$iditem = $_GET['recordID'];

if(!isset($_SESSION['id']))//if sesi log masuk tidak ada, href index (log keluar)
{
header("Location: index.php"); 
} 


//buat sambungan ke pangkalan data & select data bakul berdasarkan idpengguna log masuk & iditem
$bakulmasuksql = mysqli_query($conntodb,"SELECT * FROM tbl_bakul WHERE idpengguna = '$idpengguna' AND iditem = '$iditem'");


if(mysqli_num_rows($bakulmasuksql) >= 1) //jika tatasusunan sudah ada dalam bakul
{
mysqli_close($conntodb); //tutup sambungan pangkalan data
?>

<script language="javascript">
		alert("Maaf. Produk ini telah berada di dalam bakul anda");
    	window.location.href = "itemSENARAI.php"; 
</script>

<?php
}
else 
{

//check ada tak stok
//buat sambungan ke pangkalan data & ambil stok item berdasarkan iditem
$checkstoksql = mysqli_query($conntodb, "SELECT stok FROM tbl_item WHERE  iditem = '$iditem'");
$row = mysqli_fetch_array($checkstoksql); //jadikan tatasusunan

if ($row['stok'] == 0 ) //if tak ada stok
	{
	 	mysqli_close($conntodb); //tutup sambungan pangkalan data
	 	?>
     	<script language="javascript">
	  	alert("Maaf. Produk yang dipilih tiada stok");
    	window.location.href = "itemSENARAI.php"; 
		</script>
		<?php
	}
	else
	{
		//buat sambungan ke pangkalan data & masukkan data baru bakul & kuantiti = 1
		mysqli_query($conntodb,"INSERT INTO tbl_bakul (idpengguna, iditem, kuantiti) VALUES ('$idpengguna', '$iditem', 1)");
		mysqli_close($conntodb); //tutup sambungan pangkalan data
	}
}
?>

<script language="javascript">
	 alert("Produk berjaya dimasukkan ke dalam bakul");
     window.location.href = "itemSENARAI.php"; 
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