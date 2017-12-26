<div class="row">
	<div class="col-lg-4">
		<div class="widget-box widget-color-blue">
			<div class="widget-header widget-header-small">
				<div class="widget-title">Cetak Laporan Penjualan - Periodik</div>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<form action="<?php echo base_url('main/index/laporan_penjualan/periodik') ?>" method="POST">
						<div class="form-group">
							<label class="label label-success" for="nama">Dari</label>
							<input required type="date" class="form-control" name="dari">
						</div>
						<div class="form-group">
							<label class="label label-success" for="nama">Sampai</label>
							<input required type="date" class="form-control" name="sampai">
						</div>
						<div class="form-group">
							<select name="id_customer">
								<option value="semua">Semua</option>
								<?php
									foreach ($gcs as $key) {
								?>
										<option value="<?php echo $key->id_customer; ?>"><?php echo $key->id_customer ?></option>
								<?php 
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<button class="btn btn-primary" name="lihat"><i class="fa fa-book"></i> Lihat</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="widget-box widget-color-blue">
			<div class="widget-header widget-header-small">
				<div class="widget-title">Cetak Laporan Penjualan - Bulan</div>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<form action="<?php echo base_url('main/index/laporan_penjualan/bln') ?>" method="POST">
						<div class="form-group">
							<label class="control-label col-sm-3" for="nama">Bulan</label>
							<select required name="bulan" class="form-control" id="sel1">
						    	<option value="1">Januari</option>
						    	<option value="2">Februari</option>
						    	<option value="3">Maret</option>
						    	<option value="4">April</option>
								<option value="5">Mei</option>
								<option value="6">Juni</option>
								<option value="7">Juli</option>
								<option value="8">Agustus</option>
								<option value="9">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
							</select>
						</div>
						<div class="form-group">
							<select name="id_customer">
								<option value="semua">Semua</option>
								<?php
									foreach ($gcs as $key) {
								?>
										<option value="<?php echo $key->id_customer; ?>"><?php echo $key->id_customer ?></option>
								<?php 
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<button class="btn btn-primary"><i class="fa fa-book"></i> Lihat</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="widget-box widget-color-blue">
			<div class="widget-header widget-header-small">
				<div class="widget-title">Cetak Laporan Penjualan - Per-Tahun</div>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<form action="<?php echo base_url('main/index/laporan_penjualan/thn') ?>" method="POST">
						<div class="form-group">
							<label class="control-label col-sm-3" for="nama">Tahun</label>
							<?php
								echo "<select required name='tahun' class='form-control' id='sel2'>";
								for ($a=2017; $a <= 2999; $a++) {
									echo "<option value='".$a."'>".$a."</option>";
								}
								echo "</select>";
							?>
						</div>
						<div class="form-group">
							<select name="id_customer">
								<option value="semua">Semua</option>
								<?php
									foreach ($gcs as $key) {
								?>
										<option value="<?php echo $key->id_customer; ?>"><?php echo $key->id_customer ?></option>
								<?php 
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<button class="btn btn-primary"><i class="fa fa-book"></i> Lihat</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<?php 
		if ($rpt==0) {
			echo "";
		} else {
	?>
		<div class="col-lg-12">
			<hr>
			<div class="widget-box widget-color-blue">
				<div class="widget-header">
					<div class="widget-title">Laporan Penjualan</div>
				</div>
				<div class="widget-body">
					<div class="widget-main">
						<div class="table-responsive">
							<a onclick="javascript:printContent('print_content')"><h2><i class="fa fa-print"></i></h2></a><hr>
							<div id="print_content">
								<div class="col-sm-6">
									<img class="img-responsive" src="<?php echo base_url('assets/images/photo/tr_logo.png') ?>">
								</div>
								<div class="col-sm-6">
									<h1><u><i>Laporan Transaksi</i></u></h1>
								</div>
								<table class="table table-stripped">
									<thead>
										<tr>
											<th>ID Penjualan</th>
											<th>Tanggal</th>
											<th>ID Barang</th>
											<th>Nama Barang</th>
											<th>Jumlah Terjual</th>
											<th>Harga Retail</th>
											<th>Diskon Barang</th>
											<th>Sub Total</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$total = 0;
											foreach ($rpt as $key) {
										?>
												<tr>
													<td><?php echo $key->id_penjualan ?></td>
													<td><?php echo $key->tgl ?></td>
													<td><?php echo $key->id_barang ?></td>
													<td><?php echo $key->nama_barang ?></td>
													<td><?php echo $key->qty_terjual ?></td>
													<td><?php echo $this->cart->format_number($key->harga_retail)  ?></td>
													<td><?php echo $this->cart->format_number($key->total_diskon)  ?></td>
													<td><?php echo $this->cart->format_number($key->sub_total) ?></td>
												</tr>
										<?php 
												$total = $total + $key->sub_total;
											}
										?>
									</tbody>
								</table>
								<table class="table table-bordered">
									<tr>
										<td>Total Pendapatan</td><td><?php echo $this->cart->format_number($total); ?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
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
	<?php 
		}
	?>
</div>
