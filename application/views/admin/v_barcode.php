<div class="col-lg-4">
	<div class="widget-box widget-color-blue">
		<div class="widget-header">
			<div class="widget-title">
				Form Barcode
			</div>
		</div>
		<div class="widget-body">
			<div class="widget-main">
				<form method="POST" action="<?php echo base_url('barcode/add_barcode') ?>">
					<div class="form-group">
						<label class="label label-info">Nilai Barcode</label>
						<input type="text" name="bar" class="form-control">
					</div>
					<div class="form-group">
						<label class="label label-info">Nama Barang</label>
						<input type="text" name="nama_barang" class="form-control">
					</div>
					<div class="form-group">
						<button class="btn btn-primary btn-block">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="col-lg-8">
	<div class="widget-box widget-color-blue">
		<div class="widget-header">
			<div class="widget-title">
				Data Barcode
			</div>
		</div>
		<div class="widget-body">
			<div class="widget-main">
				<div class="table-responsive">
					<table id="dt_barcode" class="table table-bordered">
						<thead>
							<tr>
								<th>Nama Barang</th><th>Nomor Barcode</th><th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($barcode as $key) {
							?>
									<tr>
										<td><?php echo $key->nama_barang ?></td>
										<td><?php echo $key->nilai; ?></td>
										<td><a class="btn btn-info" href="http://localhost/get_barcode/html/BCGcode39.php?id=<?php echo $key->nilai ?>">Generate</a> | <a class="btn btn-danger" onclick="return confirm('Apa Anda Akan Menghapus Data Ini ?')" href="<?php echo base_url('barcode/delete_barcode/').$key->nilai ?>"><i class="fa fa-trash"></i></a></td>
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