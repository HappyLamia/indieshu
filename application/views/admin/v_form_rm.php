<script src="<?php echo base_url('assets/ckeditor_custom/ckeditor.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/ckeditor_custom/config.js'); ?>" type="text/javascript"></script>
<div class="tabbable">
	<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
		<li class="active">
			<a data-toggle="tab" href="#umum">Pasien Umum</a>
		</li>

		<li>
			<a data-toggle="tab" href="#slimming">Pasien Slimming</a>
		</li>

		<li>
			<a data-toggle="tab" href="#kulit">Pasien Kulit</a>
		</li>
	</ul>

	<div class="tab-content col-lg-10 bg-success">
		<div id="umum" class="tab-pane in active">
			<form method="POST" enctype="multipart/form-data" action="<?php echo base_url('rm/add_rm_umum') ?>">
				<table class="table table-stripped">
					<tr>
						<th scope="row">Nomor Rekam Medis</th>
						<td colspan="3">
							<input class="form-control" readonly type="text" name="id_rm" value="<?php echo $rm_umum ?>" />
						</td>
					</tr>
					<tr>
						<th scope="row">Tanda Vital</th>
						<td colspan="3">
							<input type="text" name="tensi" id="tensi" placeholder="Tensi Darah" />
						</td>
					</tr>
					<tr>
						<th scope="row">&nbsp;</th>
						<td colspan="3"><input type="text" name="suhu" id="suhu" placeholder="Suhu" /></td>
					</tr>
		  			<tr>
					    <th scope="row">&nbsp;</th>
					    <td colspan="3"><input type="text" name="nadi" id="nadi" placeholder="Nadi" /></td>
	  				</tr>
					<tr>
						<th scope="row">Riwayat Penyakit Sebelumnya</th>
						<td colspan="3">
							<textarea name="riwayat" id="riwayat" cols="45" rows="5"></textarea>
						</td>
					</tr>
					<tr>
						<th scope="row">Anamnesa</th>
						<td colspan="3">
							<textarea name="anamnesa" id="anamnesa" cols="45" rows="5"></textarea>
						</td>
					</tr>
					<tr>
						<th scope="row">Pemeriksaan Fisik</th>
						<td>Tinggi Badan</td>
						<td colspan="2">
							<input type="text" name="tb" id="tb" />
						</td>
					</tr>
					<tr>
						<th scope="row">&nbsp;</th>
						<td>Berat Badang</td>
						<td colspan="2">
							<input type="text" name="bb" id="bb" />
						</td>
					</tr>
					<tr>
						<th scope="row">Diagnosis</th>
						<td colspan="3">
							<textarea name="diagnosis" id="diagnosis" cols="45" rows="5"></textarea>
						</td>
					</tr>
					<tr>
						<th scope="row">Terapi</th>
						<td colspan="3">
							<textarea name="terapi" id="terapi" cols="45" rows="5"></textarea>
						</td>
					</tr>
					<tr>
					    <th colspan="4" scope="row"><button class="btn btn-primary btn-block"><i class="fa fa-save"></i> Simpan</button></th>
				  </tr>
				</table>
			</form>
		</div>

		<div id="slimming" class="tab-pane">
			<form method="POST" action="<?php echo base_url('rm/add_rm_slim') ?>">
				<table class="table table-stripped">
				  <tr>
						<th scope="row">Nomor Rekam Medis</th>
						<td colspan="4">
							<input class="form-control" readonly type="text" name="id_rm" value="<?php echo $rm_slim ?>" />
						</td>
					</tr>
				  <tr>
				    <th width="150" scope="row">Tanda Vital</th>
				    <td colspan="4"><input type="text" name="suhu" placeholder="Suhu Tubuh" /></td>
				  </tr>
				  <tr>
				    <th scope="row">&nbsp;</th>
				    <td colspan="4"><input type="text" name="tensi" placeholder="Tensi Darah" /></td>
				  </tr>
				  <tr>
				    <th scope="row">&nbsp;</th>
				    <td colspan="4"><input type="text" name="nadi" placeholder="Nadi" /></td>
				  </tr>
				  <tr>
				    <th scope="row">Riwayat Penyakit Sebelumnya</th>
				    <td width="4">Riwayat</td>
				    <td colspan="3"><textarea name="riwayat" id="riwayat2"></textarea></td>
				  </tr>
				  <tr>
				    <th scope="row">&nbsp;</th>
				    <td>Alergi</td>
				    <td colspan="3"><textarea name="alergi" id="alergi"></textarea></td>
				  </tr>
				  <tr>
				    <th scope="row">Pemeriksaan Fisik</th>
				    <td colspan="2"><input type="text" name="tb" placeholder="Tinggi Badan" /></td>
				    <td colspan="2"><input type="text" name="bb" placeholder="Berat Badan" /></td>
				  </tr>
				  <tr>
				    <th scope="row">&nbsp;</th>
				    <td colspan="4"><input type="text" name="pekerjaan" placeholder="Pekerjaan" /></td>
				  </tr>
				  <tr>
				    <th scope="row">&nbsp;</th>
				    <td>Untuk Wanita</td>
				    <td width="4"><input type="text" name="kb" placeholder="Ikut KB ? ya/tidak" /></td>
				    <td width="4"><input type="text" name="jenis_kb" placeholder="Jenis KB" /></td>
				    <td width="132"><input type="text" name="lama" placeholder="Sudah Berapa Lama" /></td>
				  </tr>
				  <tr>
				    <th scope="row">&nbsp;</th>
				    <td>Lingkar Perut</td>
				    <td colspan="3"><input type="text" name="lingkar_perut"/></td>
				  </tr>
				  <tr>
				    <th scope="row">&nbsp;</th>
				    <td>Dibawah Garis Rusuk ( garis bra )</td>
				    <td colspan="3"><input type="text" name="garis_rusuk" /></td>
				  </tr>
				  <tr>
				    <th scope="row">&nbsp;</th>
				    <td>Sejajar Pusar</td>
				    <td colspan="3"><input type="text" name="sejajar" /></td>
				  </tr>
				  <tr>
				    <th scope="row">&nbsp;</th>
				    <td>Sejajar Tulang Pinggul</td>
				    <td colspan="3"><input type="text" name="tulang_pinggul"/></td>
				  </tr>
				  <tr>
				    <th scope="row">&nbsp;</th>
				    <td>Lingkar Lengan Atas ( 1/ 3 lengan atas )</td>
				    <td colspan="3"><input type="text" name="lingkar_lengan"/></td>
				  </tr>
				  <tr>
				    <th scope="row">&nbsp;</th>
				    <td>Lingkar Paha</td>
				    <td colspan="3"><input type="text" name="lingkar_paha" /></td>
				  </tr>
				  <tr>
				    <th scope="row">Obat-obatan yang rutin diminum</th>
				    <td>(obat dokter/suplemen/herbal)</td>
				    <td colspan="3"><textarea name="obat_rutin" id="obat_rutin"></textarea></td>
				  </tr>
				  <tr>
				    <th scope="row">Konsumsi Obat Diet Sebelumnya</th>
				    <td colspan="4"><textarea name="obat_diet" id="obat_diet"></textarea></td>
				  </tr>
				  <tr>
				    <th scope="row">Pola Makan Sehari-hari</th>
				    <td colspan="4"><textarea name="pola_makan" id="pola"></textarea></td>
				  </tr>
				    <tr>
				    <th scope="row">Pola BAB</th>
				    <td>Frekuensi</td>
				    <td colspan="3"><input type="text" name="frekuensi" /></td>
				  </tr>
				    <tr>
				    <th scope="row">&nbsp;</th>
				    <td>Sulit BAB (ya/tidak)</td>
				    <td colspan="3"><input type="text" name="sulit_bab" /></td>
				  </tr>
				    <tr>
				    <th scope="row">&nbsp;</th>
				    <td>Pakai Pencahar (ya/tidak)</td>
				    <td colspan="3"><input type="text" name="pencahar" /></td>
				  </tr>
				    <tr>
				    <th scope="row">Karada Scan</th>
				    <td colspan="4"><textarea name="karada_scan" id="karada"></textarea></td>
				  </tr>
				    <tr>
				    <th scope="row">Pemeriksaan Penunjang</th>
				    <td colspan="4"><textarea name="pemeriksaan" id="pp"></textarea></td>
				  </tr>
				    <tr>
				    <th scope="row">Terapi</th>
				    <td colspan="4"><textarea name="terapi" id="terapi3"></textarea></td>
				  </tr>
				  </tr>
				    <tr>
				    <th colspan="5" scope="row"><button class="btn btn-primary btn-block"><i class="fa fa-save"></i> Simpan</button></th>
				  </tr>
				</table>
			</form>
		</div>

		<div id="kulit" class="tab-pane">
			<form method="POST" action="<?php echo base_url('rm/add_rm_skin') ?>">
				<table class="table table-stripped">
				<tr>
					<th scope="row">Nomor Rekam Medis</th>
					<td colspan="3">
						<input class="form-control" readonly type="text" name="id_rm" value="<?php echo $rm_skin ?>" />
					</td>
				</tr>
				  <tr>
				    <th scope="row">Anamnesa</th>
				    <td colspan="2"><input type="text"  name="kontrasepsi" placeholder="Kontasepsi"/></td>
				  </tr>
				  <tr>
				    <th scope="row">&nbsp;</th>
				    <td colspan="2"><input type="text"  name="hormanal" placeholder="Gangguan Hormanal"/></td>
				  </tr>
				  <tr>
				    <th scope="row">&nbsp;</th>
				    <td colspan="2"><input type="text"  name="pekerjaan" placeholder="Pekerjaan"/></td>
				  </tr>
				  <tr>
				    <th scope="row">Riwayat Penyakit</th>
				    <td colspan="2"><textarea id="rp" name="riwayat"></textarea></td>
				  </tr>
				  <tr>
				    <th scope="row">Produk Perwawatan Yang Sering Dipakai</th>
				    <td colspan="2"><textarea id="produk_perawatan" name="produk_perawatan"></textarea></td>
				  </tr>
				  <tr>
				    <th scope="row">Keluhan</th>
				    <td colspan="2"><textarea id="keluhan" name="keluhan"></textarea></td>
				  </tr>
				  <tr>
				    <th scope="row">Terapi</th>
				    <td colspan="2"><textarea id="terapi2" name="terapi"></textarea></td>
				  </tr>
				  <tr>
				    <th colspan="3" scope="row"><button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button></th>
				  </tr>
				</table>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	CKEDITOR.replace('riwayat')
	CKEDITOR.replace('anamnesa')
	CKEDITOR.replace('diagnosis')
	CKEDITOR.replace('terapi')
	CKEDITOR.replace('rp')
	CKEDITOR.replace('produk_perawatan')
	CKEDITOR.replace('keluhan')
	CKEDITOR.replace('terapi2')

	CKEDITOR.replace('riwayat2')
	CKEDITOR.replace('obat_rutin')
	CKEDITOR.replace('pola')
	CKEDITOR.replace('terapi3')
	CKEDITOR.replace('karada')
	CKEDITOR.replace('pp')
	CKEDITOR.replace('obat_diet')
	CKEDITOR.replace('alergi')
</script>