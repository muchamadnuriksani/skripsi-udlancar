<div class="col-sm-12 isotope-item women">
<style type="text/css">
<!--
.style1 {font-family: Georgia, "Times New Roman", Times, serif;color: #000;}
.style11 {font-family: Georgia, "Times New Roman", Times, serif;color: #000;font-size: 24px;}

-->
</style>
<div class="login-form1">
<form id="form1" name="form1" method="post" action="updateqty.php">
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" bgcolor="#FFFFFF">

  /* <!--DWLayoutTable--> */
   <?php 
   		$sumber = ROOT.'/server/api.php/keranjang/a.idplg/'.$_SESSION['idplg'].'/1';
		echo $sumber;
		$konten = file_get_contents($sumber);
		$data = json_decode('['.$konten.']', true);
		$n=0; $subtot = 0; $grandtot = 0;
		for($a=0; $a < count($data); $a++)
		  {
				
		if ($a%2==0)
	   {$c = "#f2dede";}
	   else
	   {$c = "#d9edf7";}
		$subtot = intval($data[$a][jml])*doubleval($data[$a][disk]); 
		$grandtot = $grandtot+$subtot;
		?>
   <tr bgcolor="<?=$c?>">
    <td width="3%" height="32" align="justify" valign="top" class="tdmenu style1"><strong><?=$n+1?>. </strong></td>
    <td width="22%" height="32" align="justify" valign="top" class="tdmenu style1"><strong>Nama Barang</strong></td>
    <td width="1%" align="center" valign="top" class="tdmenu style1"><strong>:</strong></td>
    <td width="56%" align="justify" valign="top" class="tdmenu style1"><strong><?=$data[$a][nmbrg]?></strong></td>
     <td width="11%">
     <button class="flex-c-m stext-101 cl0 size-103 bg3 bor1 hov-btn3 p-lr-11 trans-04 pointer">
							Ubah
						</button>
      
     
    
    <td width="7%"><a href="delshop.php?id=<?=$data[$a][kdbrg]?>"><img src="images/remove.png" title="Hapus Barang" alt="Hapus item" width="32" height="32" border="0" /></a> </td>
   
    
    
    </td>
   </tr>
   <tr  bgcolor="<?=$c?>">
   <td align="right" height="32" valign="top" class="tdmenu style1"><strong>&nbsp; </strong></td>
    <td align="justify" height="32" valign="top" class="tdmenu style1"><strong>Jumlah</strong></td>
    <td  align="center" valign="top" class="tdmenu style1"><strong>:</strong></td>
    <td  align="justify" valign="top" class="tdmenu style1" colspan="3"><strong><input name="<?=$data[$a][kdbrg]?>" type="text" id="<?=$data[$a][kdbrg]?>" size="3" maxlength="3" value="<?=$data[$a][jml]?>" onblur="return cek_stok(this.value,<?=$data[$a][stok]?>);"  class="form-control" style="width:50px"/> </strong></td>
   </tr>
   <tr  bgcolor="<?=$c?>">
    <td align="right" height="32" valign="top" class="tdmenu style1"><strong>&nbsp; </strong></td>
    <td align="justify" height="32" valign="top" class="tdmenu style1"><strong>Stok</strong></td>
    <td align="center" valign="top" class="tdmenu style1"><strong>:</strong></td>
    <td align="justify" valign="top" class="tdmenu style1" colspan="3"><strong><?=$row[stok]?></strong></td>
   </tr>
   <tr  bgcolor="<?=$c?>">
    <td align="right" height="32" valign="top" class="tdmenu style1"><strong>&nbsp; </strong></td>
    <td align="justify" height="32" valign="top" class="tdmenu style1"><strong>Harga</strong></td>
    <td align="center" valign="top" class="tdmenu style1"><strong>:</strong></td>
    <td align="justify" valign="top" class="tdmenu style1" colspan="3"><strong>
	<? if ($data[$a][diskon]>0) {?>
			<font style="text-decoration:line-through" color="#FF00" size="-1"><em>	Rp.<?=$jp->pt($data[$a][hrg])?> </em> </font> &nbsp;(<?=$data[$a][diskon]?> %)<br /> <b>Rp.<?=$jp->pt($data[$a][disk])?> </b>
		<? } else {?>	
         <b>Rp.<?=$jp->pt($data[$a][hrg])?></b>
        <? } ?>
		</strong></td>
   </tr>
    <tr  bgcolor="<?=$c?>">
    <td align="right" height="32" valign="top" class="tdmenu style1"><strong>&nbsp; </strong></td>
    <td align="justify" height="32" valign="top" class="tdmenu style1"><strong>Alamat Pengiriman</strong></td>
    <td align="center" valign="top" class="tdmenu style1"><strong>:</strong></td>
    <td align="justify" valign="top" class="tdmenu style1" colspan="3"><strong>  
    <input name="alamat" type="text" id="alamat" size="100" value="<?=$data[$a][alamat]?>"   class="form-control" style="width:350px"> 
	
<select name="kota" id="kota"  class="form-control"  style="width:300px" >
          <option value="<?=$_SESSION[kota]?>"><?=$_SESSION[kota]?></option>
          <?php
		$r = $jp->sql("select distinct a.kota,a.biaya from biayakirim a left join transaksi b on a.kota=b.kota order by kota");
		while ($oPer = $jp->fetch($r)){
		$isSelPer = (($oPer[kota]==$row[kota])?"selected":"");
		?>
          <option value="<?=$oPer[kota]?>" <?=$isSelPer?>>
            <?=$oPer[kota]?> | Biaya Kirim <?=$jp->pt($oPer[biaya])?>
          </option>
          <?php } ?>
        </select></strong>
        <select name="paket" id="paket" style="width:100px"  class="form-control" >
      <option value="JNE" <?=(($data[$a][paket]=='JNE')?"selected":"")?>>JNE</option>
	  
	  	  
	        
    </select> 
        
        
        </td>
   </tr>
   
   <tr>
   <td colspan="5">&nbsp; </td>
   </tr>
   <? } ?>
        
  <tr bgcolor="#99FF00">
    <td align="right" height="32" valign="top" class="tdmenu style1"><strong>&nbsp; </strong></td>
    <td align="justify" height="32" valign="top" class="tdmenu style11"><strong>Total</strong></td>
    <td align="center" valign="top" class="tdmenu style11"><strong>:</strong></td>
    <td align="justify" valign="top" class="tdmenu style11" colspan="3"><strong><?=$jp->pt($grandtot)?></strong></td>
   </tr>
 
  <tr>
    <td  colspan="6" align="justify" height="32" valign="top" class="tdmenu style1"><a href="savecustomer2.php"><img src="images/checkout.jpg" /></a></td>
    
   </tr>
  
  </table>
  </form>
 </div>
 </div>
<script type="text/javascript" language="javascript">
function cek_stok(jumlah,stok) {
var jumlah2=new Number(jumlah.value);
var stok2=new Number(stok.value);
if(jumlah>stok)
{
	
  alert('Order Anda melebihi stock');
 location.reload(true);
  
  return false;

  
}
}
</script>
