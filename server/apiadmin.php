<?php
 
// get the HTTP method, path and body of the request
$method = $_SERVER['REQUEST_METHOD'];
//echo $method;
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
//echo $request[1];
// connect to the mysql database
$link = mysqli_connect('localhost', 'root', '', 'dbrest');
mysqli_set_charset($link,'utf8');

//$table = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
$table = array_shift($request);
$kode = array_shift($request);
$kdbrg = array_shift($request);
$tg = array_shift($request);
$tg1 = array_shift($request);
$key = array_shift($request)+0;
//echo $kdbrg;
// build the SET part of the SQL command
$set = '';
for ($i=0;$i<count($columns);$i++) {
  $set.=($i>0?',':'').'`'.$columns[$i].'`=';
  $set.=($values[$i]===null?'NULL':'"'.$values[$i].'"');
}

// create SQL based on HTTP method
switch ($method) {
  case 'GET':
  	if ($table=='barang')
  	{$sql = "select a.*,b.nmkategori from barang a inner join kategori b on a.kdkategori=b.kdkategori ".($key?" WHERE $kode='$kdbrg'":''); break;}
	else if ($table=='transaksi')
  	{$sql = "select distinct(a.notransaksi) as notransaksi,a.status,a.tgtransaksi as tgorder,a.tgkirim,b.idplg,b.nama,a.noresi from transaksi a "
."inner join pelanggan b on a.idplg=b.idplg WHERE notransaksi !='TEMP' ".($key?" AND $kode='$kdbrg' AND tgtransaksi>='$tg' AND tgtransaksi<='$tg1'":'' )." order by a.status,a.tgtransaksi desc,a.notransaksi desc "; break;}
else if ($table=='transaksi1')
  	{$sql = "select notransaksi,noresi from transaksi WHERE notransaksi='$kode' "; break;}
	else if ($table=='jual')
  	{$sql = "select distinct(a.notransaksi) as notransaksi,a.status,a.tgkirim,a.tgtransaksi as tgorder,b.idplg,b.nama,b.alamat,b.kota,b.telepon, c.tanggal,c.isi, SUM(e.bayar) as byrr from transaksi a inner join pelanggan b on a.idplg=b.idplg left join konfirm c on a.notransaksi=c.notransaksi left join konfirm e on a.notransaksi=e.notransaksi where a.notransaksi!='TEMP' ".($key?" AND $kode='$kdbrg' AND tgtransaksi>='$tg' AND tgtransaksi<='$tg1'":'' )." group by a.notransaksi order by tanggal desc "; break;}
	else 
	{$sql = "select * from $table ".($key?" WHERE $kode='$kdbrg'":''); break;}
	
	case 'PUT':
    $sql = "update $table set $set where $kode=$kdbrg"; break;
  case 'POST':
    $sql = "insert into $table set $set"; break;
  case 'DELETE':
    $sql = "delete $table where id=$key"; break;
}
//echo $sql;
// excecute SQL statement
$result = mysqli_query($link,$sql);
 
// die if SQL statement failed
if (!$result) {
  http_response_code(404);
  die(mysqli_error());
}
 
// print results, insert id or affected row count
if ($method == 'GET') {
  if (!$key) echo '[';
  for ($i=0;$i<mysqli_num_rows($result);$i++) {
    echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
  }
  if (!$key) echo ']';
} elseif ($method == 'POST') {
  echo mysqli_insert_id($link);
} else {
  echo mysqli_affected_rows($link);
}
 
// close mysql connection
mysqli_close($link);