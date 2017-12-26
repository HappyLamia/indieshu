<?php 
	foreach ($about as $key) {
		$id = $key->id;
		$nama = $key->nama_perusahaan;
		$alamat = $key->alamat;
		$telp = $key->telpon;
		$email = $key->email;
		$status = $key->status;
	}
?>
<div class="col-lg-4">
	<div class="widget-box">
		<div class="widget-header">
			<div class="widget-title">
				<b><i class="fa fa-cog"></i> Pengaturan Umum</b>
			</div>
		</div>
		<div>
			<div class="widget-main">
				<div class="widget-body">
					<form onsubmit="return confirm('Anda Akan Mengubah Data Ini , Lanjutkan ?')" method="POST" action="<?php echo base_url('setting/update') ?>">
						<div class="form-group">
							<input readonly="" required class="form-control" type="hidden" name="id" value="<?php echo $id; ?>" />
						</div>
						<div class="form-group">
							<label class="badge badge-primary">Nama Perusahaan</label>
							<input required class="form-control" type="text" name="nama" value="<?php echo $nama; ?>" />
						</div>
						<div class="form-group">
							<label class="badge badge-primary">Alamat</label>
							<textarea class="form-control" name="alamat"><?php echo $alamat ?></textarea>
						</div>
						<div class="form-group">
							<label class="badge badge-primary">Telepon</label>
							<input required class="form-control" type="text" name="telpon" value="<?php echo $telp ?>" />
						</div>
						<div class="form-group">
							<label class="badge badge-primary">Email</label>
							<input required class="form-control" type="email" name="email" value="<?php echo $email ?>" />
						</div>
						<div class="form-group">
							<label class="badge badge-primary">Status</label>
							<?php 
								if ($status=="Aktif") {
							?>
									<div class="form-group input-group">
										<label class="btn btn-warning">
											<input type="radio" name="st" value="Aktif" checked> Aktif
										</label>
										<label class="btn btn-danger">
											<input type="radio" name="st" value="Tidak Aktif"> Tidak Aktif
										</label>
									</div>
							<?php 
								}
								else{
							?>
									<div class="form-group input-group">
										<label class="btn btn-warning">
											<input type="radio" name="st" value="Aktif"> Aktif
										</label>
										<label class="btn btn-danger">
											<input type="radio" name="st" value="Tidak Aktif" checked> Tidak Aktif
										</label>
									</div>
							<?php 
								}
							?>
						</div>
						<div class="form-group">
							<button class="btn btn-primary btn-block">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-lg-4">
	<?php 
		if ($this->session->userdata('username')=='Admin System') {
	?>
			<div class="widget-box">
				<div class="widget-header">
					<div class="widget-title">
						<b><i class="fa fa-cog"></i> Pengaturan Umum</b>
					</div>
				</div>
				<div>
					<div class="widget-main">
						<div class="widget-body">
							<form onsubmit="return confirm('Anda Akan Mengubah Data Ini , Lanjutkan ?')" method="POST" action="<?php echo base_url('setting/hak_akses') ?>">
								<div class="form-group">
									<label class="badge badge-primary">Status</label>
									<?php 
										if ($ctrl->ctrl==0) {
									?>
											<div class="form-group input-group">
												<label class="btn btn-warning">
													<input type="radio" name="ctrl" value="0" checked> Show Menu
												</label>
												<label class="btn btn-danger">
													<input type="radio" name="ctrl" value="1"> Hide Menu
												</label>
											</div>
									<?php 
										}
										else{
									?>
											<div class="form-group input-group">
												<label class="btn btn-warning">
													<input type="radio" name="ctrl" value="0" > Show Menu
												</label>
												<label class="btn btn-danger">
													<input type="radio" name="ctrl" value="1" checked> Hide Menu
												</label>
											</div>
									<?php 
										}
									?>
								</div>
								<div class="form-group">
									<button class="btn btn-primary btn-block">Update</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
	<?php 
		}
		else{
			echo "";
		}
	?>
	
</div>