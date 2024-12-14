<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1" name="viewport" /><!--viewport phone-->
<title>Untitled Document</title>
</head>
<body>
<?php //masukkan gambar dari borang ke dalam folder

//rujukan https://www.w3schools.com/php/php_file_upload.asp

include('webdb.php');//masukkan rujukan pangkalan data

//terima data 
session_start();//log masuk berjalan
$id = $_SESSION['id'];

if(!isset($_SESSION['id']))//jika sesi log masuk tidak ada, href index (log keluar)
{
header("Location: index.php"); 
} 


$_SESSION['item'] = $_POST['item'];
$_SESSION['hargaitem'] = $_POST['hargaitem'];
$_SESSION['stok'] = $_POST['stok'];
$_SESSION['namagambaritem'] = $_POST['namagambaritem'];


//target folder nak save gambar
$target_dir = "gambar/"; //nama fail dalam htdocs
$target_file = $target_dir . basename($_FILES["imejitem"]["name"]); //terima fail gambar
$uploadOk = 1; //pembolehubah upload = 1, jika tak berjaya akan tukar ke 0
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); //dapatkan format gambar

//periksa gambar wujud atau tidak
if (($_FILES["imejitem"]["size"]) > 0) { //ambil saiz fail
    $uploadOk = 1;
  } else {
  	?>
	<script language="javascript">
		alert("Maaf. Sila masukkan gambar produk");
		window.location.href = "adminITEMtambah.php";
	</script>
    <?php
    $uploadOk = 0;
  }

// periksa di dalam folder jika sudah ada gambar yang sama  
if (file_exists($target_file)) {
	?>
	<script language="javascript">
		alert("Maaf. Gambar ini telah ada di dalam sistem");
		window.location.href = "adminITEMtambah.php";
	</script>
    <?php
  $uploadOk = 0;
}

//periksa saiz gambar yang dimasukkan tidak melebihi saiz yang ditetapkan 
if ($_FILES["imejitem"]["size"] > 5000000) {
	?>
	<script language="javascript">
		alert("Maaf. Saiz gambar yang anda ingin masukkan melebihi 5MB");
		window.location.href = "adminITEMtambah.php";
	</script>
    <?php
  $uploadOk = 0;
}

//periksa hanya gambar berformat .jpg sahaja dibenarkan 
if($imageFileType != "jpg") {
	?>
	<script language="javascript">
		alert("Maaf. Hanya gambar berformat (*.jpg) sahaja diterima");
		window.location.href = "adminITEMtambah.php";
	</script>
    <?php
  $uploadOk = 0;
}

//jika pembolehubah upload = 0, tidak berjaya
if ($uploadOk == 0) {
	?>
	<script language="javascript">
		alert("Maaf. Gambar anda tidak berjaya dimuat naik");
		window.location.href = "adminITEMtambah.php";
	</script>
    <?php
} 
else 
{   //upload fail
	if (move_uploaded_file($_FILES["imejitem"]["tmp_name"], $target_file)) 
	{
    ?>
    <script language="javascript">
		alert("Gambar anda telah berjaya dimuat naik");
    	window.location.href = "adminITEMtambahPRO.php";
    </script>
    <?php
    }  
    else 
	{
    ?>
    <script language="javascript">
		alert("Maaf. Gambar anda tidak berjaya dimuat naik");
    	window.location.href = "adminITEMtambahPRO.php";
    </script>
    <?php
	}
}
?>
</body>
</html>