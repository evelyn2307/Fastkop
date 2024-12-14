<!DOCTYPE html>
<html>
<head>
<meta content="width=device-width, initial-scale=1" name="viewport" /><!--viewport phone-->
<!--rujukan slider https://www.w3schools.com/howto/howto_js_slideshow.asp-->

<style>
.gambaritem {
	height: 250px;
	width: 175px;
}

* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlidesitem {display: none;}
img {vertical-align: middle;}

/* format tapak slideshow */
.slideshow-containeritem {
  max-width: 500px;
  position: relative;
  margin: auto;
}

/* teks caption */
.textitem {
  color: white;
  font-size: 18px;
  font-weight: bold;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
  text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
}

/* warna "blink" */
.activeitem {
  background-color: #FF7F50;
}

/* animasi fade */
.fadeitem {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

/* perubahan fade browser versi lama */
@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* perubahan fade browser "updated" */
@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* lebar skrin kecil, size jadi kecil */
@media only screen and (max-width: 720px) {
  .text {font-size: 11px}
}
</style>
</head>
<body>

<div class="slideshow-containeritem" align="center"><!--slideshow mula-->

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/airmineral.jpg" >
  <div class="textitem">Air mineral</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/biskutcheese.jpg">
  <div class="textitem">Biskut keju</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/biskutchocolate.jpg">
  <div class="textitem">Biskut coklat</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/crayon.jpg" >
  <div class="textitem">Krayon</div>
</div>

<div class="mySlidesitem fade">
  <img class="gambaritem" src="gambar/chocolatemilk.jpg">
  <div class="textitem">Susu coklat</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/originalmilk.jpg" >
  <div class="textitem">Susu penuh krim</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/strawberrymilk.jpg" >
  <div class="textitem">Susu strawberi</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/correctiontape.jpg" >
  <div class="textitem">Pita pemadam</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/file.jpg" >
  <div class="textitem">Fail dokumen A4</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/gam.jpg" >
  <div class="textitem">Gam</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/highlighter.jpg" >
  <div class="textitem">Pen penyerlah</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/jangkalukis.jpg" >
  <div class="textitem">Jangka lukis</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/tehbunga.jpg" >
  <div class="textitem">Teh bunga</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/jangkasudut.jpg" >
  <div class="textitem">Jangka sudut</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/jusanggur.jpg" >
  <div class="textitem">Jus anggur</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/marker.jpg" >
  <div class="textitem">Pen marker</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/oreo.jpg" >
  <div class="textitem">Biskut krim vanila</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/oreochocolate.jpg" >
  <div class="textitem">Biskut krim coklat</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/pemadamsteadler.jpg" >
  <div class="textitem">Pemadam pensel</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/penbiru.jpg" >
  <div class="textitem">Pen biru 0.5</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/penbirustabilo.jpg" >
  <div class="textitem">Pen biru 0.7</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/penhitam.jpg" >
  <div class="textitem">Pen hitam 0.5</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/penhitamstabilo.jpg" >
  <div class="textitem">Pen hitam 0.7</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/penmerah.jpg" >
  <div class="textitem">Pen merah 0.5</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/penmerahstabilo.jpg" >
  <div class="textitem">Pen merah 0.7</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/a4.jpg" >
  <div class="textitem">Kertas A4</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/pensil.jpg" >
  <div class="textitem">Pensel</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/pockychocolate.jpg" >
  <div class="textitem">Stik coklat</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/pockystrawberry.jpg" >
  <div class="textitem">Stik strawberi</div>
</div>

<div class="mySlidesitem fadeitem">
  <img class="gambaritem" src="gambar/posterwarna.jpg" >
  <div class="textitem">Cat air</div>
</div>

</div><!--slideshow mula-->


<div style="text-align:center">
  <span class="kelipitem"></span> 
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
  <span class="kelipitem"></span>
</div>


<script>
var slideIndexitem = 0;
showSlidesitem();

function showSlidesitem() {
  var i;
  var slidesitem = document.getElementsByClassName("mySlidesitem");
  var kelips = document.getElementsByClassName("kelipitem");
  
  for (i = 0; i < slidesitem.length; i++) {
    slidesitem[i].style.display = "none";  
  }
  
  slideIndexitem++;
  if (slideIndexitem > slidesitem.length) 
  {slideIndexitem = 1}
  
  for (i = 0; i < kelips.length; i++) {
    kelips[i].className = kelips[i].className.replace(" activeitem", "");
  }
  
  slidesitem[slideIndexitem-1].style.display = "block";  
  kelips[slideIndexitem-1].className += " activeitem";
  setTimeout(showSlidesitem, 1500); // Change image every 1/2 seconds
  
}
</script>

</body>
</html> 