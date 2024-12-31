<?php //papar senarai item

include('webdb.php');//masukkan rujukan pangkalan data

//terima data 
session_start();//log masuk berjalan
$id = $_SESSION['id'];
$nama = $_SESSION['nama'];//nama terima masa login
$screenwidth = $_SESSION['width'];

if(!isset($_SESSION['id']))//if sesi log masuk tidak ada, href index (log keluar)
{
header("Location: index.php"); 
} 


//buat sambungan ke pangkalan data & ambil item ikut susunan item ASC
$senaraiitemsql = mysqli_query($conntodb,"SELECT * FROM tbl_item ORDER BY item");

//buat sambungan ke pangkalan data & ambil nilai pengguna berdasarkan idpengguna log masuk
$penggunasql = mysqli_query($conntodb,"SELECT nilai FROM tbl_pengguna WHERE idpengguna = '$id'");
$rowpengguna = mysqli_fetch_array($penggunasql);//jadikan tatasusunan


//pembolehubah untuk kira sesuaikan kolum dengan lebar skrin
$dinamikcolumn = 2;
if ($screenwidth >= 719)
{$dinamikcolumn = 4;}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1" name="viewport" /><!--viewport phone-->
<title>fastkop</title>
<link rel="stylesheet" href="deco.css"><!--masukkan fail css untuk guna class-->
<link rel="stylesheet" href="card.css"><!--masukkan fail css untuk guna class-->
<!-- rujukan isih https://stackoverflow.com/questions/43622127/filtering-table-multiple-columns-->
<!-- rujukan card https://www.w3schools.com/howto/howto_css_product_card.asp-->

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

/*set format teks*/
.carditem {
  color: #191970;
  font-weight: bold;
  font-size: 13px;
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
@media screen and (min-width: 719px) {
  #myInput {font-size: 16px}
  #tablesearch {font-size: 16px}
  .price {font-size: 16px}
  .card button {font-size: 14px}
  .carditem {font-size: 14px}
}
</style>

</head>

<body>
<?php include 'linkPENGGUNA.php';?><!--masukkan navigasi-->

<br />
<div align="center" class="tajuk">PRODUK</div>
<br />

<table align="center"><!--table luar-->
	<tr><td class="tekspelanggan">
    <div class="kadpelanggan"><!--card pelanggan bermula-->
    Nama : <?php echo $nama; ?>
  	<br />
    Baki kredit : <?php echo $rowpengguna['nilai']; ?>
    <br />
    </div>
    </td></tr><!--card berakhir-->
  	<tr><td>&nbsp;</td></tr>
    
	<tr><!--kotak carian-->
	<td><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Carian..."></div></td>
	</tr>
  
	<tr>
  	<td>


	<!--table dalam td-->
	<table align="center" id="tablesearch">
 	<?php $i=1; while ($row = mysqli_fetch_array($senaraiitemsql)) { //ulangan baris item
  		if($i % $dinamikcolumn == 1) //if baki = 1, tr akan dibuka
  		{ 
  		?>
  			<tr>
   	 			<td>
    			<div class="card"><!--bermula card-->
      			<br /><div class="carditem"><?php echo $row['item']; ?>&nbsp; </div>
      			<br /><img src="<?php echo $row['gambaritem']; ?>" height="100" width="75" />&nbsp;
      			<br /><div class="price">RM <?php echo $row['hargaitem']; ?>&nbsp;
      			<br />Stok : <?php echo $row['stok']; ?>&nbsp;</div>
      			<br /><a href="bakulMASUKpro.php?recordID=<?php echo $row['iditem'];?>"><button type="button" >Masuk bakul</button></a>&nbsp;
				</div><!--tamat card-->
    			</td>
		<?php
  		}
  		elseif(($i % $dinamikcolumn == 2) || ($i % $dinamikcolumn == 3)) //if baki = 2/3, td akan dibuka
  		{
  		?>
  				<td>
    			<div class="card"><!--bermula card-->
      			<br /><div class="carditem"><?php echo $row['item']; ?>&nbsp; </div>
      			<br /><img src="<?php echo $row['gambaritem']; ?>" height="100" width="75" />&nbsp;
      			<br /><div class="price">RM <?php echo $row['hargaitem']; ?>&nbsp;
     			<br />Stok : <?php echo $row['stok']; ?>&nbsp;</div>
      			<br /><a href="bakulMASUKpro.php?recordID=<?php echo $row['iditem'];?>"><button type="button">Masuk bakul</button></a>&nbsp;
				</div><!--tamat card-->
    			</td>
  		<?php
  		}
  		else //if baki = 0, tr akan ditutup
  		{
  		?>
  				<td>
    			<div class="card"><!--bermula card-->
      			<br /><div class="carditem"><?php echo $row['item']; ?>&nbsp; </div>
      			<br /><img src="<?php echo $row['gambaritem']; ?>" height="100" width="75" />&nbsp;
      			<br /><div class="price">RM <?php echo $row['hargaitem']; ?>&nbsp;
     			<br />Stok : <?php echo $row['stok']; ?>&nbsp;</div>
      			<br /><a href="bakulMASUKpro.php?recordID=<?php echo $row['iditem'];?>"><button type="button">Masuk bakul</button></a>&nbsp;
				</div><!--tamat card-->
    			</td>
  	 	</tr>
		<?php
		}
   	$i++; } ; ?><!--baris item baru & tamat ulangan-->
	</table><!--tamat table dalam-->


	</td>
	</tr>
</table><!--tamat table luar-->


<script>
function filterTable(event) 
{
    var filter = event.target.value.toUpperCase();//teks/nombor pengguna masuk & tukar jadi "uppercase"
    var rows = document.querySelector("#tablesearch").rows;//mengembalikan elemen pertama baris
	
    for (var i = 0; i < rows.length; i++)  // ulang semua baris
	{
		for (var j = 0; j < rows[i].cells.length; j++)// ulang semua kolum
		{
		var produk = rows[i].cells.item(j).textContent.toUpperCase(); // cari produk di baris i & kolum j & tukar jadi "uppercase"
		
        	if (produk.indexOf(filter) > -1) { //if jumpa produk
            	rows[i].cells.item(j).style.display = ""; //paparkan produk itu
        	} else {
				rows[i].cells.item(j).style.display = "none"; //tiada paparan jika tidak jumpa
        	} 
		}   
    }
}
document.querySelector('#myInput').addEventListener('keyup', filterTable, false);//bila pengguna padam input, semua data dikembalikan
</script>

<?php mysqli_close($conntodb); ?><!--tutup sambungan pangkalan data-->
</body>
</html>