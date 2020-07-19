<?php
session_start();
include '../includes/lib.inc.php';
include APP_ROOT."/includes/class.inc.php";
$jp = new jcore();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Laporan Penjualan</title>
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
    <td height="33" colspan="7">LAPORAN PENJUALAN </td>
  </tr>
  <tr class="mn">
    <th width="31">No.</th>
    <th width="151">NO TRANSAKSI </th>
    <th width="72">TANGGAL </th>
    <th width="342">DETAIL TRANSAKSI</th>
    <th width="140">PELANGGAN</th>
    <th width="121">KEKURANGAN</th>
	<th width="193">KONFIRMASI</th>
  </tr>
  </thead>
  <?php
	$sumber = ROOT.'/server/apiadmin.php/jual/'.$_POST[tgl].'/'.$_POST[tgl1].'/1';
	//echo $sumber;
	$konten = file_get_contents($sumber);
	$row = json_decode($konten, true);
    for($n=0; $n < count($row); $n++)
  { 

  
   $rb=$jp->sql("select a.kdbrg,a.jml,a.tgkirim,b.nmbrg,b.harga, (b.berat/1000*a.jml*d.biaya) AS bykirim, a.diskon as disko, (hrg-(hrg*a.diskon/100)) as disk, (hrg*a.diskon/100*jml) as disk1, (biaya*CEILING(jml*berat/1000))   as ko "
   ." from transaksi a left join barang b on a.kdbrg=b.kdbrg inner join pelanggan c on a.idplg=c.idplg inner join biayakirim d on a.kota=d.kota "
  ."  where notransaksi='".$row[$n][notransaksi]."' group by a.kdbrg"); 
  $r1 = $jp->sql("select SUM(bayar) as byrr from konfirm where notransaksi='".$row[$n][notransaksi]."'");
  $o1=$jp->fetch($r1);

  ?>
  <tr align="left" valign="top" bgcolor="#FFFFFF">
    <td width="31"><?=$n+1?></td>
    <td width="151" align="center"><strong>
      <?=$row[$n][notransaksi]?>
    </strong></td>
    <td width="72" align="center"><?=$jp->todate($row[$n][tgorder])?></td>
    <td width="342"><span class="style20">
		<table border="1" cellpadding="1" cellspacing="1">
		  <? $nx=0; 
		   $d=0;
		    $kirim=0;
           $berattotal=0;
           $biayatotal=0;
		  $jum=0;
		  while($ob=$jp->fetch($rb)) { $nx++; 
           $berattotal +=($ob[berat]) * ($ob[jml]);
           $biayatotal += ($ob[harga]) * ($ob[jml]);
           $subtot = intval($ob[jml])*doubleval($ob[disk]);
		   $jum=$jum+intval($ob[jml]);
		   $d=$d+doubleval($ob[disk1]);
		    $kirim=$kirim+doubleval($ob[ko]);
		   $bykirim=doubleval($ob[bykirim]);
		    
			  
		   ?>
		  <tr align="left" valign="top">
			<td><?=$nx?>.</td>
			<td><?=$ob[kdbrg]." ".$ob[jenis]." ".strtoupper($ob[nmbrg])." Rp. ".$jp->pt($ob[harga])?></td>
			<td><b>jml :</b> <?=$ob[jml]?> Buah</td>
			<td><b>Biaya Kirim :</b> <?=$jp->pt($kirim)?> </td>
			<? /*
			
			<td><b>Total Biaya :</b> <?=$jp->pt($ob[bykirim]+$ob[harga]*$ob[jml])?> </td>
			*/ ?>
		  </tr>
		  <? } ?>
		  
		  
		    <tr bgcolor="#CCFF00">
			
          <td colspan="3">
		  
		  <span class="style6">Total Sebelum Diskon : </span></td>
		   <td align="right"><span class="style6">&nbsp;
		   <?=$jp->pt($biayatotal)?>			
			
		   </span></td>
		  
        </tr>
		
		  
		   <tr bgcolor="#CCFF00">
			
          <td colspan="3">
		  
		  <span class="style6">Diskon : </span></td>
		   <td align="right"><span class="style6">&nbsp;
		   <?=$jp->pt($diskon+$d)?>
			
			
		   </span></td>
		  
        </tr>
        
		
		   <tr bgcolor="#CCFF00">
			
          <td colspan="3">
		  
		  <span class="style6">Grand Total : </span></td>
		   <td align="right"><span class="style6">&nbsp;
		 <?=$jp->pt($biayatotal - $d + ($kirim))?> 
			
			
			
		   </span></td>
		  
        </tr>
	</table>	</span></td>
  <td width="140" align="center">
	<table width="95%" border="0" cellpadding="1" cellspacing="1"  style="border-collapse:collapse">
	  <tr align="center" valign="top">
		<td colspan="3"><strong>
		<?=($row[$n][nama])?><br>
		<i>login :</i> &nbsp;<?=$row[$n][idplg]?><br>
		<?=($row[$n][alamat])?> <?=($row[$n][kota])?>
<br>
<i> Telepon </i>
<br>
	<?=($o[telepon])?> 
		</strong></td>
		</tr>
	</table>	</td>
     <?php if ($o1[byrr]<($biayatotal - $d + ($kirim)-$diskon) ) 
			 {$z = "red"; } 
			 else if ($o1[byrr]>($biayatotal - $d + ($kirim)-$diskon) )
				 {$z = "green"; } 	 
					 else
					  {$z = "";
			 		 } 
					 ?>
    <td width="121" align="center" bgcolor="<?=$z?>">
	<table width="95%" border="0" cellpadding="1" cellspacing="1" style="border-collapse:collapse">
	  <tr align="center" valign="top" >
		<td colspan="3">
		<strong>
        <? if ($o1[byrr] > ($biayatotal - $d + ($kirim)-$diskon) )
		{ echo'+';
		  
		} ?>
		<?=$jp->pt($o1[byrr]-($biayatotal - $d + ($kirim)-$diskon))?>
		</strong></td>
		</tr>
	</table></td>
	 
  <td width="193"><span class="style20">
		<table border="1" cellpadding="1" cellspacing="1">
		  <? 
		  $r2 = $jp->sql("select isi from konfirm where notransaksi='".$row[$n][notransaksi]."'");
		  $ny=0; while($oc=$jp->fetch($r2)) { $ny++; 
		  	?>
		  <tr align="left" valign="top">
			<td><?=$ny?>.</td>
			<td><?=$oc[isi]?></td>
		  </tr>
		  <? } ?>
	</table>	</span></td>
  
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
         (..........................)</strong></td>
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
