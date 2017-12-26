<?php 
	foreach ($bio as $key) {
		$penulis = $key->name;
	}
?>
<script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>" type="text/javascript"></script>
<div class="tabbable">
	<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
		<li class="active">
			<a data-toggle="tab" href="#art">Tulis Artikel</a>
		</li>

		<li>
			<a data-toggle="tab" href="#dart">Manage Artikel</a>
		</li>
	</ul>

	<div class="tab-content col-lg-10">
		<div id="art" class="tab-pane in active">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Artikel
					</div>
					<div class="panel-body">
						<h6>
							<?php echo $this->session->flashdata('artikel_alert'); ?>
						</h6>
						<form method="POST" action="<?php echo base_url('artikel/add') ?>">
							<div class="form-group">
								<label class="label label-primary">Judul</label>
								<input required  type="text" name="judul" class="form-control">
							</div>
							<div class="form-group">
								<label class="label label-primary">Kategori</label>
								<select required  class="form-control" name="kategori">
									<option value="">-- Pilih Kategori --</option>
									<option value="Visi Misi">Visi Misi</option>
									<option value="Berita">Berita</option>
									<option value="Sejarah">Sejarah</option>
									<option value="Pengumuman">Pengumuman</option>
								</select>
							</div>
							<div class="form-group">
								<label class="label label-primary">Isi</label>
								<textarea required  id="isi" name="isi" class="form-control"></textarea>
								<script>
									CKEDITOR.replace( 'isi');
								</script>
							</div>
							<div class="form-group">
								<input required  type="hidden" name="penulis" class="form-control" value="<?php echo $penulis; ?>">
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
						Daftar Artkel
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table id="tb_article" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>Judul</th>
										<th>Kategori</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<?php 
									foreach ($art as $key) {
							    ?>
							    		<tr>
							    			<td><?php echo $key->judul; ?></td>
							    			<td><?php echo $key->kategori; ?></td>
							    			<td><a data-toggle="modal" href="#<?php echo $key->id_artikel; ?>"><span class="glyphicon glyphicon-edit"></span> Edit</a> |
							    				<a onclick="return confirm('Apa Anda Ingin Menghapus Artikel Ini ?')" href="<?php echo base_url('artikel/delete')."/$key->id_artikel"; ?>"><span class="glyphicon glyphicon-trash"></span> Hapus</a></td>
							    		</tr>
							    		<div class="modal fade" id="<?php echo $key->id_artikel ?>" role="dialog">
										    <div class="modal-dialog">
										        <div class="modal-content">
										            <div class="modal-header bg-primary">
										                <button type="button" class="close" data-dismiss="modal">&times;</button>
										                <h4>Edit Artikel</h4>
										            </div>
										            <div class="modal-body">
										            	<form method="POST" role="form" onsubmit="return confirm('Anda Akan Mengubah Data Ini , Lanjutkan ?')" method="POST" action="<?php echo base_url('artikel/update') ?>">
										            		<div class="form-group">
																<input required  type="text" name="id_artikel" class="form-control" value="<?php echo $key->id_artikel ?>">
															</div>
										            		<div class="form-group">
																<label class="label label-primary">Judul</label>
																<input required  type="text" name="judul" class="form-control" value="<?php echo $key->judul ?>">
															</div>
															<div class="form-group">
																<label class="label label-primary">Kategori</label>
																<select required  class="form-control" name="kategori">
																	<option value="<?php echo $key->kategori ?>"><?php echo $key->kategori ?></option>
																	<option value="Visi Misi">Visi Misi</option>
																	<option value="Berita">Berita</option>
																	<option value="Sejarah">Sejarah</option>
																	<option value="Pengumuman">Pengumuman</option>
																</select>
															</div>
															<div class="form-group">
																<label class="label label-primary">Isi</label>
																<textarea required  id="data_isi<?php echo $key->id_artikel ?>" name="isi" class="form-control"><?php echo $key->isi ?></textarea>
																<script>
																	CKEDITOR.replace('data_isi<?php echo $key->id_artikel ?>');
																</script>
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