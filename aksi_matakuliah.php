<?php
include('koneksi.php');
if ($_GET['proses']=='tambah') {
if (isset($_POST['submit']))
{
	$tambah=mysql_query("INSERT INTO matakuliah (kode,nama_makul,sks,jam) 
	VALUES ('$_POST[kode]','$_POST[nama_makul]','$_POST[sks]','$_POST[jam]')");
	
	if($tambah)
		header("location:index.php?page=matakuliah");	
}
}
else if ($_GET['proses']=='hapus') {
//skrip hapus
$hapus = mysql_query ("DELETE FROM matakuliah where kode='$_GET[id_hapus]'");
if($hapus)
	header("location:index.php?page=matakuliah");
}
else if ($_GET['proses']=='update') {
//skrip update
$ubah = mysql_query ("UPDATE matakuliah SET
						kode 			= '$_POST[kode]',
						nama_makul 		= '$_POST[nama_makul]',
						sks 			= '$_POST[sks]',
						jam				= '$_POST[jam]' WHERE kode='$_POST[kode]'");
if($ubah){
	header("location:index.php?page=matakuliah");
}
}

?>