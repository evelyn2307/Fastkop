<?php //tambah nilai kredit pelanggan

include('webdb.php');//masukkan rujukan pangkalan data

//terima data 
session_start();//log masuk berjalan
$id = $_SESSION['id'];

if(!isset($_SESSION['id']))//jika sesi log masuk tidak ada, href index (log keluar)
{
header("Location: index.php"); 
} 


$idpengguna = $_POST['idpengguna'];
$topupnilai = $_POST['nilai'];

//buat sambungan ke pangkalan data & ambil nilai berdasarkan idpengguna
$nilaipengguna= mysqli_query($conntodb,"SELECT nilai FROM tbl_pengguna WHERE idpengguna = '$idpengguna'");
$row= mysqli_fetch_array($nilaipengguna); //jadikan tatasusunan

$nilaibaru=$row['nilai'] + $topupnilai; //kira nilai kredit baru

//buat sambungan ke pangkalan data & update nilai pengguna berdasarkan idpengguna
mysqli_query($conntodb,"UPDATE tbl_pengguna SET nilai='$nilaibaru' WHERE idpengguna='$idpengguna'");

mysqli_close($conntodb); //tutup sambungan pangkalan data
?>

<script language="javascript">
		alert("Nilai kredit pengguna telah berjaya ditambah");//paparan mesej apabila berjaya menambah nilai
    	window.location.href = "adminPENGGUNAsenarai.php"; 
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