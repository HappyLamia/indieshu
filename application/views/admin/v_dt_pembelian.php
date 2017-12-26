<div class="col-lg-12">
	<div class="col-lg-4">
		<div class="widget-box">
			<div class="widget-header">
				<div class="widget-title">ID Pembelian <i class="fa fa-chevron-right"></i> <?php echo $invoice->id_pembelian ?></div>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<form>
						<div class="form-group">
							<label class="badge badge-primary">Nama Supplier</label>
							<input readonly class="form-control" type="text" value="<?php echo $dt_supplier->nama; ?>">
						</div>
						<div class="form-group">
							<label class="badge badge-primary">Invoice</label>
							<input readonly class="form-control" type="text" value="<?php echo $invoice->invoice; ?>">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="table-responsive">
		<table id="dtl_pembelian" class="table table-stripped">
			<thead>
				<tr>
					<th>ID Barang</th><th>Nama Barang</th><th>Jumlah Pembelian</th><th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($dt_pembelian as $key) {
				?>
						<tr>
							<form method="POST" action="<?php echo base_url('pembelian/update_cart') ?>">
								<td><?php echo $key->id_barang; ?></td>
								<td><?php echo $key->nama_barang; ?></td>
								<td>
									<input type="hidden" name="id_pembelian" value="<?php echo $key->id_pembelian ?>">
									<input type="hidden" name="id_barang" value="<?php echo $key->id_barang ?>">
									<input type="number" name="jumlah_beli" value="<?php echo $key->jumlah_beli; ?>">
								</td>
								<td>
									<button class="btn btn-primary">Update</button> | 
									<a class="btn btn-danger" onclick="return confirm('Apa Anda Akan Menghapus Data Ini ?')" href="<?php echo base_url('pembelian/remove_cart/').$key->id_pembelian.'/'.$key->id_barang ?>">
										<i class="fa fa-trash"></i>
									</a>
								</td>
							</form>
						</tr>
				<?php 
					}
				?>
			</tbody>
		</table>
	</div>
</div>