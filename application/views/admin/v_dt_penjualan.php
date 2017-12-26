<div class="modal fade" id="struk" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Edit Transaksi</h4>
            </div>
            <div class="modal-body" id="print_struk">
            	<h3>Apotek Bina Sehat /  2017-03-12</h3><hr>
            	<p>ID Transaksi : <?php echo $dtp->id_penjualan ?></p>
            	<p>----------------------------------------------------------------------</p>
            	<div class="table-responsive">
            		<table class="table table-stripped">
						<thead>
							<tr class="bg-primary">
								<th>ID Barang</th>
								<th>Nama Barang</th>
								<th>Qty</th>
								<th>Harga</th>
								<th>Diskon Barang</th>
								<th>Sub Total</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$tot = 0;
								foreach ($dt_struk as $key) {
							?>
									<tr>
										<td><?php echo $key->id_barang; ?></td>
										<td><?php echo $key->nama_barang; ?></td>
										<td>
											<?php echo $key->qty_terjual; ?>
										</td>
										<td><?php echo $this->cart->format_number($key->harga_retail); ?></td>
										<td><?php echo $this->cart->format_number($key->total_diskon); ?></td>
										<td><?php echo $this->cart->format_number($key->sub_total); ?></td>
									</tr>
							<?php 
									$tot = $tot + $key->sub_total;
								}
							?>
						</tbody>
					</table>	
					<div class="col-lg-4">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td>Total</td><td><strong>Rp <?php echo $this->cart->format_number($tot) ?></strong></td>
								</tr>
								<tr>
									<td>Diskon</td>
									<td>
										<?php
											if ($tot >= $dpb->minimal_pembelian) {
												$diskon_beli = $dpb->jumlah_diskon;
												if ($cek > 0) {
												 	$diskon = $dc->jumlah_diskon;
												} else {
												 	$diskon = 0;
												} 
											}
											else{
												$diskon = 0;
											}
											echo $this->cart->format_number($tot * (($diskon_beli + $diskon) / 100));
										?>
									</td>
								</tr>
								<tr>
									<td>Total Bayar</td>
									<td><strong>Rp 
										<?php 
												$ttl1 = $tot - $tot * (($diskon_beli + $diskon) / 100);
												echo $this->cart->format_number($ttl1) ?>
										</strong>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
            	</div>
            	<hr>
            	<p class="text-center">Terima Kasih Telah Berbelanja</p>
            	<p class="text-center">Kunjungi Website Kami</p>
            	<p class="text-center">Di <b>www.indieshu.com</b></p>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
	<div class="widget-box widget-color-blue">
		<div class="widget-header">
			<div class="widget-title">Detail Penjualan</div>
		</div>
		<div class="widget-body">
			<div class="widget-main">
				<div class="label label-primary arrowed-right">
					Nomor Transaksi
				</div>
				<div class="label label-primary arrowed-in">
					<?php echo $dtp ?>
				</div>
				<div class="table-responsive">
					<table class="table table-stripped">
						<thead>
							<tr>
								<th>Nama Barang</th>
								<th>Jumlah Pembelian</th>
								<th>Harga Retail</th>
								<th>Diskon Barang</th>
								<th>Sub Total</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$total = 0;
								foreach ($dt_struk as $key) {
							?>
									<tr>
										<form method="POST" action="<?php echo base_url('penjualan/updatePenjualan'); ?>">
											<td><?php echo $key->nama_barang; ?></td>
											<td>
												<input type="hidden" name="id_penjualan" value="<?php echo $key->id_penjualan; ?>">
												<input type="hidden" name="id_barang" value="<?php echo $key->id_barang; ?>">
												<input type="number" name="qty" value="<?php echo $key->qty_terjual; ?>">
											</td>
											<td><?php echo $this->cart->format_number($key->harga_retail); ?></td>
											<td><?php echo $this->cart->format_number($key->total_diskon); ?></td>
											<td><?php echo $this->cart->format_number($key->sub_total); ?></td>
											<td><button class="btn btn-info"><i class="fa fa-refresh"> Update</i></button></td>
										</form>
									</tr>
							<?php 
									$total = $total + $key->sub_total;
								}
							?>
						</tbody>
					</table>
					<table class="table table-stripped">
						<thead>
							<tr>
								<th>Nama Treatment</th>
								<th>Harga</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$total_tr = 0;
								foreach ($dt_tr as $key) {
							?>
									<tr>
											<td><?php echo $key->nama_treatment; ?></td>
											<td><?php echo $this->cart->format_number($key->harga); ?></td>
											<td><a href=""><i class="fa fa-trash"></i></a></td>
									</tr>
							<?php 
									$total_tr = $total_tr + $key->harga;
								}
							?>
						</tbody>
					</table>
					<div class="col-lg-4">
						<table class="table table-stripped">
						<tbody>
							<tr>
								<td><strong>Total Belanja</strong></td>
								<td>Rp. <?php echo $this->cart->format_number($total) ; ?></td>
							</tr>
							<tr>
								<td><strong>Treatment</strong></td>
								<td>Rp. <?php echo $this->cart->format_number($total_tr) ; ?></td>
							</tr>
							<tr>
								<td><strong>Total Transaksi</strong></td>
								<td>
									Rp. <?php
											$ttr = $total + $total_tr;
											echo $this->cart->format_number($ttr) ; 
										?> 								
								</td>
							</tr>
							<tr>
								<td>Diskon</td>
								<td>
									<?php
										if ($ttr >= $dpb->minimal_pembelian) {
											$dsc1 = $dpb->jumlah_diskon;
											if ($cek > 0) {
											 	$disc = $dc->jumlah_diskon;
											} else {
											 	$disc = 0;
											} 
										}
										else{
											$dsc1 = 0;
										}
										echo "Rp. ".$this->cart->format_number($ttr * (($dsc1 + $disc) / 100));
									?>
								</td>
							</tr>
							<tr>
								<td><strong>Total Bayar</strong></td>
								<td><strong>Rp 
										<?php 
												$ttl = $ttr - $ttr * (($dsc1 + $disc) / 100);
												echo $this->cart->format_number($ttl) ?>
										</strong>
									</td>
							</tr>
						</tbody>
					</table>
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td>
										<a onclick="printContent('print_struk')" class="btn-sm btn btn-primary"><i class="fa fa-print"></i>
										</a>
									</td>
								</tr>
							</tbody>
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