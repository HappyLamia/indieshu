<div class="col-lg-4">
	<div class="widget-box widget-color-blue">
		<div class="widget-header">
			<div class="widget-title">Upload Data Absensi</div>
		</div>
		<div class="widget-body">
			<div class="widget-main">
				<a class="btn btn-block btn-warning" href="<?php echo base_url('warehouse/sample/da.csv') ?>"><i class="fa fa-download"></i> Download Sample</a>
				<hr>
				<form enctype="multipart/form-data" method="POST" action="<?php echo base_url('penggajian/upload') ?>">
					<div class="form-group">
						<input type="file" name="userfile" class="form-control">
					</div>
					<div class="form-group">
						<button class="btn btn-block btn-primary"><i class="fa fa-upload"></i> Upload</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="col-lg-8">
	<div class="widget-box widget-color-orange">
		<div class="widget-header">
			<div class="widget-title">Table Gaji Karyawan</div>
		</div>
		<div class="widget-body">
			<div class="widget-main">
				<div class="table-responsive">
					<table class="table table-stripped">
						<thead>
							<tr>
								<th>NIP</th><th>Nama Karyawan</th><th>Hadir</th><th>Tidak Hadir</th><th>Honor</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($honor as $key) {
							?>
								<tr>
									<td><?php echo $key->nip; ?></td>
									<td><?php echo $key->nama_karyawan; ?></td>
									<td><?php echo $key->Hadir; ?></td>
									<td><?php echo $key->Tidak_Hadir; ?></td>
									<td><?php echo $key->honor; ?></td>
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

