<div class="col-lg-4">
    <div class="panel panel-primary">
        <div class="panel-heading">Intro</div>
        <div class="panel-body">
            <form method="POST" action="<?php echo base_url('unggah/uploads'); ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="label label-primary">Unggah Video</label>
                    <input class="form-control" type="file" name="userfile">
                </div>
                <div class="form-group">
                    <input class="form-control" type="hidden" name="album" value="Intro">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block"><span class="glyphicon glyphicon-upload"></span> Unggah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-8">
    <div class="embed-responsive embed-responsive-16by9">
        <video class="embed-responsive-item" controls="controls" autoplay="" loop="">
            <source src="<?php echo base_url('warehouse/Intro/INTRO.mp4') ?>" type="video/mp4" >
            Your Browser Doesn't Support video tag
        </video>
    </div>
    <hr>
    <a data-toggle="tooltip" title="Hapus Intro" href="<?php echo base_url('unggah/delete_files/Intro/INTRO.mp4'); ?>"><i class="fa fa-trash"></i> Hapus</a>
</div>
