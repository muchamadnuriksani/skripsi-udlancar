<link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<script src="plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
   
    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
        });
      });
    </script>

<?php 

if($_REQUEST[kdkategori]!='')
{
	$sumber1 = ROOT.'/server/apiadmin.php/kategori/kdkategori/'.$_REQUEST[kdkategori].'/1';
	$konten1 = file_get_contents($sumber1);
	$row1 = json_decode('['.$konten1.']', true);
	$kode = $row1[0][kdkategori];
}
else
{
$kode = $jp->kdauto("kategori","K");	 	 
}

?>

 
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

function ConfirmDel(id){
	if(confirm('Hapus..?')){
		window.location="proses.php?page=kategori&action=delete&kdkategori="+id;
	}
}

function Confirm(id){
window.location="index.php?page=kategori&kdkategori="+id;
	
}


</script>


<link href="css/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {color: #FFFFFF;font-family:FontAwesome; font-size:12px}
.style2 {color: #000000;font-family:FontAwesome; font-size:12px;}
-->
</style>


</head>
<body>

<script src="js/gen_validatorv31.js" language="javascript"></script>
<form action="proses.php?page=kategori&action=input" method="post" enctype="multipart/form-data" name="Formkategori" id="Formkategori" >
<input name="id_edit" type="hidden" value="<?=$row1[0][kdkategori]?>">

<table width="834" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td height="33" colspan="5" class="tdmenu"> DATA KATEGORI</td>
    </tr>
  <tr>
    <td width="97">Kode Kategori </td>
    <td width="14" align="center">:</td>
    <td width="231">
    <input name="kdkategori" type="text" id="kdkategori" size="3" maxlength="3" value="<?=$kode?>" readonly>
    </td>
  </tr>
   <tr>
    <td>Nama Kategori </td>
    <td align="center">:</td>
    <td colspan="2"><input name="nama" type="text" id="nama" size="30" maxlength="30" value="<?=$row1[0][nmkategori]?>"></td>
    </tr>
   

  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td colspan="2"><input type="submit" name="Submit" class="btn btn-primary" value="Simpan" onclick="return doSubmit()">    <input type="reset" name="Submit2" value="Batal" class="btn btn-success" onClick="window.location='index.php?page=kategori'">


</td>
  <td width="3"></td>
    <td width="58">&nbsp;</td>
  </tr>
</table>

</form>

<table id="example2" class="table table-bordered table-striped" width="50%">
 <thead style="background:#f1b855; color:white; font-weight: bold;">
  <tr>
    <th width="64" align="center" valign="middle" bgcolor="#870015"><span class="style1">NO</span></th>
    <th width="74" valign="middle" bgcolor="#870015"><span class="style1">KODE</span></th>
    <th width="362" valign="middle" bgcolor="#870015"><span class="style1">KATEGORI</span></th>
    
    <th width="129" bgcolor="#870015"><span class="style1">PROSES</span></th>
    
  </tr>
  </thead>
   <?php 
   $sumber = ROOT.'/server/apiadmin.php/kategori';
   $konten = file_get_contents($sumber);
	$row = json_decode($konten, true);	
   
   for($n=0; $n < count($row); $n++)
  {
	if ($n%2==0)
	   {$c = "info";}
	   else
	   {$c = "danger";}
   ?>
  <tr class="<?=$c?>">
    <td width="64" align="right" valign="top"><span class="style2"><?=$n+1?>.</span></td>
    <td width="74" valign="top">
	<b><span class="style2"><?=$row[$n][kdkategori]?></span></b>
	
	</td>
    <td width="362" align="justify" valign="top"><span class="style2"><?=$row[$n][nmkategori]?></span></td>
   
		
		    <td width="129" align="center" valign="top">
	
	
	
	<a href="index.php?page=kategori&kdkategori=<?=$row[$n][kdkategori]?>&act=update">
	<img src="../images/edit.png" width="32" height="32" border="0" title="Edit" onClick="return Confirm('<?=$row[kdkategori]?>')"/></a>
	<a href="#" onclick="return ConfirmDel('<?=$row[$n][kdkategori]?>')">	 <img src="../images/remove.png" width="32" height="32" border="0" title="Hapus" /> </a></td>
  </tr>
  <?php } ?>
</table>





<script>
function doSubmit(){
    var v = new Validator("Formkategori");
	v.addValidation("kdkategori","req","Kode Kategori tidak boleh kosong");
	v.addValidation("nama","req","Nama Kategori tidak boleh kosong");
	
	}
</script>

</body>
</html>