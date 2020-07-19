<?php
session_start();
include '../includes/lib.inc.php';
include APP_ROOT."/includes/class.inc.php";
$jp = new jcore();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Laporan Barang</title>
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
<table id="example2" class="table table-bordered table-striped" width="80%" align="center">
 <thead style="background:#870015; color:white; font-weight: bold; text-align: center; font-family: 'Lucida Console', Monaco, monospace; font-size: 14px;">
  <tr class="mn">
    <td height="33" colspan="12">LAPORAN BARANG</td>
  </tr>
  <tr class="mn">
    <th width="34">No.</th>
    <th width="139">KODE BARANG </th>
    <th width="366">NAMA BARANG </th>
    <th width="164">KATEGORI</th>
    <th width="116">HARGA</th>
    <th width="81">STOK</th>
	<th width="134">PIC</th>
	 
  </tr>
  </thead>

   <?php $sumber = ROOT.'/server/apiadmin.php/barang';
     	$konten = file_get_contents($sumber);
		$row = json_decode($konten, true);	
		//echo $konten;
   for($n=0; $n < count($row); $n++)
  { ?>
  
  <tr align="left" valign="top" bgcolor="#FFFFFF">
    <td width="34" height="59" align="right"><?=$n+1?></td>
    <td width="139" align="center"><strong>
      <?=$row[$n][kdbrg]?>
    </strong></td>
    <td width="366" align="center"><?=$row[$n][nmbrg]?></td>
    <td width="164" align="center"><?=$row[$n][nmkategori]?> </td>
    <td width="116" align="right"><?=$jp->pt($row[$n][harga])?> </td>
	 <td width="81" align="right"><?=$jp->pt($row[$n][stok])?> </td>
	 <td width="134" align="center" valign="top">
	<?php 
	if(file_exists("../uploaddir/small_".$row[$n][kdbrg].".jpg")){
		$file = "small_".$row[$n][kdbrg].".jpg";
	}else{
		$file = "nophoto.jpg";
	}
	?>
	<img src="../uploaddir/<?=$file?>" border="0" width="50" height="50" />
	</td>
	
  </tr>
  
  
  <? } ?>
  
  <? $rb=$jp->sql("SELECT DATE_FORMAT(CURRENT_DATE,'%d-%m-%Y ') AS tanggal"); 
  $o=$jp->fetch($rb);
  ?>
  <thead>
   <tr align="left" valign="top"  bgcolor="#FFFFFF">
    <td colspan="12" align="right">      <table border="0" cellpadding="0" cellspacing="0">
     
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