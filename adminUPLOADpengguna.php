<?PHP //muat naik senarai pengguna baru
/* Rujukan 
https://www.php.net/manual/en/function.fgetcsv.php
https://www.php.net/manual/en/reserved.variables.files.php
https://stackoverflow.com/questions/37008227/what-is-the-difference-between-name-and-tmp-name
https://www.w3schools.com/php/php_file_upload.asp */

include('webdb.php');//masukkan rujukan pangkalan data

//terima data 
session_start();//log masuk berjalan
$id = $_SESSION['id'];

if(!isset($_SESSION['id']))//jika sesi log masuk tidak ada, href index (log keluar)
{
header("Location: index.php"); 
} 


if (isset($_POST['btn-upload'])) //terima data dri butang
{
	$namafailsementara = $_FILES["file"]["tmp_name"]; //pembolehubah fail sementara
    $namafail = $_FILES['file']['name']; //pembolehubah fail sebenar
    $jenisfail = pathinfo($namafail, PATHINFO_EXTENSION); //lihat jenis fail
    if($_FILES["file"]["size"] > 0 AND $jenisfail == "csv") //jika fail wujud & jenis fail ialah csv
	{
		   $faildiupload = fopen($namafailsementara, "r"); //buka fail sementara & baca
           $counter = 1; //nombor baris
           while(($getData = fgetcsv($faildiupload, 10000,",")) !== FALSE) //baca fail bermula huruf 1st, limit panjang, separator ',' 
           {       
		    if($counter > 1) //jika baris ada data
            {    //buat sambungan ke pangkalan data & masukkan data pengguna
				$result = mysqli_query($conntodb,"INSERT INTO tbl_pengguna (idpengguna, nama, katalaluan, masa, nilai, jenispengguna, ic) VALUES ('$getData[0]','$getData[1]','$getData[2]','$getData[3]','$getData[4]','$getData[5]','$getData[6]')");
				 
				//periksa data yg baru masuk
                if($result >= 1)
                {   //jika result ada,file berjaya dimuat naik
                    ?>
					<script language="javascript">
					alert("Muat naik maklumat pengguna berjaya");
					window.location.href = "adminPENGGUNAsenarai.php";
					</script>
        			<?php
                }
                else
                {   //jika result tidak ada,tidak dapat muat naik
                    ?>  
					<script language="javascript">
					alert("Maaf. Muat naik maklumat pengguna tidak berjaya");
					window.location.href = "adminUPLOADpengguna.php";
					</script>
        			<?php  
                }
                
             } $counter++; //pergi ke baris baru
           }
	fclose($faildiupload); //tutup fail sementara
	}
	   else
        ?>
		<script language="javascript">
		alert("Maaf. Hanya fail berformat CSV sahaja dibenarkan");
		</script>
        <?php
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
<br>
<div align="center" class="tajuk">MUAT NAIK<br />SENARAI PENGGUNA BARU</div>
<br>

<!--form jenis hantar fail-->
<form method='POST' action='adminUPLOADpengguna.php' enctype='multipart/form-data'> 
<!--table dalam td-->
<table bgcolor="white" align="center">
<tr>
<td><div align="center" class="teksdata">Sila pilih fail CSV anda</div></td>
</tr>
<tr>
<td>

<hr /><!--garisan melintang-->

<input type='file' name='file' class="buttonbaru" required/><button type='submit' name='btn-upload' class="buttonbaru">Simpan</button>
</td>
</tr>
</table>
</form>

</div><!-- card berakhir -->
</td>		
</tr>
</table><!--tamat table luar-->

</body>
<?php mysqli_close($conntodb); ?><!--tutup sambungan pangkalan data-->
</html>