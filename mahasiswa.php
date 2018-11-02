<?php
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
case 'entri' :
?>
<h1>BIODATA MAHASISWA</h1>
<form action="aksi_mahasiswa.php?proses=tambah" method="post">
	<div class="form-group">
		<label>NIM</label>
		<input type="text" name="nim" placeholder=" Nomor Induk Mahasiswa" required class="form-control">
	</div>
	<div class="form-group">
		<label>Nama Mahasiswa</label>
		<input type="text" name="nama_mhs" placeholder=" Nama Mahasiswa" required class="form-control">
	</div>	
	<div class="form-group">
		<label>Jenis Kelamin</label><br>
		<input type="radio" name="jekel" value="L">L<br/>
		<input type="radio" name="jekel" value="P" Checked>P
	</div>
	<div class="form-group">
		<label>E-Mail</label>
		<input type="text" name="email" placeholder="                         @gmail.com" class="form-control">
	</div>
	<div class="form-group">
		<label>ID Jurusan</label>
		<input type="text" name="id_jurusan" placeholder="ID Jurusan Mahasiswa" class="form-control">
	</div>
	<div class="form-group">
		<label>ID Prodi</label>
		<input type="text" name="id_prodi" placeholder="ID Prodi Mahasiswa" class="form-control">
	</div>
	<div class="form-group">
		<label>No Telephone</label>
		<input type="text" name="no_telp" placeholder="Nomor Telephone" class="form-control">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<textarea cols=40 rows=5 name="alamat"class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label>
		<input type="submit" value="Simpan" name="submit" class="btn btn-primary">
		<input type="reset" value="Reset" name="reset" class="btn btn-danger" >
		</label>
	</div>
</table>
</form>
<?php
break;
case 'list' :
?>
<h1>DATA MAHASISWA</h1>
<a href="?page=mahasiswa&aksi=entri" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Entri Biodata Mahasiswa</a>
<a href="laporan/report_mhs.php" class="btn btn-primary"><span class="fa fa-plus-circle"></span>Cetak</a>
<table class="table table-bordered table-responsive" id="dataTables-example">
<thead> 
	<tr>
		<?php
	if($_SESSION['level']=='administrator'){ 
	?>
	<th class="success">No</th><?php } ?>
		<?php
	if($_SESSION['level']=='administrator'){ 
	?>
	<th class="success">NIM</th><?php } ?>
		<?php
	if($_SESSION['level']=='administrator'){ 
	?>
	<th class="success">Nama Mahasiswa</th><?php } ?>
		<?php
	if($_SESSION['level']=='administrator'){ 
	?>
	<th class="success">Jenis Kelamin</th><?php } ?>
		<?php
	if($_SESSION['level']=='administrator'){ 
	?>
	<th class="success">Email</th><?php } ?>
		<?php
	if($_SESSION['level']=='administrator'){ 
	?>
	<th class="success">Jurusan</th><?php } ?>
		<?php
	if($_SESSION['level']=='administrator'){ 
	?>
	<th class="success">Prodi</th><?php } ?>
		<?php
	if($_SESSION['level']=='administrator'){ 
	?>
	<th class="success">No Telephone</th><?php } ?>
		<?php
	if($_SESSION['level']=='administrator'){ 
	?>
	<th class="success">Alamat</th><?php } ?>
		<?php
	if($_SESSION['level']=='administrator'){ 
	?>
	<th class="success">Aksi</th><?php } ?>

	</tr>
</thead>
<tbody>	
	<?php
	
	$q=mysql_query("SELECT * FROM mahasiswa,jurusan,prodi WHERE mahasiswa.id_jurusan=jurusan.id_jurusan AND mahasiswa.id_prodi=prodi.id_prodi");
	$no=1;
	while ($data = mysql_fetch_array($q)) 
	{ 
	?>
		<tr align=center>
			<td><?php echo $no ?></td>
			<td><?php echo $data['nim'] ?></td>
			<td><?php echo $data['nama_mhs'] ?></td>
			<td><?php echo $data['jekel'] ?></td>
			<td><?php echo $data['email'] ?></td>
			<td><?php echo $data['nama_jurusan'] ?></td>
			<td><?php echo $data['nama_prodi'] ?></td>
			<td><?php echo $data['no_telp'] ?></td>
			<td><?php echo $data['alamat'] ?></td>
			<td><a href="aksi_mahasiswa.php?proses=hapus&id_hapus=<?php echo $data['nim'] ?>" onclick="return confirm('Data akan Dihapus?')" class="btn btn-danger"><i class="fa fa-trash-o"></i>Delete</a> | 
			<a href="?page=mahasiswa&aksi=edit&id_edit=<?php echo $data['nim'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i>Edit</a></td>				 
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
$ambil = mysql_query ("SELECT *FROM mahasiswa WHERE nim='$_GET[id_edit]'");
$data = mysql_fetch_array($ambil);
?>

<h1>EDIT DATA MAHASISWA</h1>
<form action="aksi_mahasiswa.php?proses=update" method="post">

	<div class="form-group">
		<label>NIM</label>
		<input type="text" value="<?php echo $data['nim'] ?>" name="nim" required class="form-control">
	</div>
	<div class="form-group">
		<label>Nama Mahasiswa</label>
		<input type="text" value="<?php echo $data['nama_mhs'] ?>" name="nama_mhs" class="form-control">
	</div>
	<div class="form-group">
		<label>Jenis Kelamin</label><br/>
		<input type="radio" name="jekel" value="L" >L<br/>
		<input type="radio" name="jekel" value="P" Checked>P<br/>
	</div>
	<div class="form-group">
		<label>E-Mail</label>
		<input type="text" value="<?php echo $data['email'] ?>" name="email" class="form-control">
	</div>
	<div class="form-group">
		<label>ID Jurusan</label>
		<input type="text" value="<?php echo $data['id_jurusan'] ?>" name="id_jurusan" class="form-control">
		
	</div>
	<div class="form-group">
		<label>ID Prodi</label>
		<input type="text" value="<?php echo $data['id_prodi'] ?>" name="id_prodi" class="form-control">
	</div>
	<div class="form-group">
		<label>No Telp</label>
		<input type="text" value="<?php echo $data['no_telp'] ?>" name="no_telp" class="form-control">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<textarea cols=40 rows=5 name="alamat" class="form-control"><?php echo $data['alamat'] ?></textarea>
	</div>
	<div class="form-group">
		<label>
		<input type="submit" value="Simpan" name="submit" class="btn btn-primary">
		<input type="reset" value="Reset" name="reset" class="btn btn-danger" >
		</label>
	</div>
</table>
</form>
<?php
break;
}
?>

