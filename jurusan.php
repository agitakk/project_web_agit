<?php
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
case 'entri' :
?>
<h1>Entri Data Jurusan</h1>
<form action="aksi_jurusan.php?proses=tambah" method="post">

	<div class="form-group">
		<label>Nama Jurusan</label>
		<input type="text" name="nama_jurusan" class="form-control">
	</div>
	<div class="form-group">
		<label>Jenjang</label>
		<input type="text" name="jenjang" class="form-control">
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

<h1>DATA JURUSAN</h1>
<a href="?page=jurusan&aksi=entri" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Entri Biodata Jurusan</a>
<a href="laporan/report_jurusan.php" class="btn btn-primary"><span class="fa fa-plus-circle"></span>Cetak</a>
<table class="table table-bordered table-responsive" id="dataTables-example">
<thead> 
	<tr>
		<th>No</th>
		<th>Nama Jurusan</th>
		<th>Jenjang</th>
		<th>Aksi</th>
	</tr>
</thead>
<tbody>	
	<?php
	$q=mysql_query("SELECT *FROM jurusan");
	$no=1;
	while ($data = mysql_fetch_array($q)) 
	{ 
	?>
		<tr align=center>
			<td><?php echo $no ?></td>
			<td><?php echo $data['nama_jurusan'] ?></td>
			<td><?php echo $data['jenjang'] ?></td>
			<td><a href="aksi_jurusan.php?proses=hapus&id_hapus=<?php echo $data['id_jurusan'] ?>" onclick="return confirm('Apakah Anda Yakin?')"class="btn btn-danger"><i class="fa fa-trash-o"></i>Delete</a> | 
			<a href="?page=jurusan&aksi=edit&id_edit=<?php echo $data['id_jurusan'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i>Edit</a></td>			 
		</tr>
		<?php
		$no++;
	}
		?>	
</tbody>
</table>
<?php
break;
case 'edit' :
?>
<?php
$ambil = mysql_query ("SELECT *FROM jurusan WHERE id_jurusan='$_GET[id_edit]'");
$data = mysql_fetch_array($ambil);
?>
<h1>EDIT DATA JURUSAN</h1>
<form action="aksi_jurusan.php?proses=update" method="post">

	<div class="form-group">
		<label></label>
		<input type="hidden" value="<?php echo $data['id_jurusan'] ?>" name="id_jurusan" class="form-control">
	</div>
	<div class="form-group">
		<label>Nama Jurusan</label>
		<input type="text" value="<?php echo $data['nama_jurusan'] ?>" name="nama_jurusan" class="form-control">
	</div>
	<div class="form-group">
		<label>Jenjang</label>
		<input type="text" value="<?php echo $data['jenjang'] ?>" name="jenjang" class="form-control">
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