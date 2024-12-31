<?php //form padam pengguna

include('webdb.php');//masukkan rujukan pangkalan data

//terima data 
session_start();//log masuk berjalan
$id = $_SESSION['id'];

if(!isset($_SESSION['id']))//jika sesi log masuk tidak ada, href index (log keluar)
{
header("Location: index.php"); 
} 


$idpengguna = ($_GET['recordID']);

///buat sambungan ke pangkalan data & ambil data berdasarkan idpengguna
$kemaskinipenggunasql = mysqli_query($conntodb,"SELECT * FROM tbl_pengguna WHERE idpengguna = '$idpengguna'");

$row = mysqli_fetch_array($kemaskinipenggunasql)//jadikan tatasusunan

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1" name="viewport" /><!--viewport phone-->
<title>fastkop</title>
<link rel="stylesheet" href="deco.css"><!--masukkan fail css untuk guna class-->
<link rel="stylesheet" href="card.css"><!--masukkan fail css untuk guna class-->
</head>

<body>
<?php include 'linkADMIN.php';?><!--masukkan navigasi-->

<table align="center"><!--table luar-->
<tr>

<td colspan="2"><!--gabung 2 kolum-->
<div class="kadbesar"><!--card bermula-->
<br />
<div align="center" class="tajuk">PADAM<br />PENGGUNA</div>
<br />

<form action="adminPENGGUNApadamPRO.php" method="post">
<!--table dalam td-->
<table align="center" bgcolor="white">
  <tr>
    <td><div align="center" class="teksdata">ID DELIMa KPM</div></td>
    <td><div align="center" class="teksdata">:</div></td>
    <td><div align="center" class="teksdata"><?php echo $row['idpengguna']; ?>&nbsp; </div></td>
  </tr>
  <tr>
    <td><div align="center" class="teksdata">Nama</div></td>
    <td><div align="center" class="teksdata">:</div></td>
    <td><div align="center" class="teksdata"><?php echo $row['nama']; ?>&nbsp; </div></td>
  </tr>
  <tr>
    <td><div align="center" class="teksdata">Nilai kredit</div></td>
    <td><div align="center" class="teksdata">:</div></td>
    <td><div align="center" class="teksdata"><?php echo $row['nilai']; ?>&nbsp; </div></td>
  </tr>
  <input type="hidden" name="idpengguna" value="<?php echo $row['idpengguna']; ?>">
  <tr>
	<td colspan="3">
    
    <hr /><!--garisan melintang-->
    
    <div align="center"><input type="submit" name="button" id="button" value="Padam" class="buttonbaru" onclick="return confirm('Adakah anda mahu padam pengguna ini ?')"/></div>	<!--confirm box-->
	</td>
  </tr>    
</table>
</form>

<?php mysqli_close($conntodb); ?><!--tutup sambungan pangkalan data-->
</body>
</html>