<div class="modal fade" id="customer" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content login-container">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5><i class="fa fa-users"></i> Tambah Customer</h5>
            </div>
            <div class="modal-body ">
                <form method="POST" role="form" action="<?php echo base_url('customer/tambah_customer') ?>">
					<div class="form-group">
						<label class="text-primary"> Kode Customer</label>
						<input readonly type="text" name="kode_customer" class="form-control" value="<?php echo $id_cust; ?>" />
					</div>

					<div class="form-group">
						<label class="text-primary"> Nama Customer </label>
						<input required type="text" name="nama_customer" class="form-control" />
					</div>

					<div class="form-group">
						<label class="text-primary">  Tanggal Lahir </label>
						<input class="form-control" required type="date" name="tgl_lahir">
					</div>

					<div class="form-group">
						<label class="text-primary">  Alamat </label>
						<textarea required class="form-control" name="alamat" ></textarea>
					</div>

					<div class="form-group">
						<label class="text-primary">Asal Kota</label>
						<select required class="form-control" name="asal_daerah">
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
						<button class="btn btn-block btn-success"><i class="fa fa-plus"></i> Tambah Customer</button>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-lg-5">
		<div id="user-profile-2" class="user-profile">
			<div class="tabbable">
				<ul class="nav nav-tabs padding-18">
					<li class="active">
						<a data-toggle="tab" href="#member">
							<i class="green ace-icon fa fa-user bigger-120"></i>
							Member / Pasien
						</a>
					</li>

					<li>
						<a data-toggle="tab" href="#nmember">
							<i class="orange ace-icon fa fa-rss bigger-120"></i>
							Non Member
						</a>
					</li>
				</ul>

				<div class="tab-content no-border padding-24">
					<div id="member" class="tab-pane in active">
						<div class="panel panel-success">
							<div class="panel-heading">
								Form Penjualan <i class="fa fa-chevron-right"></i> Member
							</div>
							<div class="panel-body">
								<form method="POST" action="<?php echo base_url('penjualan/set_penjualan/member'); ?>">
									<div class="form-group">
										<input  readonly class="form-control" type="text" name="id_penjualan" value="<?php echo $pj; ?>">
									</div>
									<div class="form-group">
										<div class="input-group">
											<select required class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State..." name="id_customer">
												<option value="">Pilih Pelanggan</option>
												<?php 
													foreach ($member as $key) {
												?>
														<option value="<?php echo $key->id_member ?>"><?php echo $key->id_member ?> - <?php echo $key->nama_member; ?></option>
												<?php 
													}
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<button class="btn btn-block btn-primary">OK</button>
									</div>
								</form>	
							</div>
						</div>
					</div><!-- /#home -->

					<div id="nmember" class="tab-pane">
						<div class="panel panel-primary">
							<div class="panel-heading">
								Form Penjualan
							</div>
							<div class="panel-body">
								<form method="POST" action="<?php echo base_url('penjualan/set_penjualan/non'); ?>">
									<div class="form-group">
										<input  readonly class="form-control" type="text" name="id_penjualan" value="<?php echo $pj; ?>">
									</div>
									<div class="form-group">
										<div class="input-group">
											<label class="label label-primary">ID Guest</label>
											<input  readonly class="form-control" type="text" name="id_customer" value="<?php echo $id_guest; ?>">
										</div>
									</div>
									<div class="form-group">
										<button class="btn btn-block btn-primary">OK</button>
									</div>
								</form>	
							</div>
						</div>
					</div><!-- /#feed -->
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-7">
	<div class="panel panel-primary">
		<div class="panel-heading">Tabel Pelanggan</div>
		<div class="panel-body table-responsive">
			<button data-toggle="modal" data-target="#customer" type="button" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Pelanggan</button>
			<table id="dt_customer" class="table table-bordered">
				<thead>
					<tr class="bg-primary">
						<th>ID Pelanggan</th>
						<th>Nama</th>
						<th>Asal Daerah</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach ($customer as $key) {
					?>
							<tr>
								<td><?php echo $key->id_customer; ?></td>
								<td><?php echo $key->nama; ?></td>
								<td><?php echo $key->asal_daerah; ?></td>
								<td>
									<a data-toggle="modal" href="#<?php echo $key->id_customer; ?>"><i class="fa fa-edit"></i> Edit</a>
									<a onclick="return confirm('Apa Anda Ingin Menghapus Data Ini ?')" href="<?php echo base_url('customer/hapus_customer/').$key->id_customer ?>"><i class="fa fa-trash"></i> Hapus</a>
								</td>
							</tr>
<div class="modal fade" id="<?php echo $key->id_customer ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Edit User</h4>
            </div>
            <div class="modal-body">
                <form onsubmit="return confirm('Apa Anda Ingin Mengubah Data Ini ?')" method="POST" role="form" action="<?php echo base_url('customer/ubah_customer') ?>">
                	<div class="form-group">
						<label class="text-primary"> Kode Customer</label>
						<input type="text" name="kode_customer" class="form-control"  value="<?php echo $key->id_customer ?>" />
					</div>

					<div class="form-group">
						<label class="text-primary"> Nama Customer </label>
						<input type="text" name="nama_customer" class="form-control" value="<?php echo $key->nama ?>" />
					</div>

					<div class="form-group">
						<label class="text-primary">  Tanggal Lahir </label>
						<input class="form-control" required type="date" name="tgl_lahir" value="<?php echo $key->tgl_lhr ?>">
					</div>

					<div class="form-group">
						<label class="text-primary">  Alamat </label>
						<textarea class="form-control" name="alamat" ><?php echo $key->alamat ?></textarea>
					</div>

					<div class="form-group">
						<label class="text-primary">Asal Kota</label>
						<select required class="form-control" name="asal_daerah">
							<option value="<?php echo $key->asal_daerah; ?>"><?php echo $key->asal_daerah ?></option>
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
						<button class="btn btn-block btn-info"><i class="fa fa-edit"></i> Perbaharui Data</button>
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
<div class="row">
	<div class="col-lg-12">
		<div class="widget-box widget-color-blue">
			<div class="widget-header">
				<div class="widget-title">Tabel Penjualan</div>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<div class="table-responsive">
						<table id="dt_penjualan" class="table table-bordered">
							<thead>
								<tr>
									<th>ID Transaksi</th>
									<th>ID Customer</th>
									<th>Tgl Transaksi</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									foreach ($penjualan as $key) {
								?>
										<tr>
											<td><?php echo $key->id_penjualan; ?></td>
											<td><?php echo $key->id_customer; ?></td>
											<td><?php echo $key->tgl_penjualan; ?></td>
											<td>
												<a href="<?php echo base_url('main/index/penjualan/detail/').$key->id_penjualan ?>">Lihat Detail Penjualan</a>
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
	</div>
</div>