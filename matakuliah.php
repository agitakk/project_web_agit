<?php
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
case 'entri' :
?>
<h1>Entri Data Matakuliah</h1>
<form action="aksi_matakuliah.php?proses=tambah" method="post">

	<div class="form-group">
		<label>kode</label>
		<input type="text" name="kode" class="form-control">
	</div>
	<div class="form-group">
		<label>Nama Matakuliah</label>
		<input type="text" name="nama_makul" class="form-control">
	</div>
	<div class="form-group">
		<label>SKS</label>
		<input type="text" name="sks" class="form-control">
	</div>
	<div class="form-group">
		<label>Jam</label>
		<input type="text" name="jam" class="form-control">
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

<h1>Data Matakuliah</h1>
<a href="?page=matakuliah&aksi=entri" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Entri Data Matakulaih</a>
<a href="laporan/report_matakuliah.php" class="btn btn-primary"><span class="fa fa-plus-circle"></span>Cetak</a>
<table class="table table-bordered table-responsive" id="dataTables-example">
<thead>
	<tr>
		<th>No</th>
		<th>Kode</th>
		<th>Nama Matakuliah</th>
		<th>SKS</th>
		<th>Jam</th>
		<th>Aksi</th>
	</tr>
</thead>
</tbody>
	<?php
	$q=mysql_query("SELECT *FROM matakuliah");
	$no=1;
	while ($data = mysql_fetch_array($q)) 
	{ 
	?>
		<tr align=center>
			<td><?php echo $no ?></td>
			<td><?php echo $data['kode'] ?></td>
			<td><?php echo $data['nama_makul'] ?></td>
			<td><?php echo $data['sks'] ?></td>
			<td><?php echo $data['jam'] ?></td>
			<td><a href="aksi_matakuliah.php?proses=hapus&id_hapus=<?php echo $data['kode'] ?>" onclick="return confirm('Apakah Anda Yakin?')"class="btn btn-danger"><i class="fa fa-trash-o"></i>Delete</a> | 
			<a href="?page=matakuliah&aksi=edit&id_edit=<?php echo $data['kode'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i>Edit</a></td>			 
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
$ambil = mysql_query ("SELECT *FROM matakuliah WHERE kode='$_GET[id_edit]'");
$data = mysql_fetch_array($ambil);
?>
<h1>Edit Data Matakuliah</h1>
<form action="aksi_matakuliah.php?proses=update" method="post">

	<div class="form-group">
		<label>Kode</label>
		<input type="text" value="<?php echo $data['kode'] ?>" name="kode" class="form-control">
	</div>
	<div class="form-group">
		<label>Nama Matakuliah</label>
		<input type="text" value="<?php echo $data['nama_makul'] ?>" name="nama_makul" class="form-control">
	</div>
	<div class="form-group">
		<label>SKS</label>
		<input type="text" value="<?php echo $data['sks'] ?>" name="sks" class="form-control">
	</div>
	<div class="form-group">
		<label>Jam</label>
		<input type="text" value="<?php echo $data['jam'] ?>" name="jam" class="form-control">
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