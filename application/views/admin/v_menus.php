<?php 
	if ($this->session->userdata('level')=="Super Admin") {
		if ($this->session->userdata('username')=="Admin System") {
			if ($ctrl->ctrl==1) {
?>
				<ul class="nav nav-list">
					<li class="">
						<a href="<?php echo base_url(); ?>">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="<?php echo base_url('main/index/analysis'); ?>">
							<i class="menu-icon fa fa-search"></i>
							<span class="menu-text"> Analisis Data </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="<?php echo base_url(); ?>">
							<i class="menu-icon fa fa-book"></i>
							<span class="menu-text"> Panduan </span>
						</a>

						<b class="arrow"></b>
					</li>
				</ul><!-- /.nav-list -->
<?php 
			}
			else{
?>
				<ul class="nav nav-list">
					<li class="">
						<a href="<?php echo base_url(); ?>">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-globe"></i>
							<span class="menu-text">
								Website
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?php echo base_url('main/index/artikel'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Artikel
								</a>
							</li>

							<li class="">
								<a href="<?php echo base_url('main/index/treatment'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Treatment
								</a>
							</li>

							<li class="">
								<a href="<?php echo base_url('main/index/dokter'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Dokter
								</a>
							</li>

							<li class="">
								<a href="<?php echo base_url('main/index/gallery'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Gallery
								</a>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="<?php echo base_url('main/index/analysis'); ?>">
							<i class="menu-icon fa fa-search"></i>
							<span class="menu-text"> Analisa Data </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-database"></i>
							<span class="menu-text">
								Kelola Klinik
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?php echo base_url('main/index/treatment'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Treatment
								</a>
							</li>
							<li class="">
								<a href="<?php echo base_url('main/index/resep'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Penyakit & Resep
								</a>
							</li>
							<li class="">
								<a href="<?php echo base_url('main/index/pasien'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Data Pasien
								</a>
							</li>

							<li class="">
								<a href="<?php echo base_url('main/index/rm'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Catatan Medis
								</a>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-shopping-cart"></i>
							<span class="menu-text"> POS </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?php echo base_url('main/index/penjualan'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Transaksi
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo base_url('main/index/diskon'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Diskon
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo base_url('main/index/barcode'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Generate Barcode
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo base_url('main/index/supplier'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Supplier
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo base_url('main/index/pembelian'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Pembelian Barang
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo base_url('main/index/barang'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Stok Barang
								</a>

								<b class="arrow"></b>
							</li>							
						</ul>
					</li>

					<li class="">
						<a href="<?php echo base_url('main/index/penggajian'); ?>">
							<i class="menu-icon fa fa-money"></i>
							<span class="menu-text"> Penggajian </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text"> Antrian </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?php echo base_url('main/index/intro'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Manage Intro
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo base_url('main/index/ruang'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Manage Ruang
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo base_url('main/index/poli'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Manage Poli
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo base_url('main/index/service'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Pelayanan Antrian
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-book"></i>
							<span class="menu-text"> Laporan </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?php echo base_url('main/index/laporan_pembelian') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Laporan Stok Barang
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo base_url('main/index/laporan_penjualan') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Laporan Transaksi
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="<?php echo base_url(); ?>">
							<i class="menu-icon fa fa-book"></i>
							<span class="menu-text"> Panduan </span>
						</a>

						<b class="arrow"></b>
					</li>
				</ul><!-- /.nav-list -->	
<?php 
			}
		}
		else {
?>
			<ul class="nav nav-list">
				<li class="">
					<a href="<?php echo base_url(); ?>">
						<i class="menu-icon fa fa-tachometer"></i>
						<span class="menu-text"> Dashboard </span>
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-globe"></i>
						<span class="menu-text">
							Website
						</span>

						<b class="arrow fa fa-angle-down"></b>
					</a>

					<b class="arrow"></b>

					<ul class="submenu">
						<li class="">
							<a href="<?php echo base_url('main/index/artikel'); ?>">
								<i class="menu-icon fa fa-caret-right"></i>
								Artikel
							</a>
						</li>

						<li class="">
							<a href="<?php echo base_url('main/index/treatment'); ?>">
								<i class="menu-icon fa fa-caret-right"></i>
								Treatment
							</a>
						</li>

						<li class="">
							<a href="<?php echo base_url('main/index/dokter'); ?>">
								<i class="menu-icon fa fa-caret-right"></i>
								Dokter
							</a>
						</li>

						<li class="">
							<a href="<?php echo base_url('main/index/gallery'); ?>">
								<i class="menu-icon fa fa-caret-right"></i>
								Gallery
							</a>
						</li>
					</ul>
				</li>

				<li class="">
					<a href="<?php echo base_url('main/index/analysis'); ?>">
						<i class="menu-icon fa fa-search"></i>
						<span class="menu-text"> Analisa Data </span>
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-database"></i>
						<span class="menu-text">
							Kelola Klinik
						</span>

						<b class="arrow fa fa-angle-down"></b>
					</a>

					<b class="arrow"></b>

					<ul class="submenu">
						<li class="">
							<a href="<?php echo base_url('main/index/treatment'); ?>">
								<i class="menu-icon fa fa-caret-right"></i>
								Treatment
							</a>
						</li>
						<li class="">
							<a href="<?php echo base_url('main/index/resep'); ?>">
								<i class="menu-icon fa fa-caret-right"></i>
								Penyakit & Resep
							</a>
						</li>
						<li class="">
							<a href="<?php echo base_url('main/index/pasien'); ?>">
								<i class="menu-icon fa fa-caret-right"></i>
								Data Pasien
							</a>
						</li>

						<li class="">
							<a href="<?php echo base_url('main/index/rm'); ?>">
								<i class="menu-icon fa fa-caret-right"></i>
								Catatan Medis
							</a>
						</li>
					</ul>
				</li>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-shopping-cart"></i>
						<span class="menu-text"> POS </span>

						<b class="arrow fa fa-angle-down"></b>
					</a>

					<b class="arrow"></b>

					<ul class="submenu">
						<li class="">
							<a href="<?php echo base_url('main/index/penjualan'); ?>">
								<i class="menu-icon fa fa-caret-right"></i>
								Transaksi
							</a>

							<b class="arrow"></b>
						</li>

						<li class="">
							<a href="<?php echo base_url('main/index/diskon'); ?>">
								<i class="menu-icon fa fa-caret-right"></i>
								Diskon
							</a>

							<b class="arrow"></b>
						</li>

						<li class="">
							<a href="<?php echo base_url('main/index/barcode'); ?>">
								<i class="menu-icon fa fa-caret-right"></i>
								Generate Barcode
							</a>

							<b class="arrow"></b>
						</li>

						<li class="">
							<a href="<?php echo base_url('main/index/supplier'); ?>">
								<i class="menu-icon fa fa-caret-right"></i>
								Supplier
							</a>

							<b class="arrow"></b>
						</li>

						<li class="">
							<a href="<?php echo base_url('main/index/pembelian'); ?>">
								<i class="menu-icon fa fa-caret-right"></i>
								Pembelian Barang
							</a>

							<b class="arrow"></b>
						</li>

						<li class="">
							<a href="<?php echo base_url('main/index/barang'); ?>">
								<i class="menu-icon fa fa-caret-right"></i>
								Stok Barang
							</a>

							<b class="arrow"></b>
						</li>							
					</ul>
				</li>

				<li class="">
					<a href="<?php echo base_url('main/index/penggajian'); ?>">
						<i class="menu-icon fa fa-money"></i>
						<span class="menu-text"> Penggajian </span>
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-desktop"></i>
						<span class="menu-text"> Antrian </span>

						<b class="arrow fa fa-angle-down"></b>
					</a>

					<b class="arrow"></b>

					<ul class="submenu">
						<li class="">
							<a href="<?php echo base_url('main/index/intro'); ?>">
								<i class="menu-icon fa fa-caret-right"></i>
								Manage Intro
							</a>

							<b class="arrow"></b>
						</li>

						<li class="">
							<a href="<?php echo base_url('main/index/ruang'); ?>">
								<i class="menu-icon fa fa-caret-right"></i>
								Manage Ruang
							</a>

							<b class="arrow"></b>
						</li>

						<li class="">
							<a href="<?php echo base_url('main/index/poli'); ?>">
								<i class="menu-icon fa fa-caret-right"></i>
								Manage Poli
							</a>

							<b class="arrow"></b>
						</li>

						<li class="">
							<a href="<?php echo base_url('main/index/service'); ?>">
								<i class="menu-icon fa fa-caret-right"></i>
								Pelayanan Antrian
							</a>

							<b class="arrow"></b>
						</li>
					</ul>
				</li>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-book"></i>
						<span class="menu-text"> Laporan </span>

						<b class="arrow fa fa-angle-down"></b>
					</a>

					<b class="arrow"></b>

					<ul class="submenu">
						<li class="">
							<a href="<?php echo base_url('main/index/laporan_pembelian') ?>">
								<i class="menu-icon fa fa-caret-right"></i>
								Laporan Stok Barang
							</a>

							<b class="arrow"></b>
						</li>

						<li class="">
							<a href="<?php echo base_url('main/index/laporan_penjualan') ?>">
								<i class="menu-icon fa fa-caret-right"></i>
								Laporan Transaksi
							</a>

							<b class="arrow"></b>
						</li>
					</ul>
				</li>

				<li class="">
					<a href="<?php echo base_url(); ?>">
						<i class="menu-icon fa fa-book"></i>
						<span class="menu-text"> Panduan </span>
					</a>

					<b class="arrow"></b>
				</li>
			</ul><!-- /.nav-list -->
<?php 
		}
	} elseif($this->session->userdata('level')=="Kasir") {
?>
		<ul class="nav nav-list">
			<li class="active open">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-shopping-cart"></i>
					<span class="menu-text"> POS </span>

					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>

				<ul class="submenu">
					<li class="">
						<a href="<?php echo base_url('main/index/penjualan'); ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Transaksi
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="<?php echo base_url('main/index/barang'); ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Stok Barang
						</a>

						<b class="arrow"></b>
					</li>						
				</ul>
			</li>
		</ul><!-- /.nav-list -->
<?php 
	}
	elseif($this->session->userdata('level')=="Administrasi"){
?>
		<ul class="nav nav-list">
			<li class="active open">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-shopping-cart"></i>
					<span class="menu-text"> POS </span>

					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>

				<ul class="submenu">
					<li class="">
						<a href="<?php echo base_url('main/index/penjualan'); ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Transaksi
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="<?php echo base_url('main/index/pembelian'); ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Pembelian Barang
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="<?php echo base_url('main/index/barcode'); ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Generate Barcode
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="<?php echo base_url('main/index/supplier'); ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Supplier
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="<?php echo base_url('main/index/barang'); ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Stok Barang
						</a>

						<b class="arrow"></b>
					</li>							
				</ul>
			</li>

			<li class="">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-book"></i>
					<span class="menu-text"> Laporan </span>

					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>

				<ul class="submenu">
					<li class="">
						<a href="<?php echo base_url('main/index/laporan_pembelian') ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Laporan Pembelian
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="<?php echo base_url('main/index/laporan_penjualan') ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Laporan Penjualan
						</a>

						<b class="arrow"></b>
					</li>
				</ul>
			</li>
		</ul><!-- /.nav-list -->
<?php 
	}
	elseif($this->session->userdata('level')=="Apoteker"){
?>
		<ul class="nav nav-list">
			<li class="active open">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-database"></i>
					<span class="menu-text">
						Kelola Klinik
					</span>

					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>

				<ul class="submenu">
					<li class="">
						<a href="<?php echo base_url('main/index/resep'); ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Resep
						</a>
					</li>
				</ul>
			</li>
		</ul><!-- /.nav-list -->
<?php 
	}
	elseif($this->session->userdata('level')=="Beautician"){
?>
		<ul class="nav nav-list">
			<li class="active open">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-database"></i>
					<span class="menu-text">
						Kelola Klinik
					</span>

					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>

				<ul class="submenu">
					<li class="">
						<a href="<?php echo base_url('main/index/treatment'); ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Treatment
						</a>
					</li>
				</ul>
			</li>
		</ul><!-- /.nav-list -->
<?php 
	}
	elseif($this->session->userdata('level')=="Dokter"){
?>
		
<?php 
	}
?>
