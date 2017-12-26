<?php 
	foreach ($cetak_pasien as $key) {
		$id_pasien = $key->id_pasien;
		$nama = $key->nama_pasien;
		$jk = $key->jk;
		$tgl_lhr = $key->tgl_lahir;
		$alamat = $key->alamat;
		$pekerjaan = $key->pekerjaan;
		$asal_daerah = $key->asal_daerah;
		$kebangsaan = $key->kebangsaan;
		$nama_keluarga = $key->nama_keluarga;
		$agama = $key->agama;
		$kontak = $key->kontak;
		$photo = $key->photo;
	}
?>	
<div class="row">
	<div class="col-lg-5">
		<div id="user-profile-2" class="user-profile">
			<div class="tabbable">
				<ul class="nav nav-tabs padding-18">
					<li class="active">
						<a data-toggle="tab" href="#home">
							<i class="green ace-icon fa fa-credit-card bigger-120"></i>
							ID CARD
						</a>
					</li>
				</ul>
				<div class="tab-content no-border padding-24">
					<div id="home" class="tab-pane in active bg-primary">
						<div class="row">
							<div class="col-xs-12 col-sm-4 center">
								<span class="profile-picture">
									<?php 
										if ($photo=="") {
									?>	
											<img width="120" height="120" class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src="<?php echo base_url('assets/images/avatars/user-3.png'); ?>" />
									<?php 
										}
										else{
									?>
											<img width="120" height="120" class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src="<?php echo base_url('uploads/').$id_pasien.'/'.$photo; ?>" />
									<?php 
										}
									?>
									
								</span>

								<span style="padding-left: 5px"><?php echo $nama; ?></span>
								<div class="space space-4"></div>
							</div><!-- /.col -->

							<div class="col-xs-12 col-sm-8">
								<h4 class="blue">
									<img class="img-responsive" src="<?php echo base_url('assets/images/photo/logo_white.png') ?>" alt="Logo">
								</h4>

								<div class="profile-user-info col-sm-6">
									<div class="profile-info-row">
										<div class="text-left"> ID MEMBER </div>
										<div class="profile-info-value">
											<span><b><?php echo $id_pasien; ?></b></span>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-value">
											<div id="barcodeTarget" class="barcodeTarget"></div>
										</div>
									</div>
								</div>
							</div><!-- /.col -->
						</div><!-- /.row -->

						<div class="space-20"></div>

					</div><!-- /#home -->
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-5">
		<div class="btn-group">
			<a onclick="javascript:printContent('home')" class="btn btn-info" href=""><i class="fa fa-print"></i></a>
			<a class="btn btn-warning" href="<?php echo base_url('main/index/pasien') ?>">Kembali</a>
		</div>
		<img width="160" height="40" src="http://localhost/get_barcode/html/image.php?filetype=PNG&dpi=72&scale=1&rotation=0&font_family=Arial.ttf&font_size=8&text=<?php echo $key->id_pasien ?>&thickness=30&checksum=&code=BCGcode39">
	</div>
</div>
<script src="<?php echo base_url('assets/js/prototype.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/prototype-barcode.js'); ?>" type="text/javascript"></script>
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
<script type="text/javascript">
    
      function generateBarcode(){
        $("barcodeTarget").update();
        var value = $("barcodeValue").value;
        var btypeGrp = document['forms']['form']['btype'];
        for(i=0; i < btypeGrp.length; i++){
          if (btypeGrp[i].checked == true) {
            var btype = btypeGrp[i].value;
          }
        }
        var rendererGrp = document['forms']['form']['renderer'];
        for(i=0; i < rendererGrp.length; i++){
          if (rendererGrp[i].checked == true) {
            var renderer = rendererGrp[i].value;
          }
        }
        
        var settings = {
          output:renderer,
          bgColor: $("bgColor").value,
          color: $("color").value,
          barWidth: $("barWidth").value,
          barHeight: $("barHeight").value,
          moduleSize: $("moduleSize").value,
          posX: $("posX").value,
          posY: $("posY").value,
          addQuietZone: false
        };
        if ($("rectangular").checked){
          value = {code:value, rect: true};
        }
        if (renderer == 'canvas'){
          clearCanvas();
          $("barcodeTarget").hide();
          $("canvasTarget").show().barcode(value, btype, settings);
        } else {
          $("canvasTarget").hide();
          $("barcodeTarget").update().show().barcode(value, btype, settings);
        }
      }
      
      function showConfig( event ){
        var element = Event.element(event);
        if (element.id ==  'datamatrix') {
            $('barcode1D').hide();
            $('barcode2D').show();
        } else {
            $('barcode1D').show();
            $('barcode2D').hide();
        }
      }
      
      function showConfigRenderer( event ){
        var element = Event.element(event);
        if (element.id ==  'canvas') {
            $('miscCanvas').show();
        } else {
            $('miscCanvas').hide();
        }
      }
      
      function clearCanvas(){
        var canvas = $('canvasTarget');
        var ctx = canvas.getContext('2d');
        ctx.lineWidth = 1;
        ctx.lineCap = 'butt';
        ctx.fillStyle = '#FFFFFF';
        ctx.strokeStyle  = '#000000';
        ctx.clearRect (0, 0, canvas.width, canvas.height);
        ctx.strokeRect (0, 0, canvas.width, canvas.height);
      }

