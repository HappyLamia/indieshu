<?php 
	foreach ($by_users as $key) {
?>
		<div class="col-lg-8 col-lg-offset-2">
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading"><i class="fa fa-user"></i> Ubah Password</div>
					<div class="panel-body">
						<form method="POST" action="<?php echo base_url('user/update/password')?>">
							<div class="form-group">
								<input required type="hidden" name="id" class="form-control" value="<?php echo $key->idadmin; ?>">
							</div>
							<div class="form-group">
								<label class="label label-primary">Password</label>
								<input required type="password" id="password" name="password" class="form-control">
							</div>
							<div class="form-group">
								<label class="label label-primary">Konfirmasi Password</label><label id="alert2" class="label label-warning"></label>
								<input required type="password" name="v_password" id="v_password" class="form-control">
							</div>
							<div class="form-group">
								<button id="btn-edit" class="btn btn-danger btn-block">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading"><i class="fa fa-user"></i> Atur Profil</div>
					<div class="panel-body">
						<form method="POST" action="<?php echo base_url('user/update/profil')?>">
							<div class="form-group">
								<input required type="hidden" name="id" class="form-control" value="<?php echo $key->idadmin; ?>">
							</div>
							<div class="form-group">
								<label class="label label-primary">Nama</label>
								<input required type="text" name="nama" class="form-control" value="<?php echo $key->admin_name; ?>">
							</div>
							<div class="form-group">
								<label class="label label-primary">Email</label>
								<input required type="email" name="email" class="form-control" value="<?php echo $key->admin_email; ?>">
							</div>
							<div class="form-group">
								<button id="btn-edit" class="btn btn-success btn-block">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
<?php 
	}
?>