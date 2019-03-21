<div class="main-content">
	<div class="container-fluid">
		<h3 class="page-title" style="color: #00008B">Data Pengguna</h3>
		<?php
			$notif = $this->session->flashdata('notif');
			if($notif != NULL){
				echo '
					<div class="alert alert-danger">'.$notif.'</div>
				';
			}
		?>
		<div class="row">
			<div class="col-md-12">
				<!-- TABLE STRIPED -->
				<div class="panel">
					<div class="panel-body">

						
						<table class="table table-striped table-hover table-bordered js-basic-example dataTable">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Username</th>
									<th>Level</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$no = 1;
								foreach ($pengguna as $b) {
									echo '
										<tr>
											<td>'.$no.'</td>
											<td>'.$b->nama_kasir.'</td>
											<td>'.$b->username.'</td>
											<td>'.$b->level.'</td>
											<td>
												<a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modal_ubah_pengguna" onclick="prepare_ubah_pengguna('.$b->id_kasir.')">Ubah</a>
												<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal_hapus_pengguna" onclick="prepare_hapus_pengguna('.$b->id_kasir.')">Hapus</a>
											</td>
										</tr>
									';
									$no++;
								}
							?>
							</tbody>
						</table>
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_tambah_pengguna">Tambah Pengguna</button>
					</div>
				</div>
				<!-- END TABLE STRIPED -->
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div id="modal_tambah_pengguna" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah pengguna</h4>
      </div>
      <form action="<?php echo base_url('index.php/pengguna/tambah'); ?>" method="post">
	      <div class="modal-body">
	        	<input type="text" class="form-control" placeholder="Nama" name="nama_kasir">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Username" name="username">
	        	<br>
	        	<input type="password" class="form-control" placeholder="Password" name="password">
	        	<br>
	        	<select class="form-control" name="level">
	        		<option value="1">1</option>
	        		<option value="2">2</option>
	        	</select>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<div id="modal_ubah_pengguna" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah pengguna</h4>
      </div>
      <form action="<?php echo base_url('index.php/pengguna/ubah'); ?>" method="post" enctype="multipart/form-data">
	      <div class="modal-body">
	        	<input type="hidden" name="ubah_id_kasir" id="ubah_id_kasir">
	        	<input type="text" class="form-control" placeholder="Nama" name="ubah_nama_kasir" id="ubah_nama_kasir">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Username" name="ubah_username" id="ubah_username">
	        	<br>
	        	<input type="password" class="form-control" placeholder="Password" name="ubah_password" id="ubah_password">
	        	<br>
	        	<select class="form-control" name="ubah_level" id="ubah_level">
	        		<option value="1">1</option>
	        		<option value="2">2</option>
	        	</select>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<div id="modal_hapus_pengguna" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi Hapus pengguna</h4>
      </div>
      <form action="<?php echo base_url('index.php/pengguna/hapus'); ?>" method="post">
	      <div class="modal-body">
	        	<input type="hidden" name="hapus_id_kasir"  id="hapus_id_kasir">
	        	<p>Apakah anda yakin menghapus pengguna <b><span id="hapus_nama"></span></b> ?</p>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-danger" name="submit" value="YA">
	        <button type="button" class="btn btn-default" data-dismiss="modal">TIDAK</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
	
	function prepare_ubah_pengguna(id)
	{
		$("#ubah_id_kasir").empty();
		$("#ubah_nama_kasir").empty();
		$("#ubah_username").empty();
		$("#ubah_password").empty();
		$("#ubah_level").val();

		$.getJSON('<?php echo base_url(); ?>index.php/pengguna/get_data_pengguna_by_id/' + id,  function(data){
			$("#ubah_id_kasir").val(data.id_kasir);
			$("#ubah_nama_kasir").val(data.nama_kasir);
			$("#ubah_username").val(data.username);
			$("#ubah_password").val(data.password);
			$("#ubah_level").val(data.level);
		});
	}

	function prepare_hapus_pengguna(id)
	{
		$("#hapus_id_kasir").empty();
		$("#hapus_nama_kasir").empty();

		$.getJSON('<?php echo base_url(); ?>index.php/pengguna/get_data_pengguna_by_id/' + id,  function(data){
			$("#hapus_id_kasir").val(data.id_kasir);
			$("#hapus_nama_kasir").text(data.nama_kasir);
		});
	}
</script>
