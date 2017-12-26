<?php 
	/**
	* 
	*/
	class Apriori extends CI_Controller
	{
		public function set_alert($value)
		{
			$this->session->set_flashdata('analysis_alert', $value);
		}
		public function export_dataset()
		{
			$this->load->dbutil();
	        $delimiter = ",";
	        $newline = "\r\n";
	        $filename = "dataset.csv";
	        $query = "SELECT id_penjualan,id_barang FROM dt_penjualan";
	        $result = $this->db->query($query);
	        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
	        force_download($filename, $data);
		}
		function unggah_dataset()
		{
			$nama_album = 'sample';
			$this->cek_dir($nama_album);
			$namafile = "dataset";
        	$config['upload_path']          = './warehouse/'.$nama_album;
            $config['allowed_types']        = 'csv';
            $config['max_size']             = 2000000;
            $config['max_width']            = 20000;
            $config['max_height']           = 20000;
            $config['file_name'] = $namafile;
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            if ( !$this->upload->do_upload('userfile'))
            {
                $error = array('error' => $this->upload->display_errors());
                foreach ($error as $key => $value) {
                	$msg = "<div class='alert alert-danger alert-dismissable'>
						    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						    	<strong class='fa fa-check'>".$value."</strong> 
						    </div>";
                	$this->set_alert($msg);
                	redirect('main/index/analysis');
                }
            }
            else
            {     
            	$upload_data = $this->upload->data();
            	$this->session->set_userdata(array('apriori' => TRUE));
        		$msg = "<div class='alert alert-info alert-dismissable'>
					    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					    	<strong class='fa fa-check'> Dataset Telah Diunggah </strong> 
					    </div>";
            	$this->set_alert($msg);
            	redirect('main/index/analysis');
            }
		}
		public function cek_dir($value='')
		{
			$path = 'warehouse/'.$value;
			if (!is_dir($path)) {
				mkdir('warehouse/'.$value);
			}
		}
		function delete_file($param1='',$param2='')
		{
			$path = 'warehouse/'.$param1."/".$param2;
			unlink($path);
		}
	}
?>