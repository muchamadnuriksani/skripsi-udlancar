<?php
session_start();
include '../includes/lib.inc.php';
include APP_ROOT."/includes/class.inc.php";
include APP_ROOT."/includes/auth.inc.php";
include INCLUDES_DIR."/class.paging.php";

$jp = new jcore();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
<script type="text/javascript" src="script.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/font-awesome.min.css" />
<link rel="Shortcut Icon" href="../images/logo-icon.png" type="image/x-icon"><meta name="viewport" content="width=device-width, user-scalable=no">
<style type="text/css">
html { 
  background: url(../images/back.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</style>

<script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />       

</head>
<body >
<table width="900" border="0" cellspacing="0" cellpadding="2" style="border-right:1px dashed #666666" align="center">
  <tr>
    <td><img src="../images/header.png" width="903" height="200"></td>
  </tr>
  <tr>
    <td class="menu">
	<div class="nav"> 
        <ul class="artmenu">
          <li> <a href=""><span><span>MASTER</span></span></a> 
          <ul>
          <li> <a href="index.php"><span><span>KATEGORI</span></span></a></li>
          <li> <a href="index.php?page=barang"><span><span>BARANG</span></span></a></li>
          <li><a href="index.php?page=biayakirim"><span><span>BIAYA KIRIM</span></span></a></li>
          </ul>
          </li>
          
		  
		  <li><a href="index.php?page=brgout"><span><span>ORDER</span></span></a></li>

		  
         <li> <a href="index.php?page=manajuser"><span><span>ADMIN</span></span></a> 
          
		</li>	
		
		
		  <li> <a href="#"><span><span>LAPORAN</span></span></a> 
            <ul>
              <li><a href="rbarang.php" target="_blank">LAPORAN BARANG</a></li>
		     <li><a href="rpelanggan.php" target="_blank">LAPORAN PELANGGAN</a></li>
			   <li><a href="index.php?page=cetakorder">LAPORAN PEMESANAN</a></li> 
			   <li><a href="index.php?page=cetakjual">LAPORAN PENJUALAN</a></li> 
			
            </ul>
          </li>
          <li> <a href="logout.php"><span><span>LOGOUT</span></span></a> </li>
        </ul>
        <div class="l"></div>
        <div class="r"> 
          <div></div>
        </div>
    </div>	</td>
  </tr>
  <tr>
    <td height="360" valign="top">
	<?php
	switch($_REQUEST[page]){
		case "barang":
			include "barang.php";
		break;
		case "brgout":
			include "brgout.php";
		break;
		case "cetakorder":
			include "cetakorder.php";
		break;
		case "cetakjual":
			include "cetakjual.php";
		break;
		case "order":
			include "order.php";
		break;
		case "manajuser":
			include "manajuser.php";
		break;
		case "biayakirim":
			include "biayakirim.php";
		break;
		default:
			include "kategori.php";
		break;
	}
	?>
	</td>
  </tr>
  <tr>
    <td align="center" valign="top" class="tdhead">All Right Reserve 2018</td>
  </tr>
</table>

</body>
</html>