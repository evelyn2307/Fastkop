<?php //sahkan log masuk & set pembolehubah sesi

include('webdb.php');//masukkan rujukan pangkalan data

$loginid = $_POST['id']; // terima masa log masuk
$loginkatalaluan = $_POST['katalaluan']; // terima masa log masuk


//buat sambungan ke pangkalan data & ambil data pengguna berdasarkan idpengguna & kata laluan yg "casesensitive"
$login = mysqli_query($conntodb,"SELECT idpengguna, jenispengguna, nama FROM tbl_pengguna WHERE idpengguna = '$loginid' AND BINARY katalaluan = BINARY '$loginkatalaluan'");

if(mysqli_num_rows($login) == 1) //if jumpa
{
session_start(); //sesi log masuk bermula

$row = mysqli_fetch_array($login); //jadikan tatasusunan
$_SESSION['id'] = $row['idpengguna'];//idpengguna menjadi pembolehubah sesi
$_SESSION['jenispengguna'] = $row['jenispengguna'];//jenispengguna menjadi pembolehubah sesi
$_SESSION['nama'] = $row['nama'];//nama menjadi pembolehubah sesi

mysqli_close($conntodb); //tutup sambungan pangkalan data
?>

<script language="javascript">
		top.location.href = "loginREDIRECT.php";
</script>

<?php

}
else
{

mysqli_close($conntodb); //tutup sambungan pangkalan data
?>

<script language="javascript">
    	alert("Maaf. Sila masukkan ID DELIMa KPM dan katalaluan yang betul atau daftar pengguna baru");
    	top.location.href = "login.php"; 
</script>

<?php

}

?>