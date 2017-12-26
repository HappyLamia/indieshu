<?php 
	foreach ($birthday as $key) {
		$coupon = $key->coupon;
	}
?>
<div class="modal fade" id="struk" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Edit Pasien</h4>
            </div>
            <div class="modal-body" id="print_struk">
            	<h3>Apotek Bina Sehat /  2017-03-12</h3><hr>
            	<p>ID Transaksi : <?php echo $this->session->userdata('id_penjualan'); ?></p>
            	<p>----------------------------------------------------------------------</p>
            	<p>Nomor Customer : <?php echo $this->session->userdata('id_customer'); ?></p>
            	<p>----------------------------------------------------------------------</p>
            	<div class="table-responsive">
            		<table class="table table-stripped">
						<thead>
							<tr class="bg-primary">
								<th>Nama Barang</th>
								<th>Qty</th>
								<th>Harga</th>
								<th>Diskon Barang</th>
								<th>Sub Total</th>
							</tr>
						</thead>
						<tbody>
						    <?php
						    	$tb = 0;
						    	foreach ($this->cart->contents() as $items){
						    		if ($items['options']['type']=='Barang') {
						    			$rowid = $items['rowid'];
						    ?>
							            <tr>
												<td><?php echo $items['name']; ?></td>
												<td><?php echo $items['qty']; ?></td>
												<td><?php echo $this->cart->format_number($items['price']); ?></td>
							                    <td>
		                                            <?php 
		                                            	$i=0;
		                                            	foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value){
		                                            		$ix++;
		                                            		if ($i==1) {
		                                            			echo $option_value;
		                                            		}					                                         
		                                                }
		                                            ?>
							                    </td>
							                    <td><?php echo $this->cart->format_number($items['subtotal']); ?></td>
							            </tr>
						    <?php 
						    			$tb = $tb + $items['subtotal'];
						    		}
						    	}
						    ?>
					    </tbody>
					</table>
					<table class="table table-bordered">
						<thead>
							<tr class="bg-primary">
								<th>Nama Treatment</th>
								<th>Harga</th>
								<th>Sub Total</th>
							</tr>
						</thead>
						<tbody>
							<?php 
						    	$tj = 0;
						    	foreach ($this->cart->contents() as $items){
						    		if ($items['options']['type']=='Jasa') {
						    			$rowid = $items['rowid'];
						    ?>
							            <tr>
												<td><?php echo $items['name']; ?></td>
												<td><?php echo $this->cart->format_number($items['price']); ?></td>
							                    <td><?php echo $this->cart->format_number($items['subtotal']); ?></td>
							            </tr>
						    <?php 
						    			$tj = $tj + $items['subtotal'];
						    		}
						    	}
						    ?>
						</tbody>
					</table>
					<table class="table table-stripped">
						<tbody>
							<tr>
								<td><strong>Total Belanja</strong></td>
								<td>Rp. <?php echo $this->cart->format_number($tb) ; ?></td>
							</tr>
							<tr>
								<td><strong>Treatment</strong></td>
								<td>Rp. <?php echo $this->cart->format_number($tj) ; ?></td>
							</tr>
							<tr>
								<td><strong>Total Transaksi</strong></td>
								<td>
									Rp. <?php echo $this->cart->format_number($this->cart->total()) ; ?> 								
								</td>
							</tr>
							<tr>
								<td><strong>Discount</strong></td>
								<td>Rp.
									<?php
										if ($this->cart->total() >= $dpb->minimal_pembelian) {
											$dscx = $dpb->jumlah_diskon;
											if ($cek > 0) {
											 	$discountx = $dc->jumlah_diskon;
											} else {
											 	$discountx = 0;
											} 
										}
										else{
											$dscx = 0;
										}
										$total_diskonx = $this->cart->total() * (($dscx + $discountx) / 100);
										echo $this->cart->format_number($total_diskonx);
									?>
								</td>
							</tr>
							<tr>
								<td><strong>Total Bayar</strong></td>
								<td class="bg-info">
									<b>Rp.
										<?php 
											$totalx = $this->cart->total() - ($this->cart->total() * (($dscx + $discountx) / 100));
											echo $this->cart->format_number($totalx) ; 
										?>
									</b>
								</td>
							</tr>
						</tbody>
					</table>
            	</div>
            	<hr>
            	<p class="text-center">Terima Kasih Telah Berbelanja</p>
            	<p class="text-center">Kunjungi Website Kami</p>
            	<p class="text-center">Di <b>www.indieshu.com</b></p>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-9">
	<div class="panel panel-primary">
		<div class="panel-heading">
			Cart Penjualan <i class="fa fa-chevron-right"></i> 
			<?php echo $this->session->userdata('id_customer'); ?> <i class="fa fa-chevron-right"></i>
			<?php echo $this->session->userdata('id_penjualan'); ?>
		</div>
		<div class="panel-body table-responsive">
			<div class="row">
				<div class="col-lg-4">
					<form method="POST" action="<?php echo base_url('penjualan/add_cart'); ?>">
						<div class="form-group">
							<input  readonly class="form-control" type="hidden" name="id_penjualan" value="<?php echo $this->session->userdata('id_penjualan'); ?>">
							<label class="label label-primary">List Barang</label>
							<select required class="chosen-select form-control" id="list" data-placeholder="Choose a State..." name="id_barang" onchange="showStok(this.value)">
								<option value="">Pilih Barang</option>
								<?php 
									foreach ($barang as $key) {
								?>
										<option value="<?php echo $key->id_barang ?>"><?php echo $key->id_barang."-".$key->nama_barang; ?> -</option>
								<?php 
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<label class="label label-primary">Jumlah Beli</label>
							<input required onkeyup="minus_stock()" id="test3" class="form-control" type="number" name="qty" >
						</div>
						<div class="form-group">	
							<button id="add_to_cart" class="btn btn-block btn-primary">Tambah Ke Keranjang</button>
						</div>
					</form>	
				</div>
				<div class="col-lg-4">
					<form method="POST" action="<?php echo base_url('penjualan/set_treatment') ?>">
						<div class="form-group">
							<label class="label label-primary">List Treatment</label>
							<select required name="id_treatment" class="chosen-select form-control">
								<option value="">Pilih Treatment</option>
								<?php 
									foreach ($trt as $key) {
								?>
										<option value="<?php echo $key->id_treatment ?>"><?php echo $key->nama_treatment; ?> -</option>
								<?php 
									}
								?>
							</select>
						</div>
						<div class="form-group">	
							<button id="add_to_cart2" class="btn btn-block btn-success">Tambah Ke Keranjang</button>
						</div>
					</form>
				</div>
				<div class="col-sm-4">
					<form>
						<div class="form-group">
							<label class="label label-info">Stok</label>
							<table class="table table-stripped">
								<tbody>
									<tr>
										<td>Stok</td>
										<td><strong><div id="stok_barang"></div><div class="hidden" id="temp"></div></strong></td>
									</tr>
									<tr>
										<td>
											<a class="btn btn-block btn-danger" href="<?php echo base_url('penjualan/off') ?>">Batalkan Transaksi</a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<table class="table table-bordered">
					    <thead>
							<tr class="bg-primary">
								<th>ID Barang</th>
								<th>Nama Barang</th>
								<th>Qty</th>
								<th>Harga</th>
								<th>Diskon Barang</th>
								<th>Sub Total</th>
								<th colspan="2">Aksi</th>
							</tr>
						</thead>
						<tbody>
						    <?php 
						    	$a=0;
						    	$total_brg = 0;
						    	foreach ($this->cart->contents() as $items){
						    		if ($items['options']['type']=='Barang') {
						    			$rowid = $items['rowid'];
						    ?>
							            <tr>
							                    <td><?php echo $items['id']; ?></td>
												<td><?php echo $items['name']; ?></td>
												<td><?php echo $items['qty']; ?></td>
												<td><?php echo $this->cart->format_number($items['price']); ?></td>
							                    <td>
		                                            <?php 
		                                            	$i=0;
		                                            	foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value){
		                                            		$i++;
		                                            		if ($i==1) {
		                                            			echo $option_value;
		                                            		}					                                         
		                                                }
		                                            ?>
							                    </td>
							                    <td><?php echo $this->cart->format_number($items['subtotal']); ?></td>
												<td>
													<form class="form-inline" method="POST" action="<?php echo base_url('penjualan/update_cart/plus') ?>">
														<div class="form-group">
															<input type="hidden" name="rowid" value="<?php echo $items['rowid']; ?>">
															<input type="hidden" name="nqty" value="<?php echo $items['qty']; ?>">
														</div>
														<div class="form-group">
															<button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></button>
														</div>
													</form>
													<form class="form-inline" method="POST" action="<?php echo base_url('penjualan/update_cart/minus') ?>">
														<div class="form-group">
															<input type="hidden" name="rowid" value="<?php echo $items['rowid']; ?>">
															<input type="hidden" name="nqty" value="<?php echo $items['qty']; ?>">
														</div>
														<div class="form-group">
															<button class="btn btn-sm btn-warning"><i class="fa fa-minus"></i></button>
														</div>
													</form>
												</td>
												<td><a class="btn btn-danger" href="<?php echo base_url('penjualan/remove_cart/'). $items['rowid']?>"><i class="fa fa-trash"></i></a>
												</td>
							            </tr>
						    <?php 
						    			$total_brg = $total_brg + $items['subtotal'];
						    		}
						    	}
						    ?>
					    </tbody>
					</table>
					<table class="table table-bordered">
						<thead>
							<tr class="bg-primary">
								<th>ID Treatment</th>
								<th>Nama Treatment</th>
								<th>Harga</th>
								<th>Sub Total</th>
								<th colspan="2">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 
						    	$total_jasa = 0;
						    	foreach ($this->cart->contents() as $items){
						    		if ($items['options']['type']=='Jasa') {
						    			$rowid = $items['rowid'];
						    ?>
							            <tr>
							                    <td><?php echo $items['id']; ?></td>
												<td><?php echo $items['name']; ?></td>
												<td><?php echo $this->cart->format_number($items['price']); ?></td>
							                    <td><?php echo $this->cart->format_number($items['subtotal']); ?></td>
												<td><a class="btn btn-danger" href="<?php echo base_url('penjualan/remove_cart/'). $items['rowid']?>"><i class="fa fa-trash"></i></a>
												</td>
							            </tr>
						    <?php 
						    			$total_jasa = $total_jasa + $items['subtotal'];
						    		}
						    	}
						    ?>
						</tbody>
					</table>
					<table class="table table-stripped">
						<tbody>
							<tr>
								<td><strong>Total Belanja</strong></td>
								<td>Rp. <?php echo $this->cart->format_number($total_brg) ; ?></td>
							</tr>
							<tr>
								<td><strong>Treatment</strong></td>
								<td>Rp. <?php echo $this->cart->format_number($total_jasa) ; ?></td>
							</tr>
							<tr>
								<td><strong>Total Transaksi</strong></td>
								<td>
									Rp. <?php echo $this->cart->format_number($this->cart->total()) ; ?> 								
								</td>
							</tr>
							<tr>
								<td><strong>Discount</strong></td>
								<td>Rp.
									<?php
										if ($this->cart->total() >= $dpb->minimal_pembelian) {
											$dsc = $dpb->jumlah_diskon;
											if ($cek > 0) {
											 	$discount = $dc->jumlah_diskon;
											} else {
											 	$discount = 0;
											} 
										}
										else{
											$dsc = 0;
										}
										$total_diskon = $this->cart->total() * (($dsc + $discount) / 100);
										echo $this->cart->format_number($total_diskon);
									?> /*
									<small>
											<b>Jika Transaksi Melebihi <?php echo $dpb->minimal_pembelian; ?></b>
											maka akan terdapat discount sebesar <b><?php echo $dsc."%" ?></b>
									</small>
								</td>
							</tr>
							<tr>
								<td><strong>Total Bayar</strong></td>
								<td class="bg-info">
									<b>Rp.
										<?php 
											$total = $this->cart->total() - ($this->cart->total() * (($dsc + $discount) / 100));
											echo $this->cart->format_number($total) ; 
										?>
									</b>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			
			<table class="table table-stripped">
				<tr>
					<td>
						<?php 
							if (!isset($rowid)) {
								echo "";
							}
							else 
							{
						?>
								<form class="form-inline" method="POST" action="<?php echo base_url('penjualan/use_coupon') ?>">
									<?php 
										if ($this->session->userdata('no_coupon')) {
											if ($cek > 0) {
									?>
												<div class="form-group">
													<div class='alert alert-warning'>
													    <strong><i class="fa fa-check"></i></strong> Coupon Telah Digunakan
													</div>
												</div>
									<?php 
											}
											else{
									?>
												<div class="form-group">
													<input readonly type="text" name="coupon" value="<?php echo $this->session->userdata('no_coupon') ?>">
												</div>
												<div class="form-group">
													<button class="btn btn-sm btn-warning">Gunakan Coupon</button>
												</div>
									<?php 
											}
										} 
										else {
											echo "";
										}
									?>
									<div class="form-group">
										<a  class="btn-sm btn btn-primary" href="<?php echo base_url('penjualan/checkout/').$total_diskon ?>">Checkout</a>
									</div>
									<div class="form-group">
										<a onclick="printContent('print_struk')" class="btn-sm btn btn-primary"><i class="fa fa-print"></i></a>
									</div>
								</form>
						<?php 
							}							
						?>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
<div class="col-lg-3">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Resep <i class="fa fa-chevron-right"></i> 
				</div>
				<div class="panel-body table-responsive">
					<table class="table table-stripped">
						<tbody>
							<tr>
								<td><div id="id_penyakit"></div></td>
								<td><div id="nama_penyakit"></div></td>
							</tr>
							<tr>
								<td colspan="2">
									<div id="resep"></div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>		
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Label Biru <i class="fa fa-chevron-right"></i> 
				</div>
				<div class="panel-body table-responsive">
					<table class="table table-stripped">
						<tbody>
							<tr>
								<td><div id="id_penyakit"></div></td>
								<td><div id="nama_penyakit"></div></td>
							</tr>
							<tr>
								<td colspan="2">
									<div id="resep"></div>
								</td>
							</tr>
						</tbody>
					</table>
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