<?php //papar info belian setiap produk

include('webdb.php');//masukkan rujukan pangkalan data

//terima data 
session_start();//log masuk berjalan
$id = $_SESSION['id'];

$iditem = $_GET['recordID'];//ambil data 1 dari butang
$idresit = $_GET['recordID2'];//ambil data 2 dari butang

if(!isset($_SESSION['id']))//if sesi log masuk tidak ada, href index (log keluar)
{
header("Location: index.php"); 
} 


//buat sambungan ke pangkalan data & ambil data dari belian, resit & item berdasarkan iditem & idresit
$senaraibeliansql = mysqli_query($conntodb,"SELECT * FROM tbl_belian INNER JOIN tbl_resit ON tbl_belian.idresit = tbl_resit.idresit INNER JOIN tbl_item ON tbl_item.iditem = tbl_belian.iditem WHERE tbl_belian.iditem = '$iditem' AND tbl_belian.idresit = '$idresit'");

$row = mysqli_fetch_array($senaraibeliansql); //jadikan tatasusunan

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1" name="viewport" /><!--viewport phone-->
<title>fastkop</title>
<link rel="stylesheet" href="deco.css"><!--masukkan fail css untuk guna class-->
<!-- rujukan card https://www.w3schools.com/howto/howto_css_product_card.asp-->
</head>

<style>
/*set card*/
/*set format card*/
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  background-color: white;
}

/*set format teks price*/
.price {
  color: black;
  font-size: 14px;
}

/*set format butang card*/
.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #191970;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 13px;
}

/*set format hover butang*/
.card button:hover {
  color: white;
  background-color: #FF7F50;
}

/* lebar skrin besar, size jadi besar */
@media screen and (min-width: 750px) {
  #myInput {font-size: 16px}
  #tablesearch {font-size: 16px}
  .price {font-size: 16px}
  .card button {font-size: 14px}
}
</style>

</head>

<body>
<?php include 'linkPENGGUNA.php';?><!--masukkan navigasi-->
<br />
<div align="center" class="tajuk">MAKLUMAT PRODUK BELIAN</div>
<br />

<div class="card" align="center"><!--bermula card-->
	<br /><div class="tajuk"><?php echo $row['item']; ?>&nbsp; </div> <!--item-->
	<p><img class="gambar" src="<?php echo $row['gambaritem']; ?>" />&nbsp; </p><!--gambar item-->
	<br /><div align="center" class="teksdata">Kuantiti : <?php echo $row['kuantitibelian']; ?>&nbsp; <!--nilai kuantiti yang dibeli-->
	<br />Harga : RM <?php echo $row['hargaitem']; ?>&nbsp; <!--harga item yg dibeli-->
	<br />Jumlah bayaran : RM <?php echo number_format($jumlahharga = ($row['hargaitem'] * $row['kuantitibelian']),2); ?>&nbsp; <!--jumlah harga item-->
    <p>Masa : <?php echo $row['masaresit']; ?>&nbsp; </p></div>
	<br /><a href="belianSENARAI.php?recordID=<?php echo $row['iditem'];?>"><button type="button">Senarai belian</button></a>&nbsp; <!--balik ke senarai belian-->
</div><!--tamat card-->

<?php mysqli_close($conntodb); ?><!--tutup sambungan pangkalan data-->
</body>
</html>