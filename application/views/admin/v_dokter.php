<script src="<?php echo base_url('assets/ckeditor_custom/ckeditor.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/ckeditor_custom/config.js'); ?>" type="text/javascript"></script>
<div class="col-lg-6">
	<div class="widget-box widget-color-blue">
		<div class="widget-header">
			<div class="widget-title">
				Daftar Dokter
			</div>
		</div>
		<div class="widget-body">
			<div class="widget-main">
				<form method="POST" action="<?php echo base_url('dokter/uploads/add') ?>" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="label label-primary">Foto</label>
								<input required type="file" name="userfile" class="form-control">
							</div>
							<div class="form-group">
								<label class="label label-primary">NIP</label>
								<input required type="text" name="nip" class="form-control" placeholder="Ex : 1234441122">
							</div>
							<div class="form-group">
								<label class="label label-primary">Nama Dokter</label>
								<input required type="text" name="nama" class="form-control" placeholder="Ex : Dina Putri">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="label label-primary">Kontak Dokter</label>
								<input required type="text" name="kontak" class="form-control" placeholder="Ex : Dina Putri">
							</div>
							<div class="form-group">
								<label class="label label-primary">Mulai Prakter</label>
								<input type="time" name="mulai" class="form-control">
							</div>
							<div class="form-group">
								<label class="label label-primary">Akhir Prakter</label>
								<input type="time" name="selesai" class="form-control">
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-12">
							<textarea required class="form-control" id="deskripsi" name="deskripsi"></textarea>
							<script>
								CKEDITOR.replace('deskripsi');
							</script>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-4">
							<label class="label label-primary">Bidang</label>
							<select class="form-control" name="spesial" required>
								<option value="">Pilih Bidang</option>
								<option value="Umum">Umum</option>
								<option value="Gigi">Gigi</option>
								<option value="Skin Care">Skin Care</option>
							</select>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-12">
							<button class="btn btn-primary btn-block"><i class="fa fa-save"></i></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="col-lg-6">
	<div class="widget-box">
		<div class="widget-header">
			<div class="widget-title">
				Daftar Dokter
			</div>
		</div>
		<div class="widget-body">
			<div class="widget-main">
				<div class="table-responsive">
					<table id="tb_article" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>NIP</th>
								<th>Nama Dokter</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<?php 
							foreach ($dokter as $key) {
					    ?>
					    		<tr>
					    			<td><?php echo $key->nip ?></td>
					    			<td><?php echo $key->nama_dokter; ?></td>
					    			<td>
					    				<a data-toggle="modal" href="#photo<?php echo $key->nip ?>"><span class="glyphicon glyphicon-picture"></span> Edit Foto</a> |
					    				<a data-toggle="modal" href="#<?php echo $key->nip ?>"><span class="glyphicon glyphicon-edit"></span> Edit</a> |
					    				<a onclick="return confirm('Apa Anda Ingin Menghapus Data Ini ?')" href="<?php echo base_url('dokter/clear_dokter/').$key->nip.'/'.$key->photo; ?>"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
					    			</td>
					    		</tr>
					    		<div class="modal fade" id="photo<?php echo $key->nip ?>" role="dialog">
								    <div class="modal-dialog">
								        <div class="modal-content">
								            <div class="modal-header bg-primary">
								                <button type="button" class="close" data-dismiss="modal">&times;</button>
								                <h4>Edit Dokter</h4>
								            </div>
								            <div class="modal-body">
								            	<img class="img-responsive" src="<?php echo base_url('warehouse/dokter/').$key->photo ?>">
								            	<hr>
								            	<form method="POST" action="<?php echo base_url('dokter/uploads/update') ?>" enctype="multipart/form-data">
													<div class="row">
														<div class="form-group">
															<input required type="hidden" name="nip" value="<?php echo $key->nip ?>">
															<label class="label label-primary">Foto</label>
															<input required type="file" name="userfile" class="form-control">
														</div>
														<div class="form-group">
															<button class="btn btn-primary btn-block"><i class="fa fa-save"></i></button>
														</div>
													</div>
												</form>
								            </div>
								        </div>
								    </div>
								</div>
					    		<div class="modal fade" id="<?php echo $key->nip ?>" role="dialog">
								    <div class="modal-dialog">
								        <div class="modal-content">
								            <div class="modal-header bg-primary">
								                <button type="button" class="close" data-dismiss="modal">&times;</button>
								                <h4>Edit Dokter</h4>
								            </div>
								            <div class="modal-body">
								            	<form method="POST" action="<?php echo base_url('dokter/update_dokter') ?>">
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<label class="label label-primary">Nama Dokter</label>
																<input required type="hidden" name="nip" value="<?php echo $key->nip ?>">
																<input required type="text" name="nama" class="form-control" value="<?php echo $key->nama_dokter ?>">
															</div>
															<div class="form-group">
																<label class="label label-primary">Kontak Dokter</label>
																<input required type="text" name="kontak" class="form-control" value="<?php echo $key->kontak_dokter ?>">
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label class="label label-primary">Mulai Prakter</label>
																<input type="time" name="mulai" class="form-control" value="<?php echo $key->mulai_praktek ?>">
															</div>
															<div class="form-group">
																<label class="label label-primary">Akhir Prakter</label>
																<input type="time" name="selesai" class="form-control" value="<?php echo $key->akhir_praktek ?>"> 
															</div>
														</div>
													</div>
													<br>
													<div class="row">
														<div class="col-sm-12">
															<textarea required class="form-control" id="deskripsi<?php echo $key->nip ?>" name="deskripsi"><?php echo $key->deskripsi ?></textarea>
															<script>
																CKEDITOR.replace('deskripsi<?php echo $key->nip ?>');
															</script>
														</div>
													</div>
													<br>
													<div class="row">
														<div class="col-sm-4">
															<label class="label label-primary">Bidang</label>
															<select class="form-control" name="spesial" required>
																<option value="<?php echo $key->spesial; ?>"><?php echo $key->spesial; ?></option>
																<option value="Umum">Umum</option>
																<option value="Gigi">Gigi</option>
																<option value="Skin Care">Skin Care</option>
															</select>
														</div>
													</div>
													<br>
													<div class="row">
														<div class="col-sm-12">
															<button class="btn btn-primary btn-block"><i class="fa fa-save"></i></button>
														</div>
													</div>
												</form>
								            </div>
								        </div>
								    </div>
								</div>
					    <?php 
					    	}
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>