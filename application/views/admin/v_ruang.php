<div class="col-sm-4">
	<div class="panel panel-primary">
		<div class="panel-heading">Tambah Ruang</div>
		<div class="panel-body">
			<form method="POST" action="<?php echo base_url('ruang/tambah_ruang'); ?>">
                <?php echo $msg; ?>
                <hr>
                <div class="form-group">
                    <label class="label label-primary">Kode Ruang</label>
                    <input required type="text" name="kode_ruang" class="form-control" placeholder="Kode Ruang , . . ." >
                </div>
                <div class="form-group">
                    <label class="label label-primary">Nama Ruang</label>
                    <input required type="text" name="nama_ruang" class="form-control" placeholder="Nama Ruang , . . ." >
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">Submit</button>
                </div>
            </form>
		</div>
	</div>
</div>
<div class="col-sm-8">
    <table class="table table-responsive table-bordered text-center">
        <tr class="bg-primary">
            <td>Kode Ruang</td><td>Nama Ruang</td><td>Aksi</td>
        </tr>
        <?php 
            foreach ($ruang as $item) 
            {
        ?>
                <tr>
                    <td><?php echo $item->kode_ruang; ?></td>
                    <td><?php echo $item->nama_ruang; ?></td>
                    <td>
                        <a onclick="return confirm('Delete This Record ?')" href="<?php echo base_url('ruang/hapus_ruang')."/$item->kode_ruang"; ?>">
                            <span class='glyphicon glyphicon-trash'></span>
                        </a>
                    </td>
                </tr>
        <?php
            }
        ?>
    </table>
</div>