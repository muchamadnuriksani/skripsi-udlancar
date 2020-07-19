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
$jp = new jcore();
if($_REQUEST[notransaksi]!=''){
	
	$sumber1 = ROOT.'/server/apiadmin.php/transaksi1/'.$_REQUEST[notransaksi].'/1';
//	echo $sumber1;
	$konten1 = file_get_contents($sumber1);
	$row1 = json_decode($konten1, true);
	
	
}
if($_POST['Submit']){
	$result = $jp->sql("update transaksi set noresi='".$_POST[noresi]."' where notransaksi='".$_POST[notransaksi]."' ");
	$jp->alert("No Resi Berhasil Disimpan");
	$jp->gotox("index.php?page=brgout");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>::Daftar Order::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script src="js/advviewer.js"></script>
<script>
function ConfirmOrder(Vnotransaksi,VStatus){
	if(confirm('Ubah Pengaturan No Order '+Vnotransaksi+' ini....?')){
		window.location="proses.php?page=order&action=input&status="+VStatus+"&notransaksi="+Vnotransaksi;
	}
}
</script>
<link href="css/style.css" rel="stylesheet" type="text/css">

<style type="text/css">
<!--
.style4 {
	font-size: 14;
	color: #000000;
}
.style6 {font-family: Georgia, "Times New Roman", Times, serif; font-size: 12px; }
.style8 {font-family: Georgia, "Times New Roman", Times, serif; font-size: 12px; color: #000000; }
.style9 {color: #000000}
.style14 {font-family: Georgia, "Times New Roman", Times, serif; font-size: 14; color: #000000; }
.style16 {font-family: Georgia, "Times New Roman", Times, serif; font-size: 12px; color: #FFFFFF; }
-->
</style>
</head>
<body>
<script src="js/gen_validatorv31.js" language="javascript"></script>
<form name="fbrgout" method="post" action="" >
	<table width="100%" border="0" cellpadding="0" cellspacing="2">
    <tr align="left" valign="top">
        <td width="10%">No Order </td>
        <td width="1%">:</td>
        <td width="89%"><input name="notransaksi" type="text" id="notransaksi" value="<?=$row1[0][notransaksi]?>" readonly ></td>
      </tr>
      <tr align="left" valign="top">
        <td width="10%">No Resi </td>
        <td width="1%">:</td>
        <td width="89%"><input name="noresi" type="text" id="noresi" value="<?=$row1[0][noresi]?>" ></td>
      </tr>
       <tr align="left" valign="top">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input name="Submit" type="submit" class="btn btn-primary" value="Simpan" onclick="return doSubmit()">
         <input name="Submit2" type="reset"  class="btn btn-success"  value="Batal" onClick="window.location='index.php?page=brgout'">
		  <input name="notransaksi" id="notransaksi" type="hidden" value="<?=$row1[0][notransaksi]?>">
		  </td>
      </tr>
      </table>
      </form>

<table id="example2" class="table table-bordered table-striped">
 <thead style="background:#3F84C9; color:white; font-weight: bold;">
  <tr bgcolor="#870015">
    <th width="41"><span class="style16">No.</span></th>
    <th width="60"><span class="style16">No Order</span></th>
    <th width="60"><span class="style16">Tanggal </span></th>
    <th width="355"><span class="style16">Barang</span></th>
    <th width="186"><span class="style16">Pelanggan</span></th>
    <th width="84"><span class="style16">Status</span></th>
    <th width="102"><span class="style16">Proses</span></th>
  </tr>
  </thead>
  
  <?php
   $sumber = ROOT.'/server/apiadmin.php/transaksi';
   $konten = file_get_contents($sumber);
	$row = json_decode($konten, true);	
 
    for($n=0; $n < count($row); $n++)
  { 
  if ($no%2==0)
	   {$c = "info";}
	   else
	   {$c = "danger";}
  ?>
  <? $rb=$jp->sql("select a.kdbrg,a.jml,b.nmbrg,b.harga, (b.berat/1000*a.jml*d.biaya) AS bykirim, a.alamat,a.kota "
   ." from transaksi a inner join barang b on a.kdbrg=b.kdbrg inner join pelanggan c on a.idplg=c.idplg inner join biayakirim d on a.kota=d.kota "
  ."  where notransaksi='".$row[$n][notransaksi]."' group by a.kdbrg ") ; ?>
  <tr align="left" valign="top" class="<?=$c?>">
    <td width="41" align="right"><span class="style8">
      <?=$n+1?>
    </span></td>
    <td width="60" align="center"><span class="style8"><strong>
      <?=$row[$n][notransaksi]?>
    </strong></span></td>
    <td width="60" align="center"><span class="style8">
      <?=$jp->todate($row[$n][tgorder])?>
    </span></td>
    <td width="355">
     <table id="example2" class="table table-bordered table-striped">
        <? $nx=0; while($ob=$jp->fetch($rb)) { $nx++; ?>
        <tr align="left" valign="top">
          <td class="style8 style4 style6"><?=$nx?>
            .</td>
          <td><span class="style14">
            <?=$ob[kdbrg]." ".($ob[nmbrg])." Rp. ".$jp->pt($ob[harga])?>
          </span></td>
          <td><span class="style14"><b>jml :</b>
                <?=$ob[jml]?>
          </span></td>
		  <td><span class="style14"><b>By Kirim :</b>
                <?=$jp->pt($ob[bykirim])?>
          </span></td>
		  
			<td width="244" align="center">
      <table width="95%" border="1" cellpadding="1" cellspacing="1" bgcolor="#C5FAD0" style="border-collapse:collapse">
        <tr align="center" valign="top">
          <td colspan="3" class="style8"> <strong>
            <?=($ob[alamat])?>
            <?=($ob[kota])?> 
			
          </strong></td>
        </tr>
    </table></td>
        </tr>
        <? } ?>
    </table></td>
    <td width="186" align="center">
      <table width="95%" border="1" cellpadding="1" cellspacing="1" bgcolor="#C5FAD0" style="border-collapse:collapse">
        <tr align="center" valign="top">
          <td colspan="3" class="style6 style9"><strong>
            <?=($row[$n][nama])?>
            <br>
            <i>login :</i> &nbsp;
            <?=$row[$n][idplg]?>
            <br>
          </strong></td>
        </tr>
    </table></td>
    
    <td align="center"> <span class="style8">
    <?
	switch($row[$n][status]){
	case "0":
		echo "Pending";
	break;
	case "1":
		echo "Terkirim<br>".$jp->todate($row[$n][tgkirim])."<br> No Resi<br>".($row[$n][noresi]);
	break;
	}
	?> 
</span></td>
  <td width="102" align="center" valign="top">
      <?php if($row[$n][status]==1){ ?>
      <a href="#" onClick="return ConfirmOrder('<?=$row[$n][notransaksi]?>','1')"> <img src="../images/undo.png" border="0"  width="64"/> </a>
       <a href="index.php?page=brgout&notransaksi=<?=$row[$n][notransaksi]?>&act=update">
		  <img src="../images/edit.png"  border="0" title="Edit" width="64"/></a> 
      <?php }else{ ?>
      <a href="#" onClick="return ConfirmOrder('<?=$row[$n][notransaksi]?>','0')"> <img src="../images/proses.jpg" border="0" width="64" /> </a>
      <?php } ?>    </td>
  </tr>
 
      <? } ?>
</table>

<script>
function doSubmit(){
    var v = new Validator("fbrgout");
	v.addValidation("notransaksi","req","Pilih Transaksi Dulu");
	v.addValidation("noresi","req","No Resi tidak boleh kosong");
	
	}
</script>

</body>
</html>
