<?php //papar item dalam bakul

include('webdb.php');//masukkan rujukan pangkalan data

//terima data 
session_start();//log masuk berjalan
$id = $_SESSION['id'];//id terima masa log masuk
$nama = $_SESSION['nama'];//nama terima masa log masuk

if(!isset($_SESSION['id']))//jika sesi log masuk tidak ada, href index (log keluar)
{
header("Location: index.php"); 
} 


//buat sambungan ke pangkalan data & ambil data dari item & bakul berdasarkan idpengguna log masuk
$bakulsql =mysqli_query($conntodb,"SELECT *, tbl_item.item, tbl_item.hargaitem, tbl_bakul.kuantiti FROM tbl_item INNER JOIN tbl_bakul ON tbl_bakul.iditem = tbl_item.iditem WHERE tbl_bakul.idpengguna = '$id'");

//buat sambungan ke pangkalan data & ambil nilai dari pengguna berdasarkan idpengguna log masuk
$penggunasql = mysqli_query($conntodb,"SELECT nilai FROM tbl_pengguna WHERE idpengguna = '$id'");
$rowpengguna = mysqli_fetch_array($penggunasql); //jadikan tatasusunan

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1" name="viewport" /><!--viewport phone-->
<title>fastkop</title>
<link rel="stylesheet" href="deco.css"><!--masukkan fail css untuk guna class-->
<link rel="stylesheet" href="card.css"><!--masukkan fail css untuk guna class-->
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
<?php include 'linkPENGGUNA.php';?><!--masukkan navigasi-->
<br />
<div align="center" class="tajuk">BAKUL</div>
<br />

<table align="center"><!--table luar-->
  <tr><td class="tekspelanggan" colspan="2"><!--gabung 2 kolum sebab ada td button print-->
    <div class="kadpelanggan"><!--card pelanggan bermula-->
    Nama : <?php echo $nama; ?>
  	<br />
    Baki kredit : <?php echo $rowpengguna['nilai']; ?>
    <br />
    </div>
    </td></tr><!--card berakhir-->
  <tr><td>&nbsp;</td></tr>
  
  <tr>
  	<td><!--kotak carian-->
		<input type="text" id="idcarian" onkeyup="myFunction()" placeholder="Carian..." >
    </td>
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
	<form action = "bakulKUANTITIpro.php" method = "post">
	<table border="1" align="center" id="tablesearch" bgcolor="white">
  		<thead> <!--untuk mengabungkan 'table header' (th)-->
    	<tr class="header">
    		<th><div align="center" class="teks">Bil</div></th>
    		<th><div align="center" class="teks">Produk</div></th>
    		<th><div align="center" class="teks">Harga</div></th>
    		<th><div align="center" class="teks">Kuantiti</div></th>
  		</tr>
  		</thead>
  		<tbody> <!--gabungan 'table data' (td)--> 
  		<?php $i=1; while ($row = mysqli_fetch_array($bakulsql)) { ?><!--ulangan baris item-->
    	<tr>
      		<td><div align="center" class="teksdata"><?php echo $i; ?>&nbsp; </div></td>
      		<td><div align="center" class="teksdata"><img class="gambar" src="<?php echo $row['gambaritem']; ?>"/>&nbsp; 
      		<br /><?php echo $row['item']; ?>&nbsp; </div></td>
      		<td><div align="center" class="teksdata">RM <?php echo $row['hargaitem']; ?>&nbsp; </div></td>
      		<td><div align="center"> <input size="4" type="text" name="kuantiti[]" value="<?php echo $row['kuantiti']; ?>"/></div></td>
      		<td>
            <div align="center"><a href="bakulKELUARpro.php?recordID=<?php echo $row['iditem'];?>" 
            onclick="return confirm('Adakah anda mahu keluarkan produk ini dari bakul ?')">			<!--confirm box-->
            <button type="button" class="buttonbaru">Keluarkan dari bakul</button></a>&nbsp; </div>
            </td>
      		<input size="4" type="hidden" name="iditem[]" value="<?php echo $row['iditem']; ?>"/>      
    	</tr>   
    	<?php $i++; } ; ?><!--baris bakul baru-->
		</tbody> 
    	<tr>
    		<td colspan = "4"></td><!--gabung 2 kolum-->  
    		<td><div align="center"><input type="submit" class="buttonbaru" name="Buat Pesanan" value="Buat Pesanan"/>&nbsp; </div></td>      
   		</tr> 
	</table><!--tamat table dalam-->
	</form>

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
		var firstCol = rows[i].cells[1].textContent.toUpperCase();// pemboleh ubah firstCol ialah data di kolum produk
        var secondCol = rows[i].cells[2].textContent.toUpperCase();// pemboleh ubah secondCol ialah data di kolum harga
		var thirdCol = rows[i].cells[3].textContent.toUpperCase();// pemboleh ubah thirdCol ialah data di kolum kuantiti
		
		 <!--|| ialah OR--> //jika teks/nombor yang dimasukkan ada dalam salah satu kolum
        if (zeroCol.indexOf(filter) > -1 || firstCol.indexOf(filter) > -1 || secondCol.indexOf(filter) > -1 || thirdCol.indexOf(filter) > -1){
		
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