<?php //kosongkan pembolehubah sesi


//terima data 
session_start();//log masuk berjalan
$_SESSION['id'] = NULL;
$_SESSION['jenispengguna'] = NULL;
$_SESSION['nama'] = NULL;
$_SESSION['width'] = NULL;
unset($_SESSION['id']);
unset($_SESSION['jenispengguna']);
unset($_SESSION['nama']);
unset($_SESSION['width']);

session_destroy();//tutup sesi

?>

<script language="javascript">
    top.location.href = "logoutREDIRECT.php"; 
</script>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1" name="viewport" /><!--viewport phone-->
<title>Untitled Document</title>
</head>
<body>
</body>
</html>