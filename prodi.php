<?php
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
case 'entri' :
?>
<h1>ENTRI DATA PROGRAM STUDI</h1>
<form action="aksi_prodi.php?proses=tambah" method="post">
<div class="form-group">
		<label></label>
		<input type="hidden" name="id_prodi" class="form-control">
</div>
<div class="form-group">
		<label>Nama Program Studi</label>
		<input type="text" name="nama_prodi" class="form-control">
</div>
<div class="form-group">
		<label>Jenjang</label>
		<input type="text" name="jenjang" class="form-control">
</div>
<div class="form-group">
		<label>ID Jurusan</label>
		<input type="text" name="id_jurusan" class="form-control">
</div>
	<div class="form-group">
		<label>
			<input type="submit" value="Simpan" name="submit" class="btn btn-primary">
			<input type="reset" value="Reset" name="reset" class="btn btn-danger">
		</label>
	</div>
</table>
</form>

<?php
break;
case 'list' :
?>
<h1>DATA PRODI</h1>
<a href="?page=prodi&aksi=entri" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Entri Data Prodi</a>
<a href="laporan/report_prodi.php" class="btn btn-primary"><span class="fa fa-plus-circle"></span>Cetak</a>
<table class="table table-bordered table-responsive" id="dataTables-example">
<thead> 
	<tr>
		<th>No</th>
		<th>Nama Program Studi</th>
		<th>Jenjang</th>
		<th>ID Jurusan</th>
		<th>Aksi</th>
	</tr>
</thead>
</tbody>
	<?php
	$q=mysql_query("SELECT *FROM prodi");
	$no=1;
	while ($data = mysql_fetch_array($q)) 
	{ 
	?>
		<tr align=center>
			<td><?php echo $no ?></td>
			<td><?php echo $data['nama_prodi'] ?></td>
			<td><?php echo $data['jenjang'] ?></td>
			<td><?php echo $data['id_jurusan'] ?></td>
			<td><a href="aksi_prodi.php?proses=hapus&id_hapus=<?php echo $data['id_prodi'] ?>" onclick="return confirm('Apakah Anda Yakin?')"class="btn btn-danger"><i class="fa fa-trash-o"></i>Delete</a> | 
			<a href="?page=prodi&aksi=edit&id_edit=<?php echo $data['id_prodi'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i>Edit</a></td>				 
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
$ambil = mysql_query ("SELECT *FROM prodi WHERE id_prodi='$_GET[id_edit]'");
$data = mysql_fetch_array($ambil);
?>

<h1>EDIT DATA PRODI</h1>
<form action="aksi_prodi.php?proses=update" method="post">

	<div class="form-group">
		<label></label>
		<input type="hidden" value="<?php echo $data['id_prodi'] ?>" name="id_prodi" class="form-control">
	</div>
	<div class="form-group">
		<label>Nama Program Studi</label>
		<input type="text" value="<?php echo $data['nama_prodi'] ?>" name="nama_prodi" class="form-control">
	</div>
	<div class="form-group">
		<label>Jenjang</label>
		<input type="text" value="<?php echo $data['jenjang'] ?>" name="jenjang" class="form-control">
	</div>
		<div class="form-group">
		<label>ID Jurusan</label>
		<input type="text" value="<?php echo $data['id_jurusan'] ?>" name="id_jurusan" class="form-control">
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