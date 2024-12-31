<?php //form tukar kata lalauan pengguna

include('webdb.php');//masukkan rujukan pangkalan data

//terima data 
session_start();//log masuk berjalan
$id = $_SESSION['id'];

if(!isset($_SESSION['id']))//if sesi log masuk tidak ada, href index (log keluar)
{
header("Location: index.php"); 
} 


//buat sambungan ke pangkalan data & ambil data pengguna berdasarkan idpengguna log masuk
$kemaskinipenggunasql = mysqli_query($conntodb,"SELECT * FROM tbl_pengguna WHERE idpengguna = '$id'");

$row = mysqli_fetch_array($kemaskinipenggunasql) //jadikan tatasusunan

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
<?php include 'linkPENGGUNA.php';?><!--masukkan navigasi-->

<table align="center"><!--table luar-->
<tr>

<td>
<div class="kadbesar"><!--card bermula-->
<br />
<div align="center" class="tajuk">TUKAR KATA LALUAN</div>
<br />

	<form action="penggunaKEMASKINIpro.php" method="post">
	<table align="center" bgcolor="white"><!--table dalam td-->
  	<tr>
    <td><div align="center" class="teksdata">Kod keselamatan</div></td>
    <td><div align="center" class="teksdata">:</div></td>
    <td><div align="center"><input type="password" name="noic" required="required" />&nbsp; </div></td>
  	</tr>
  	<tr>
    <td><div align="center" class="teksdata">Kata laluan lama</div></td>
    <td><div align="center" class="teksdata">:</div></td>
    <td><div align="center"><input type="password" name="katalaluan" required="required"/>&nbsp; </div></td>
  	</tr>
  	<tr>
  	<td colspan="3">
  	<hr /> <!--garisan melintang-->
  	</td>
  	</tr>
  	<tr>
    <td><div align="center" class="teksdata">Kata laluan baharu</div></td>
    <td><div align="center" class="teksdata">:</div></td>
    <td><div align="center"><input type="text" name="katalaluanbaru" required="required" />&nbsp; </div></td>
  	</tr>
  	<tr>
    <td colspan="3">
    
    <hr /><!--garisan melintang-->
    
    <div align="center"><input type="submit" name="button" class="buttonbaru" value="Tukar kata laluan" /></div></td>
  	</tr>    
	</table><!--tamat table dalam-->
	</form>

</div><!-- card berakhir -->
</td>
</tr>
</table><!--tamat table luar-->

<?php mysqli_close($conntodb); ?><!--tutup sambungan pangkalan data-->
</body>
</html>