<?php 
	if (!isset($serve->id_queue)) {
		echo "<h4><i><b>Tidak Ada Antrian</b></i></h4>";
	} 
	else 
	{
?>
		<p>Antrian : <?php echo $serve->no_queue ?> </p>
		<input id="area_text" type="hidden" value="Antrian. Nomor. <?php echo $serve->no_queue ?>">
		<hr>
		<form method="POST" action="<?php echo base_url('poli/layani') ?>">
			<input type='hidden' name='id_queue' value='<?php echo $serve->id_queue;?>'>
			<input type='hidden' name='status' value='Dilayani'>
			<button onclick='get_voice()' class='btn btn-block btn-primary'><i class='fa fa-bullhorn'></i> Panggil</button>
		</form>
		<script type="text/javascript">
			var voice = $('#area_text').val();
			function get_voice() {
				//alert(voice);
				responsiveVoice.speak(voice,"Indonesian Female",{rate: 0.7});
			}
		</script>
<?php 
	}
?>
