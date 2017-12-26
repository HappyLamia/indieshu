<?php 
	if ($id==0) {
?>	
		<div class="col-lg-12">
			<div class="tabbable">
				<ul class="nav nav-tabs padding-18">
					<li class="active">
						<a data-toggle="tab" href="#rmu">
							<i class="green ace-icon fa fa-user bigger-120"></i>
							Rekam Medis Umum
						</a>
					</li>
					<li>
						<a data-toggle="tab" href="#rmsc">
							<i class="green ace-icon fa fa-user bigger-120"></i>
							Rekam Medis Skin Care
						</a>
					</li>
					<li>
						<a data-toggle="tab" href="#rms">
							<i class="green ace-icon fa fa-user bigger-120"></i>
							Rekam Medis Slimming
						</a>
					</li>
				</ul>

				<div class="tab-content no-border padding-24">
					<div id="rmu" class="tab-pane in active">
						<div class="row">
							<div class="table-responsive">
								<table id="dt_rm_umum" class="table table-stripped">
									<thead>
										<tr>
											<th>ID Rekam Medis</th><th>ID Pasien</th><th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											foreach ($rmu as $key) {
										?>
												<tr>
													<td><?php echo $key->id_rm ?></td>
													<td><?php echo $key->id_pasien ?></td>
													<td><a href="<?php echo base_url('main/index/rm/umum/').$key->id_rm.'/'.$key->id_pasien ?>"><i class="fa fa-eye"></i> Lihat Detail</a></td>
												</tr>
										<?php 
											}
										?>
									</tbody>
								</table>
							</div>
						</div><!-- /.row -->
					</div><!-- /#home -->
					<div id="rmsc" class="tab-pane">
						<div class="row">
							<div class="table-responsive">
								<table id="dt_rm_skin" class="table table-stripped">
									<thead>
										<tr>
											<th>ID Rekam Medis</th><th>ID Pasien</th><th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											foreach ($rmsc as $key) {
										?>
												<tr>
													<td><?php echo $key->id_rm ?></td>
													<td><?php echo $key->id_pasien ?></td>
													<td><a href="<?php echo base_url('main/index/rm/skin/').$key->id_rm.'/'.$key->id_pasien ?>"><i class="fa fa-eye"></i> Lihat Detail</a></td>
												</tr>
										<?php 
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div><!-- /#home -->
					<div id="rms" class="tab-pane">
						<div class="row">
							<div class="table-responsive">
								<table id="dt_rm_slim" class="table table-stripped">
									<thead>
										<tr>
											<th>ID Rekam Medis</th><th>ID Pasien</th><th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											foreach ($rms as $key) {
										?>
												<tr>
													<td><?php echo $key->id_rm ?></td>
													<td><?php echo $key->id_pasien ?></td>
													<td><a href="<?php echo base_url('main/index/rm/slim/').$key->id_rm.'/'.$key->id_pasien ?>"><i class="fa fa-eye"></i> Lihat Detail</a></td>
												</tr>
										<?php 
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div><!-- /#home -->
				</div>
			</div>
		</div>
<?php 
	} elseif($id==1) {
		foreach ($pasien_name as $key) {
			$nama = $key->nama_pasien;
		}
		$photo = "IMG-AKP-".$rm->id_pasien.".png";
?>
		<div class="col-lg-12">
			<div class="row">
				<h3><a onclick="printContent('rm_umum')"><i class="fa fa-print"></i></a></h3>
				<hr>
			</div>
			<div id="rm_umum" class="row">
				<div class="col-xs-12 col-sm-3 center">
					<span class="profile-picture">
						<img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src="<?php echo base_url('uploads/').$rm->id_pasien.'/'.$photo; ?>" />
					</span>
					<div class="space space-4"></div>
					<h5 class="text-center text-primary"><b>Selamat Datang</b></h5>
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
								<span><b><?php echo $rm->id_pasien ?></b></span>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="text-left profile-info-name"> Tensi Darah </div>
							<div class="profile-info-value">
								<span><b><?php echo $rm->tensi_darah ?></b></span>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="text-left profile-info-name"> Nadi </div>
							<div class="profile-info-value">
								<span><b><?php echo $rm->nadi ?></b></span>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="text-left profile-info-name"> Suhu </div>
							<div class="profile-info-value">
								<span><b><?php echo $rm->suhu ?></b></span>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="text-left profile-info-name"> Riwayat Penyakit </div>
							<div class="profile-info-value">
								<span><b><?php echo $rm->riwayat ?></b></span>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="text-left profile-info-name"> Anamnesa </div>
							<div class="profile-info-value">
								<span><b><?php echo $rm->anamnesa ?></b></span>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="text-left profile-info-name"> Tinggi Badan </div>
							<div class="profile-info-value">
								<span><b><?php echo $rm->tb ?></b></span>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="text-left profile-info-name"> Berat Badan</div>
							<div class="profile-info-value">
								<span><b><?php echo $rm->bb ?></b></span>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="text-left profile-info-name"> Diagnosis </div>
							<div class="profile-info-value">
								<span><b><?php echo $rm->diagnosis ?></b></span>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="text-left profile-info-name"> Terapi </div>
							<div class="profile-info-value">
								<span><b><?php echo $rm->terapi ?></b></span>
							</div>
						</div>
					</div>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div>
<?php 
	} elseif($id==2) {
		foreach ($pasien_name as $key) {
			$nama = $key->nama_pasien;
		}
		$photo = "IMG-AKP-".$rm->id_pasien.".png";
?>
		<div class="col-lg-12">
			<div class="row">
				<h3><a onclick="printContent('rm_skin')"><i class="fa fa-print"></i></a></h3>
				<hr>
			</div>
			<div id="rm_skin" class="row">
				<div class="col-xs-12 col-sm-3 center">
					<span class="profile-picture">
						<img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src="<?php echo base_url('uploads/').$rm->id_pasien.'/'.$photo; ?>" />
					</span>
					<div class="space space-4"></div>
					<h5 class="text-center text-primary"><b>Selamat Datang</b></h5>
				</div><!-- /.col -->
				<div class="col-xs-12 col-sm-9">
					<h4 class="blue">
						<span class="middle"><?php echo $nama ?></span>
						<span class="label label-purple arrowed-in-right">
							<i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
							online
						</span>
					</h4>

					<div class="profile-user-info col-sm-6">
						<div class="profile-info-row">
							<div class="text-left profile-info-name"> ID MEMBER </div>
							<div class="profile-info-value">
								<span><b><?php echo $rm->id_pasien ?></b></span>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="text-left profile-info-name"> Kontrasepsi </div>
							<div class="profile-info-value">
								<span><b><?php echo $rm->kontrasepsi ?></b></span>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="text-left profile-info-name"> Hormanal </div>
							<div class="profile-info-value">
								<span><b><?php echo $rm->hormanal ?></b></span>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="text-left profile-info-name"> Pekerjaan </div>
							<div class="profile-info-value">
								<span><b><?php echo $rm->pekerjaan ?></b></span>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="text-left profile-info-name"> Riwayat Penyakit </div>
							<div class="profile-info-value">
								<span><b><?php echo $rm->riwayat ?></b></span>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="text-left profile-info-name"> Produk Perawatan </div>
							<div class="profile-info-value">
								<span><b><?php echo $rm->produk_perawatan ?></b></span>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="text-left profile-info-name"> Keluhan </div>
							<div class="profile-info-value">
								<span><b><?php echo $rm->keluhan ?></b></span>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="text-left profile-info-name"> Terapi</div>
							<div class="profile-info-value">
								<span><b><?php echo $rm->terapi ?></b></span>
							</div>
						</div>
					</div>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div>
<?php 
	} elseif($id==3) {
		foreach ($pasien_name as $key) {
			$nama = $key->nama_pasien;
		}
		$photo = "IMG-AKP-".$rm->id_pasien.".png";
?>
		<div class="col-lg-12">
			<div class="row">
				<h3><a onclick="printContent('rm_slim')"><i class="fa fa-print"></i></a></h3>
				<hr>
			</div>
			<div id="rm_slim" class="row">
				<div class="col-xs-12 col-sm-3 center">
					<span class="profile-picture">
						<img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src="<?php echo base_url('uploads/').$rm->id_pasien.'/'.$photo; ?>" />
					</span>
					<div class="space space-4"></div>
					<h5 class="text-center text-primary"><b>Selamat Datang</b></h5>
				</div><!-- /.col -->
				<div class="col-xs-12 col-sm-9">
					<h4 class="blue">
						<span class="middle"><?php echo $nama ?></span>

						<span class="label label-purple arrowed-in-right">
							<i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
							online
						</span>
					</h4>
					<div class="col-sm-6">
						<div class="profile-user-info col-sm-6">
							<div class="profile-info-row">
								<div class="text-left profile-info-name"> ID MEMBER </div>
								<div class="profile-info-value">
									<span><b><?php echo $rm->id_pasien ?></b></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="text-left profile-info-name"> Tensi Darah </div>
								<div class="profile-info-value">
									<span><b><?php echo $rm->tensi ?></b></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="text-left profile-info-name"> Nadi </div>
								<div class="profile-info-value">
									<span><b><?php echo $rm->nadi ?></b></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="text-left profile-info-name"> Suhu </div>
								<div class="profile-info-value">
									<span><b><?php echo $rm->suhu ?></b></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="text-left profile-info-name"> Riwayat Penyakit </div>
								<div class="profile-info-value">
									<span><b><?php echo $rm->riwayat ?></b></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="text-left profile-info-name"> Alergi </div>
								<div class="profile-info-value">
									<span><b><?php echo $rm->alergi?></b></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="text-left profile-info-name"> Tinggi Badan </div>
								<div class="profile-info-value">
									<span><b><?php echo $rm->tb ?></b></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="text-left profile-info-name"> Berat Badan</div>
								<div class="profile-info-value">
									<span><b><?php echo $rm->bb ?></b></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="text-left profile-info-name"> Pekerjaan </div>
								<div class="profile-info-value">
									<span><b><?php echo $rm->pekerjaan ?></b></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="text-left profile-info-name"> Ikut KB ? </div>
								<div class="profile-info-value">
									<span><b><?php echo $rm->kb ?></b></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="text-left profile-info-name"> Jenis KB </div>
								<div class="profile-info-value">
									<span><b><?php echo $rm->jenis_kb ?></b></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="text-left profile-info-name"> Berapa Lama ? </div>
								<div class="profile-info-value">
									<span><b><?php echo $rm->lama ?></b></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="text-left profile-info-name"> Lingkar Perut </div>
								<div class="profile-info-value">
									<span><b><?php echo $rm->lingkar_perut ?></b></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="text-left profile-info-name"> Garis Rusuk </div>
								<div class="profile-info-value">
									<span><b><?php echo $rm->garis_rusuk ?></b></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="profile-user-info col-sm-6">
							<div class="profile-info-row">
								<div class="text-left profile-info-name"> Sejajar Pusar </div>
								<div class="profile-info-value">
									<span><b><?php echo $rm->sejajar ?></b></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="text-left profile-info-name"> Tulang Pinggul </div>
								<div class="profile-info-value">
									<span><b><?php echo $rm->tulang_pinggul ?></b></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="text-left profile-info-name"> Lingkar Lengan </div>
								<div class="profile-info-value">
									<span><b><?php echo $rm->lingkar_lengan ?></b></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="text-left profile-info-name"> Lingkar Paha </div>
								<div class="profile-info-value">
									<span><b><?php echo $rm->lingkar_paha ?></b></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="text-left profile-info-name"> Obat Yang Rutin Diminum </div>
								<div class="profile-info-value">
									<span><b><?php echo $rm->obat_rutin ?></b></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="text-left profile-info-name"> Obat Diet Yang Digunakan  </div>
								<div class="profile-info-value">
									<span><b><?php echo $rm->obat_diet ?></b></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="text-left profile-info-name"> Pola Makan </div>
								<div class="profile-info-value">
									<span><b><?php echo $rm->pola_makan ?></b></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="text-left profile-info-name"> Frekuensi BAB </div>
								<div class="profile-info-value">
									<span><b><?php echo $rm->frekuensi ?></b></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="text-left profile-info-name"> Sulit BAB </div>
								<div class="profile-info-value">
									<span><b><?php echo $rm->sulit_bab ?></b></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="text-left profile-info-name"> Menggunakan Pencahar </div>
								<div class="profile-info-value">
									<span><b><?php echo $rm->pencahar ?></b></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="text-left profile-info-name"> Karada Scan </div>
								<div class="profile-info-value">
									<span><b><?php echo $rm->karada_scan ?></b></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="text-left profile-info-name"> Pemeriksaan </div>
								<div class="profile-info-value">
									<span><b><?php echo $rm->terapi ?></b></span>
								</div>
							</div>
						</div>
					</div>
					
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div>
<?php 
	}
?>
<script type="text/javascript">
	function printContent(el)
	{
		var restorepage = document.body.innerHTML;
		var printcontent = document.getElementById(el).innerHTML;
		document.body.innerHTML = printcontent;
		window.print();
		document.body.innerHTML = restorepage;
	}
</script>