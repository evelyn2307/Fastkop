<?php //papar senarai pelanggan

include('webdb.php');//masukkan rujukan pangkalan data

//terima data 
session_start();//log masuk berjalan
$id = $_SESSION['id'];

if(!isset($_SESSION['id']))//jika sesi log masuk tidak ada, href index (log keluar)
{
header("Location: index.php"); 
} 


//buat sambungan ke pangkalan data & ambil data dari pengguna yg jenis = 2 (pelanggan)
$senaraipenggunasql = mysqli_query($conntodb,"SELECT * FROM tbl_pengguna WHERE jenispengguna = 2");

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
<div align="center" class="tajuk">SENARAI PENGGUNA</div>
<br />

<table align="center"><!--table luar-->
  <tr>
  	<td><!--kotak carian-->
		<input type="text" id="idcarian" onkeyup="myFunction()" placeholder="Carian..." > </td>
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
  		<thead> <!--untuk mengabungkan 'table header' (th)-->
  		<tr class="header">
    		<th><div align="center" class="teks">Bil</div></th>
    		<th><div align="center" class="teks">ID DELIMa KPM</div></th>
    		<th><div align="center" class="teks">Nama</div></th>
    		<th><div align="center" class="teks">Kata laluan</div></th>
    		<th><div align="center" class="teks">Nilai kredit</div></th>
    		<th><div align="center" class="teks">No kad pengenalan</div></th>
  		</tr>
  		</thead>
  		<tbody> <!--gabungan 'table data' (td)-->
  		<?php $i=1; while ($row = mysqli_fetch_array($senaraipenggunasql)) { ?><!--ulangan baris pengguna-->
    	<tr>
      		<td><div align="center" class="teksdata"><?php echo $i; ?>&nbsp; </div></td>
      		<td><div align="center" class="teksdata"><?php echo $row['idpengguna']; ?>&nbsp; </div></td>
      		<td><div align="center" class="teksdata"><?php echo $row['nama']; ?>&nbsp; </div></td>
      		<td><div align="center" class="teksdata"><?php echo $row['katalaluan']; ?>&nbsp; </div></td>
      		<td><div align="center" class="teksdata"><?php echo $row['nilai']; ?>&nbsp; </div></td>
      		<td><div align="center" class="teksdata"><?php echo $row['ic']; ?>&nbsp; </div></td>
      		<td><div align="center"><a href="adminPENGGUNApadam.php?recordID=<?php echo $row['idpengguna'];?>"><button class="buttonbaru">Padam</button></a>&nbsp; </div></td>
    	</tr>
    	<?php $i++; } ; ?><!--baris pengguna baru-->
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
		var firstCol = rows[i].cells[1].textContent.toUpperCase();// pemboleh ubah firstCol ialah data di kolum idpenggune 
        var secondCol = rows[i].cells[2].textContent.toUpperCase();// pemboleh ubah secondCol ialah data di kolum nama
		var thirdCol = rows[i].cells[3].textContent.toUpperCase();// pemboleh ubah thirdCol ialah data di kolum katalaluan
		var forthCol = rows[i].cells[4].textContent.toUpperCase();// pemboleh ubah forthCol ialah data di kolum nilai
	    var fifthCol = rows[i].cells[5].textContent.toUpperCase();// pemboleh ubah forthCol ialah data di kolum ic
		
		 <!--|| ialah OR--> //jika teks/nombor yang dimasukkan ada dalam salah satu kolum
        if (zeroCol.indexOf(filter) > -1 || firstCol.indexOf(filter) > -1 || secondCol.indexOf(filter) > -1 || thirdCol.indexOf(filter) > -1 || forthCol.indexOf(filter) > -1 || fifthCol.indexOf(filter) > -1){
		
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