<div class="col-lg-4">
	<div class="panel panel-default">
		<div class="panel-heading"><i class="fa fa-user"></i> Form User</div>
		<div class="panel-body">
			<form method="POST" action="<?php echo base_url('user/add') ?>">
				<div class="form-group">
					<label class="label label-primary">Username</label>
					<input required type="text" name="username" class="form-control">
				</div>
				<div class="form-group">
					<label class="label label-primary">Password</label>
					<input required type="password" id="password" name="password" class="form-control">
				</div>
				<div class="form-group">
					<label class="label label-primary">Konfirmasi Password</label><label id="alert1" class="label label-warning"></label>
					<input required type="password" name="v_password" id="v_password" class="form-control">
				</div>
				<div class="form-group">
					<label class="label label-primary">Nama</label>
					<input required type="text" name="nama" class="form-control">
				</div>
				<div class="form-group">
					<label class="label label-primary">Email</label>
					<input required type="email" name="email" class="form-control">
				</div>
				<div class="form-group">
					<label class="label label-primary">Kontak</label>
					<input required type="number" name="kontak" class="form-control">
				</div>
				<div class="form-group">
					<label class="label label-primary">Level</label>

					<select name="level" required class="form-control">
						<option value="">- Pilih Level -</option>
						<?php 
							foreach ($occup as $key) {
						?>
								<option value="<?php echo $key->nama_jabatan ?>"><?php echo $key->nama_jabatan ?></option>
						<?php 
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<button id="btn_tambah" class="btn btn-block">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="col-lg-8">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading"><i class="fa fa-users"></i> Data Admin</div>
				<div class="panel-body table-responsive">
					<?php echo $this->session->flashdata('user_alert'); ?>
					<hr>
					<table id="dt_users" class="table table-bordered">
						<thead>
							<tr>
								<th>Username</th><th>Nama</th><th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($users as $key) {
							?>
									<tr>
										<td><?php echo $key->username; ?></td>
										<td><?php echo $key->name; ?></td>
										<td>	
											<a data-toggle="modal" href="#<?php echo $key->id_user ?>"><span class="fa fa-edit"></span> Edit</a>| <a data-toggle="modal" href="#password<?php echo $key->id_user ?>" href=""><i class="fa fa-lock"></i> Ubah Password</a> | 
											<?php 
												if ($key->level!='Administrator') {
											?>
													<a onclick="return confirm('Apa Anda Ingin Menghapus Akun Ini ?')" href="<?php echo base_url('user/delete/').$key->id_user; ?>"><span class="fa fa-trash"></span> Hapus</a>
											<?php 
												} 
												else{
													echo "";
												}
											?>
											
										</td>
									</tr>
<div class="modal fade" id="<?php echo $key->id_user ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Edit User</h4>
            </div>
            <div class="modal-body">
            	<form method="POST" action="<?php echo base_url('user/edit/profil') ?>">
            		<div class="form-group">
						<input required type="hidden" name="id_user" class="form-control" value="<?php echo $key->id_user ?>">
					</div>
					<div class="form-group">
						<label class="label label-primary">Nama</label>
						<input required type="text" name="nama" class="form-control" value="<?php echo $key->name ?>">
					</div>
					<div class="form-group">
						<label class="label label-primary">Email</label>
						<input required type="email" name="email" class="form-control" value="<?php echo $key->email ?>">
					</div>
					<div class="form-group">
						<label class="label label-primary">Kontak</label>
						<input required type="text" name="kontak" class="form-control" value="<?php echo $key->kontak ?>">
					</div>
					<div class="form-group">
						<button class="btn btn-primary btn-block">Ubah</button>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="password<?php echo $key->id_user ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
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
						<input required type="password" name="v_password" class="form-control">
					</div>
					<div class="form-group">
						<button class="btn btn-warning btn-block">Ubah Password</button>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
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