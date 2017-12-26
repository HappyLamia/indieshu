<div class="col-xs-6">
	<div class="widget-box widget-color-blue">
	<div class="widget-header">
		<div class="widget-title">Daftar Antrian</div>
	</div>
	<div class="widget-main">
		<div class="widget-body">
			<div class="row">
				<div class="col-sm-12">
					<p><?php echo $msg; ?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">		
					<h5><i><b>Sisa Antrian</b> : <div id="sisa"></div></i></h5>
				</div>
				<div class="col-sm-6">
					<div id="serve"></div>
				</div>
			</div> 
			<div class="row" style="padding-top: 20px">
				<div class="col-sm-12">
					<div id="ambil_antrian"></div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="col-xs-6">
	<div class="widget-box widget-color-blue">
		<div class="widget-header">
			<div class="widget-title">Melayani Antrian</div>
		</div>
		<div class="widget-main text-center">
			<div class="widget-body">
				<div id="served_queue"></div>
			</div>
		</div>
	</div>
</div>