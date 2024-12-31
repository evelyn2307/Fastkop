<?php //papar bakul dengan kuantiti yang akan dibayar

include('webdb.php');//masukkan rujukan pangkalan data

//terima data 
session_start();//log masuk berjalan
$idpengguna = $_SESSION['id'];// terima masa login
$nama = $_SESSION['nama'];//nama terima masa login

if(!isset($_SESSION['id']))//if sesi log masuk tidak ada, href index (log keluar)
{
header("Location: index.php"); 
} 


//buat sambungan ke pangkalan data & ambil data dari item & bakul berdasarkan idpengguna log masuk
$bayarsql =mysqli_query($conntodb,"SELECT *, tbl_item.item, tbl_item.hargaitem FROM tbl_bakul INNER JOIN tbl_item ON tbl_item.iditem = tbl_bakul.iditem WHERE tbl_bakul.idpengguna = '$idpengguna'");

//buat sambungan ke pangkalan data & ambil nilai dari pengguna berdasarkan idpengguna log masuk
$penggunasql = mysqli_query($conntodb,"SELECT nilai FROM tbl_pengguna WHERE idpengguna = '$idpengguna'");
$rowpengguna = mysqli_fetch_array($penggunasql);//jadikan tatasusunan
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1" name="viewport" /><!--viewport phone-->
<title>fastkop</title>
<link rel="stylesheet" href="deco.css"><!--masukkan fail css untuk guna class-->
<link rel="stylesheet" href="card.css"><!--masukkan fail css untuk guna class-->

<style>
/*set isihan*/
/*searchbox width+height+padding*/
* {
  box-sizing: border-box;
}

/*border nipis*/
#tablesearch {
  border-collapse: collapse;
  border: 1px solid #ddd;
  font-size: 14px;
}

/*data ke kiri selepas carian*/
#tablesearch th, #tablesearch td {
  text-align: left;
  padding: 8px;
}
</style>
</head>

<body>
<?php include 'linkPENGGUNA.php';?><!--masukkan navigasi-->
<br />
<div align="center" class="tajuk">BUAT PESANAN</div>
<br />

<table align="center"><!--table luar-->
<tr><td class="tekspelanggan" colspan="2"><!--gabung 2 kolum-->
    <div class="kadpelanggan"><!--card pelanggan bermula-->
    Nama : <?php echo $nama; ?>
  	<br />
    Baki kredit : <?php echo $rowpengguna['nilai']; ?>
    <br />
    </div>
    </td></tr><!--card berakhir-->
<tr><td>&nbsp;</td>

<tr><td>
	
    <!--table dalam td-->
	<form action = "bakulCHECKBAKIpro.php" method = "post">
	<table border="1" align="center" id="tablesearch" bgcolor="white">
    <thead> <!--untuk mengabungkan 'table header' (th)-->
  	<tr class="header">
    <th><div align="center" class= "teks">Bil</div></th>
    <th><div align="center" class= "teks">Produk</div></th>
    <th><div align="center" class= "teks">Harga</div></th>
    <th><div align="center" class= "teks">Kuantiti</div></th>
    <th><div align="center" class= "teks">Jumlah</div></th>
  	</tr>
    </thead>
  	<tbody> <!--gabungan 'table data' (td)--> 
  	<?php $jumlahbayar = 0; $i=1; while ($row = mysqli_fetch_array($bayarsql)) { ?><!--ulangan baris item-->
  	<tr>
      <td><div align="center" class= "teksdata"><?php echo $i; ?>&nbsp; </div></td>
      <td><div align="center" class= "teksdata"><img class="gambar" src="<?php echo $row['gambaritem']; ?>"/>&nbsp; 
      <br /><?php echo $row['item']; ?>&nbsp; </div></td> 
      <td><div align="center" class= "teksdata">RM <?php echo $row['hargaitem']; ?>&nbsp; </div></td>
      <td><div align="center" class= "teksdata"><?php echo $row['kuantiti']; ?>&nbsp; </div></td>
      <td><div align="center" class= "teksdata">RM <?php $jumlahharga = ($row['hargaitem'] * $row['kuantiti']); //kira jumlah harga bagi setiap item
	  $jumlahbayar = $jumlahbayar + $jumlahharga; //kira jumlah bayaran
	  //papar jumlah harga dalam 2 decimal point
	  echo number_format($jumlahharga, 2); ?>&nbsp; </div></td>
      <input type="hidden" name="iditem[]" value="<?php echo $row['iditem']; ?>"/>
      <input type="hidden" name="kuantiti[]" value="<?php echo $row['kuantiti']; ?>"/>
      <input type="hidden" name="jumlahharga[]" value="<?php echo $jumlahharga; ?>"/>               
  	</tr>
    <?php $i++; } ; ?><!--baris item baru-->
	</tbody>
    
  	<tr>
  	  <td colspan = "5"><div align="right" class= "teksdata">RM <?php echo number_format($jumlahbayar, 2); ?>&nbsp; </div></td>
  	</tr>
    
  	<tr>
  	  <td colspan = "5"><div align="right"><input type="submit" class="buttonbaru" value="Bayar" /></div></td>      
  	</tr>
	</table><!--tamat table dalam-->
	</form>
<?php mysqli_close($conntodb); ?><!--tutup sambungan pangkalan data-->

</td></tr>
</table><!--tamat table luar-->

</body>
</html>