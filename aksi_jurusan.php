
<?php
include('koneksi.php');
if ($_GET['proses']=='tambah') {
if (isset($_POST['submit']))
{
	$tambah=mysql_query("INSERT INTO jurusan (nama_jurusan,jenjang) 
	VALUES ('$_POST[nama_jurusan]','$_POST[jenjang]')");
	
	if($tambah)
		header("location:index.php?page=jurusan");	
}
}
else if ($_GET['proses']=='hapus') {
//skrip hapus
$hapus = mysql_query ("DELETE FROM jurusan where id_jurusan='$_GET[id_hapus]'");
if($hapus)
	header("location:index.php?page=jurusan");
}
else if ($_GET['proses']=='update') {
//skrip update
$ubah = mysql_query ("UPDATE jurusan SET
						nama_jurusan 	= '$_POST[nama_jurusan]',
						jenjang 		= '$_POST[jenjang]' WHERE id_jurusan='$_POST[id_jurusan]'");
if($ubah){
	header("location:index.php?page=jurusan");
}
}

?>