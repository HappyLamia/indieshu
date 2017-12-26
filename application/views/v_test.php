<?php 
    foreach ($parent as $key) {
        $data = array();
        foreach ($csv as $key2) {
            if ($key2->id_penjualan==$key->id_penjualan) {
                 //echo implode(",",$key2->id_barang);
                array_push($data,$key2->id_barang);
            }
        }
        $dataset = implode(",",$data);
        echo $dataset;
        echo "<br>";
    }
?>
<a href="<?php echo base_url('test/get_dataset') ?>">Download</a>