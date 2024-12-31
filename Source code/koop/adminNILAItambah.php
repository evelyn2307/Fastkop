<?php //form tambah nilai pelanggan

include('webdb.php');//masukkan rujukan pangkalan data

//terima data 
session_start();//log masuk berjalan
$id = $_SESSION['id'];

if(!isset($_SESSION['id']))//jika sesi log masuk tidak ada, href index (log keluar)
{
header("Location: index.php"); 
} 

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
<div align="center" class="tajuk">TAMBAH NILAI</div>
<br />

<form action="adminNILAItambahPRO.php" method="post">
<!--table dalam td-->
<table align="center" bgcolor="white">
  <tr>
    <td><div align="center" class="teksdata">ID DELIMa KPM pelanggan</div></td>
    <td><div align="center" class="teksdata">:</div></td>
    <td><div align="center"><input type="text" name="idpengguna"/>&nbsp; </div></td>
  </tr>
  <tr>
    <td><div align="center" class="teksdata">Nilai</div></td>
    <td><div align="center" class="teksdata">:</div></td>
    <td><div align="center"><input type="text" name="nilai"/>&nbsp; </div></td>
  </tr>
  <tr>
    <td colspan="3">
    
      <hr /><!--garisan melintang-->
      
      <div align="center"><input type="submit" name="button" id="button" value="Tambah nilai" class="buttonbaru"/></div>
    </td>
  </tr> 
</table>
</form>

</div><!-- card berakhir -->
</td>		
</tr>
</table><!--tamat table luar-->

</body>
</html>