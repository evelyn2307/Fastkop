<!DOCTYPE html>
<html>
<head>
<meta content="width=device-width, initial-scale=1" name="viewport" /><!--viewport phone-->
<!--rujukan slider https://www.w3schools.com/howto/howto_js_slideshow.asp-->

<style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* format tapak slideshow */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* teks caption */
.text {
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
.active {
  background-color: #FF7F50;
}

/* animasi fade */
.fade {
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

<div class="slideshow-container" align="center"><!--nama koop bermula-->

<div class="mySlides fade">
  <img src="gambar/fastkop.png" >
</div>

<div class="mySlides fade">
  <img src="gambar/fastkop2.png">
</div>

</div>

<div style="text-align:center">
  <span class="blink"></span> 
  <span class="blink"></span>  
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var blinks = document.getElementsByClassName("blink");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < blinks.length; i++) {
    blinks[i].className = blinks[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  blinks[slideIndex-1].className += " active";
  setTimeout(showSlides, 750); // Change image every 1/2 seconds
}
</script>

</body>
</html> 