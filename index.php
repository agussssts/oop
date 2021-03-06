<?php

require_once ('database.php');
require_once ('sql.php');

$obj = new crud;

if($_SERVER['REQUEST_METHOD']=='POST'):
	$nim  = $_POST['nim'];
	$nama = $_POST['nama_mahasiswa'];
	if($obj->insertData($nim, $nama)):
		echo '<div>Data berhasil disimpan</div>';
	else:

		echo '<div>Data berhasil disimpan</div>';
	endif;
endif;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>

	<link href="../assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

</head>
<body>
	<div class="container">
		<div class="card shadow mb-4 mt-4">
	            <div class="card-header py-3">
	                <h3 style="color:red;font-family:sans" class="m-0 font-weight-bold text-primary">Data Mahasiswa STMIK AUB Surakarta</h3>
	            </div>
	        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		        <div class="card-body">
					<div class="row">
						
						<div class="col-md-4">
							<div class="form-group">
								<label>NIM :</label>
								<input type="text" class="form-control" name="nim"/>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>NAMA MAHASISWA :</label>
								<input type="text" class="form-control" name="nama_mahasiswa"/>
							</div>
						</div>
						<div class="col-md-4">
							
								<button type="submit" class="mt-4 btn btn-md btn-primary"> Simpan</button>
						
						</div>
					</div>
				</div>
			</form>
			<div class="row m-auto">
				<table border="1" class="table table-bordered">
					<tr>
						<th>NO</th>
						<th>NIM</th>
						<th>NAMA MAHASISWA</th>
						<th>AKSI</th>
					</tr>
					<?php 
					$no=1;
						$data=$obj->showData();
						if($data->rowCount()>0){
						while($row=$data->fetch(PDO::FETCH_ASSOC)){
					?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $row['nim']; ?></td>
						<td><?php echo $row['nama_mahasiswa']; ?></td>
						<td>
							<?php echo "<a class='btn btn-sm btn-primary' href='edit.php?id_mahasiswa=".$row['id_mahasiswa']."'>edit</a>"; ?>
							|
							<?php echo "<a class='btn btn-sm btn-primary' href='delete.php?id_mahasiswa=".$row['id_mahasiswa']."'>delete</a>"; ?>
						</td>
					</tr>
					<?php $no+=1; } $data->closeCursor();

									}else{
										echo '
											<tr>
												<td> Not found</td>
											</tr>
										';
									}
									?>
				</table>
			</div>
		</div>
	</div>

<script src="../assets/jquery/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>