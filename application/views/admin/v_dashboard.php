<div class="row">
    <div class="space-6"></div>

    <div class="col-sm-7 ">
        <div class="infobox infobox-green">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-bullhorn"></i>
            </div>

            <div class="infobox-data">
                <span class="infobox-data-number">0</span>
                <div class="infobox-content">Order</div>
            </div>

            <div class="stat stat-info"><a href="">Lihat Detail</a></div>
        </div>

        <div class="infobox infobox-blue">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-twitter"></i>
            </div>

            <div class="infobox-data">
                <span class="infobox-data-number"><?php echo $n_member ?></span>
                <div class="infobox-content">Member</div>
            </div>

            <div class="stat stat-info"><a href="<?php echo base_url('main/index/penjualan') ?>">Lihat Detail</a></div>
        </div>

        <div class="infobox infobox-pink">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-shopping-cart"></i>
            </div>

            <div class="infobox-data">
                <span class="infobox-data-number"><?php echo $n_penjualan ?></span>
                <div class="infobox-content">Transaksi Penjualan</div>
            </div>
            <div class="stat stat-info"><a href="<?php echo base_url('main/index/penjualan') ?>">Lihat Detail</a></div>
        </div>

        <div class="infobox infobox-red">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-flask"></i>
            </div>

            <div class="infobox-data">
                <span class="infobox-data-number"><?php echo $n_stok ?></span>
                <div class="infobox-content">Stok Obat</div>
            </div>
            <div class="stat stat-info"><a href="<?php echo base_url('main/index/barang') ?>">Lihat Detail</a></div>
        </div>


        <div class="space-6"></div>
        <div class="infobox infobox-blue infobox-small infobox-dark">
            <div class="infobox-data">
                <div class="infobox-content">Pendapatan</div>
                <div class="infobox-content">
                    <?php 
                        $total = 0;
                        foreach ($earn as $key) {
                            $total = $total + $key->total_diskon;
                        }
                        echo $this->cart->format_number($total);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div style="padding-top: 10px" class="row">
	<div class="col-xs-6">
        <div class="widget-box transparent">
            <div class="widget-header widget-header-flat">
                <h4 class="widget-title lighter">
                    <i class="ace-icon fa fa-star orange"></i>
                    Log Aktifitas
                </h4>

                <div class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <table id="dt_log" class="table table-bordered table-striped">
                        <thead class="thin-border-bottom">
                            <tr>
                                <th>
                                    <i class="ace-icon fa fa-caret-right blue"></i>Nama User
                                </th>
                                <th>
                                    <i class="ace-icon fa fa-caret-right blue"></i>Aktifitas
                                </th>
                                <th class="hidden-480">
                                    <i class="ace-icon fa fa-caret-right blue"></i>Waktu
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($log as $key) {
                            ?>
                                <tr>
                                    <td><?php echo $key->name ?></td>
                                    <td><?php echo $key->aktifitas?></td>
                                    <td><?php echo $key->waktu ?></td>
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
    <div class="col-xs-6">
        <div class="widget-box transparent">
            <div class="widget-header widget-header-flat">
                <h4 class="widget-title lighter">
                    <i class="ace-icon fa fa-line-chart orange"></i>
                    Statistik Penjualan
                </h4>

                <div class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                   
                </div><!-- /.widget-main -->
            </div><!-- /.widget-body -->
        </div><!-- /.widget-box -->   
    </div>
</div>