<?php //papar video manual pengurus

//terima data 
session_start();//sesi berjalan
$screenwidth = $_SESSION['width'];// terima lebar skrin dari index

if(!isset($_SESSION['id']))//if sesi log masuk tidak ada, href index (log keluar)
{
header("Location: index.php"); 
} 

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1" name="viewport" /><!--viewport phone-->
<title>fastkop</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="deco.css"><!--masukkan fail css untuk guna class-->
<link rel="stylesheet" href="card.css"><!--masukkan fail css untuk guna class-->
<!--rujukan align video https://stackoverflow.com/questions/5879209/how-to-center-html5-videos/17528102-->
<!--rujukan video https://www.w3schools.com/tags/att_video_autoplay.asp-->

<style>
/* kedudukan video */
.videoalign { 
margin: 0 auto;
height : auto; 
width: 360px; 
}

/* lebar skrin besar, size jadi besar */
@media screen and (min-width: 719px) {
.videoalign {
width : 720px;
height : auto;
margin: 0 auto;
}
</style>
</head>

<body>
<?php include 'linkADMIN.php';?><!--masukkan navigasi-->

<table align="center"><!--table luar-->
<tr>

<td colspan="2"><!--gabung 2 kolum-->
<div class="kadbesar"><!--card bermula-->
<br />
<div align="center" class="tajuk">VIDEO MANUAL PENGURUS</div>
<br />
	
    <!--table dalam td-->
	<table align="center" bgcolor="white" width="100%">
	<video class="videoalign" controls autoplay muted>
  	<source src="video/manualPENGURUS.mp4" type="video/mp4">
	</video>
	</table><!--tamat table dalam-->
</div><!-- card berakhir -->
</td>		

</tr>
</table><!--tamat table luar-->

</body>
</html>