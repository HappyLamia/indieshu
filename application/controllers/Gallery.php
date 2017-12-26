<?php 	
error_reporting(1);
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Gallery extends CI_Controller
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
			$this->session->set_flashdata('gallery_alert', $value);
		}
		function upload()
		{
			$nama_album = $this->input->post('album');
			if ($nama_album=="") {
				$nama_album = "UMUM";
			}
			else{
				$nama_album;
			}
			$this->cek_dir($nama_album);
			$namafile = "IMG-INDIESHU-".time();
        	$config['upload_path']          = './gallery/'.$nama_album;
            $config['allowed_types']        = 'jpg|png|jpeg|GIF';
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
                	echo "<script>window.alert('$value');window.location=('http://localhost/indieshu/main/index/gallery')</script>";
                }
            }
            else
            {     

            	$upload_data = $this->upload->data();
            	if ($upload_data['image_width'] > 1200) {
            		$config2['image_library'] = 'gd2';
					$config2['source_image'] = 'gallery/'.$nama_album.'/'.$upload_data['file_name'];
					$config2['create_thumb'] = FALSE;
					$config2['maintain_ratio'] = TRUE;  	 		
					$config2['width']         = 1200;
            	 	if ($upload_data['image_height'] > 1080) {
						$config2['height']       = 1200;
            	 	}	
            	 	$this->load->library('image_lib', $config2);
					$this->image_lib->resize();
            	} 
            	$val = str_replace(" ", "%20", $nama_album);
				$data = array('depend' =>$upload_data['file_name'],
							  'jenis' => $val,
							 );
				$x = $this->Mod_Query->add('files',$data);
				if ($x > 0) {
					redirect('main/index/gallery/sukses');
				}
				else{
					redirect('main/index/gallery/gagal');
				}
            }
		}
		public function cek_dir($value='')
		{
			$path = 'gallery/'.$value;
			if (!is_dir($path)) {
				mkdir('gallery/'.$value);
			}
		}
		function delete_photo($param1='',$param2='')
		{
			$path = 'gallery/'.$param1."/".$param2;
			unlink($path);
			$data = array('depend' => $param2);
			$x = $this->Mod_Query->clear_by('files',$data);
			if ($x > 0) {
				redirect('main/index/gallery/sukses');
			}
			else{
				redirect('main/index/gallery/gagal');
			}
		}
	}
?>