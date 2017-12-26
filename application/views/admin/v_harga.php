<div class="row">
	<div class="col-xs-4">
		<div class="widget-box widget-color-blue">
	        <div class="widget-header widget-header-flat">
	            <div class="widget-title lighter">
	                Atur Diskon Coupon
	            </div>

	            <div class="widget-toolbar">
	                <a href="#" data-action="collapse">
	                    <i class="ace-icon fa fa-chevron-up"></i>
	                </a>
	            </div>
	        </div>

	        <div class="widget-body">
	            <div class="widget-main">
	        		<form method="POST" action="<?php echo base_url('diskon/atur_diskon/coupon') ?>">
						<div class="form-group">
							<label class="label label-primary">Atur Besar Diskon (%)</label>
							<input required class="form-control" type="number" name="jumlah_diskon" value="<?php echo $dc->jumlah_diskon; ?>">
						</div>
						<div class="form-group">
							<button class="btn btn-primary">Simpan Pengaturan</button>
						</div>
					</form>
	            </div><!-- /.widget-main -->
	        </div><!-- /.widget-body -->
	    </div><!-- /.widget-box --> 
	</div>
	<div class="col-xs-4">
		<div class="widget-box widget-color-green">
			<div class="widget-header">
				<div class="widget-title">Atur Bonus Pembelian</div>
				<div class="widget-toolbar">
	                <a href="#" data-action="collapse">
	                    <i class="ace-icon fa fa-chevron-up"></i>
	                </a>
	            </div>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<form method="POST" action="<?php echo base_url('diskon/atur_diskon/pembelian') ?>">
						<div class="form-group">
							<label class="label label-primary">Atur Besar Diskon (%)</label>
							<input required class="form-control" type="number" name="jumlah_diskon" value="<?php echo $dpb->jumlah_diskon ?>">
						</div>
						<div class="form-group">
							<label class="label label-primary">Atur Minimal Transaksi</label>
							<input required class="form-control" type="number" name="mt" value="<?php echo $dpb->minimal_pembelian ?>">
						</div>
						<div class="form-group">
							<button class="btn btn-primary">Simpan Pengaturan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-4">
		<div class="widget-box widget-color-orange">
			<div class="widget-header">
				<div class="widget-title">Atur Diskon Barang</div>
				<div class="widget-toolbar">
	                <a href="#" data-action="collapse">
	                    <i class="ace-icon fa fa-chevron-up"></i>
	                </a>
	            </div>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<form method="POST" action="<?php echo base_url('diskon/atur_diskon/barang') ?>">
						<div class="form-group">
							<label class="label label-primary">Atur Besar Diskon (%)</label>
							<input required class="form-control" type="number" name="jumlah_diskon">
						</div>
						<div class="form-group">
							<label class="label label-primary">Berdasarkan Barang</label>
							<select required name="id_barang">
								<option value="">Pilih Barang</option>
								<?php 
									foreach ($barang as $key) {
								?>
										<option value="<?php echo $key->id_barang ?>"><?php echo $key->nama_barang ?></option>
								<?php 
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<button class="btn btn-primary">Tambah Diskon</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="space-24"></div>
<h3 class="header smaller red">Daftar Diskon</h3>
<div class="row">
	<div class="col-xs-5 col-sm-3 pricing-span-header">
		<div class="widget-box transparent">
			<div class="widget-header">
				<h5 class="widget-title bigger lighter">Package Name</h5>
			</div>

			<div class="widget-body">
				<div class="widget-main no-padding">
					<ul class="list-unstyled list-striped pricing-table-header">
						<li>Jumlah Diskon </li>
						<li>Minimal Transaksi </li>
						<li>Barang Yang Memiliki Diskon </li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xs-7 col-sm-9 pricing-span-body">
		<div class="pricing-span">
			<div class="widget-box pricing-box-small widget-color-red3">
				<div class="widget-header">
					<h5 class="widget-title bigger lighter">Diskon Kupon</h5>
				</div>

				<div class="widget-body">
					<div class="widget-main no-padding">
						<ul class="list-unstyled list-striped pricing-table">
							<li> 
								<?php echo $dc->jumlah_diskon ?> %
							</li>
							<li> --- </li>
							<li> --- </li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="pricing-span">
			<div class="widget-box pricing-box-small widget-color-orange">
				<div class="widget-header">
					<h5 class="widget-title bigger lighter">Diskon Penjualan</h5>
				</div>

				<div class="widget-body">
					<div class="widget-main no-padding">
						<ul class="list-unstyled list-striped pricing-table">
							<li> <?php echo $dpb->jumlah_diskon ?> % </li>
							<li> Rp. <?php echo $this->cart->format_number($dpb->minimal_pembelian); ?> </li>
							<li> --- </li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-xs-7">
		<div class="widget-box transparent">
			<div class="widget-header">
				<div class="widget-title">Daftar Diskon Barang</div>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<div class="table-responsive">
						<table class="table table-stripped">
							<thead>
								<tr>
									<th>ID Barang</th><th>Nama Barang</th><th>Jumlah Diskon</th><th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									foreach ($db as $key) {
								?>
										<form method="POST" action="<?php echo base_url('diskon/atur_diskon/ubah_barang') ?>">
											<tr>
												<td><?php echo  $key->id_barang ?></td>
												<td><?php echo  $key->nama_barang ?></td>
												<td><input type="hidden" name="id_barang" value="<?php echo  $key->id_barang ?>">
													<input type="number" name="jumlah_diskon" value="<?php echo  $key->jumlah_diskon ?>"></td>
												<td>
													<button class="btn btn-mini btn-warning"><i class="fa fa-edit"> Ubah</i></button> |
													<a href="<?php echo base_url('diskon/hapus_diskon/').$key->id_barang  ?>"><i class="fa fa-times"></i> Hapus</a>
												</td>
											</tr>
										</form>
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
