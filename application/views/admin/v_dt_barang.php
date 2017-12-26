<div class="col-lg-12">
	<div class="tabbable">
		<ul class="nav nav-tabs padding-18">
			<li class="active">
				<a data-toggle="tab" href="#harga">
					<i class="green ace-icon fa fa-user bigger-120"></i>
					Harga
				</a>
			</li>

			<li>
				<a data-toggle="tab" href="#satuan">
					<i class="orange ace-icon fa fa-rss bigger-120"></i>
					Satuan
				</a>
			</li>
		</ul>
		<div class="tab-content no-border padding-24">
			<div id="harga" class="tab-pane in active">
				<div class="col-lg-8">
					<div class="widget-box">
						<div class="widget-header">
							<div class="widget-title">
								Pengaturan Harga <i class="fa fa-money"></i>
							</div>
						</div>
						<div class="widget-body">
							<div class="widget-main">
								<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>ID Barang</th><th>Nama Barang</th><th>Harga Jual</th><th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												foreach ($dtl_barang as $key) {
											?>
													<tr>
														<td><?php echo $key->id_barang; ?></td>
														<td><?php echo $key->nama_barang; ?></td>
														<form method="POST" action="<?php echo base_url('barang/atur_harga') ?>">
															<td>
																<input type="hidden" name="id_barang" value="<?php echo $key->id_barang; ?>">
																<input type="number" name="hr" value="<?php echo $key->harga_retail; ?>">
																</td>
															<td>
																<button class="btn btn-primary btn-block">Ubah Harga</button>
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
						</div>
					</div>
				</div>
			</div><!-- /#home -->

			<div id="satuan" class="tab-pane">
				<div class="col-lg-9">
					<div class="widget-box">
						<div class="widget-header">
							<div class="widget-title">
								Satuan Barang <i class="fa fa-dropbox"></i>
							</div>
						</div>
						<div class="widget-body">
							<div class="widget-main">
								<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>ID Barang</th>
												<th>Nama Barang</th>
												<th>Detail Mid Satuan</th>
												<th>Detail Low Satuan</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												foreach ($dt_satuan as $key) {
											?>
													<tr>
														<td><?php echo $key->id_barang; ?></td>
														<td><?php echo $key->nama_barang; ?></td>
														<form method="POST" action="<?php echo base_url('barang/atur_satuan') ?>">
															<td>
																<input type="hidden" name="id_barang" value="<?php echo $key->id_barang; ?>">
																<input type="number" name="ms" value="<?php echo $key->mid_rc; ?>">
															</td>
															<td>
																<input type="number" name="ls" value="<?php echo $key->low_rc; ?>">
															</td>
															<td>
																<button class="btn btn-primary btn-block">Ubah Satuan</button>
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
						</div>
					</div>
				</div>
			</div><!-- /#feed -->
		</div>
	</div>
</div>