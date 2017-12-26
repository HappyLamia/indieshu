<div class="row">
	<div class="col-lg-4">
		<div class="widget-box widget-color-orange">
			<div class="widget-header widget-header-small">
				<div class="widget-title">Cetak Laporan Pembelian - Periodik</div>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<form action="<?php echo base_url('main/index/laporan_pembelian/periodik') ?>" method="POST">
						<div class="form-group">
							<label class="badge badge-primary" for="nama">Dari</label>
							<input type="date" class="form-control" name="dari">
						</div>
						<div class="form-group">
							<label class="badge badge-primary" for="nama">Sampai</label>
							<input type="date" class="form-control" name="sampai">
						</div>
						<div class="form-group">
							<label class="badge badge-primary" for="nama">Supplier</label>
							<select class="form-control" name="id_supplier">
								<option value="semua">Semua</option>
								<?php 
									foreach ($supplier as $key) {
								?>
										<option value="<?php echo $key->id_supplier ?>">
										<?php echo $key->id_supplier." - ".$key->nama ?>
										</option>
								<?php 
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<button class="btn btn-warning" name="lihat"><i class="fa fa-book"></i> Lihat</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="widget-box widget-color-orange">
			<div class="widget-header widget-header-small">
				<div class="widget-title">Cetak Laporan Pembelian - Bulan</div>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<form action="<?php echo base_url('main/index/laporan_pembelian/bln') ?>" method="POST">
						<div class="form-group">
							<label class="badge badge-primary">Bulan</label>
							<select name="bulan" class="form-control" id="sel1">
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
							<label class="badge badge-primary" for="nama">Supplier</label>
							<select class="form-control" name="id_supplier">
								<option value="semua">Semua</option>
								<?php 
									foreach ($supplier as $key) {
								?>
										<option value="<?php echo $key->id_supplier ?>">
										<?php echo $key->id_supplier." - ".$key->nama ?>
										</option>
								<?php 
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<button class="btn btn-warning"><i class="fa fa-book"></i> Lihat</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="widget-box widget-color-orange">
			<div class="widget-header widget-header-small">
				<div class="widget-title">Cetak Laporan Pembelian - Per-Tahun</div>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<form action="<?php echo base_url('main/index/laporan_pembelian/thn') ?>" method="POST">
						<div class="form-group">
							<label class="badge badge-primary" for="nama">Tahun</label>
							<?php
								echo "<select name='tahun' class='form-control' id='sel1'>";
								for ($a=2017; $a <= 2999 ; $a++) {
									echo "<option value='".$a."'>".$a."</option>";
								}
								echo "</select>";
							?>
						</div>
						<div class="form-group">
							<label class="badge badge-primary" for="nama">Supplier</label>
							<select class="form-control" name="id_supplier">
								<option value="semua">Semua</option>
								<?php 
									foreach ($supplier as $key) {
								?>
										<option value="<?php echo $key->id_supplier ?>">
										<?php echo $key->id_supplier." - ".$key->nama ?>
										</option>
								<?php 
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<button class="btn btn-warning"><i class="fa fa-book"></i> Lihat</button>
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
								<img class="img-responsive" src="<?php echo base_url('assets/images/photo/tr_logo.png') ?>">
								<table class="table table-stripped">
									<thead>
										<tr>
											<th colspan="7"><h2><strong>Laporan Pembelian</strong></h2></th>
										</tr>
										<tr>
											<th>ID Pembelian</th>
											<th>Tanggal</th>
											<th>ID Supplier</th>
											<th>Nama Supplier</th>
											<th>ID Barang</th>
											<th>Nama Barang</th>
											<th>Harga Beli</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$total = 0;
											foreach ($rpt as $key) {
										?>
												<tr>
													<td><?php echo $key->id_pembelian?></td>
													<td><?php echo $key->tgl ?></td>
													<td><?php echo $key->id_supplier ?></td>
													<td><?php echo $key->nama_supplier ?></td>
													<td><?php echo $key->id_barang ?></td>
													<td><?php echo $key->nama_barang ?></td>
													<td><?php echo $this->cart->format_number($key->harga_beli)  ?></td>
												</tr>
										<?php 
												$total = $total + $key->harga_beli;
											}
										?>
									</tbody>
								</table>
								<table class="table table-bordered">
									<tr>
										<td>Total Pengeluaran</td><td><?php echo $this->cart->format_number($total); ?></td>
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