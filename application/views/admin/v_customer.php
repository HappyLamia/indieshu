<div class="row">
	<div class="col-lg-4">
		<div class="panel panel-primary">
			<div class="panel-heading"><i class="fa fa-building-o"></i> Form Customer </div>
			<div class="panel-body">
				<form method="POST" role="form">
					<div class="form-group">
						<label class="text-primary"> Kode Customer</label>
						<input type="text" name="kode_supplier" class="form-control" />
					</div>

					<div class="form-group">
						<label class="text-primary"> Nama Customer </label>
						<input type="text" name="nama_supplier" class="form-control" />
					</div>

					<div class="form-group">
						<label class="text-primary">  Alamat </label>
						<textarea class="form-control" name="alamat" ></textarea>
					</div>

					<div class="form-group">
						<label class="text-primary"> Asal Daerah </label>
						<input type="text" name="nama_supplier" class="form-control" />
					</div>

					<div class="form-group">
						<button class="btn btn-block btn-success"><i class="fa fa-plus"></i> Tambah Customer</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-lg-8">
		<div class="table-responsive">
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="fa fa-building-o"></i> Data Customer </div>
				<div class="panel-body">
					<table id="myTable" class="table table-bordered">
						<thead>
							<tr>
								<th>Kode Customer</th><th>Nama Customer</th><th>Asal Daerah</th><th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
	</div>
</div>