<?php 
	error_reporting(1);
	/**
	* 
	*/
	class Unggah extends CI_Controller
	{
		public function set_log($value)
		{
			$data_log = array('id_user' => $this->session->userdata('id_user'),
								 'aktifitas' => $value
								);
			$this->Mod_Query->add('log',$data_log);
		}
		public function set_alert($value)
		{
			$this->session->set_flashdata('unggah_alert', $value);
		}
		function uploads()
		{
			$nama_album = $this->input->post('album');
			if ($nama_album=="") {
				$nama_album = "UMUM";
			}
			else{
				$nama_album;
			}
			$this->cek_dir($nama_album);
			$namafile = "INTRO";
        	$config['upload_path']          = './warehouse/'.$nama_album;
            $config['allowed_types']        = 'jpg|png|jpeg|GIF|mp4';
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
                	echo "<script>window.alert('$value');window.location=('http://indieshu.net/main/index/intro')</script>";
                }
            }
            else
            {     
            	$upload_data = $this->upload->data();
            	redirect('main/');
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