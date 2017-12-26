<div class="col-xs-12">
    <div class="widget-box transparent">
        <div class="widget-header widget-header-flat">
            <h4 class="widget-title lighter">
                <i class="ace-icon fa fa-star orange"></i>
                Data Barang
            </h4>

            <div class="widget-toolbar">
                <a href="#" data-action="collapse">
                    <i class="ace-icon fa fa-chevron-up"></i>
                </a>
            </div>
        </div>

        <div class="widget-body">
            <div class="widget-main no-padding">
                <table id="dt_barang" class="table table-bordered table-striped">
                    <thead class="thin-border-bottom">
                        <tr>
                            <th>
                                <i class="ace-icon fa fa-caret-right blue"></i>Kode Barang
                            </th>
                            <th>
                                <i class="ace-icon fa fa-caret-right blue"></i>Kategori
                            </th>
                            <th>
                                <i class="ace-icon fa fa-caret-right blue"></i>Nama
                            </th>
                            <th class="hidden-480">
                                <i class="ace-icon fa fa-caret-right blue"></i>Harga Beli
                            </th>
                            <th class="hidden-480">
                                <i class="ace-icon fa fa-caret-right blue"></i>Harga Retail
                            </th>
                            <th>
                                <i class="ace-icon fa fa-caret-right blue"></i>Stok Awal
                            </th>
                            <th>
                                <i class="ace-icon fa fa-caret-right blue"></i>Stok Terjual
                            </th>
                            <th class="hidden-480">
                                <i class="ace-icon fa fa-caret-right blue"></i>Stok Sisa
                            </th>
                            <th>
                                <i class="ace-icon fa fa-caret-right blue"></i>Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($barang as $key) {
                        ?>  
                                <tr>
                                    <td><?php echo $key->id_barang ?></td>
                                    <td><?php echo $key->kategori ?></td>
                                    <td><?php echo $key->nama_barang ?></td>
                                    <td><?php echo $key->harga_beli ?></td>
                                    <td><?php echo $key->harga_retail ?></td>
                                    <td><?php echo $key->stok_awal ?></td>
                                    <td><?php echo $key->jumlah_jual ?></td>
                                    <td><?php echo $key->stok ?></td>
                                    <td><a href="<?php echo base_url('main/index/barang/detail/').$key->id_barang; ?>"><i class="fa fa-eye"></i> Lihat Detail</a></td>
                                </tr>
                        <?php 
                            }
                        ?>
                    </tbody>
                </table>
            </div><!-- /.widget-main -->
        </div><!-- /.widget-body -->
    </div><!-- /.widget-box -->   
</div>
