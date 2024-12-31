<?php //papar senarai belian

include('webdb.php');//masukkan rujukan pangkalan data

//terima data 
session_start();//log masuk berjalan
$id = $_SESSION['id'];// terima masa log masuk
$jenis = $_SESSION['jenispengguna'];// terima masa log masuk
$nama = $_SESSION['nama'];//nama terima masa log masuk

if(!isset($_SESSION['id']))//if sesi log masuk tidak ada, href index (log keluar)
{
header("Location: index.php"); 
} 


//buat sambungan ke pangkalan data & ambil data belian, resit & item berdasarkan idpengguna log masuk & susunan DESC
$senaraibeliansql = mysqli_query($conntodb,"SELECT * FROM tbl_belian INNER JOIN tbl_resit ON tbl_belian.idresit = tbl_resit.idresit INNER JOIN tbl_item ON tbl_item.iditem = tbl_belian.iditem WHERE tbl_belian.idpengguna = '$id' ORDER BY masaresit DESC");


//buat sambungan ke pangkalan data &  ambil nilai pengguna berdasarkan idpengguna log masuk
$penggunasql = mysqli_query($conntodb,"SELECT nilai FROM tbl_pengguna WHERE idpengguna = '$id'");
$rowpengguna = mysqli_fetch_array($penggunasql)//jadikan tatasusunan
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
@media screen and (min-width: 750px) {
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
<div align="center" class="tajuk">SENARAI BELIAN</div>
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
  <tr><td>&nbsp;</td></tr>
  
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
	<thead> <!--untuk mengabungkan 'table header' (th)-->
		<tr class="header"> 
			<th><div align="center" class="teks">Bil</div></th>
			<th><div align="center" class="teks">Produk</div></th>
			<th><div align="center" class="teks">No resit</div></th>
            <th><div align="center" class="teks">Status pesanan</div></th>
            <th><div align="center" class="teks">Status pelanggan</div></th>
		</tr>
	</thead>
	<tbody> <!--gabungan 'table data' (td)-->
	<?php $jumlahbayar = 0; $i=1; while ($row = mysqli_fetch_array($senaraibeliansql)) { ?><!--ulangan baris item-->
		<tr>
			<td><div align="center" class="teksdata"><?php echo $i; ?>&nbsp; </div></td> <!--bil-->
            
            <td>
            <div class="card"> <!--bermula card-->
      			<br /><div class="carditem"><?php echo $row['item']; ?>&nbsp; </div> <!--item-->
      			<br /><img class="gambar" src="<?php echo $row['gambaritem']; ?>" />&nbsp; <!--gambar item-->
      			<br /><a href="belianINFO.php?recordID=<?php echo $row['iditem'];?>&recordID2=<?php echo $row['idresit'];?>">
                <button type="button" >Maklumat belian</button></a>&nbsp; <!--get iditem & idresit ke info belian-->
			 </div><!--tamat card-->
             </td>
			
            <td><div align="center" class="teksdata"><?php echo $row['idresit']; ?>&nbsp; </div></td> <!--no resit-->
            <td><div align="center" class="teksdata"><?php echo $row['statusfastkop']; ?>&nbsp; </div></td><!--status barang fastkop-->
            <td><div align="center" class="teksdata"><?php echo $row['statuspelanggan']; ?>&nbsp; </div></td><!--status ambil-->
            <td><div align="center"><a href="belianSELESAIpro.php?idresit=<?php echo $row['idresit'];?>"><button type="button" class="buttonbaru">Selesai</button></a>&nbsp; </div></td>
		</tr>
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
        var secondCol = rows[i].cells[2].textContent.toUpperCase();// pemboleh ubah secondCol ialah data di kolum no resit
		var thirdCol = rows[i].cells[3].textContent.toUpperCase();// pemboleh ubah thirdCol ialah data di kolum harga status fastkop
		var forthCol = rows[i].cells[4].textContent.toUpperCase();// pemboleh ubah forthCol ialah data di kolum jumlah status pelanggan
				
		 <!--|| ialah OR--> //jika teks/nombor yang dimasukkan ada dalam salah satu kolum
        if (zeroCol.indexOf(filter) > -1 || firstCol.indexOf(filter) > -1 || secondCol.indexOf(filter) > -1 || thirdCol.indexOf(filter) > -1 || forthCol.indexOf(filter) > -1 ) {
		
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