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
if($_REQUEST[kdbrg]!='')
{
	$sumber1 = ROOT.'/server/apiadmin.php/barang/kdbrg/'.$_REQUEST[kdbrg].'/1';
	$konten1 = file_get_contents($sumber1);
	$row1 = json_decode($konten1, true);
	$kode = $row1[0][kdbrg];
 
}else
{
$kode = $jp->kdauto("barang","L");	 	 
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
		window.location="proses.php?page=barang&action=delete&kdbrg="+id;
	}
}




</script>

<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/font-awesome.min.css" />
<style type="text/css">
<!--
.style1 {color: #FFFFFF;font-family:FontAwesome; font-size:12px}
.style2 {color: #000000;font-family:FontAwesome; font-size:12px;}
-->
</style>

</head>
<body>

<script src="js/gen_validatorv31.js" language="javascript"></script>
<form action="proses.php?page=barang&action=input" method="post" enctype="multipart/form-data" name="Formbarang" id="Formbarang" >
<input name="id_edit" type="hidden" value="<?=$row1[0][kdbrg]?>">

<table width="834" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td height="33" colspan="5" class="tdmenu">DATA BARANG</td>
    </tr>
  <tr>
    <td width="72"><span class="style2">Kode Barang </span></td>
    <td width="9" align="center">:</td>
    <td width="336"><input name="kdbrg" type="text" id="kdbrg" size="5" maxlength="5" value="<?=$kode?>" readonly></td>
    </tr>
   <tr>
    <td>Nama Barang </td>
    <td align="center">:</td>
    <td colspan="2"><input name="nmbrg" type="text" id="nmbrg" size="40" maxlength="50" value="<?=$row1[0][nmbrg]?>"></td>
    </tr>
   <tr>
    <td>Kategori</td>
    <td align="center">:</td>
    <td colspan="2">
	<select name="kdkategori" id="kdkategori" >
      <option>- PILIH KATEGORI -</option>
      <?php
		$r = $jp->sql("select * from kategori order by nmkategori");
		while ($oKel = $jp->fetch($r)){
		$isSelKel = (($oKel[kdkategori]==$row1[0][kdkategori])?"selected":"");
		?>
      <option value="<?=$oKel[kdkategori]?>" <?=$isSelKel?>>
        <?=$oKel[nmkategori]?>
        </option>
      <?php } ?>
    </select>   </td>
    </tr>
	<tr>
    <td>Harga</td>
    <td align="center">:</td>
    <td colspan="2"><input name="harga" type="text" id="harga" size="10" maxlength="10" value="<?=$row1[0][harga]?>" onKeyPress="return numbersonly(event);"> 
        
      </td>
    </tr>
	<tr>
    <td>Diskon</td>
    <td align="center">:</td>
    <td colspan="2"><input name="disk" type="text" id="disk" size="3" maxlength="3" value="<?=$row1[0][disk]?>" onKeyPress="return numbersonly(event);"> %
        
      </td>
    </tr>
   <tr>
    <td>Stok</td>
    <td align="center">:</td>
    <td colspan="2"><input name="stok" type="text" id="stok" size="7" maxlength="7" value="<?=$row1[0][stok]?>" onKeyPress="return numbersonly(event);">
       &nbsp;&nbsp;Berat 
         <input name="berat" type="text" onKeyPress="return numbersonly(event);" value="<?=$row1[0][berat]?>" size="5"> 
       Gram  </td>
    </tr>
	
	
  <tr>
    <td>Deskripsi</td>
    <td align="center">:</td>
    <td colspan="2"><textarea name="deskripsi" class="ckeditor" cols="35" rows="3" id="deskripsi">
	<?=$row1[0][deskripsi]?>
    </textarea></td>
  </tr>
  <?php 
		if(file_exists("../uploaddir/small_med_".$row1[0][kdbrg].".jpg")){ 
			$filename= "../uploaddir/small_med_".$row1[0][kdbrg].".jpg";
		}else{
			$filename= "../uploaddir/nophoto.jpg";
		}
		?>
        <tr>
        <td colspan="2">&nbsp; </td>
         <td> <img src="<?=$filename?>" border="0">	</td>	   
        </tr>
  <tr>
      <td>Foto Barang</td>
      <td align="center">:</td>
       <td><input type="file" name="file">		</td>
           
      </tr>

  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td colspan="2"><input type="submit" name="Submit" class="btn btn-primary" value="Simpan" onclick="return doSubmit()">    <input type="reset" name="Submit2" value="Batal" class="btn btn-success" onClick="window.location='index.php?page=barang'">
</td>
  <td width="3"></td>
    <td width="58">&nbsp;</td>
  </tr>
</table>

</form>

<table id="example2" class="table table-bordered table-striped">
 <thead style="background:#3F84C9; color:white; font-weight: bold;">
  <tr style="text-align: center; font-family: Arial, Helvetica, sans-serif;">
    <th width="52" align="center" valign="middle" bgcolor="#870015"><span class="style1">NO</span></th>
    <th width="178" valign="middle" bgcolor="#870015"><span class="style1">KODE/NAMA</span></th>
    <th width="87" valign="middle" bgcolor="#870015"><span class="style1">KATEGORI</span></th>
    <th width="90" valign="middle" bgcolor="#870015"><span class="style1">HARGA<br>
    DISKON</span></th>
	
    <th width="45" valign="middle" bgcolor="#870015"><span class="style1">STOK</span></th>
    <th width="123" bgcolor="#870015"><span class="style1">PIC</span></th>
	
    <th width="104" bgcolor="#870015"><span class="style1">PROSES</span></th>
  </tr>
  </thead>

 
   <?php $sumber = ROOT.'/server/apiadmin.php/barang';
     	$konten = file_get_contents($sumber);
		$row = json_decode($konten, true);	
		// echo $konten;
   for($n=0; $n < count($row); $n++)
  { 
if ($n%2==0)
	   {$c = "info";}
	   else
	   {$c = "danger";}
   ?>
  <tr class="<?=$c?>">
    <td width="52" align="right" valign="top"><span class="style2"><?=$n+1?>.</span></td>
    <td width="178" valign="top"><span class="style2">
	<b><?=$row[$n][kdbrg]?></b>
	<br>
	<i><?=$row[$n][nmbrg]?></i>	</span></td>
    <td width="87" align="center" valign="top"><span class="style2"><?=$row[$n][nmkategori]?></span></td>
    <td width="90" align="center" valign="top"><span class="style2"><?=$jp->pt($row[$n][harga])?> <br> <?=$row[$n][disk]?> %</span></td>

	
   	<td width="45" align="right" valign="top"><span class="style2"><?=$row[$n][stok]?></span></td>
    <td width="123" align="center" valign="top">
	<?php 
	if(file_exists("../uploaddir/small_".$row[$n][kdbrg].".jpg")){
		$file = "small_med_".$row[$n][kdbrg].".jpg";
	}else{
		$file = "nophoto.jpg";
	}
	?>
	<img src="../uploaddir/<?=$file?>" border="0" width="100" height="100" /></td>
		
		    <td width="104" align="center" valign="top">
	
	
	
	<a href="index.php?page=barang&kdbrg=<?=$row[$n][kdbrg]?>&act=update">
	<img src="../images/edit.png" width="48" border="0" title="Edit" onClick="return Confirm('<?=$row[$n][kdbrg]?>')"/></a>
   
	<a href="#" onclick="return ConfirmDel('<?=$row[$n][kdbrg]?>')">	 <img src="../images/remove.png" width="48" height="48" border="0" title="Hapus" /> </a></td>
  </tr>
  <?php } ?>
</table>

<script>
function doSubmit(){
    var v = new Validator("Formbarang");
	v.addValidation("kdbrg","req","Kode Barang tidak boleh kosong");
	v.addValidation("nmbrg","req","Nama Barang tidak boleh kosong");
	v.addValidation("harga","req","Harga tidak boleh kosong>>>Isian Numerik");
	v.addValidation("stok","req","Stok tidak boleh kosong>>>Isian Numerik");
	v.addValidation("berat","req","Berat tidak boleh kosong>>>Isian Numerik");
	}
</script>

</body>
</html>