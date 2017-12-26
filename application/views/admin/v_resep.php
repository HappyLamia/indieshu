<script src="<?php echo base_url('assets/ckeditor_custom/ckeditor.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/ckeditor_custom/config.js'); ?>" type="text/javascript"></script>
<div class="row">
	<div class="col-xs-6">
		<div class="widget-box widget-color-blue">
	        <div class="widget-header widget-header-flat">
	            <div class="widget-title lighter">
	               	Input Penyakit
	            </div>

	            <div class="widget-toolbar">
	                <a href="#" data-action="collapse">
	                    <i class="ace-icon fa fa-chevron-up"></i>
	                </a>
	            </div>
	        </div>

	        <div class="widget-body">
	            <div class="widget-main">
	            	<?php 
	            		echo $this->session->flashdata('penyakit_alert');
	            	?>
	        		<form method="POST" action="<?php echo base_url('penyakit/tambah') ?>">
						<div class="form-group">
							<label class="label label-primary">Kode Penyakit</label>
							<input required class="form-control" type="text" name="id_penyakit" placeholder="Kode Penyakit . .">
						</div>
						<div class="form-group">
							<label class="label label-primary">Nama Penyakit</label>
							<input required class="form-control" type="text" name="nama_penyakit" placeholder="Nama Penyakit . .">
						</div>
						<div class="form-group">
							<label class="label label-primary">Resep Obat</label>
							<textarea id="resep_input" name="resep" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<button class="btn btn-primary">Simpan</button>
						</div>
					</form>
	            </div><!-- /.widget-main -->
	        </div><!-- /.widget-body -->
	    </div><!-- /.widget-box --> 
	</div>
	<div class="col-xs-6">
		<div class="widget-box widget-color-green">
			<div class="widget-header">
				<div class="widget-title">Data Penyakit</div>
				<div class="widget-toolbar">
	                <a href="#" data-action="collapse">
	                    <i class="ace-icon fa fa-chevron-up"></i>
	                </a>
	            </div>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<table id="dt_penyakit" class="table table-responsive">
						<thead>
							<tr>
								<th>Kode Penyakit</th><th>Nama Penyakit</th><th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($penyakit as $key) {
							?>
									<tr>
										<td><?php echo $key->id_penyakit ?></td>
										<td><?php echo $key->nama_penyakit ?></td>
										<td>
											<?php 
												if ($key->status==0) {
											?>
													<a href="<?php echo base_url('penyakit/kirim/').$key->id_penyakit ?>">Kirim</a>
											<?php 
												}
												else{
											?>
													<a href="<?php echo base_url('penyakit/batal_kirim/').$key->id_penyakit  ?>">Batal Kirim</a>
											<?php 
												}
											?>
											 |
											<a data-toggle="modal" href="#<?php echo $key->id_penyakit ?>">Edit</a> |
											<a onclick="return confirm('Data Akan Dihapus, Lanjutkan ?')" href="<?php echo base_url('penyakit/hapus/').$key->id_penyakit ?>">Hapus</a>
										</td>
									</tr>
									<div class="modal fade" id="<?php echo $key->id_penyakit ?>" role="dialog">
									    <div class="modal-dialog">
									        <div class="modal-content">
									            <div class="modal-header bg-primary">
									                <button type="button" class="close" data-dismiss="modal">&times;</button>
									                <h4>Edit Resep</h4>
									            </div>
									            <div class="modal-body">
									            	<form method="POST" action="<?php echo base_url('penyakit/ubah') ?>">
														<div class="form-group">
															<label class="label label-primary">Kode Penyakit</label>
															<input readonly class="form-control" type="text" name="id_penyakit" value="<?php echo $key->id_penyakit ?>">
														</div>
														<div class="form-group">
															<label class="label label-primary">Nama Penyakit</label>
															<input required class="form-control" type="text" name="nama_penyakit" value="<?php echo $key->nama_penyakit ?>">
														</div>
														<div class="form-group">
															<label class="label label-primary">Resep Obat</label>
															<textarea id="resep_edit<?php echo $key->id_penyakit ?>" name="resep" class="form-control"><?php echo $key->resep ?></textarea>
															<script type="text/javascript">
																CKEDITOR.replace('resep_edit<?php echo $key->id_penyakit ?>')
															</script>
														</div>
														<div class="form-group">
															<button class="btn btn-success btn-block">Update</button>
														</div>
													</form>
									            </div>
									        </div>
									    </div>
									</div>
							<?php 
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	CKEDITOR.replace('resep_input')
</script>