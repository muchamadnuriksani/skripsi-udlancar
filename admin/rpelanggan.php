<?php
session_start();
include '../includes/lib.inc.php';
include APP_ROOT."/includes/class.inc.php";
$jp = new jcore();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Laporan Pelanggan</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="css/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {
	font-size: 11px;
	font-weight: bold;
}
.style2 {
	font-size: 16px;
	color: #000000;
}
.style3 {color: #FFFFFF}
-->
</style>
</head>
<body>
<br>
<table id="example2" class="table table-bordered table-striped" width="60%" align="center">
 <thead style="background:#870015; color:white; font-weight: bold; text-align: center; font-family: 'Lucida Console', Monaco, monospace; font-size: 14px;">

  <tr class="mn">
    <td height="33" colspan="7" >LAPORAN PELANGGAN</td>
  </tr>
  <tr class="mn">
    <th width="50" align="center">No.</th>
    <th width="217" align="center">Nama Pelanggan <br> Email </th>
     <th width="108">Telepon</th>
    <th width="209">Alamat</th>
    

	
  
  </tr>
  </thead>
 <?php $sumber = ROOT.'/server/apiadmin.php/pelanggan';
     	$konten = file_get_contents($sumber);
		$row = json_decode($konten, true);	
		//echo $konten;
   for($n=0; $n < count($row); $n++)
  { ?>
  
  <tr align="left" valign="top" bgcolor="#FFFFFF">
    <td width="50" height="59" align="right"><?=$n+1?></td>
    <td width="217" align="justify"><strong>
      <?=$row[$n][nama]?><br>
	  <i><?=$row[$n][idplg]?></i>
	  
    </strong></td>
    <td width="108" align="justify"><?=$row[$n][telepon]?> </td>
    <td width="209" align="justify"><?=$row[$n][alamat]?> <?=$row[$n][kota]?></td>
	 
	
  </tr>
      
  <? } ?>
   <? $rb=$jp->sql("SELECT DATE_FORMAT(CURRENT_DATE,'%d-%m-%Y ') AS tanggal"); 
  $o=$jp->fetch($rb);
  ?>
  <thead>
   <tr align="left" valign="top"  bgcolor="#FFFFFF">
    <td colspan="6" align="right">      <table border="0" cellpadding="0" cellspacing="0">
     
	  <tr>
        <td align="center"><strong>Semarang, <?=$o[tanggal]?> <br>Pimpinan</strong></td>
      </tr>
      
      
      <tr>
        <td align="center">&nbsp;</td>
      </tr>
      <tr>
        <td align="center"><strong>
         (...........................)</strong></td>
      </tr>
    </table></td>
  </tr>
  </thead>
</table>

<script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> 
<link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<script src="plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
   
    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": false,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          "info": false,
          "autoWidth": true
        });
      });
    </script>
</body>

</html>

