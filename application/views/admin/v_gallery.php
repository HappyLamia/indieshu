<?php 
	if ($id==0) {
?>
<div class="row">
	<div class="col-lg-4">
		<div class="widget-box widget-color-blue">
			<div class="widget-header">
				<div class="widget-title">UPLOAD FOTO</div>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<form method="POST" enctype="multipart/form-data" action="<?php echo base_url('gallery/upload') ?>">
						<div class="form-group">
							<label class="label label-primary">Nama Album</label>
							<input  type="text" name="album" class="form-control">
						</div>
						<div class="form-group">
							<input required name="userfile" type="file" accept="images/*" />
						</div>
						<div class="form-group">
							<button class="btn btn-primary"><i class="fa fa-upload"></i> Upload</button>
						</div>
					</form>
				</div>
				
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="tabbable">
			<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
				<li class="active">
					<a data-toggle="tab" href="#all">Semua Foto</a>
				</li>

				<li>
					<a data-toggle="tab" href="#album">Album</a>
				</li>
			</ul>

			<div class="tab-content">
				<div id="all" class="tab-pane in active">
					<ul class="ace-thumbnails clearfix">
						<?php 
							foreach ($all as $key) {
						?>
							<li>
								<a href="" title="Photo Title" data-rel="colorbox">
									<img width="150" height="150" alt="150x150" src="<?php echo base_url('gallery')."/$key->jenis/$key->depend"; ?>" />
								</a>

								<div class="tools">
									<a href="#">
										<i class="ace-icon fa fa-link"></i>
									</a>
									<a onclick="return confirm('Apa Anda Yakin Ingin Menghapus Foto Ini')" href="<?php echo base_url('gallery/delete_photo')."/$key->jenis/$key->depend"; ?>">
										<i class="ace-icon fa fa-times red"></i>
									</a>
								</div>
							</li>
						<?php 
							}
						?>
					</ul>
				</div>

				<div id="album" class="tab-pane">
					<?php 
						foreach ($album as $key) {
					?>
							<div class="col-lg-3">
								<div class="widget-box" id="widget-box-5">
									<div class="widget-header">
										<h5 class="widget-title smaller">ALBUM</h5>

										<div class="widget-toolbar">
											<span class="label label-success">
												<i class="ace-icon fa fa-arrow-up"></i>
											</span>
										</div>
									</div>

									<div class="widget-body  text-center">
										<div class="widget-main padding-6">
											<a href="<?php echo base_url('main/index/gallery/1')."/$key->jenis"; ?>"><?php echo str_replace("%20", " ", $key->jenis); ?></a>
										</div>
									</div>
								</div>
							</div>
					<?php 
						}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
	}
	else{
?>
		<div class="col-lg-12">
		<ul class="ace-thumbnails clearfix">
		<?php 
				foreach ($by_album as $key) 
				{
		?>
					<li>
						<a href="" title="Photo Title" data-rel="colorbox">
							<img width="150" height="150" alt="150x150" src="<?php echo base_url('gallery')."/$key->jenis/$key->depend"; ?>" />
						</a>

						<div class="tools">
							<a href="#">
								<i class="ace-icon fa fa-link"></i>
							</a>
							<a onclick="return confirm('Apa Anda Yakin Ingin Menghapus Foto Ini')" href="<?php echo base_url('gallery/delete_photo')."/$key->jenis/$key->depend"; ?>">
								<i class="ace-icon fa fa-times red"></i>
							</a>
						</div>
					</li>
		<?php 
				}
		?>
		</ul>
	</div>
<?php 
	}
?>