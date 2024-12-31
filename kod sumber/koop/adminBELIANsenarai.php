<?php //papar senarai jualan

include('webdb.php');//masukkan rujukan pangkalan data

//terima data 
session_start();//log masuk berjalan
$id = $_SESSION['id'];

if(!isset($_SESSION['id']))//jika sesi log masuk tidak ada, href index (log keluar)
{
header("Location: index.php"); 
} 


//buat sambungan ke pangkalan data & ambil data dari belian, resit & item susunan DESC
$senaraibeliansql = mysqli_query($conntodb,"SELECT *, tbl_resit.jumlahbayar, tbl_resit.masaresit, tbl_item.item, tbl_item.hargaitem FROM tbl_belian INNER JOIN tbl_resit ON tbl_belian.idresit = tbl_resit.idresit INNER JOIN tbl_item ON tbl_item.iditem = tbl_belian.iditem ORDER BY masaresit DESC");

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1" name="viewport" /><!--viewport phone-->
<title>fastkop</title>
<link rel="stylesheet" href="deco.css"><!--masukkan fail css untuk guna class-->
<!-- rujukan isihan https://stackoverflow.com/questions/43622127/filtering-table-multiple-kolumns-->

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
<div align="center" class="tajuk">SENARAI JUALAN</div>
<br />

<table align="center"> <!--table luar-->
  <tr><!--kotak carian-->
  	<td><input type="text" id="idcarian" onkeyup="myFunction()" placeholder="Carian..." ></td>
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
	<table border="1" align="center" bgcolor="white" id="tablesearch">
	<thead> <!--untuk menggabungkan 'table header' (th)-->
		<tr class="header"> 
			<th><div align="center" class="teks">Bil</div></th>
			<th><div align="center" class="teks">Produk</div></th>
			<th><div align="center" class="teks">Kuantiti</div></th>
			<th><div align="center" class="teks">Harga produk</div></th>
			<th><div align="center" class="teks">Jumlah harga</div></th>
			<th><div align="center" class="teks">No resit</div></th>
            <th><div align="center" class="teks">Masa pesanan</div></th>
            <th><div align="center" class="teks">Status pesanan</div></th>
            <th><div align="center" class="teks">Status pelanggan</div></th>
		</tr>
	</thead>
	<tbody> <!--gabungan 'table data' (td)-->
	<?php $jumlahbayar = 0; $i=1; while ($row = mysqli_fetch_array($senaraibeliansql)) { ?> <!--ulangan baris belian-->
		<tr>
			<td><div align="center" class="teksdata"><?php echo $i; ?>&nbsp; </div></td> <!--bil-->
			<td><div align="center" class="teksdata"><img src="<?php echo $row['gambaritem']; ?>" height="100" width="75" />&nbsp;
			<br /><?php echo $row['item']; ?>&nbsp; </div></td> <!--gambar item dan nama item)-->
			<td><div align="center" class="teksdata"><?php echo $row['kuantitibelian']; ?>&nbsp; </div></td> <!--nilai kuantiti yang dibeli-->
			<td><div align="center" class="teksdata">RM <?php echo $row['hargaitem']; ?>&nbsp; </div></td> <!--harga item yg dibeli-->
			<td><div align="center" class="teksdata">RM <?php echo number_format($jumlahharga = ($row['hargaitem'] * $row['kuantitibelian']),2); ?>&nbsp; </div></td> <!--jumlah harga item-->
            <td><div align="center" class="teksdata"><?php echo $row['idresit']; ?>&nbsp; </div></td> <!--no resit-->
            <td><div align="center" class="teksdata"><?php echo $row['masaresit']; ?>&nbsp; </div></td> <!--masa belian dibuat-->
            <td><div align="center" class="teksdata"><?php echo $row['statusfastkop']; ?>&nbsp; </div></td> <!--status fastkop-->
            <td><div align="center" class="teksdata"><?php echo $row['statuspelanggan']; ?>&nbsp; </div></td> <!--status pelanggan-->
            <td><div align="center"><a href="adminBELIANsediaPRO.php?idresit=<?php echo $row['idresit'];?>"><button type="button" class="buttonbaru">Pesanan siap</button></a>&nbsp; </div></td><!--butang statusfastkop-->
            <td><div align="center"><a href="adminBELIANselesaiPRO.php?idresit=<?php echo $row['idresit'];?>"><button type="button"  class="buttonbaru">Selesai</button></a>&nbsp; </div></td><!--butang statuspelanggan-->
		</tr>
		<?php $i++; } ; ?><!--baris belian baru-->
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
        var secondCol = rows[i].cells[2].textContent.toUpperCase();// pemboleh ubah secondCol ialah data di kolum kuantiti
		var thirdCol = rows[i].cells[3].textContent.toUpperCase();// pemboleh ubah thirdCol ialah data di kolum harga item
		var forthCol = rows[i].cells[4].textContent.toUpperCase();// pemboleh ubah forthCol ialah data di kolum jumlah harga
	    var fifthCol = rows[i].cells[5].textContent.toUpperCase();// pemboleh ubah fifthCol ialah data yang berada di kolum no resit
		var sixthCol = rows[i].cells[6].textContent.toUpperCase();// pemboleh ubah sixthCol ialah data yang berada di kolum masa belian
		var seventhCol = rows[i].cells[7].textContent.toUpperCase();// pemboleh ubah seventhCol ialah data yang berada di kolum status fastkop
		var eigthCol = rows[i].cells[8].textContent.toUpperCase();// pemboleh ubah eigthCol ialah data yang berada di kolum status pelanggan
				
		 <!--|| ialah OR--> //jika teks/nombor yang dimasukkan ada dalam salah satu kolum
        if (zeroCol.indexOf(filter) > -1 || firstCol.indexOf(filter) > -1 || secondCol.indexOf(filter) > -1 || thirdCol.indexOf(filter) > -1 || forthCol.indexOf(filter) > -1 || fifthCol.indexOf(filter) > -1 || sixthCol.indexOf(filter) > -1 || seventhCol.indexOf(filter) > -1 || eigthCol.indexOf(filter) > -1  ) {
		
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