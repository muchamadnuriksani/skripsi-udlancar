<?php
//session_start();
class jcore{
	function jcore(){
		//create new instance this class		
	}
	
	function config()
	{
		include "config.inc.php";
		return $db;
	}
	
	function doConnect()
	{
	//memanggil koneksi databases
		$config = $this->config();
		$this->conn=mysql_connect($config['host'],$config['login'],$config['password']);
		mysql_select_db($config['name']);
		return $this->conn;
	}
	
	function sql($sql)
	{
		$this->doConnect();
		$rs = mysql_query($sql);
		return $rs;
	}
	
	function fetch($r)
	{
		$o = mysql_fetch_array($r);
		return $o;
	}
	
	
	function cekUser($user,$pass)
	{
		
		$q="select count(*) as j from tbuser where namauser='".$user."' "
		." and passuser='".$pass."' ";
		$r = $this->sql($q);
		$o = $this->fetch($r);
		if($o[0]>0){
			$_SESSION['login']=true;
			$q1="select * from tbuser where namauser='".$user."' "
			." and passuser='".$pass."' ";
			$r1 = $this->sql($q1);
			$o1 = $this->fetch($r1);
			$_SESSION['namauser']=$o1["namauser"];
			$_SESSION['userpa']=$o1["passuser"];
			$_SESSION['role']=$o1["role"];			
		}
		return $o[0];
	}

	function cekidplg($user,$pass)
	{
		
		$q="select count(*) as j from pelanggan where idplg='".$user."' "
		." and pass='".$pass."' ";
		$r = $this->sql($q);
		$o = $this->fetch($r);
		if($o[0]>0){
			$_SESSION['login_']=true;
			$q1="select * from pelanggan where idplg='".$user."' "
			." and pass='".$pass."' ";
			$r1 = $this->sql($q1);
			$o1 = $this->fetch($r1);
			$_SESSION['idplg']=$o1["idplg"];
			$_SESSION['nama']=$o1["nama"];
			$_SESSION['alamat']=$o1["alamat"];
			$_SESSION['kota']=$o1["kota"];
			
			
		}
		return $o[0];
	}
	
	function ceklogin()
	{
		if (isset($_SESSION["login"])) {
			$ok = true;
			return $ok;
		} else {
		}
	}
	

	
	function kdauto($tabel, $inisial){
			$struktur	= $this->sql("SELECT * FROM $tabel");
			$field		= mysql_field_name($struktur,0);
			$panjang	= mysql_field_len($struktur,0);
			$qry		= $this->sql("SELECT max(".$field.") FROM ".$tabel);
			//echo $qry;
			$row	= $this->fetch($qry); 
			if ($row[0]=="") {
				$angka=0;
			}
			else {
				$angka		= substr($row[0], strlen($inisial));
			}
			
			$angka++;
			$angka	=strval($angka); 
			$tmp	="";
			for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
				$tmp=$tmp."0";	
			}
			return $inisial.$tmp.$angka;
		}

	
		function UploadBukti($fupload_name,$direktori,$inputfile){
		$file_upload = $direktori.$fupload_name;
		$nama_gbr_asli = $_FILES["".$inputfile.""]['tmp_name'];
		move_uploaded_file($nama_gbr_asli, $file_upload);
		
		$gbr_asli = imagecreatefromjpeg($file_upload);
		$lebar = imagesx($gbr_asli);
		$tinggi = imagesy($gbr_asli);
		
		$tum_lebar_front = 550;
		$tum_tinggi_front = 400;
		
	
		$gbr_thumb_front = imagecreatetruecolor($tum_lebar_front,$tum_tinggi_front);
		imagecopyresampled($gbr_thumb_front, $gbr_asli, 0,0,0,0,$tum_lebar_front, $tum_tinggi_front, $lebar, $tinggi);
		
			
		imagejpeg($gbr_thumb_front,$direktori . "bukti_" . $fupload_name);
		
		if (file_exists($file_upload)){
			unlink($direktori . $fupload_name);
		}
		imagedestroy($gbr_asli);
		imagedestroy($gbr_thumb_front);
	}
	
	
	function alert($pesan)
	{
		echo "\n<script language=\"javascript\">alert('$pesan');</script>";
	}
	
	function gotox($url)
	{
		echo "<html><head><META HTTP-EQUIV=\"Refresh\" content=\"0;URL=$url\"></head></html>"; exit;
	}
	
	function uploadfile($uploaddir,$inputfile)
	{
		if (!move_uploaded_file($_FILES["".$inputfile.""]['tmp_name'], $uploaddir.$_FILES["".$inputfile.""]['name'])) {
			echo error;
			echo $_FILES["".$inputfile.""]['name'];
			return 0;
		}
	}

	function UploadImage($fupload_name,$direktori,$inputfile){
		$file_upload = $direktori.$fupload_name;
		$nama_gbr_asli = $_FILES["".$inputfile.""]['tmp_name'];
		move_uploaded_file($nama_gbr_asli, $file_upload);
		
		$gbr_asli = imagecreatefromjpeg($file_upload);
		$lebar = imagesx($gbr_asli);
		$tinggi = imagesy($gbr_asli);
		
		$tum_lebar = 50;
		$tum_tinggi = 50;
		
		$tum_lebar_front = 550;
		$tum_tinggi_front = 400;
		
		$tum_lebar_med = 150;
		$tum_tinggi_med = ($tum_lebar_med/$lebar) * $tinggi;
		
		$gbr_thumb = imagecreatetruecolor($tum_lebar,$tum_tinggi);
		imagecopyresampled($gbr_thumb, $gbr_asli, 0,0,0,0,$tum_lebar, $tum_tinggi, $lebar, $tinggi);
		
		$gbr_thumb_front = imagecreatetruecolor($tum_lebar_front,$tum_tinggi_front);
		imagecopyresampled($gbr_thumb_front, $gbr_asli, 0,0,0,0,$tum_lebar_front, $tum_tinggi_front, $lebar, $tinggi);
		
		$gbr_thumb_med = imagecreatetruecolor($tum_lebar_med,$tum_tinggi_med);
		imagecopyresampled($gbr_thumb_med, $gbr_asli, 0,0,0,0,$tum_lebar_med, $tum_tinggi_med, $lebar, $tinggi);
		
		imagejpeg($gbr_thumb,$direktori . "small_" . $fupload_name);
		imagejpeg($gbr_thumb_med,$direktori . "small_med_" . $fupload_name);
		imagejpeg($gbr_thumb_front,$direktori . "small_front_" . $fupload_name);
		
		if (file_exists($file_upload)){
			unlink($direktori . $fupload_name);
		}
		imagedestroy($gbr_asli);
		imagedestroy($gbr_thumb);
		imagedestroy($gbr_thumb_med);
		imagedestroy($gbr_thumb_front);
	}

	function terbilang($x)
	{
		$abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		if ($x < 12)
		return " " . $abil[$x];
		elseif ($x < 20)
		return $this->Terbilang($x - 10) . "belas";
		elseif ($x < 100)
		return $this->Terbilang($x / 10) . " puluh" . $this->Terbilang($x % 10);
		elseif ($x < 200)
		return " seratus" .$this-> Terbilang($x - 100);
		elseif ($x < 1000)
		return $this->Terbilang($x / 100) . " ratus" . $this->Terbilang($x % 100);
		elseif ($x < 2000)
		return " seribu" . $this->Terbilang($x - 1000);
		elseif ($x < 1000000)
		return $this->Terbilang($x / 1000) . " ribu" . $this->Terbilang($x % 1000);
		elseif ($x < 1000000000)
		return $this->Terbilang($x / 1000000) . " juta" . $this->Terbilang($x % 1000000);
	}
	
	function todate($tanggalformatinggris) 
	{
		$x	= explode("-", $tanggalformatinggris);
		$x  = "$x[2]-$x[1]-$x[0]";
		return $x;
	}

		function pt($angka){
		$ret =  number_format($angka, 0);
		$ret = ereg_replace(",",".",$ret);
		return $ret;
	}


	function getOverTime($kota,$jenis){
		$q ="select hrgsewa,overtime from tb_layanan "
		."where kota='".$kota."' and jenis='".$jenis."' and lamasewa=12";
		$r = $this->sql($q);
		$o = $this->fetch($r);
		if(mysql_num_rows($r)>0){
			$ret = (0.10*$o["hrgsewa"]);
		}else{
			$ret = 0;
		}
		return $ret;
	}

	function uploadBlob($picture) {
		$file		= $_SERVER['DOCUMENT_ROOT'].'/'.$picture;
		$fh			= fopen($file, "rb");
		$content	= mysql_escape_string(fread($fh, filesize($file)));
		$rs			= $this->sql("insert into picture(pic) values('$content')");

	}
	
	

	function readBlob($id){
		$host = 'localhost:/path/to/your.gdb';
		$dbh = ibase_connect($host, "root", "");
		$stmt = 'SELECT * FROM barang';

		$sth = ibase_query($dbh, $stmt) or die(ibase_errmsg());

		/*$q = "select brgpict from barang where brgid='".$id."'";
		$r = ibase_query($q);
		$data = ibase_fetch_object($r);
		$blob_data = ibase_blob_info($data->BLOB_VALUE);
		$blob_hndl = ibase_blob_open( $data->BLOB_VALUE );
		print ibase_blob_get( $blob_hndl, $blob_data[0] );*/
	}

}
?>