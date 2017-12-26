<?php 
	if ($this->session->userdata('jenis')=="UMUM") {
?>
		<form method="POST" action="<?php echo base_url('rm/uploads') ?>" enctype="multipart/form-data">
			<table class="table table-bordered">
				<tr>
					<td><h4>Pemeriksaan Fisik</h4></td>
					<td><input class="form-control" type="file" name="userfile"></td>
					<td><input readonly class="form-control" type="hidden" name="file_name" value="Pemeriksaan Fisik">
						<button class="btn btn-primary btn-block"><i class="fa fa-upload"></i> Upload</button>
					</td>
				</tr>
			</table>
		</form>
		<form method="POST" action="<?php echo base_url('rm/uploads') ?>" enctype="multipart/form-data">
			<table class="table table-bordered">
				<tr>
					<td><h4>Pemeriksaan Penunjang</h4></td>
					<td><input class="form-control" type="file" name="userfile"></td>
					<td><input readonly class="form-control" type="hidden" name="file_name" value="Pemeriksaan Penunjang">
						<button class="btn btn-primary btn-block"><i class="fa fa-upload"></i> Upload</button>
					</td>
				</tr>
			</table>
		</form>
<?php 
	} 
	elseif($this->session->userdata('jenis')=="SKIN") 
	{
?>
		<form method="POST" action="<?php echo base_url('rm/uploads') ?>" enctype="multipart/form-data">
			<table class="table table-bordered">
				<tr>
					<td><h4>Foto Wajah</h4></td>
					<td><input required accept="image/*" class="form-control" type="file" name="userfile"></td>
					<td><input readonly class="form-control" type="hidden" name="file_name" value="Foto Wajah">
						<button class="btn btn-primary btn-block"><i class="fa fa-upload"></i> Upload</button>
					</td>
				</tr>
			</table>
		</form>
		<form method="POST" action="<?php echo base_url('rm/uploads') ?>" enctype="multipart/form-data">
			<table class="table table-bordered">
				<tr>
					<td><h4>Foto Before / After</h4></td>
					<td><input class="form-control" type="file" name="userfile"></td>
					<td>	
						<div class="input-group">
							<label class="btn btn-primary">
								<input type="radio" name="file_name" value="Before"> Before
							</label>
							<label class="btn btn-primary">
								<input type="radio" name="file_name" value="After"> After
							</label>
						</div>
						<button class="btn btn-primary btn-block"><i class="fa fa-upload"></i> Upload</button>
					</td>
				</tr>
			</table>
		</form>
<?php 
	}
?>