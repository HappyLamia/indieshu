<?php 
	error_reporting(1);
	/**
	* 
	*/
	class Penggajian extends CI_Controller
	{
		public function upload()
		{
			$namafile = "Dataset-C45";
        	$config['upload_path']          = './warehouse/file';
            $config['allowed_types']        = 'csv';
            $config['max_size']             = 100000;
            $config['file_name'] = $namafile;
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            if ( !$this->upload->do_upload('userfile'))
            {
                $error = array('error' => $this->upload->display_errors());
                foreach ($error as $key => $value) {
                	echo "<script>window.alert('$value');window.location=('http://localhost/indieshu/main)</script>";
                }
            }
            else
            {     
            	$upload_data = $this->upload->data();   	
				$this->import_csv($upload_data['file_name']);
            }
		}
		public function import_csv($name)
		{
			$filepath = 'warehouse/file/'.$name;
			if (($getdata = fopen($filepath,"r")) !== FALSE) 
			{
				fgetcsv($getdata);   
				while (($data = fgetcsv($getdata)) !== FALSE) 
				{
					$fieldCount = count($data);
					for ($c=0; $c < $fieldCount; $c++) 
					{
					  $columnData[$c] = $data[$c];
					}
					$nip = $columnData[0];
					$nama = $columnData[1];
					$hadir = $columnData[2];
					$tidak = $columnData[3];
					$tgl = $columnData[4];
					$import_data[]="('".$nip."','".$nama."','".$hadir."','".$tidak."','".$tgl."')";
				}
				$import_data = implode(",", $import_data);
				$query = "INSERT INTO gaji(nip,nama_karyawan,masuk,tidak,tgl) VALUES $import_data ;";
				$x = $this->Mod_Query->get_query('this',$query);
				if ($x > 0) {
					redirect('main/index/penggajian');
				}
				else{
					redirect('main/index/penggajian');
				}
				fclose($getdata);
			}
		}
	}
?>