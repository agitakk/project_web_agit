<?php
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
case 'entri' :
?>
<h1>Entri Data Dosen</h1>
<form action="aksi_dosen.php?proses=tambah" method="post">

	<div class="form-group">
		<label>NIP</label>
		<input type="text" name="nip" class="form-control">
	</div>
	<div class="form-group">
		<label>Nama Dosen</label>
		<input type="text" name="nama_dosen" class="form-control">
	</div>
	<div class="form-group">
		<label>Jenis Kelamin</label>
		<input type="text" name="jekel" class="form-control">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" name="email" class="form-control">
	</div>
	<div class="form-group">
		<label>No Telephone</label>
		<input type="text" name="no_telp" class="form-control">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<textarea cols=40 rows=5 name="alamat"class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label>
			<input type="submit" value="Simpan" name="submit" class="btn btn-primary">
			<input type="reset" value="Reset" name="reset" class="btn btn-danger">
		</label>
	</div>
</table>

<?php
break;
case 'list' :
?>

<h1>Data Dosen</h1>
<a href="?page=dosen&aksi=entri" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Entri Biodata Dosen</a>
<a href="laporan/report_dosen.php" class="btn btn-primary"><span class="fa fa-plus-circle"></span>Cetak</a>
<table class="table table-bordered table-responsive" id="dataTables-example">
<thead> 
	<tr>
		<th>No</th>
		<th>NIP</th>
		<th>Nama Dosen</th>
		<th>Jenis Kelamin</th>
		<th>Email</th>
		<th>No Telephone</th>
		<th>Alamat</th>
		<th>Aksi</th>
	</tr>
</thead>
</tbody>
	<?php
	$q=mysql_query("SELECT *FROM dosen");
	$no=1;
	while ($data = mysql_fetch_array($q)) 
	{ 
	?>
		<tr align=center>
			<td><?php echo $no ?></td>
			<td><?php echo $data['nip'] ?></td>
			<td><?php echo $data['nama_dosen'] ?></td>
			<td><?php echo $data['jekel'] ?></td>
			<td><?php echo $data['email'] ?></td>
			<td><?php echo $data['no_telp'] ?></td>
			<td><?php echo $data['alamat'] ?></td>
			<td><a href="aksi_dosen.php?proses=hapus&id_hapus=<?php echo $data['nip'] ?>" onclick="return confirm('Apakah Anda Yakin?')"class="btn btn-danger"><i class="fa fa-trash-o"></i>Delete</a> | 
			<a href="?page=dosen&aksi=edit&id_edit=<?php echo $data['nip'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i>Edit</a></td>			 
		</tr>
		<?php
		$no++;
	}
		?>	
</table>

<?php
break;
case 'edit' :
?>
<?php
$ambil = mysql_query ("SELECT *FROM dosen WHERE nip='$_GET[id_edit]'");
$data = mysql_fetch_array($ambil);
?>
<h1>Edit Data Dosen</h1>
<form action="aksi_dosen.php?proses=update" method="post">

	<div class="form-group">
		<label>NIP</label>
		<input type="text" value="<?php echo $data['nip'] ?>" name="nip" class="form-control">
	</div>
	<div class="form-group">
		<label>Nama Dosen</label>
		<input type="text" value="<?php echo $data['nama_dosen'] ?>" name="nama_dosen" class="form-control">
	</div>
	<div class="form-group">
		<label>Jenis Kelamin</label>
		<input type="text" value="<?php echo $data['jekel'] ?>" name="jekel" class="form-control">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" value="<?php echo $data['email'] ?>" name="email" class="form-control">
	</div>
	<div class="form-group">
		<label>No Telephone</label>
		<input type="text" value="<?php echo $data['no_telp'] ?>" name="no_telp" class="form-control">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<textarea cols=40 rows=5 name="alamat" value="<?php echo $data['alamat'] ?>" name="alamat" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label>
			<input type="submit" value="Simpan" name="submit" class="btn btn-primary">
			<input type="reset" value="Reset" name="reset" class="btn btn-danger">
		</label>
	</div>

</form>
<?php
break;
}
?>