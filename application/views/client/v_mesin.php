<?php
	$i = 0;
	foreach ($poli as $key) {
	$i++;
?>
<div class="col-lg-6 table-responsive">
	<div class="panel panel-success">
		<div class="panel-heading">
			<div class="panel-title">Klinik Indieshu</div>
		</div>
		<div class="panel-body">
			<table class="table table-stripped">
				<tr>
					<th><?php echo $key->nomor ?></th><th><?php echo $key->nama_poli ?></th>
				</tr>
				<tr>
					<td colspan="2">
						<form method="POST" action="<?php echo base_url('home/ambil_antrian') ?>">
						<input type="hidden" id="id_poli<?php echo $i;  ?>" name="id_poli" value="<?php echo $key->id_poli ?>">
						<input type="hidden" id="nomor<?php echo $i;  ?>" name="nomor" value="<?php echo $key->nomor; ?>">
						<input type="hidden" id="nama_ruang<?php echo $i;  ?>" name="nama_ruang" value="<?php echo $key->nama_ruang ?>">
						<button onclick="saveAntrian('id_poli<?php echo $i;  ?>','nomor<?php echo $i;  ?>','nama_ruang<?php echo $i;  ?>')" type="button" id="btn_antrian" class="btn btn-primary btn-block"><i class="fa fa-print"></i></button>
					</form>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
	
<?php 
	}
?>