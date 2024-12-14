<?php //form padam item dari pangkalan data

include('webdb.php');//masukkan rujukan pangkalan data

//terima data 
session_start();//log masuk berjalan
$id = $_SESSION['id'];
$iditem = ($_GET['recordID']);

if(!isset($_SESSION['id']))//jika sesi log masuk tidak ada, href index (log keluar)
{
header("Location: index.php"); 
} 


//buat sambungan ke pangkalan data & ambil iditem dari item
$kemaskiniitemsql = mysqli_query($conntodb,"SELECT * FROM tbl_item WHERE iditem = '$iditem'");

$row = mysqli_fetch_array($kemaskiniitemsql)//jadikan tatasusunan
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
<div align="center" class="tajuk">PADAM<br />PRODUK</div>
<br />

<form action="adminITEMpadamPRO.php" method="post">
<!--table dalam td-->
<table align="center" bgcolor="white">
  <tr>
     <td colspan="3" height="150"><div align="center"><img src="<?php echo $row['gambaritem']; ?>" height="100" width="75"/>&nbsp; </div></td>
  </tr>
  <tr>
    <td><div align="center" class="teksdata">Produk</div></td>
    <td><div align="center" class="teksdata">:</div></td>
    <td><div align="center" class="teksdata"><?php echo $row['item']; ?>&nbsp; </div></td>
  </tr>
  <input type="hidden" name="iditem" value="<?php echo $row['iditem']; ?>">
  <tr>
	<td colspan="3">
    
    <hr /><!--garisan melintang-->
    
    <div align="center"><input type="submit" name="button" id="button" value="Padam" class="buttonbaru" onclick="return confirm('Adakah anda mahu padam produk ini ?')"/></div>	<!--confirm box-->
    </td>
  </tr>    
</table>
</form>

</div><!-- card berakhir -->
</td>		
</tr>
</table><!--tamat table luar-->

<?php mysqli_close($conntodb); ?><!--tutup sambungan pangkalan data-->
</body>
</html>