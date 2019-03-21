

								<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_tambah_buku"> Tambah Buku</button>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>Kode</th>
												<th>Cover</th>
												<th>Judul</th>
												<th>Ketegori</th>
												<th>Tahun</th>
												<th>Penulis</th>
												<th>Penerbit</th>
												<th>Stok</th>
												<th>Harga</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no =1;
											foreach ($buku as $b ) {
												echo'
											
						<tr>
						<td>'.$no.'</td>
						<td>'.$b->kode_buku.'</td>
						<td><img src="'.base_url().'assets/cover_buku/'.$b->foto_cover.'" width="50px" /></td>
						<td>'.$b->judul_buku.'</td>
						<td>'.$b->nama_kategori.'</td>
						<td>'.$b->tahun.'</td>
						<td>'.$b->penulis.'</td>
						<td>'.$b->penerbit.'</td>
						<td>'.$b->stok.'</td>
						<td>'.$b->harga.'</td>

						<td>
						<a href="#" class="btn btn-info btn-sm " data-toggle="modal" data-target="#modal_ubah_buku" onclick="prepare_ubah_buku('.$b->id_buku.')">Ubah</a>
						<a href="#" class="btn btn-info btn-sm " data-toggle="modal" data-target="#modal_hapus_buku" onclick="prepare_hapus_buku('.$b->id_buku.')">Hapus</a>

						</td>
						</tr>
											
											';$no++;
										}
										?>
										</tbody>
									</table>
								

<!-- modal tambah -->
<div class="modal fade" id="modal_tambah_buku" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Tambah Buku</h4>
	
	</div>

	<form action="<?php echo base_url('index.php/buku/tambah'); ?>" method="post" enctype="multipart/form-data">
		<div class="modal-body">
	
			<input type="text" name="kode_buku" class="form-control" placeholder="Kode_buku"><br>
	
			<input type="text" name="judul_buku" class="form-control" placeholder="judul buku"><br>
	
			<input type="text" name="tahun" class="form-control" placeholder="tahun"><br>
	
			<input type="text" name="harga" class="form-control" placeholder="harga"><br>
	
			<input type="text" name="penerbit" class="form-control" placeholder="penerbit"><br>
	
			<input type="text" name="stok" class="form-control" placeholder="stok"><br>
	
			<input type="text" name="penulis" class="form-control" placeholder="penulis"><br>
									
			<select name="kategori" class="form-control">
				<?php 
				foreach ($kategori as $k) {
					echo'
					<option value="'.$k->id_kategori.'">'.$k->nama_kategori.'</option>
					';
				}
				?>
			</select>
				<br>
				<input type="file" class="form-control" placeholder="Foto" name="foto">		
		</div>
		<div class="modal-footer">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	
	</form>
				</div>
			</div>
</div>	
	
				


	<div id="modal_ubah_buku" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Buku</h4>
      </div>
      <form action="<?php echo base_url('index.php/buku/ubah'); ?>" method="post" enctype="multipart/form-data">
	      <div class="modal-body">
	        	<input type="hidden" name="ubah_id_buku"  id="ubah_id_buku">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Kode Buku" name="ubah_kode_buku"  id="ubah_kode_buku">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Judul" name="ubah_judul_buku"  id="ubah_judul_buku">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Tahun" name="ubah_tahun" id="ubah_tahun">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Penulis" name="ubah_penulis" id="ubah_penulis">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Penerbit" name="ubah_penerbit" id="ubah_penerbit">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Stok" name="ubah_stok" id="ubah_stok">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Harga" name="ubah_harga" id="ubah_harga">
	        	<br>
	        	<select name="ubah_kategori" id="ubah_kategori" class="form-control">
					<?php
						foreach ($kategori as $k) {
							echo '
								<option value="'.$k->id_kategori.'">'.$k->nama_kategori.'</option>
							';
						}
					?>	        		
	        	</select>
	        	<br>
	        	<div id="data_cover_foto"></div>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </form>
    </div>
  </div>
</div>

	
		<!-- modal hapus-->

		<div id="modal_hapus_buku" class="modal fade" role="dialog"  >
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Konfimasi Hapus Buku</h4>
				</div> 
				<form action="<?php echo base_url('index.php/buku/hapus'); ?>" method="post">

				<div class="modal-body">
					<input type="hidden" name="hapus_id_buku" id="hapus_id_buku">
					<p>Apakah Anda Yakin Menghapus Buku? <b><span id="hapus_judul"></span></b> ?</p>
				</div>
					<div class="modal-footer">
					<input type="submit" name="submit" class="btn btn-danger" value="YA">
					<button type="button" class="btn btn-default" data-dismiss="modal">TIDAK</button>

				</div>
				</form>
				</div>
			</div>

		</div>

<script type="text/javascript">
function prepare_ubah_buku(id) {
	
	$("#ubah_id_buku").empty();
	$("#ubah_kode_buku").empty();
	$("#ubah_judul_buku").empty();
	$("#ubah_tahun").empty();
	$("#ubah_penulis").empty();
	$("#ubah_penerbit").empty();
	$("#ubah_stok").empty();
	$("#ubah_harga").empty();
	$("#data_foto").empty();

	$.getJSON('<?php echo base_url(); ?>index.php/buku/get_data_buku_by_id/' + id, function(data){
		$("#ubah_id_buku").val(data.id_buku);
		$("#ubah_kode_buku").val(data.kode_buku);
		$("#ubah_judul_buku").val(data.judul_buku);
		$("#ubah_tahun").val(data.tahun);
		$("#ubah_penulis").val(data.penulis);
		$("#ubah_penerbit").val(data.penerbit);
		$("#ubah_kategori").val(data.id_kategori);
		$("#ubah_stok").val(data.stok);
		$("#ubah_harga").val(data.harga);
		$("#data_foto").html('<img src="<?php echo base_url(); ?>assets/cover_buku/' + data.foto +'" width="50px" >');

}
		);
		}

		function prepare_hapus_buku(id)
		{
			$("#hapus_id_buku").empty();
			$("#hapus_judul").empty();

			$.getJSON('<?php echo base_url(); ?>index.php/buku/get_data_buku_by_id/' +id, function(data){
				$("#hapus_id_buku").val(data.id_buku);
			$("#hapus_judul").val(data.judul);
			});
		}


</script>