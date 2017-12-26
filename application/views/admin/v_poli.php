<div class="col-sm-4">
    <div class="panel panel-primary">
        <div class="panel-heading">Tambah Poli</div>
        <div class="panel-body">
            <?php 
                if ($this->session->userdata('tipe')) 
                {
            ?>
                    <form method="POST" action="<?php echo base_url('poli/add_merge'); ?>">
                        <div class="form-group">
                            <label class="label label-primary">Ruang</label>
                            <select required class="form-control" name="kode_ruang">
                                <option value="">Pilih Ruang</option>
                                <?php 
                                     foreach ($ruang as $item) 
                                     {
                                ?>
                                        <option value="<?php echo $item->kode_ruang; ?>"><?php echo $item->nama_ruang; ?></option>
                                <?php
                                     }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="label label-primary">Nama Poli</label>
                            <input required type="text" name="nama_poli" class="form-control" placeholder="Ex: Umum , . . ." >
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Submit</button>
                        </div>
                    </form>
            <?php 
                }
                else
                {
            ?>
                    <form method="POST" action="<?php echo base_url('poli/add_poli'); ?>">
                        <div class="form-group">
                            <label class="label label-primary">Kode Poli</label>
                            <select required class="form-control" name="id_poli">
                                <option value="">Pilih Kode</option>
                                <?php 
                                     for ($i='A'; $i <= 'Z'; $i++)
                                     {
                                ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php
                                     }
                                ?>
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label class="label label-primary">Ruang</label>
                            <select required class="form-control" name="kode_ruang">
                                <option value="">Pilih Ruang</option>
                                <?php 
                                     foreach ($ruang as $item) 
                                     {
                                ?>
                                        <option value="<?php echo $item->kode_ruang; ?>"><?php echo $item->nama_ruang; ?></option>
                                <?php
                                     }
                                ?>
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label class="label label-primary">Nama Poli</label>
                            <input required type="text" name="nama_poli" class="form-control" placeholder="Ex: Umum , . . ." >
                        </div>
                        <div class="form-group">
                            <label class="label label-primary">Tipe Poli</label>
                            <select required class="form-control" name="type" onchange>
                                <option value="">- Pilih Tipe Poli -</option>
                                <option value="single">Single</option>
                                <option value="merge">Merge</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Submit</button>
                        </div>
                    </form>
            <?php 
                }
            ?>
        </div>
    </div>
</div>
<div class="col-sm-8">
    <table class="table table-responsive table-bordered text-center">
        <tr class="bg-primary">
            <td>Kode Poli</td><td>Nama Poli</td><td>Tipe</td><td>Aksi</td>
        </tr>
        <?php 
            foreach ($poli as $item) 
            {
        ?>
                <tr>
                    <td><?php echo $item->id_poli; ?></td>
                    <td><?php echo $item->nama_poli; ?></td>
                    <td>
                        <?php echo $item->type; ?>
                    </td>
                    <td>
                        <?php 
                             if ($this->session->userdata('tipe')) 
                             {
                                echo "";
                             }
                             else{
                        ?>
                        <a onclick="return confirm('Delete This Record ?')" href="<?php echo base_url('poli/remove_poli')."/$item->id_poli"; ?>">
                            <span class='glyphicon glyphicon-trash'></span>
                        </a>
                        <?php 
                            }
                        ?>
                    </td>
                </tr>
        <?php
            }
        ?>
    </table>
</div>