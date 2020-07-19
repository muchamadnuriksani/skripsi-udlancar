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
<?
$jp = new jcore();
if($_REQUEST[iduser]!=''){
	$sumber1 = ROOT.'/server/apiadmin.php/tbuser/iduser/'.$_REQUEST[iduser].'/1';
	$konten1 = file_get_contents($sumber1);
	$row1 = json_decode($konten1, true);
	$disabled = " readonly ";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<script>
function cekSubmit(){
var set = document.fuser;
	if(set.user.value==''){
		alert('user masih kosong');	
		set.user.focus();
		return false;
	}else{
		return true;
	}
}

function doClear(){
	var set = document.fuser;
	set.iduser.value = "";
	set.user.focus();
}
function doDel(n){
	if(confirm("Hapus ...?")){
	window.location="proses.php?page=user&action=hapus&del="+n;
	return true;
	}else{
	return false;
	}
}
</script>
<link href="css/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {color: #FFFFFF;font-family:FontAwesome; font-size:12px}
.style2 {color: #000000;font-family:FontAwesome; font-size:12px;}
-->
</style>
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="2">
  <tr>
    <td>
	<form name="fuser" method="post" action="proses.php?page=user&action=input" onSubmit="return cekSubmit()">
	<table width="100%" border="0" cellpadding="2" cellspacing="0">
      <tr>
        <td colspan="3" align="left"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
          
        </table></td>
      </tr>
      <tr align="left" valign="top">
        <td width="10%">User Name </td>
        <td width="1%">:</td>
        <td width="89%"><input name="user" type="text" id="user" value="<?=$row1[0][namauser]?>" <?=$disabled?>></td>
      </tr>
      <tr align="left" valign="top">
        <td>Password</td>
        <td>:</td>
        <td><input name="pass" type="password" id="pass" value="<?=$row1[0][passuser]?>"></td>
      </tr>
      
      <tr align="left" valign="top">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input name="Submit" type="submit" class="btn btn-primary" value="Simpan">
         <input name="Submit2" type="reset"  class="btn btn-success"  value="Batal" onClick="window.location='index.php?page=manajuser'">
		  <input name="iduser" id="iduser" type="hidden" value="<?=$row1[0][iduser]?>">
		  </td>
      </tr>
    </table>
	</FORM>
	
      <table id="example2" class="table table-bordered table-striped" width="50%">
 <thead style="background:#3F84C9; color:white; font-weight: bold;">
        <tr align="center">
          <th width="30" align="center" bgcolor="#870015"><span class="style1">NO</span></th>
          <th width="250" bgcolor="#870015"><span class="style1">USERNAME </span></th>
          <th width="163" bgcolor="#870015"><span class="style1">PASSWORD</span></th>
          <th width="78" bgcolor="#870015"><span class="style1">PROSES</span></th>
        </tr>
        </thead>
		<?php
		$n = 0;
		 $sumber = ROOT.'/server/apiadmin.php/tbuser';
		   $konten = file_get_contents($sumber);
			$row = json_decode($konten, true);	
		
		for($n=0; $n < count($row); $n++)
  {
		if ($n%2==0)
	   {$c = "info";}
	   else
	   {$c = "danger";}

#		$bgg=(($n%2)>0)?"#BEBEBE":"#CCCCCC";
/* <a href="#" onclick="return ConfirmDel('<?=$row[iduser]?>')"> */
		?>
        <tr valign="top" class="<?=$c?>">
          <td width="30" align="right"><span class="style2"><?=$n+1?></span></td>
          <td width="250" align="justify"><span class="style2"><?=$row[$n]["namauser"]?></span></td>
          <td width="163" align="justify"><span class="style2"><?=$row[$n]["passuser"]?></span></td>
          <td>
		  <a href="index.php?page=manajuser&iduser=<?=$row[$n][iduser]?>&act=update">
		  <img src="../images/edit.png" width="32" height="32" border="0" title="Edit" /></a> 
		  <a href="#" onClick="javascript:return doDel(<?=$row[$n]["iduser"]?>)">
		  <img src="../images/remove.png" width="32" height="32" border="0" title="Hapus" /> 
		  </a>
		  </td>
        </tr>
		<? 
		} 
		?>
     
</table>
</body>
</html>
