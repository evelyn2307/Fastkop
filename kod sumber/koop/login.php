<?php //form untuk log masuk
//rujukan https://www.counters-free.net/

//terima data 
session_start();//sesi berjalan
$screenwidth = $_SESSION['width'];// terima lebar skrin dari index

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
</head>

<body>
<?php include 'linkINDEX.php';?><!--masukkan navigasi-->

<table align="center"><!--table luar-->
<tr>

<td colspan="2"><!--gabung 2 kolum-->
<div class="kadbesar"><!--card bermula-->
<br />
<div align="center" class="tajuk">LOG MASUK</div>
<br />
	
	<form method="POST" action="loginPRO.php">
    <!--table dalam td-->
	<table align="center" bgcolor="white" width="100%">
		<tr><td align="center"><div class="teks">ID DELIMa KPM</div></td></tr>
		<tr><td align="center"><input type="text" name="id" id="username" placeholder="m-xxxxxx@moe-dl.edu.my" /></td></tr>
		
		<tr><td align="center"><div class="teks">Kata laluan</div></td></tr>
		<tr><td align="center"><input type="password" name="katalaluan" id="password"/></td></tr>
		
		<tr>
        <td colspan="3">
        <br />
        
        <hr /><!--garisan melintang-->
        <div align="center"><input type="submit" name="button" id="button" value="Log masuk" class="buttonbaru"/></div>
        
        </td>
        </tr>
	</table><!--tamat table dalam-->
	</form>
</div><!-- card berakhir -->
</td>		

</tr>
<tr bgcolor="white">

<td>
<!--statistik-->
<div align="center">
<script type="text/javascript" src="https://www.counters-free.net/count/8xgx"></script><br>
</div>
</td>

<td>
<p align="center" class="teks">Anda pengguna baharu ?</p>
<p align="center" class="teks">Sila daftar terlebih dahulu</p>

<hr /><!--garisan melintang-->

<p align="center"><a href="penggunaTAMBAH.php"><button type="button" class="buttonbaru">Daftar pengguna baharu</button></a>&nbsp;</p>
</td>

</tr>
</table><!--tamat table luar-->


<!-- Smartsupp Live Chat script -->
<div>
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'd287b56df46e7f89658fa315127870651fb765a8';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
</div>

</body>
</html>