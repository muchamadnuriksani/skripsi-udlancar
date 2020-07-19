
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>::: <?=$title?> :::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script src="js/advviewer.js"></script>
<script>
//==============================SCRIPT TAMBAHAN UNTUK FILTER KEYBOARD======================================================
function numbersonly(e) {
    var unicode = e.charCode ? e.charCode : e.keyCode
    if ((unicode != 8) && (unicode != 13) && (unicode != 37) && (unicode != 39) && (unicode != 9)) { //if the key isn't the backspace key (which we should allow)
        if (unicode < 48 || unicode > 57) //if not a number
            return false //disable key press
    }
}
//===========================================================================================
function DoAjax(t){
	document.getElementById("DivAjax").innerHTML="<img src='../images/loading.gif'>";
	xajax_DoAjax(t);
	return false;
}


</script>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery-ui.js"></script>
<script type="text/javascript">
$(function(){
	$("#tgl").datepicker({dateFormat: 'yy-mm-dd' });	
	$("#tgl1").datepicker({dateFormat: 'yy-mm-dd' });	
})	
</script>
<link href="flora.datepicker.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/font-awesome.min.css" />

<style type="text/css">
<!--
.style12 {font-family: Georgia, "Times New Roman", Times, serif; font-size: 12px; }
.style14 {font-size: 16px; font-family: "Courier New", Courier, mono; color: #000000;  }
.style19 {font-size: 16px; font-family: "Courier New", Courier, mono; color: #000000; }
-->
</style>
</head>
<body>

<script src="js/gen_validatorv31.js" language="javascript"></script>
<form action="rjual.php" method="post" enctype="multipart/form-data" name="Form1" id="Form1" target="_blank">

 <table width="798" border="0" align="center" cellpadding="2" cellspacing="0">

     
    <tr>
      <td width="153"><span class="style19">Dari Tanggal</span></td>
      <td width="15" align="center"><span class="style19">:</span></td>
      <td width="618" ><input name="tgl" type="text" id="tgl" size="10" maxlength="10" value=""></td>
    </tr>
    <tr>
      <td><span class="style19">S/d Tanggal</span></td>
      <td align="center"><span class="style19">:</span></td>
      <td ><input name="tgl1" type="text" id="tgl1" size="10" maxlength="10" value=""></td>
    </tr>
		 
		 
		
    <tr>
      <td>&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td ><input type="submit" name="Submit" class="btn btn-primary" value="Cetak" >
          <input type="reset" name="Submit2" value="Batal" class="btn btn-success" onClick="window.location='index.php?page=cetakorder'"></td>
    </tr>
  </table>
</form>



</body>
</html>

