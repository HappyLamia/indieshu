<?php 
	foreach ($bio as $key) {
		$id_user = $key->id_user;
        $nama = $key->name;
        $email = $key->email;
        $kontak = $key->kontak;
    }
    foreach ($about as $key) {
    	$pt_name = $key->nama_perusahaan;
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Admin Panel</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/4.5.0/css/font-awesome.min.css') ?>" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/dropzone.min.css') ?>" />
		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/fonts.googleapis.com.css') ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/dataTables/dataTables.bootstrap.css') ?>">

		<link rel="stylesheet" href="<?php echo base_url('assets/css/chosen.min.css') ?>" />
		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/ace.min.css') ?>" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo base_url('assets/css/ace-part2.min.css') ?>" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/ace-skins.min.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/ace-rtl.min.css') ?>" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo base_url('assets/css/ace-ie.min.css') ?>" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?php echo base_url('assets/js/ace-extra.min.js') ?>"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?php echo base_url('assets/js/html5shiv.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/respond.min.js') ?>"></script>
		<![endif]-->
	</head>
	<div class="modal fade" id="modal_profil" role="dialog">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header bg-primary">
	                <button type="button" class="close" data-dismiss="modal">&times;</button>
	                <h4>Edit Profil</h4>
	            </div>
	            <div class="modal-body">
	            	<form method="POST" action="<?php echo base_url('user/edit/profil') ?>">
	            		<div class="form-group">
							<input required type="hidden" name="id_user" class="form-control" value="<?php echo $id_user ?>">
						</div>
						<div class="form-group">
							<label class="label label-primary">Nama</label>
							<input required type="text" name="nama" class="form-control" value="<?php echo $nama ?>">
						</div>
						<div class="form-group">
							<label class="label label-primary">Email</label>
							<input required type="email" name="email" class="form-control" value="<?php echo $email ?>">
						</div>
						<div class="form-group">
							<label class="label label-primary">Kontak</label>
							<input required type="text" name="kontak" class="form-control" value="<?php echo $kontak ?>">
						</div>
						<div class="form-group">
							<button class="btn btn-primary btn-block">Ubah</button>
						</div>
					</form>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="modal fade" id="modal_password" role="dialog">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header bg-primary">
	                <button type="button" class="close" data-dismiss="modal">&times;</button>
	                <h4>Edit Password</h4>
	            </div>
	            <div class="modal-body">
					<form method="POST" action="<?php echo base_url('user/edit/password') ?>">
	            		<div class="form-group">
							<input required type="hidden" name="id_user" class="form-control" value="<?php echo $key->id_user ?>">
						</div>
						<div class="form-group">
							<label class="label label-primary">Password</label>
							<input required type="password" name="password" class="form-control">
						</div>
						<div class="form-group">
							<label class="label label-primary">Konfirmasi Password</label>
							<input required type="password" name="konfirmasi" class="form-control">
						</div>
						<div class="form-group">
							<button class="btn btn-warning btn-block">Ubah Password</button>
						</div>
					</form>
	            </div>
	        </div>
	    </div>
	</div>
	<body class="skin-1">
		<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Admin Panel <?php echo $pt_name; ?>
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class=" dropdown-modal">
							<a target="_blank" href="<?php echo base_url('home/') ?>">
								<i class="ace-icon fa fa-desktop"></i>
								<span class="badge badge-grey">Antrian</span>
							</a>
						</li>

						<li class=" dropdown-modal">
							<a target="_blank" href="http://localhost/indieshu_portal">
								<i class="ace-icon fa fa-globe"></i>
								<span class="badge badge-grey">Lihat Indieshu</span>
							</a>
						</li>

						<li class="red dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-birthday-cake"></i>
								<span class="badge badge-grey"><?php echo $count_birthday; ?></span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-check"></i>
									Anggota Yang Berulang Tahun
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<label class="label label-sm label-purple arrowed-right">Ulang Tahun Hari Ini</label>
										</li>
										<?php 
											foreach ($bd_now as $key) {
										?>
												<li>
													<a href="#">
														<div class="clearfix">
															<span class="pull-left"><?php echo $key->nama_member ?></span>
															<span class="pull-right"><?php echo $key->id_member ?></span>
														</div>

														<div class="">
															<?php echo $key->coupon ?>
														</div>
													</a>
												</li>
										<?php 
											}
										?>
										<li>
											<label class="label label-sm label-warning arrowed-right">Ulang Tahun Besok</label>
										</li>
										<?php 
											foreach ($bd_tmr as $key) {
										?>
												<li>
													<a href="#">
														<div class="clearfix">
															<span class="pull-left"><?php echo $key->nama_pasien ?></span>
															<span class="pull-right"><?php echo $key->id_pasien ?></span>
														</div>

														<div class="">
															<?php echo $key->coupon ?>
														</div>
													</a>
												</li>
										<?php 
											}
										?>
										<li>
											<label class="label label-sm label-danger arrowed-right">Ulang Tahun Kemarin</label>
										</li>
										<?php 
											foreach ($bd_ytd as $key) {
										?>
												<li>
													<a href="#">
														<div class="clearfix">
															<span class="pull-left"><?php echo $key->nama_pasien ?></span>
															<span class="pull-right"><?php echo $key->id_pasien ?></span>
														</div>

														<div class="">
															<?php echo $key->coupon ?>
														</div>
													</a>
												</li>
										<?php 
											}
										?>
									</ul>
								</li>
							</ul>
						</li>
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo base_url('assets/images/avatars/user.jpg') ?>" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $nama; ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a data-toggle="modal" data-target="#modal_profil" href="">
										<i class="ace-icon fa fa-user"></i>
										Atur Profile
									</a>
								</li>
								<li>
									<a data-toggle="modal" data-target="#modal_password" href="">
										<i class="ace-icon fa fa-lock"></i>
										Atur Password
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a onclick="return confirm('Anda Akan Meninggalkan Sistem , Lanjutkan ?')" href="<?php echo base_url('main/logout') ?>">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<a data-toggle="tooltip" title="Atur Harga" href="<?php echo base_url('main/index/harga'); ?>" class="btn btn-info">
							<i class="ace-icon fa fa-usd"></i>
						</a>

						<a data-toggle="tooltip" title="Kelola User" href="<?php echo base_url('main/index/users'); ?>" class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</a>

						<a data-toggle="tooltip" title="Pengaturan Dasar" href="<?php echo base_url('main/index/setting'); ?>" class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</a>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<?php $this->load->view('admin/v_menus') ?>

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?php echo base_url() ?>">Home</a>
							</li>

							<li>
								<a href="#"><?php echo $section; ?></a>
							</li>
							<li class="active"><?php echo $sub_section; ?></li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
									<?php 
										$this->load->view($page);
									?>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Ace</span>
							Application &copy; 2013-2014
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js') ?>"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js') ?>"></script>
<![endif]-->
		<script type="text/javascript" src="<?php echo base_url('assets/js/dataTables/jquery.dataTables.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/dataTables/dataTables.bootstrap.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/dropzone.min.js'); ?>"></script>
		<script src='https://code.responsivevoice.org/responsivevoice.js'></script>
		<script type="text/javascript">
			$(document).ready(function(){
		    	$('#dt_pasien').DataTable();
		    	$('#dt_supplier').DataTable();
		    	$('#dt_penyakit').DataTable();
		    	$('#dt_barang').DataTable();
		    	$('#dt_customer').DataTable();
		    	$('#dt_penjualan').DataTable();
		    	$('#dt_pembelian').DataTable();
		    	$('#dtl_pembelian').DataTable();
		    	$('#dt_satuan').DataTable();
		    	$('#dt_log').DataTable();
		    	$('#dt_users').DataTable();
		    	$('#dt_rm_umum').DataTable();
		    	$('#dt_rm_skin').DataTable();
		    	$('#dt_rm_slim').DataTable();
		    	$('#dt_cari_barang').DataTable();
		    	$('#dt_barcode').DataTable();
		    	$('div.dataTables_filter input').focus();
			});
		</script>
		<script type="text/javascript">
			base_url = "<?php echo base_url() ?>";
			function showQueue(){
		        $.ajax({
		            url: base_url+"poli/antrian",
		            cache: true,
		            success: function(msg){
		                $("#ambil_antrian").html(msg);
		            }
		        });
		        var waktu = setTimeout("showQueue()",2000);
		    }
		    function showSisa(){
		        $.ajax({
		            url: base_url+"poli/sisa_antrian",
		            cache: true,
		            success: function(msg){
		                $("#sisa").html(msg);
		            }
		        });
		        var waktu = setTimeout("showSisa()",2000);
		    }
		    function layani(){
		        $.ajax({
		            url: base_url+"poli/serve_queue",
		            cache: true,
		            success: function(msg){
		                $("#serve").html(msg);
		            }
		        });
		        var waktu = setTimeout("layani()",2000);
		    }
		    function servedQueue(){
		        $.ajax({
		            url: base_url+"poli/served_queue",
		            cache: true,
		            success: function(msg){
		                $("#served_queue").html(msg);
		            }
		        });
		        var waktu = setTimeout("served_queue()",2000);
		    }
		    function showStok(value=''){
		    	$.ajax({
		            url: base_url+"barang/dt_barang/"+value,
		            cache: true,
		            success: function(msg){
		            	var obj = JSON.parse(msg);
		                $("#stok_barang").text(obj.stok);
		                $("#temp").text(obj.stok);
		    			var x = $("#stok_barang").text();
                		if (x <= 0) {
                			document.getElementById("add_to_cart").disabled = true;
                		}
                		else{
                			document.getElementById("add_to_cart").disabled = false;
                		}
		            }
		        });
		    }
		    function dtBarang(value) {
		    	$.ajax({
		            url: base_url+"barang/dt_barang/"+value,
		            cache: true,
		            success: function(msg){
		            	var obj = JSON.parse(msg);
		            	$("#nama_barang").val(obj.name);
		            	$("#harga_beli").val(obj.harga_beli);
		            	$("#harga_retail").val(obj.harga_retail);
		            }
		        });
		    }
		    function setDtBarang() {
		    	var x = $('#id_barang').val();
		    	dtBarang(x);
		    }
		    function hitungStok(value){
		    	return value;
		    }
		    function minus_stock() {
		    	var list = $('#temp').text();
				var nilai = hitungStok(list);
			    var min = $('#test3').val();
			    nilai = nilai - min
				if (nilai <= 0) {
					nilai = 0
                	document.getElementById("add_to_cart").disabled = true;
                	alert('stok tidak mencukupi')
                }
                else{
                	document.getElementById("add_to_cart").disabled = false;
                }
                $('#stok_barang').text(nilai);
		    }
		    function hargaBeli() {
		    	var hb = $('#harga_beli').val();
		    	var mqty = $('#mqty').val();
		    	var lqty = $('#lqty').val();
		    	var total = hb / mqty / lqty;
		    	var ht = total + (total * 0.1);
		    	$('#harga_retail').val(ht);
		    }
		    function hitungppn() {
		    	var hb = $('#harga_beli').val();
		    	var ppn = $('#ppn').val();
		    	var total = hb * ppn / 100;
		    	$('#jumlah_ppn').val(total);
		    }
		    function getResep(){
		        $.ajax({
		            url: base_url+"penyakit/get_resep",
		            cache: true,
		            success: function(msg){
		            	var obj = JSON.parse(msg);
		            	$("#id_penyakit").text(obj.id_penyakit);
		            	$("#nama_penyakit").text(obj.nama_penyakit);
		            	$("#resep").html(obj.resep);
		            }
		        });
		        var waktu = setTimeout("getResep()",2000);
		    }
		    $(document).ready(function(){
		    	getResep();
		        showQueue();
		        showSisa();
		        layani();
		        servedQueue();
		    });
		</script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="<?php echo base_url('assets/js/ace-elements.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/ace.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/chosen.jquery.min.js') ?>"></script>
		<script type="text/javascript">
			jQuery(function($) {
				$('#id-disable-check').on('click', function() {
					var inp = $('#form-input-readonly').get(0);
					if(inp.hasAttribute('disabled')) {
						inp.setAttribute('readonly' , 'true');
						inp.removeAttribute('disabled');
						inp.value="This text field is readonly!";
					}
					else {
						inp.setAttribute('disabled' , 'disabled');
						inp.removeAttribute('readonly');
						inp.value="This text field is disabled!";
					}
				});
			
			
				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}
			
				
			});
		</script>
		<!-- inline scripts related to this page -->
</body>
</html>
