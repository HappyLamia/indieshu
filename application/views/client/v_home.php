<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Antrian</title>

	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-theme.min.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/4.5.0/css/font-awesome.min.css') ?>" />

	<!-- page specific plugin styles -->

	<!-- text fonts -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/fonts.googleapis.com.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/dataTables/dataTables.bootstrap.css') ?>">
	<!-- ace styles -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/ace.min.css') ?>" class="ace-main-stylesheet" id="main-ace-style" />

	<!--[if lte IE 9]>
		<link rel="stylesheet" href="<?php echo base_url('assets/css/ace-part2.min.css') ?>" class="ace-main-stylesheet" />
	<![endif]-->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/ace-skins.min.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/ace-rtl.min.css') ?>" />

	<!--[if lte IE 9]>
	  <link rel="stylesheet" href="<?php echo base_url('assets/css/ace-ie.min.css') ?>" />
	<![endif]-->

	<!-- inline styles related to this page -->

	<!-- ace settings handler -->
	<script src="<?php echo base_url('assets/js/ace-extra.min.js') ?>"></script>
	<!-- Custom Theme files -->
	<link href="<?php echo base_url('assets/user/css/style.css') ?>" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->
	<link href='//fonts.googleapis.com/css?family=Playfair+Display:400,700' rel='stylesheet' type='text/css'>
	<!-- Custom Theme files -->
	<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

<!--Google Fonts-->
	<!--[if lte IE 8]>
	<script src="<?php echo base_url('assets/js/html5shiv.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/respond.min.js') ?>"></script>
	<![endif]-->
</head>
<body>
<script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js') ?>"></script>
<div class="row">
	<div class="col-lg-8">
        <div class="embed-responsive embed-responsive-16by9">
           	<video class="embed-responsive-item" controls="controls" autoplay="" loop="">
                <source src="<?php echo base_url('warehouse/Intro/INTRO.mp4') ?>" type="video/mp4" >
                Your Browser Doesn't Support video tag
            </video>
        </div>
	</div>
	<div class="col-lg-4">
		<div id="mesin"></div>
	</div>
</div>
<div class="row fade">
	<div id="print_antrian" class="col-lg-12">
		<div class="widget-box">
			<div class="widget-header">
				<div class="widget-title"><strong><i class="fa fa-comment"></i></strong> Klinik Indieshu</div>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<div style="text-align: center;">
						<div id="get_antrian"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	base_url = "<?php echo base_url() ?>";
	function printContent(el)
    {
		var restorepage = document.body.innerHTML;
		var printcontent = document.getElementById(el).innerHTML;
		document.body.innerHTML = printcontent;
		window.print();
		document.body.innerHTML = restorepage;
		$('#print_antrian').hide();
	}
	function showQueue(){
        $.ajax({
            url: base_url+"poli/current_queue",
            cache: true,
            success: function(msg){
                $("#get_antrian").html(msg);
            }
        });
    }
    function showQueue2(){
    	$.ajax({
            url: base_url+"poli/current_queue",
            cache: true,
            success: function(msg){
                $("#get_antrian").html(msg);
                printContent('print_antrian');
            }
        });
    }
    function getQueue(value) {
    	$.ajax({
    		type: "POST",
            url: base_url+"home/ambil_antrian",
            data: value,
            cache: false,
            success: function(msg){
            	getMesin();
               	showQueue2();
            }
        });
    }
    function getMesin() {
    	$.ajax({
            url: base_url+"home/get_mesin",
            cache: true,
            success: function(msg){
                $("#mesin").html(msg);
            }
        });
    }
    function saveAntrian(value1,value2,value3) {
    	var id_poli = document.getElementById(value1).value;
		var nomor = document.getElementById(value2).value
		var nama_ruang = document.getElementById(value3).value
		var dataString = 'id_poli=' + id_poli + '&nomor=' + nomor + '&nama_ruang=' + nama_ruang;
		getQueue(dataString);
    }
     $(document).ready(function(){
        //showQueue();
        getMesin();
    });

</script>
</body>
</html>