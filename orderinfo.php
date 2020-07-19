<div class="col-sm-12 isotope-item women">
 <div class="login-form">
<style type="text/css">
<!--
.style3 {color: #FFFFFF}
-->
</style>

<?php
session_start();
if($_POST[notransaksi]!='')
{
	$jmldata = mysql_num_rows ($jp->sql("select * from transaksi where notransaksi='".$_POST[notransaksi]."'"));
	if ($jmldata==0)
	{
	echo "NOMOR TRANSAKSI INVALID";
		return;
	}
	$result = $jp->sql("select * from transaksi where notransaksi='".$_POST[notransaksi]."'");
	$oc = $jp->fetch($result);
	if($oc[notransaksi]!='')
	{
		$r1 = $jp->fetch($jp->sql("select count(*) as jml from transaksi where idplg='".$oc[idplg]."'"));
		
	
		$_SESSION['kode']=$oc[notransaksi];
		$_SESSION['idplg']=$oc[idplg];
	}
?>

	
<style type="text/css">
<!--
.style4 {color: #FF0000}
-->
.style3 {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 14px;
}
</style>

<table width="100%" border="0" cellpadding="0" cellspacing="0" >


<?php 
$jp = new jcore();
$result = $jp->sql("select a.*,b.nama,b.telepon,c.* from transaksi a inner join pelanggan b inner join barang c 
on c.kdbrg=a.kdbrg where a.notransaksi='".$_SESSION['kode']."' AND a.idplg=b.idplg");
$row=$jp->fetch($result)
?> 		
 
<br>
<br>Yth. Sdr/i. <?=$row[nama]?>
<br>-----------------------------------------------------------
<br>Email		: <?=$row[idplg]?>
<br>-----------------------------------------------------------
<br>HP/Telp.	: <?=$row[telepon]?>
<br>-----------------------------------------------------------
<br>
Pesanan barang di <b>Lancar Undangan<b> <br>
<br>-----------------------------------------------------------
<br>

ID Pesanan. <?=$row[notransaksi]?>
<span class="style4"> Status</span> : <?php 
 if ($row[status]==1)
 {
 echo "[ <span class='style4'><strong>";
 echo "TERKIRIM";
 echo "</strong></span> ] <br>";
 echo "No Resi Pengiriman : ";
  echo "<span class='style4'>$row[noresi]</span> <br> Silahkan Anda Tracking Ke JNE untuk mengecek barang pesanan anda";
 
 }
 else
 {
 echo "[ <span class='style4'><strong>";
 echo "ORDER";
 echo "</strong></span> ]";
 }
 ?><br>
 
     <table border="1" cellpadding="2" cellspacing="2" bgcolor="#FFFFFF" class="table-std" width="100%">
      	  <tr bgcolor="#FE980F" style="style3">
          <th width="20" class="style3">No. </th>
          <th width="200" class="style3">NAMA BARANG </th>
		  <th width="200" class="style3">ALAMAT PENGIRIMAN <BR /> PAKET </th>
		  <th width="40" class="style3">BERAT (kg)</th>
		  <th width="56" class="style3">JUMLAH</th>
          <th width="150" class="style3">HARGA  </th>
          <th width="150" class="style3">DISKON </th>
          <th width="150" class="style3">HARGA DISKON </th>
		  <th width="150" class="style3">BIAYA KIRIM </th>
          <th width="150" class="style3"><strong>TOTAL</strong></th>
        </tr> 
	
		<?php 
          $jp2 = new jcore();
          $result2 = $jp2->sql("select a.*,c.*,a.diskon as disko, (hrg-(hrg*a.diskon/100)) as disk, (hrg*a.diskon/100*jml) as disk1, (biaya*CEILING(jml*berat/1000))  as ko from transaksi a inner join barang c on c.kdbrg=a.kdbrg inner join biayakirim d on a.kota=d.kota where a.notransaksi='".$_SESSION['kode']."' group by a.kdbrg");
		   $n=0;
		   $d=0;
		   $kirim=0;
		    $jum=0;
           $berattotal=0;
           $biayatotal=0;
		  
           while($row2=$jp2->fetch($result2)){
		   $n++; 
           $berattotal +=($row2[berat]) * ($row2[jml]);
           $biayatotal += ($row2[harga]) * ($row2[jml]);
           $subtot = intval($row2[jml])*doubleval($row2[disk]);
		   $jum=$jum+intval($row2[jml]);
		   $d=$d+doubleval($row2[disk1]);
		   $kirim=$kirim+doubleval($row2[ko]);
           $grandtot = $grandtot+$subtot;
          
         ?> 
				
				
		<tr>
          <td width="20"><?= $n?></td>
          <td width="200"><?= $row2[nmbrg]?></td>
		   <td width="200"><?= $row2[alamat]?> <?= $row2[kota]?> <br /> <?= $row2[paket]?></td>
		  <td width="40" align="right"><?= ($row2[berat]/1000)?></td>
	      <td width="56" align="right"><?=$row2[jml]?></td>
          <td width="80" align="right"><?=$jp->pt($row2[hrg])?></td>
          <td width="80" align="right"><?=($row2[disko])?>%<br /><?=$jp->pt($row2[hrg]*$row2[disko]/100)?></td>
          
		  
          <td width="80" align="right"><?=$jp->pt($row2[disk])?></td>
		   <td width="80" align="right"><?=$jp->pt($row2[ko])?></td>
          <td width="80" align="right"><?=$jp->pt($subtot+$row2[ko])?></td>
        </tr>
		<?php } ?>
        <tr>
          <td>&nbsp;</td>
          <td align="left" valign="top" colspan="2">Berat Total (Kg) :<br>
		                  </td>
		  <td align="right" valign="top" colspan="2" ><?=ceil($berattotal/1000)?>
		  </td>
          
		  
          <td colspan="3">
		      Total Sebelum Diskon : <br /> 
			  Diskon : <br>  
			  Total       : <br>
		      Biaya Kirim : <br>  
              
			  Grand Total :  </td>
          <td align="right" colspan="2">
		  <?=$jp->pt($biayatotal)?> <br />
		   <?=$jp->pt($diskon+$d)?><br>
		   <?=$jp->pt($biayatotal - $d -$diskon)?><br>
            <?=$jp->pt($kirim)?><br> 
          
		  <?=$jp->pt($biayatotal - $d + $kirim-$diskon)?> </td>
        </tr>
      </table>


</label>
</strong></span>
          <br>
        Pembayaran melalui transfer Bank ke
        <br>
        -----------------------------------------------------------
        <br> 
        <br>
        


<a href="http://www.klikbca.com" target="_blank"><img src="images/bca.jpg"> </a>


 No Rekening 24-6535-030-8<br/>
<a href="http://www.mandiri.com" target="_blank"><img src="images/mandiri.jpg"> </a>


 No Rekening 136-3500-030-8<br/>
<a href="http://www.bni.com" target="_blank"><img src="images/bni.jpg"> </a>


 No Rekening 02-03030-030-8<br/><br />
 
 

 
  
</p>
       
        <p>Konfirmasi pembayaran melalui menu konfirmasi <br>
          <br>
          Terima kasih Anda telah membeli barang-barang kami. <br>
         
        </p>
        </td>
  </tr>
</table>
		<?php
		session_cache_expire(0.0001);
		session_name('sid');
		session_start();
		session_unregister('kode');
		?>
<?php 
}
//JIKA BELUM ADA LOGIN MAKA TAMPILKAN DULU PERMINTAAN NO TRANSAKSI
else
{ 
?>
<form id="form1" name="form1" method="post" action="index.php?page=orderinfo">
  <table border="0" cellspacing="2" cellpadding="2">
    <tr>
      <td>MASUKKAN NOMOR TRANSAKSI </td>
      <td>:</td>
      <td>
	  <?php
	  if($_SESSION['idplg']!='')
	  {
	  ?>
	  <select id="notransaksi" name="notransaksi" class="form-control">
	  <?php
	//untuk daftar transaksi dengan customer login yang sama dipilih dari combo box
	$result = $jp->sql("select  notransaksi,date_format(tgtransaksi,'%d-%m-%Y') as tgorder "
	." from transaksi where idplg='".$_SESSION['idplg']."' and notransaksi!='TEMP' group by notransaksi order by notransaksi desc");
	while($row=$jp->fetch($result)){
	?>
		<option value="<?=$row['notransaksi']?>"><?=$row['notransaksi']?> | <?=$row['tgorder']?></option>
		<?php
		}
		?>
		</select>
		<?php
	  }
	  //jika belum login tampilkan textbox input no transaksi
	  else{
	  ?><?php 
	  } 
	  ?>	  </td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    
      
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>
        <button class="flex-c-m stext-101 cl0 size-103 bg3 bor1 hov-btn3 p-lr-11 trans-04 pointer">
							Submit
						</button>
      </td>
    </tr>
  </table>
  
</form>
</div>
<?php 
	} 
?>
</div>
<script>
function doCetak(id){
window.open("lapcetak.php?notransaksi="+id+"&ctk=1",
		"stream", "width=650,height=500,scrollbars=yes,menubar=yes,statusbar=no,toolbar=no,resizable=no	");
}
</script>
