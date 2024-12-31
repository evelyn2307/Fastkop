<?php //paparan utama
/*rujukan
https://programmablesearchengine.google.com/cse/create/new
https://app.smartsupp.com/app/sign/in?redirect=upur7&err=login_required
https://www.unitag.io/qrcode/widget
https://www.booked.net/widgets/clock*/


session_start();//sesi berjalan
$screenwidth = $_SESSION['width'];

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
<br />
<?php include 'linkINDEX.php';?><!--masukkan navigasi-->

<table align="center" bgcolor="white">

<tr>

<!--logo sdbl-->
<td><img src="gambar/logoSDBL.gif" height="100" width="75"/></td>

<td>
<!-- jam -->
<script type="text/javascript"> var css_file=document.createElement("link"); css_file.setAttribute("rel","stylesheet"); css_file.setAttribute("type","text/css"); css_file.setAttribute("href","//s.bookcdn.com//css/cl/bw-cl-c22.css?v=0.0.1"); document.getElementsByTagName("head")[0].appendChild(css_file); </script> <div id="tw_22_1860188511"><div style="width:200px; height:px; margin: 0 auto;"><a href="https://booked.net/time/kuala-lumpur-18397">Kuala Lumpur</a><br/></div></div> <script type="text/javascript"> function setWidgetData_1860188511(data){ if(typeof(data) != 'undefined' && data.results.length > 0) { for(var i = 0; i < data.results.length; ++i) { var objMainBlock = ''; var params = data.results[i]; objMainBlock = document.getElementById('tw_'+params.widget_type+'_'+params.widget_id); if(objMainBlock !== null) objMainBlock.innerHTML = params.html_code; } } } var clock_timer_1860188511 = -1; widgetSrc = "https://widgets.booked.net/time/info?ver=2;domid=209;type=22;id=1860188511;scode=2;city_id=18397;wlangid=1;mode=1;details=0;background=ffffff;border_color=ffffff;color=686868;add_background=ffffff;add_color=333333;head_color=ffffff;border=0;transparent=0"; var widgetUrl = location.href; widgetSrc += '&ref=' + widgetUrl; var wstrackId = ""; if (wstrackId) { widgetSrc += ';wstrackId=' + wstrackId + ';' } var timeBookedScript = document.createElement("script"); timeBookedScript.setAttribute("type", "text/javascript"); timeBookedScript.src = widgetSrc; document.body.appendChild(timeBookedScript); </script>
</td>

<td>
<!--hantar emel-->
<br />
<div align="center" class="teks"><strong>E-mel kami</strong></div>
<div align="center"><a href="mailto:g-67003752@moe-dl.edu.my"><img src="gambar/email.gif" height="100" width="150"/></a></div>
</td>

</tr>


<tr>

<td align = "center" colspan="2"><!--gabung 2 kolum-->
<?php include 'bannerSLIDERitem.php';?><!--masukkan slide item-->
</td>

<td><div align="center" class="teks"><strong>Imbas Facebook SDBL</strong></div>
<!--qrcode-->
<div align="center">
<a href='https://www.unitag.io/qrcode'><img src='https://www.unitag.io/qreator/generate?crs=Ppv8rOENN3V1lAwTz82zPjZwLeh11CXT8n%252BHMzWMdvUb%252BsqQ%252Foeme7xO4uqEGrEi%252BxW5iqNd2m6BJfQ4t8qAxG08F4hW%252BV1ZfxiLStSNLar%252F8iHVGl0%252FCgVhhiOs3h5wRiVdXhc3W2WMyNwAtlQXuRnlc8nzNvuVLVjCs3TOxxOXr%252FAV8kndseXewv3xWjRSAw7bXEJco2fjyH8X07y69hlZxcZm8P%252BOz0qArwG1mupktwDWfWwavaj2tSLlsg%252FjvxvxTBIl4ZZS6fGG6mfRXLYcseB%252BV6X4DuN5hV1VevRBBFEFN%252BfWCDkDR1BBPwmf2aAbBf7NXEP3v7Yor%252BzN5M%252BQ0Ia8JyWtyLJYnUMUee8Z8hYUE0DgSN3M7%252B1GBEugN0HJ%252FSaLcuRshsE8E9DleEgN6fCVxNXwcPlqJJojfVM%253D&crd=fhOysE0g3Bah%252BuqXA7NPQyDG6sTW2IXPNi%252BspXIYvySf3QLEryKupenS5xRMvnOFNkzKFI%252B1XBOSrCwt0G3eDBDMqBPVkx%252F6zQc%252FDYkv%252FV0%253D' alt='QR Code' height="170" width="150"/></a>
</div>
</td>

</tr>


<tr>

<td colspan="3"><!--gabung 3 kolum-->
<!--enjin carian-->
<script async src="https://cse.google.com/cse.js?cx=c7f8b7f43f885fd37"></script>
<div class="gcse-search"></div>
</td>

</tr>
</table>


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