<?php
include('koneksi.php');
if ($_GET['proses']=='tambah') {
if (isset($_POST['submit']))
{
	$tambah = mysql_query("INSERT INTO mahasiswa (nim,nama_mhs,jekel,email,id_jurusan,id_prodi,no_telp,alamat)
	VALUES ('$_POST[nim]','$_POST[nama_mhs]','$_POST[jekel]','$_POST[email]','$_POST[id_jurusan]',
	'$_POST[id_prodi]','$_POST[no_telp]','$_POST[alamat]')");
	
	if($tambah)
		header("location:index.php?page=mahasiswa");	
}
}
else if ($_GET['proses']=='hapus') {
//skrip hapus
$hapus = mysql_query ("DELETE FROM mahasiswa where nim='$_GET[id_hapus]'");
if($hapus)
	header("location:index.php?page=mahasiswa");
}
else if ($_GET['proses']=='update') {
//skrip update
$ubah = mysql_query ("UPDATE mahasiswa SET
						
				nama_mhs 		= '$_POST[nama_mhs]',
				jekel	 		= '$_POST[jekel]',
				email			= '$_POST[email]',
				id_jurusan 		= '$_POST[id_jurusan]',
				id_prodi 		= '$_POST[id_prodi]',
				no_telp 		= '$_POST[no_telp]',
				alamat 			= '$_POST[alamat]' WHERE nim='$_POST[nim]'");
if($ubah){
	header("location:index.php?page=mahasiswa");
}
}

?>