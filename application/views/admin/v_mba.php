<div class="row">
	<div class="col-lg-4">
		<div class="widget-box widget-color-blue">
			<div class="widget-header">
				<div class="widget-title">Upload Dataset</div>
			</div>
			<div class="widget-main">
				<div class="widget-body">
					<?php 
						echo $this->session->flashdata('analysis_alert');
					?>
					<form enctype="multipart/form-data" method="POST" action="<?php echo base_url('apriori/unggah_dataset') ?>">
						<div class="form-group">
							<input class="form-control" type="file" name="userfile" accept=".csv">
						</div>
						<div class="form-group">
							<button class="btn btn-primary btn-block"><i class="fa fa-upload"></i></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="tabbable">
			<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
				<li class="active">
					<a data-toggle="tab" href="#hasil"><i class="fa fa-feed"></i> Hasil</a>
				</li>
				<li>
					<a href="javascript:printContent('hasil')"><i class="fa fa-print"></i> Cetak Dokumen</a>
				</li>
			</ul>
			<div class="tab-content col-lg-10">
				<div id="hasil" class="tab-pane in active">
					<div id="dataprint">
						<?php 
							if ($this->session->userdata('apriori')) {
						?>
								<div class="table-responsive">
									<?php 
										$file = file_get_contents(base_url('warehouse/sample/dataset.csv'));
										$dataset = array_map("str_getcsv", preg_split('/\r*\n+|\r+/', $file));
										print_r($dataset);
										echo "<br>";
										echo json_encode($dataset)."<br>";
										$dataAwal=array();
										$dataAkhir=array();
										// fungsi proses
										proses($dataset,$dataAwal,$dataAkhir);
										//
										echo "<br><br>";
										for($i=0;$i<count($dataAwal);$i++){
											if($i==0){
										?>
												<div class="col-lg-4">
													<table class="table table-bordered">
														<tr>
															<td><strong>Banyaknya Sample Data</strong></td><td class="bg-primary"><?php echo count($dataset); ?></td>
														</tr>
													</table>
												</div>
												
										<?php 
											}else{
												$x = $i+1;
												echo "<br><br><br><br>";
												echo "Berdasarkan Hasil Analisis, Pola Pembelian Dengan Kombinasi <strong>".$x."</strong> Itemset";
										?>
												<table class="table table-bordered">
													<tr>
														<td>Kombinasi Item </td><td>Probabilitas</td>
													</tr>
										<?php 
												foreach ($dataAkhir[$i] as $key => $akhir) {
													$item="";
													foreach ($akhir['items'] as $key => $value) {
														$item.=$value;
													}
													$total = count($dataAkhir)-1;
													echo "<tr>
															<td>".$item."</td>
															<td>Pembelian Dengan Kombinasi Item Ini Memiliki Kemungkinan Sebesar ".$akhir['nilai'].'%</td>
														</tr>';
												}
												echo "</table>";
											}
										}
									?>
								</div>
						<?php 
							}
							else{
								echo "";
							}
						?>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function printContent(el)
    {
		var restorepage = document.body.innerHTML;
		var printcontent = document.getElementById(el).innerHTML;
		document.body.innerHTML = printcontent;
		window.print();
		document.body.innerHTML = restorepage;
		$('#print_antrian').hide();
	}
</script>
<?php 
	function proses($dataset=array(),&$dataAwal=array(),&$dataAkhir=array(),$panjang=1,$itemset=array()){
		if(empty($itemset)){
			$itemset=$dataset;
		}
		$items=array();
		if(count($itemset[0])>1){
			foreach ($itemset as $value) {
				foreach ($value as $data) {
					if(!empty($items)){
						$status=true;
						foreach ($items as $item) {
							if($data==$item){
								$status=false;
							}
						}
						if($status){
							$items[]=$data;
						}
					}else{
						$items[]=$data;
					}
				}
			}
		}else{
			$items=$itemset;
			
		}

		
		$new_itemset=array();

			$itemset=kombinasi($items,$panjang);

			$dataset_awal=array();
			$dataset_akhir=array();
			if(support($dataset,$itemset,$new_itemset,$dataset_awal,$dataset_akhir)){
				array_push($dataAkhir,$dataset_akhir);
				array_push($dataAwal,$dataset_awal);
				return proses($dataset,$dataAwal,$dataAkhir,$panjang+1,$new_itemset);
				
			}else{

				array_push($dataAwal,$dataset_awal);
				array_push($dataAkhir, $dataset_akhir);
			}
	}


	function support($dataset=array(),$itemset=array(),&$new_itemset=array(),&$dataset_awal=array(),&$dataset_akhir=array()){
		$persen=20;
		$jumlah=array();
		$status=false;
		if(empty($dataset) || empty($itemset)){
			return false;
		}else{
			if(count($itemset[0])>1){
				$jumlah=array();
				foreach ($itemset as $i => $items) {
					$jumlah[$i]=0;
					foreach ($dataset as $data) {
						$count_item=count($items);
						if( count(array_intersect($data,$items))==$count_item){
							$jumlah[$i]++;
						}
						
					}
					$nilai=($jumlah[$i]/count($dataset))*100;
					$awal=array(
								'items'=>$items,
								'nilai'=>$nilai
							);
						array_push($dataset_awal, $awal);
					if($nilai>=$persen){
						$status=true;
						array_push($new_itemset, $items);
						$akhir=array(
								'items'=>$items,
								'nilai'=>$nilai
							);
						array_push($dataset_akhir, $akhir);
					}
				}

			}else{

				foreach ($itemset as $item) {
					$jumlah[$item]=0;
					foreach ($dataset as $value) {
						foreach ($value as $data) {
							if($item==$data){
								$jumlah[$item]++;
							}
						}
					}
				}
				foreach ($itemset as $item) {
						$nilai=(($jumlah[$item]/count($dataset))*100);
						$awal=array(
								'items'=>$item,
								'nilai'=>$nilai
							);
						array_push($dataset_awal, $awal);
					if($nilai>=$persen){
						$status=true;
						array_push($new_itemset, $item);
						$akhir=array(
									'items'=>$item,
									'nilai'=>$nilai
									);
						array_push($dataset_akhir, $akhir);
					}
				}
			}


			if (count($new_itemset)>1){
				return true;
			}else{
				return false;
			}
		}
	}
	function kombinasi($items,$panjang,$arrData=array()){
		sort($items);
		
		if(empty($arrData)){
			$arrData=$items;
		}

		if($panjang==1){
			return $arrData;
		}
		
		$dataset=array();
		if(count($arrData[0])>1){
			foreach ($arrData as $key => $aData) {
				$indeks=count($aData)-1;
				for($i=0;$i<count($items);$i++){
					if($aData[$indeks]==$items[$i]){
						for($j=$i+1;$j<count($items);$j++){
							$temp=array();
							foreach ($aData as $data) {
								$temp[]=$data;
							}
							$temp[]=$items[$j];
							array_push($dataset, $temp);
						}
					}
				}	
			}

		}else{
			for($i=0;$i<count($arrData)-1;$i++){
				for($j=$i+1;$j<count($arrData);$j++){
					$temp=array();
					$temp[]=$arrData[$i];
					$temp[]=$arrData[$j];
					array_push($dataset, $temp);
				}
			}
		}

		return kombinasi($items,$panjang-1,$dataset);
	}
?>
