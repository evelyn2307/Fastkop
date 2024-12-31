<?php //papar senarai item

include('webdb.php');//masukkan rujukan pangkalan data

//terima data 
session_start();//log masuk berjalan
$id = $_SESSION['id'];

if(!isset($_SESSION['id']))//if sesi log masuk tidak ada, href index (logout)
{
header("Location: index.php"); 
} 


//buat sambungan ke pangkalan data & ambil data dari item
$senaraiitemsql = mysqli_query($conntodb,"SELECT * FROM tbl_item");

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1" name="viewport" /><!--viewport phone-->
<title>fastkop</title>
<link rel="stylesheet" href="deco.css"><!--masukkan fail css untuk guna class-->
<!-- rujukan isihan https://stackoverflow.com/questions/43622127/filtering-table-multiple-columns-->

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
<?php include 'linkADMIN.php';?><!--masukkan navigasi-->
<br />
<div align="center" class="tajuk">PRODUK</div>
<br />

<table align="center"> <!--table luar-->
  <tr>
  	<td><!--kotak carian-->
		<input type="text" id="idcarian" onkeyup="myFunction()" placeholder="Carian..." ></td>
    <td>
    	<form>
    		<div align="right"><!--butang cetak-->
    	  	<input type="button" value="Print" onClick="window.print()" class="buttonbaru">
  	    	</div>
    	</form>
    </td>
  </tr>
 
  <tr>
  	<td colspan="2"><!--gabung 2 kolum-->
    
	<!--table dalam td-->
	<table border="1" align="center" id="tablesearch" bgcolor="white">
  	<thead> <!--untuk menggabungkan 'table header' (th)-->
  	<tr class="header">
    	<th><div align="center" class="teks">Bil</div></th>
    	<th><div align="center" class="teks">Produk</div></th>
   	 	<th><div align="center" class="teks">Harga</div></th>
   	 	<th><div align="center" class="teks">Gambar</div></th>
    	<th><div align="center" class="teks">Stok produk</div></th>
  	</tr>
  	</thead>
  	<tbody> <!--gabungan 'table data' (td)-->
  	<?php $i=1; while ($row = mysqli_fetch_array($senaraiitemsql)) { ?><!--ulangan baris item-->
    <tr>
      	<td><div align="center" class="teksdata"><?php echo $i; ?>&nbsp; </div></td> <!--Bil -->
      	<td><div align="center" class="teksdata"><?php echo $row['item']; ?>&nbsp; </div></td> <!--Nama item -->
      	<td><div align="center" class="teksdata"><?php echo $row['hargaitem']; ?>&nbsp; </div></td> <!--Harga item -->
      	<td><div align="center"><img src="<?php echo $row['gambaritem']; ?>" height="100" width="75"/>&nbsp; </div></td> <!--Imej item --> 
      	<td><div align="center" class="teksdata"><?php echo $row['stok']; ?>&nbsp; </div></td> <!--Nilai stok -->
      
      	<td><div align="center"><a href="adminITEMkemaskini.php?recordID=<?php echo $row['iditem'];?>"><button type="button" class="buttonbaru">Kemaskini</button></a>&nbsp; </div></td> <!--butang kemaskini produk-->
      	<td><div align="center"><a href="adminITEMpadam.php?recordID=<?php echo $row['iditem'];?>"><button type="button" class="buttonbaru">Padam</button></a>&nbsp; </div></td>
	</tr> <!--butang padam produk -->
    <?php $i++; } ; ?><!--baris item baru-->
	</tbody>
	</table><!--tamat table dalam-->

</td>
</tr>
</table><!--tamat table luar-->


<script>
function filterTable(event) {
    var filter = event.target.value.toUpperCase(); //teks/nombor pengguna masuk
    var rows = document.querySelector("#tablesearch tbody").rows; //mengembalikan elemen pertama baris
	
    // for i kurang daripada jumlah baris
    for (var i = 0; i < rows.length; i++) {
        var zeroCol = rows[i].cells[0].textContent.toUpperCase(); // pemboleh ubah zeroCol ialah data di kolum bil
		var firstCol = rows[i].cells[1].textContent.toUpperCase();// pemboleh ubah firstCol ialah data di kolum item 
        var secondCol = rows[i].cells[2].textContent.toUpperCase();// pemboleh ubah secondCol ialah data di kolum harga item
		var thirdCol = rows[i].cells[3].textContent.toUpperCase();// pemboleh ubah thirdCol ialah data di kolum gambar
		var forthCol = rows[i].cells[4].textContent.toUpperCase();// pemboleh ubah forthCol ialah data di kolum stok
		
		 <!--|| ialah OR--> //jika teks/nombor yang dimasukkan ada dalam salah satu kolum
        if (zeroCol.indexOf(filter) > -1 || firstCol.indexOf(filter) > -1 || secondCol.indexOf(filter) > -1 || thirdCol.indexOf(filter) > -1 || forthCol.indexOf(filter) > -1) {
		
            rows[i].style.display = ""; //papar baris tersebut
        } else {
            rows[i].style.display = "none"; //else baris yg lain tidak papar
        }      
    }
}
document.querySelector('#idcarian').addEventListener('keyup', filterTable, false); //bila pengguna padam input, semua data dikembalikan
</script>

<?php mysqli_close($conntodb); ?><!--tutup sambungan pangkalan data-->
</body>
</html>