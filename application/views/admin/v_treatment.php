<?php 
	foreach ($bio as $key) {
		$penulis = $key->name;
	}
?>
<script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>" type="text/javascript"></script>
<div class="tabbable">
	<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
		<li class="active">
			<a data-toggle="tab" href="#art">Tulis Treatment</a>
		</li>

		<li>
			<a data-toggle="tab" href="#dart">Daftar Treatment</a>
		</li>
	</ul>

	<div class="tab-content col-lg-12">
		<div id="art" class="tab-pane in active">
			<div class="col-lg-12">
				<h4>
					<?php echo $this->session->flashdata('treatment_alert'); ?>
				</h4>
				<div class="panel panel-default">
					<div class="panel-heading">
						Treatment
					</div>
					<div class="panel-body">
						<form method="POST" action="<?php echo base_url('treatment/add_treatment') ?>">
							<div class="col-lg-4">
								<div class="form-group">
									<label class="label label-primary">Nama Treatment</label>
									<input required  type="text" name="nama_treatment" class="form-control">
								</div>
								<div class="form-group">
									<label class="label label-primary">Harga</label>
									<input required type="text" name="harga" class="form-control">
								</div>
							</div>
							<div class="col-lg-8">
								<div class="form-group">
									<label class="label label-primary">Deskripsi</label>
									<textarea required  id="deskripsi" name="deskripsi" class="form-control"></textarea>
									<script>
										CKEDITOR.replace('deskripsi');
									</script>
								</div>
							</div>
							<div class="form-group">
								<button class="btn btn-success btn-block">POST</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div id="dart" class="tab-pane in">
			<div class="col-lg-7">
				<div class="panel panel-default">
					<div class="panel-heading">
						Daftar Treatment
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table id="tb_article" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>Nama Treatment</th>
										<th>Harga</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<?php 
									foreach ($trt as $key) {
							    ?>
							    		<tr>
							    			<td><?php echo $key->nama_treatment; ?></td>
							    			<td><?php echo "Rp ".$this->cart->format_number($key->harga) ?></td>
							    			<td><a data-toggle="modal" href="#<?php echo $key->id_treatment ?>"><span class="glyphicon glyphicon-edit"></span> Edit</a> |
							    				<a onclick="return confirm('Apa Anda Ingin Menghapus Artikel Ini ?')" href="<?php echo base_url('treatment/clear_treatment')."/$key->id_treatment"; ?>"><span class="glyphicon glyphicon-trash"></span> Hapus</a></td>
							    		</tr>
							    		<div class="modal fade" id="<?php echo $key->id_treatment ?>" role="dialog">
										    <div class="modal-dialog modal-lg">
										        <div class="modal-content">
										            <div class="modal-header bg-primary">
										                <button type="button" class="close" data-dismiss="modal">&times;</button>
										                <h4>Edit Treatment</h4>
										            </div>
										            <div class="modal-body">
										            	<form method="POST" role="form" onsubmit="return confirm('Anda Akan Mengubah Data Ini , Lanjutkan ?')" method="POST" action="<?php echo base_url('treatment/update_treatment') ?>">
										            		<div class="form-group">
																<input required  type="hidden" name="id_treatment" class="form-control" value="<?php echo $key->id_treatment ?>">
															</div>
															<div class="col-lg-4">
																<div class="form-group">
																	<label class="label label-primary">Nama Treatment</label>
																	<input required  type="text" name="nama_treatment" class="form-control" value="<?php echo $key->nama_treatment ?>">
																</div>
																<div class="form-group">
																	<label class="label label-primary">Harga</label>
																	<input required type="text" name="harga" class="form-control" value="<?php echo $key->harga ?>">
																</div>
															</div>
															<div class="col-lg-8">
																<div class="form-group">
																	<label class="label label-primary">Deskripsi</label>
																	<textarea required  id="edit_deskripsi<?php echo $key->id_treatment ?>" name="deskripsi" class="form-control"><?php echo $key->deskripsi ?></textarea>
																	<script>
																		CKEDITOR.replace('edit_deskripsi<?php echo $key->id_treatment ?>');
																	</script>
																</div>
															</div>
															<div class="form-group">
																<button class="btn btn-success btn-block">POST</button>
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
	</div>
</div>