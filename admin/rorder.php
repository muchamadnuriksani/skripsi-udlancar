<?php
session_start();
include '../includes/lib.inc.php';
include APP_ROOT."/includes/class.inc.php";
$jp = new jcore();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Laporan Pemesanan</title>
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
<table id="example2" class="table table-bordered table-striped" width="90%" align="center">
 <thead style="background:#870015; color:white; font-weight: bold; text-align: center; font-family: 'Lucida Console', Monaco, monospace; font-size: 14px;">



  <tr class="mn">
    <td height="33" colspan="7" >LAPORAN PEMESANAN </td>
  </tr>
  <tr class="mn">
    <th width="28">No.</th>
    <th width="134">NO TRANSAKSI </th>
    <th width="94">TANGGAL </th>
    <th width="548">DETAIL TRANSAKSI</th>
    <th width="102">PELANGGAN</th>
 

  </tr>
  </thead>
  <?php
  	$sumber = ROOT.'/server/apiadmin.php/transaksi/status/0/'.$_POST[tgl].'/'.$_POST[tgl1].'/1';
	//echo $sumber;
	$konten = file_get_contents($sumber);
	$row = json_decode('['.$konten.']', true);
    for($n=0; $n < count($row); $n++)
  { 
 
    $rb=$jp->sql("select a.kdbrg,a.jml,a.tgkirim,b.nmbrg,b.harga,a.kota,a.alamat "
   ." from transaksi a left join barang b on a.kdbrg=b.kdbrg "
  ."  where notransaksi='".$row[$n][notransaksi]."'"); ?>
  <tr align="left" valign="top" bgcolor="#FFFFFF">
    <td width="28"><?=$n+1?></td>
    <td width="134" align="center"><strong>
      <?=$row[$n][notransaksi]?>
    </strong></td>
    <td width="94" align="center"><?=$jp->todate($row[$n][tgorder])?></td>
    <td width="548">
		<table border="1" cellpadding="1" cellspacing="1">
		  <? $nx=0; while($ob=$jp->fetch($rb)) { $nx++; ?>
		  <tr align="left" valign="top">
			<td><?=$nx?>.</td>
			<td><?=$ob[kdbrg]." ".strtoupper($ob[nmbrg])." Rp. ".$jp->pt($ob[harga])?></td>
			<td><b>jml :</b> <?=$ob[jml]?> Buah</td>
			<td><b>Alamat Pengiriman:</b> <?=$ob[alamat]?> <?=$ob[kota]?> </td>
			
		  </tr>
		  <? } ?>
	</table>	</td>
    <td width="102" align="center">
	<table width="95%" border="0" cellpadding="1" cellspacing="1"  style="border-collapse:collapse">
	  <tr align="center" valign="top">
		<td colspan="3"><strong>
		<?=($row[$n][nama])?><br>
		<i>login :</i> &nbsp;<?=$row[$n][idplg]?><br>
		<br>
		</strong></td>
		</tr>
	</table>	</td>
   
	
  </tr>
  <? } ?>
   <? $rb=$jp->sql("SELECT DATE_FORMAT(CURRENT_DATE,'%d-%m-%Y ') AS tanggal"); 
  $o=$jp->fetch($rb);
  ?>
  <thead>
   <tr align="left" valign="top"  bgcolor="#FFFFFF">
    <td colspan="7" align="right">      <table border="0" cellpadding="0" cellspacing="0">
     
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
