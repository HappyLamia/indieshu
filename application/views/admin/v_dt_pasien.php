<?php 
	foreach ($profil_pasien as $key) {
		$id_pasien = $key->id_pasien;
		$nama = $key->nama_pasien;
		$jk = $key->jk;
		$tgl_lhr = $key->tgl_lahir;
		$alamat = $key->alamat;
		$pekerjaan = $key->pekerjaan;
		$asal_daerah = $key->asal_daerah;
		$kebangsaan = $key->kebangsaan;
		$nama_keluarga = $key->nama_keluarga;
		$agama = $key->agama;
		$kontak = $key->kontak;
		$photo = $key->photo;
	}
?>	
<div class="modal fade" id="edit_p" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Edit Pasien</h4>
            </div>
            <div class="modal-body">
                <form onsubmit="return confirm('Anda Akan Mengubah Data Ini , Lanjutkan ?')" method="POST" action="<?php echo base_url('pasien/edit_pasien') ?>">
					<div class="form-group">
						<input class="form-control" type="hidden" readonly="" name="id_pasien" value="<?php echo $id_pasien; ?>" />
					</div>
					<div class="form-group">
						<label class="text-primary">Nama Pasien</label>
						<input required class="form-control" type="text" name="nama_pasien" value="<?php echo $nama; ?>" />
					</div>
					<div class="form-group">
						<label class="text-primary">Tgl Lahir</label>
						<input required class="form-control" type="date" name="tgl_lhr" placeholder="YYYY-MM-DD : 1992-03-23" value="<?php echo $tgl_lhr; ?>" />
					</div>
					<div class="form-group">
						<label class="text-primary">Jenis Kelamin</label>
						<?php 
							if ($jk=="Laki-laki") {
						?>
								<div class="btn-group">
									<label class="btn btn-warning">
										<input type="radio" name="jk" value="Laki-laki" checked>Laki - laki
									</label>
									<label class="btn btn-info">
										<input type="radio" name="jk" value="Perempuan">Perempuan
									</label>
								</div>
						<?php 
							}
							else{
						?>
								<div class="btn-group">
									<label class="btn btn-warning">
										<input type="radio" name="jk" value="Laki-laki">Laki - laki
									</label>
									<label class="btn btn-info">
										<input type="radio" name="jk" value="Perempuan" checked>Perempuan
									</label>
								</div>
						<?php 
							}
						?>
					</div>
					<div class="form-group">
						<label class="text-primary">Pekerjaan</label>
						<input required class="form-control" type="text" name="pekerjaan" value="<?php echo $pekerjaan; ?>"/>
					</div>
					<div class="form-group">
						<label class="text-primary">Alamat</label>
						<textarea class="form-control" name="alamat"><?php echo $alamat; ?></textarea>
					</div>
					<div class="form-group">
						<label class="text-primary">Asal Kota</label>
						<select required class="form-control" name="asal_kota">
							<option selected="" value="<?php echo $asal_daerah ?>"><?php echo $asal_daerah ?></option>
							<?php 
								foreach ($kota as $key) 
								{
							?>
									<option value="<?php echo $key->Nama ?>"><?php echo $key->Nama; ?></option>
							<?php 
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label class="text-primary">Kebangsaan</label>
						<input required class="form-control" type="text" name="kebangsaan" value="<?php echo $kebangsaan; ?>" />
					</div>
					<div class="form-group">
						<label class="text-primary">Nama Keluarga</label>
						<input required class="form-control" type="text" name="nama_keluarga" value="<?php echo $nama_keluarga; ?>" />
					</div>
					<div class="form-group">
						<label class="text-primary">Agama</label>
						<input required class="form-control" type="text" name="agama" value="<?php echo $agama; ?>" />
					</div>
					<div class="form-group">
						<label class="text-primary">Telepon / Hp</label>
						<input required class="form-control" type="text" name="kontak" value="<?php echo $kontak; ?>" />
					</div>
					<div class="form-group">
						<button class="btn btn-primary btn-block">Update</button>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div id="user-profile-2" class="user-profile">
			<div class="tabbable">
				<ul class="nav nav-tabs padding-18">
					<li class="active">
						<a data-toggle="tab" href="#home">
							<i class="green ace-icon fa fa-user bigger-120"></i>
							Profile
						</a>
					</li>
					<li>
						<a data-toggle="tab" href="#berkas">
							<i class="green ace-icon fa fa-user bigger-120"></i>
							Berkas
						</a>
					</li>
				</ul>

				<div class="tab-content no-border padding-24">
					<div id="home" class="tab-pane in active">
						<div class="row">
							<div class="col-xs-12 col-sm-3 center">
								<span class="profile-picture">
									<?php 
										if ($photo=="") {
									?>	
											<img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src="<?php echo base_url('assets/images/avatars/user-3.png'); ?>" />
									<?php 
										}
										else{
									?>
											<img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src="<?php echo base_url('uploads/').$id_pasien.'/'.$photo; ?>" />
									<?php 
										}
									?>
									
								</span>

								<div class="space space-4"></div>

								<h5 class="text-center text-primary"><b>Selamat Datang</b></h5>
								<a class="btn btn-danger" href="<?php echo base_url('pasien/unset_id') ?>"><i class="fa fa-sign-out"></i> Back</a>
							</div><!-- /.col -->

							<div class="col-xs-12 col-sm-9">
								<h4 class="blue">
									<span class="middle"><?php echo $nama; ?></span>

									<span class="label label-purple arrowed-in-right">
										<i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
										online
									</span>
								</h4>

								<div class="profile-user-info col-sm-6">
									<div class="profile-info-row">
										<div class="text-left profile-info-name"> ID MEMBER </div>
										<div class="profile-info-value">
											<span><b><?php echo $this->session->userdata('id_pasien') ?></b></span>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="text-left profile-info-name"> Jenis Kelamin </div>
										<div class="profile-info-value">
											<span><b><?php echo $jk ?></b></span>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="text-left profile-info-name"> Tanggal Lahir </div>
										<div class="profile-info-value">
											<span><b><?php echo $tgl_lhr ?></b></span>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="text-left profile-info-name"> Usia </div>
										<div class="profile-info-value">
											<span><b><?php
														 $year = date('Y');
														 $year_lhr = date('Y',strtotime($tgl_lhr));
														 $usia = $year - $year_lhr;
														 echo $usia;
													?>	</b></span>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="text-left profile-info-name"> Pekerjaan </div>
										<div class="profile-info-value">
											<span><b><?php echo $pekerjaan ?></b></span>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="text-left profile-info-name"> Alamat </div>
										<div class="profile-info-value">
											<span><b><?php echo $alamat ?></b></span>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="text-left profile-info-name"> Agama </div>
										<div class="profile-info-value">
											<span><b><?php echo $agama ?></b></span>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="text-left profile-info-name"> Asal Daerah </div>
										<div class="profile-info-value">
											<span><b><?php echo $asal_daerah ?></b></span>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="text-left profile-info-name"> Kebangsaan </div>
										<div class="profile-info-value">
											<span><b><?php echo $kebangsaan ?></b></span>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="text-left profile-info-name"> Nama Keluarga </div>
										<div class="profile-info-value">
											<span><b><?php echo $nama_keluarga ?></b></span>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="text-left profile-info-name"> Kontak </div>
										<div class="profile-info-value">
											<span><b><?php echo $kontak ?></b></span>
										</div>
									</div>
									<?php 
										if ($this->session->userdata('rm')) 
										{
											echo "";
										}
										else
										{
									?>
											<div class="profile-info-row">
												<a data-toggle="modal" data-target="#edit_p" class="btn btn-success" href=""><i class="fa fa-edit"></i> Edit Profile</a>
											</div>
									<?php 
										} 
									?>
								</div>
							</div><!-- /.col -->
						</div><!-- /.row -->
						<div class="row">
							<div class="col-lg-12">
								<?php
									if ($this->session->userdata('rm')) 
									{
										echo $msg;
										if ($this->session->userdata('id_rm')) 
										{
											$this->load->view('admin/v_upload');
										}
										else
										{
											$this->load->view('admin/v_form_rm');
										}
									}
									else{
										echo "";
									} 
								?>
							</div>
						</div>
						<div class="space-20"></div>
					</div><!-- /#home -->
					<div id="berkas" class="tab-pane">
						<div class="row">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>ID Rekam Medis</th><th>Berkas</th><th>Waktu Pemeriksaan</th><th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											foreach ($rm_files as $key) {
										?>
												<tr>
													<td><a href=""><?php echo $key->id_rekam_medis ?></a></td>
													<td><?php echo $key->file_name ?></td>
													<td><?php echo $key->upload_date ?></td>
													<td><a href="<?php echo base_url('pasien/get_files/').$key->file_name; ?>">Download</a></td>
												</tr>
										<?php 
											}
										?>
									</tbody>
								</table>
							</div>
						</div><!-- /.row -->
						<div class="space-20"></div>
					</div><!-- /#home -->
				</div>
			</div>
		</div>
	</div>
</div>
