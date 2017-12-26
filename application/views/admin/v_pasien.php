<div class="col-xs-12 col-sm-4 widget-container-col" id="widget-container-col-1">
	<div class="widget-box" id="widget-box-1">
		<div class="widget-header">
			<h5 class="widget-title">Form Daftar Pasien</h5>
		</div>

		<div class="widget-body">
			<div class="widget-main">
				<h4><?php echo $msg ?></h4><hr>
				<form enctype="multipart/form-data" onsubmit="return confirm('Anda Akan Menyimpan Data Ini , Lanjutkan ?')" method="POST" action="<?php echo base_url('pasien/tambah_pasien') ?>">
					<div class="form-group">
						<label class="text-primary">ID Pasien</label>
						<input class="form-control" type="text" readonly="" name="id_pasien" value="<?php echo $id; ?>" />
					</div>
					<div class="form-group">
						<label class="text-primary">Photo</label>
						<input required class="form-control" type="file" readonly="" name="userfile" />
					</div>
					<div class="form-group">
						<label class="text-primary">Nama Pasien</label>
						<input required class="form-control" type="text" name="nama_pasien" />
					</div>
					<div class="form-group">
						<label class="text-primary">Tgl Lahir</label>
						<input required class="form-control" type="date" name="tgl_lhr" placeholder="YYYY-MM-DD : 1992-03-23" />
					</div>
					<div class="form-group">
						<label class="text-primary">Jenis Kelamin</label>
						<div class="btn-group">
							<label class="btn btn-warning">
								<input type="radio" name="jk" value="Laki-laki">Laki - laki
							</label>
							<label class="btn btn-info">
								<input type="radio" name="jk" value="Perempuan">Perempuan
							</label>
						</div>
					</div>
					<div class="form-group">
						<label class="text-primary">Pekerjaan</label>
						<input required class="form-control" type="text" name="pekerjaan" />
					</div>
					<div class="form-group">
						<label class="text-primary">Alamat</label>
						<textarea class="form-control" name="alamat"></textarea>
					</div>
					<div class="form-group">
						<label class="text-primary">Asal Kota</label>
						<select required class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State..." name="asal_kota">
							<option value="">-PILIH KOTA-</option>
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
						<input required class="form-control" type="text" name="kebangsaan" />
					</div>
					<div class="form-group">
						<label class="text-primary">Nama Keluarga</label>
						<input required class="form-control" type="text" name="nama_keluarga" />
					</div>
					<div class="form-group">
						<label class="text-primary">Agama</label>
						<input required class="form-control" type="text" name="agama" />
					</div>
					<div class="form-group">
						<label class="text-primary">Telepon / Hp</label>
						<input required class="form-control" type="text" name="kontak" />
					</div>
					<div class="form-group">
						<button class="btn btn-primary btn-block">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="col-xs-12 col-sm-8 widget-container-col" id="widget-container-col-1">
	<div class="widget-box" id="widget-box-1">
		<div class="widget-header">
			<h5 class="widget-title">Data Pasien</h5>
		</div>

		<div class="widget-body">
			<div class="widget-main table-responsive">
				<table id="dt_pasien" class="table table-bordered">
					<thead>
						<tr>
							<th>ID Pasien</th>
							<th>Nama</th>
							<th>Usia</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach ($pasien as $key) {
						?>	
								<tr>
									<td><?php echo $key->id_pasien ?></td>
									<td><?php echo $key->nama_pasien ?></td>
									<td><?php
											 $year = date('Y');
											 $year_lhr = date('Y',strtotime($key->tgl_lahir));
											 $usia = $year - $year_lhr;
											 echo $usia;
										?>	
									 </td>
									<td>
										<a class="btn btn-info" href="<?php echo base_url('pasien/set_id/rm/').$key->id_pasien; ?>">Rekam Medis</a> | 
										<a class="btn btn-warning" href="<?php echo base_url('pasien/set_id/edit/').$key->id_pasien; ?>"><i class="fa fa-edit"></i></a> | 
										<a onclick="return confirm('Apa Anda Ingin Menghapus Data Ini ?')" class="btn btn-danger" href="<?php echo base_url('pasien/hapus_pasien/').$key->id_pasien ?>"><i class="fa fa-trash"></i></a> |
										<a data-toggle="tooltip" title="Cetak Kartu Anggota" class="btn btn-primary" href="<?php echo base_url('main/index/cetak_kartu/').$key->id_pasien ?>"><i class="fa fa-print"></i></a>
									</td>
								</tr>
						<?php 
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
