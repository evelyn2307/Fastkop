<?php //tentukan jenis pengguna

include('webdb.php'); //masukkan rujukan pangkalan data

//terima data 
session_start();//log masuk berjalan
$id = $_SESSION['id'];
$jenis = $_SESSION['jenispengguna'];
$nama = $_SESSION['nama'];

?>

<?php 
if ($jenis == "1") //jika jenispengguna == 1
{ 
?>

<script language="javascript">
	alert("Selamat bertugas");
	top.location.href = "adminBELIANsenarai.php";
</script>

<?php 
} 
else
{  
?>

<script language="javascript">
	alert("Selamat datang "+ "<?php echo $nama ?>");
	top.location.href = "itemSENARAI.php";
</script>

<?php 

} 

?>