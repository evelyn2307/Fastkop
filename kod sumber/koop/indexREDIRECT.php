<?php //bina pembolehubah sesi lebar skrin

//terima data 
session_start();//log masuk berjalan
$_SESSION['width'] = $_GET['width'];

?>

<script language="javascript">
		top.location.href = "welcome.php";
</script>