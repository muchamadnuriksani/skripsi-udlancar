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


<?
$jp = new jcore();
if($_REQUEST[idkota]!=''){
	$sumber1 = ROOT.'/server/apiadmin.php/biayakirim/kota/'.$_REQUEST[idkota].'/1';
	$konten1 = file_get_contents($sumber1);
	$row1 = json_decode($konten1, true);

}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<script>
function ConfirmDel(id){
	if(confirm('Hapus..?')){
		window.location="proses.php?page=biayakirim&action=delete&kota="+id;
	}
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
<table width="100%" border="0" cellpadding="0" cellspacing="2" >
  <tr>
    <td>
	<form name="fuser" method="post" action="proses.php?page=biayakirim&action=input" onSubmit="return cekSubmit()">
	<table width="100%" border="0" cellpadding="2" cellspacing="0">
      <tr>
        <td colspan="3" align="left"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            
            <td width="95%" class="tdmenu">DATA BIAYA KIRIM</td>
          </tr>
        </table></td>
      </tr>
      <tr align="left" valign="top">
        <td width="10%">Kota </td>
        <td width="1%">:</td>
        <td width="89%"><input name="kota" type="text" id="kota" value="<?=$row1[0][kota]?>"></td>
      </tr>
      <tr align="left" valign="top">
        <td>Biaya</td>
        <td>:</td>
        <td><input name="biaya" type="text" id="biaya" value="<?=$row1[0][biaya]?>">
		</td>
      </tr>
      <tr align="left" valign="top">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input name="Submit" type="submit"class="btn btn-primary" value="Simpan">
          <input name="Submit2" type="reset"  class="btn btn-success" value="Batal"  onclick="window.location='index.php?page=biayakirim'">
		  </td>
      </tr>
    </table>
	</FORM>
	
      <table id="example2" class="table table-bordered table-striped" width="50%">
 <thead style="background:#3F84C9; color:white; font-weight: bold;">
        <tr align="center">
          <th width="30" align="center" bgcolor="#870015"><span class="style1">NO</span></th>
          <th width="250" bgcolor="#870015"><span class="style1">KOTA</span></th>
          <th width="156" bgcolor="#870015"><span class="style1">BIAYA KIRIM </span></th>
          <th width="85" bgcolor="#870015"><span class="style1">PROSES</span></th>
        </tr>
        </thead>
		<?php
		 $sumber = ROOT.'/server/apiadmin.php/biayakirim';
  		 $konten = file_get_contents($sumber);
		$row = json_decode($konten, true);	
		 for($n=0; $n < count($row); $n++)
  {
		if ($n%2==0)
	   {$c = "info";}
	   else
	   {$c = "danger";}
#		$bgg=(($n%2)>0)?"#BEBEBE":"#CCCCCC";
		?>
        <tr valign="top" class="<?=$c?>">
          <td width="30" align="right"><span class="style2"><?=$n+1?></span></td>
          <td width="250"><span class="style2"><?=$row[$n]["kota"]?></span></td>
          <td width="156" align="right"><span class="style2"><?=$jp->pt($row[$n]["biaya"])?></span></td>
          <td>
		  <a href="index.php?page=biayakirim&idkota=<?=$row[$n][kota]?>">
		  <img src="../images/edit.png" width="32" height="32" border="0" title="Edit" /></a> 
		  <a href="#" onclick="return ConfirmDel('<?=$row[$n][kota]?>')"> 
		  <img src="../images/remove.png" width="32" height="32" border="0" title="Hapus" /> 
		  </a>
		  </td>
        </tr>
		<? 
		} 
		?>

</table>
</body>
</html>
