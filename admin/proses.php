<?php
session_start();
include '../includes/lib.inc.php';
include APP_ROOT."/includes/class.inc.php";
include APP_ROOT."/includes/auth.inc.php";
include INCLUDES_DIR."/class.paging.php";
$jp = new jcore();

switch($_REQUEST[page]){
	# Do Manajemen barang
	
	case "kategori":
		switch($_REQUEST[action]){
		case "input":
		
					
			 $r = $jp->sql("select count(*) as j from kategori WHERE kdkategori='".$_REQUEST['kdkategori']."' ");
			 $o=$jp->fetch($r);
			 $kata = $_POST['id_edit'];
			 $jumlah = strlen($kata);
			 
			
		 
			if(($o['j']>0) && ($jumlah<=0)){
			  $jp->alert('Data Kategori Sudah Dimasukan...');
			  $jp->gotox("index.php?page=kategori");
			  }
			  else {
			
			$q = "replace into kategori set "
			." kdkategori='".$_POST[kdkategori]."',nmkategori=\"".$_POST[nama]."\" ";
			$jp->sql($q);
			$jp->alert('Data Kategori\nTelah tersimpan...');
			$jp->gotox("index.php?page=kategori");}
		break;
			
		case "delete":
			$r = $jp->sql("delete from kategori where kdkategori=\"".$_REQUEST[kdkategori]."\"");
			$jp->alert('Data Kategori\nTelah dihapus...');
			$jp->gotox("index.php?page=kategori");			
		break;
		default:
			$jp->gotox("index.php?page=kategori");		
		break;
		}
	break;
	
	
	
	case "barang":
		switch($_REQUEST[action]){
		case "input":
		
					
			 $r = $jp->sql("select count(*) as j from barang WHERE kdbrg='".$_REQUEST['kdbrg']."' ");
			 $o=$jp->fetch($r);
			 $kata = $_POST['id_edit'];
			 $jumlah = strlen($kata);
			 
			
		 
			if(($o['j']>0) && ($jumlah<=0)){
			  $jp->alert('Data Barang Sudah Dimasukan...');
			  $jp->gotox("index.php?page=barang");
			  }
			  else {
			
			$q = "replace into barang set "
			." kdbrg='".$_POST[kdbrg]."',nmbrg=\"".$_POST[nmbrg]."\" "
			." ,kdkategori='".$_POST[kdkategori]."',harga=\"".$_POST[harga]."\", disk=\"".$_POST[disk]."\""
			." ,stok='".$_POST[stok]."',berat=".$_POST[berat]." "
			." ,deskripsi=\"".$_POST[deskripsi]."\"  ";
		
			# print_r($_REQUEST);									
			if($_FILES['file']['name']!=''){
			$jp->UploadImage($_POST['kdbrg'].".jpg",APP_ROOT."/uploaddir/","file");
			}
			$jp->sql($q);
			$jp->alert('Data Barang\nTelah tersimpan...');
			$jp->gotox("index.php?page=barang");}
		break;
		
		
		
		case "delete":
			$r = $jp->sql("delete from barang where kdbrg=\"".$_REQUEST[kdbrg]."\"");
			$jp->alert('Data Barang\nTelah dihapus...');
			$jp->gotox("index.php?page=barang");			
		break;
		default:
			$jp->gotox("index.php?page=barang");		
		break;
		}
	break;
	
	case "order":
		switch($_REQUEST[action]){
		case "input":
			if($_REQUEST[status]=='0'){
				$r = $jp->sql("update transaksi set status='1', tgkirim=CURRENT_DATE  where notransaksi=\"".$_REQUEST[notransaksi]."\"");
						
			}
			if($_REQUEST[status]=='1'){
				$r = $jp->sql("update transaksi set status='0' where notransaksi=\"".$_REQUEST[notransaksi]."\"");
			}
			$jp->alert('Data Order\nTelah diatur...');
			$jp->gotox("index.php?page=brgout");		
			break;
				default:
			$jp->gotox("index.php?page=brgout");		
		break;
		}
	break;
		

	
	
	
	# Do Manajemen User
	case "user":
	switch($_REQUEST[action]){
		case "input":
			if($_REQUEST[iduser]!=''){
				$q="update tbuser set namauser='".$_POST[user]."',passuser='".$_POST[pass]."'"
				."where iduser=".$_REQUEST[iduser]."";
				//echo $q;
				$jp->sql($q);
				$jp->alert("Data telah diubah");
			}else{
			
			 $r = $jp->sql("select count(*) as j from tbuser WHERE namauser='".$_REQUEST[user]."' ");
			 $o=$jp->fetch($r);
					
		 
			if(($o['j']>0)){
			  $jp->alert('Data Admin Sudah Dimasukan...');
			  $jp->gotox("index.php?page=manajuser");
			  }
			  else {
		
				$q="insert into tbuser set namauser='".$_POST[user]."',passuser='".$_POST[pass]."'";
				$jp->sql($q);
				$jp->alert("Data tersimpan");
				}
			}
		break;
		case "hapus":
			$q = "delete from tbuser "
			."where iduser=".$_REQUEST[del]."";
			$jp->sql($q);
			$jp->alert("Data Terhapus...");
		break;
	}
	$jp->gotox("index.php?page=manajuser");
	break;
	
	# Do Manajemen Biaya Kirim
	case "biayakirim":
	switch($_REQUEST[action]){
		case "input":
				$jmldata = mysql_num_rows($jp->sql("select * from biayakirim  where kota ='".$_POST[kota]."'"));
				if ($jmldata==0)
					{
						$q2="insert into biayakirim set kota='".$_POST[kota]."',biaya=".$_POST[biaya]."";
						$jp->sql($q2);
						$jp->alert("Data tersimpan");
					}
				else
				if ($jmldata >= 1)
					{
						$q3="update biayakirim set biaya=".$_POST[biaya]." where kota='".$_POST[kota]."'";
						$jp->sql($q3);
						$jp->alert("Data terupdate");
					}
				break;
				
		case "delete":
			$r = $jp->sql("delete from biayakirim where kota=\"".$_REQUEST[kota]."\"");
			$jp->alert('Data Biaya Kirim \n Telah dihapus...');
			break;
	}
	$jp->gotox("index.php?page=biayakirim");
	break;
	

}

?>