<?php 
	/**
	* 
	*/
	class Test extends CI_Controller
	{
		public function index()
		{
			$data['parent'] = $this->Mod_Query->get('result','penjualan');
			$data['csv'] = $this->Mod_Query->get('result','dt_penjualan');
			$this->load->view('v_test',$data);
		}
		public function demo($value='')
		{
			$file = file_get_contents("http://localhost/indieshu/test");
			$dataset = array_map("str_getcsv", preg_split('/\r*\n+|\r+/', $file));
			print_r($dataset);
			echo "<br>";
			echo json_encode($dataset)."<br>";
		}
		public function get_dataset()
		{
			$parent = $this->Mod_Query->get('result','penjualan');
			$csv = $this->Mod_Query->get('result','dt_penjualan');
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
		    }
		    force_download('dataset.csv',$dataset);
		}
	}
?>