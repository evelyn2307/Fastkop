<!--navigasi pengguna-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1" name="viewport" /><!--viewport phone-->
<title>fastkop</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--rujukan https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_dropdown_navbar-->
<style>
/*nama koperasi*/
marquee {
  font-size: 12px;
  font-weight: bold;
}

/*letak warna background dan jenis font yang digunakan*/
body {
  background-color: #FADBD8;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

/*"automatik enable scrolling" jika teks terlalu banyak*/
.topnav {
  overflow: hidden;
  background-color: #191970;
}

/*set format "topnav"*/
.topnav a {
  float: left;
  display: block;
  color:  #FF7F50;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 16px;
}

/*set posisi dropdown ke kiri*/
.dropdown {
  float: left;
  overflow: hidden;
}

/*set format butang dropdown*/
.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: #FF7F50;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

/*format mouse ketika hover*/
.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #4169E1;
  color: white;
  cursor: pointer;
}

/* set format dropdown */
.dropdown-content {
  display: none;
  position: absolute;
  background-color:#191970;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* set format elemen dalam dropdown */
.dropdown-content a {
  float: none;
  color:  #FF7F50;
  padding: 14px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

/*format elemen dropdown ketika hover*/
.dropdown-content a:hover {
  background-color:#4169E1;
}

/*set dropdown kotak */
.dropdown:hover .dropdown-content {
  display: block;
}

/* lebar skrin besar, menubar akan berubah kedudukan */
@media screen and (min-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav a { font-size: 17px; }
  .dropdown .dropbtn { font-size: 17px; }
}
</style>
</head>


<body>
<?php include 'bannerSLIDER.php';?><!--masukkan banner-->

<div class="header">
<br /><marquee behavior="scroll" scrollamount="4" bgcolor="white" direction="left" style="font-style:bold">Koperasi SMK Dato' Bentara Luar Berhad : "Tempat terbaik untuk membeli" : Semua gambar adalah bukan hak milik Fastkop dan dicatat dalam Rujukan</marquee>
</div>

<div class="topnav">
	<a href="belianSENARAI.php"><i class="fa fa-shopping-cart"></i> Senarai Belian</a> <!--pergi ke belian senarai-->
	<a href="itemSENARAI.php"><i class="fa fa-list-ol"></i> Produk</a> <!--pergi ke item senarai-->
    <a href="bakul.php"><i class="fa fa-shopping-basket"></i> Bakul</a>  <!--pergi ke bakul-->
	<a href="penggunaKEMASKINI.php"><i class="fa fa-cog"></i> Tukar Kata Laluan</a> <!--pergi ke pengguna kemaskini-->
   <div class="dropdown">  
      <button class="dropbtn"><i class="fa fa-question-circle-o"></i> Bantuan <!--butang dropdown-->
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="manualPENGGUNAvideo.php"><i class="fa fa-file-video-o"></i> Video Manual Pengguna</a> <!--pergi video manual pengguna-->
      <a href="dokumen/manualPENGGUNApelanggan.pdf" target="_blank"><i class="fa fa-address-book"></i> Manual Pengguna</a> <!--pergi manual pengguna-->
      <a href="dokumen/soalanLAZIM.pdf" target="_blank"><i class="fa fa-wpforms"></i> Soalan Lazim</a> <!--pergi soalan lazim-->
      <a href="dokumen/rujukan.pdf" target="_blank"><i class="fa fa-photo"></i> Rujukan Gambar</a> <!--pergi manual pengguna-->
    </div>
  </div>       
  <a href="logoutPRO.php" target="_top" onclick="return confirm('Adakah anda mahu log keluar ?')"> <!--confirm box-->
  <i class="fa fa-sign-out"></i> Log keluar</a>
</div>

</body>
</html>