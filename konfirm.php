<!DOCTYPE html>
<html>
<head>
<title>Proses</title>
<link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">
<script type="text/javascript" src="sweetalert/dist/sweetalert.min.js"></script> 
</head>
<body>
<div class="col-sm-12 isotope-item women">

<?php
	if($_POST['jml']!=''){
		
	$result = $jp->sql("replace into konfirm set idplg='".$_SESSION['idplg']."', notransaksi='".$_POST['notransaksi']."', bayar='".$_POST['jml']."', isi='Sudah transfer untuk pembayaran order ID ".$_POST['notransaksi'].", sebesar Rp ".$_POST['jml'].", ke Bank ".$_POST['bank2'].", dari Bank ".$_POST['bank1']." ".$_POST['isi1']." , A/N ".$_POST['atasnm'].". Transfer tanggal ".$_POST['tanggal']." jam ".$_POST['jam']." ' ");
	if($_FILES['file']['name']!=''){
			$jp->UploadBukti($_POST['notransaksi'].".jpg",APP_ROOT."/bukti/","file");
			}
	
	
//			echo $result;
echo '<script> 
			swal({
			  title: "Konfirmasi Berhasil Disimpan",
			  text: "",
			  type: "success",
			  showCancelButton: false,
			  confirmButtonText: "OK "
			},
			function(isConfirm) {
			  if (isConfirm) {
				window.location="index.php?page=konfirm";
			  } 
			});
			</script>';
	} 
?>

  <div class="login-form">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script>
//==============================SCRIPT TAMBAHAN UNTUK FILTER KEYBOARD======================================================
function numbersonly(e) {
    var unicode = e.charCode ? e.charCode : e.keyCode
    if ((unicode != 8) && (unicode != 13) && (unicode != 37) && (unicode != 39) && (unicode != 9)) { //if the key isn't the backspace key (which we should allow)
        if (unicode < 48 || unicode > 57) //if not a number
            return false //disable key press
    }
}
</script>

<link rel="stylesheet" href="jquery-ui.css" type="text/css"/>
<script src="jquery-1.10.2.js" type="text/javascript"></script>
<script src="jquery-ui.js" type="text/javascript"></script>
<script>
var $j = jQuery.noConflict();
  $j(function() {
   $j("#tanggal").datepicker({ minDate: -3,maxDate:"+0"});
   $j("#tanggal" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
   

  });
</script>


</head>
<body>

<table border="0" cellpadding="0" cellspacing="0" class="table-std" style="border:0px dashed #cccccc" align="center" width="100%">
  <tr>
    <td><table cellspacing="0" cellpadding="2" border="0" width="100%">
           <?php
		   	$sumber = ROOT.'/server/api.php/konfirm/idplg/'.$_SESSION['idplg'].'/1';
			//echo $sumber;
			$konten = file_get_contents($sumber);
			$data = json_decode('['.$konten.']', true);
		for($a=0; $a < count($data); $a++)
  {
		?>
        
          <tr>
            <td width="55" colspan="2"><table border="0" cellspacing="0" cellpadding="0">
                <tr>
                  
                  <td bgcolor="#FFFF00"><span class="tdbarang">
                    <?=$data[$a]['tanggal']?>
                  </span></td>
                </tr>
            </table></td>
          </tr>
          <tr>
          
         	 <?php 
	if(file_exists("bukti/bukti_".$data[$a][notransaksi].".jpg")){
		$file = "bukti_".$data[$a][notransaksi].".jpg";
	}else{
		$file = "nophoto.jpg";
	}
	?>
             <td bgcolor="#99FF66" width="50"><img src="bukti/<?=$file?>" border="0" width="50" height="50" /></td>
            <td bgcolor="#99FF66" width="1019"><?=$data[$a]['isi']?></td>
          </tr>
          <?php 
		}
		?>
    
    </table></td>
  </tr>
  <tr>
    <td>
      <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
        <table width="617" border="0" cellspacing="0" cellpadding="2" >
          
          <?php
		$result1 = $jp->sql("select * from pelanggan where idplg='".$_SESSION['idplg']."' ");
		while($row1 = $jp->fetch($result1)){
		?>
          <tr>
            <td width="162" height="24" valign="top">Nama</td>
            <td width="4" valign="top">:</td>
            <td width="439" valign="top"><?=$row1['nama']?></td>
          </tr>
          <?php 
		}
		?>
          <tr>
            <td height="24" valign="top">Nomor Transaksi</td>
            <td valign="top">:</td>
            <td valign="top">
              <select id="notransaksi" name="notransaksi"  class="form-control" style="width:150px">
                <?php
		$result = $jp->sql("select  notransaksi,date_format(tgtransaksi,'%d-%m-%Y') as tgorder "
		." from transaksi where idplg='".$_SESSION['idplg']."' and status='0' and notransaksi!='TEMP' group by notransaksi order by tgorder");
		while($row=$jp->fetch($result)){
		?>
                <option value="<?=$row['notransaksi']?>">
                <?=$row['notransaksi']?>
                </option>
                <?php
		}
		?>
              </select>
            </td>
          </tr>
          <tr>
            <td valign="top">Tanggal Transfer </td>
            <td valign="top">:</td>
            <td valign="top"><input name="tanggal" type="text" id="tanggal" value="" size="10"  class="form-control" style="width:150px"/></td>
          </tr>
		   <tr>
            <td valign="top">Jam Transfer </td>
            <td valign="top">:</td>
            <td valign="top"><input name="jam" type="text" id="jam" value="" size="10"  class="form-control" style="width:150px"/></td>
          </tr>
          <tr>
            <td valign="top">Bank Asal</td>
            <td valign="top">:</td> 
            <td valign="top"><select name="bank1" id="bank1" class="form-control" style="width:150px">
			  <option value="BCA">BCA</option>
			  <option value="BII">BII</option>
			  <option value="BRI">BRI</option>
			  <option value="BNI">BNI</option>
			  <option value="BTN">BTN</option>
			  <option value="BANK JATENG">BANK JATENG</option>
			  <option value="BUKOPIN">BUKOPIN</option>
			  <option value="CENTURY">CENTURY</option>
			  <option value="DANAMON">DANAMON</option>
			  <option value="MANDIRI">MANDIRI</option>
			  <option value="MAYAPADA">MAYAPADA</option>
				  
	        
    </select> </td>
          </tr>
          <tr>
            <td valign="top">No Rekening </td>
            <td valign="top">:</td>
            <td valign="top"><input name="isi1" type="text" id="isi1" value="" size="25"  class="form-control" style="width:250px"/></td>
          </tr>
		  
          <tr>
            <td valign="top">Atas Nama</td>
            <td valign="top">:</td>
            <td valign="top"><input name="atasnm" type="text" id="atasnm" value="" size="50"  class="form-control" style="width:300px"/></td>
          </tr>
          <tr>
            <td valign="top">Jumlah Transfer </td>
            <td valign="top">:</td>
            <td valign="top"><input name="jml" type="text" id="jml" value="" size="30"  class="form-control" onKeyPress="return numbersonly(event);" style="width:200px"/></td>
          </tr>
		     <tr>
            <td valign="top">Bank Tujuan</td>
            <td valign="top">:</td>
            <td valign="top"><select name="bank2" id="bank2"  class="form-control" style="width:150px">
				  <option value="BCA 2465350308">BCA 2465350308</option>
			 	  <option value="MANDIRI 136-3500-030-8">MANDIRI 136-3500-030-8</option>
			 	  <option value="BNI 02-03030-030-8">BNI 02-03030-030-8</option>
			 			 	        
    </select> </td>
          </tr>
           <tr>
            <td valign="top">Bukti Transfer</td>
            <td valign="top">:</td>
            <td valign="top"> <input type="file" name="file"> </td>
          </tr>
          <tr>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">
            <button class="flex-c-m stext-101 cl0 size-103 bg3 bor1 hov-btn3 p-lr-11 trans-04 pointer">
            			 
                           
                           
							Kirim
						</button>
                      
</td>
          </tr>
		
        </table>
    </form></td>
  </tr>
</table>
</div>
</div>
</body>
</html>
