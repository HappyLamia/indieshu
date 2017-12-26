<?php 
	/**
	* 
	*/
	class Dokter extends CI_Controller
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
			$this->session->set_flashdata('dokter_alert', $value);
		}
		public function add_dokter($value)
		{
			$data = array('nip' => $this->input->post('nip'),
						  'photo' => $value,
						  'nama_dokter' => $this->input->post('nama'),
						  'deskripsi' => $this->input->post('deskripsi'),
						  'kontak_dokter' => $this->input->post('kontak'),
						  'mulai_praktek' => $this->input->post('mulai'),
						  'akhir_praktek' => $this->input->post('selesai'),
						  'spesial' => $this->input->post('spesial')
				         );
			$this->Mod_Query->add('dokter',$data);
			$this->set_log('Menambah Data Dokter');
			$this->set_alert("<div class='alert alert-info alert-dismissable'>
							    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							    	<strong class='fa fa-check'> Data Telah Ditambah</strong> 
							    </div>");
			redirect('main/index/dokter');
		}
		public function update_dokter()
		{
			$by = array('nip' => $this->input->post('nip'));
			$data = array('nama_dokter' => $this->input->post('nama'),
						  'deskripsi' => $this->input->post('deskripsi'),
						  'kontak_dokter' => $this->input->post('kontak'),
						  'mulai_praktek' => $this->input->post('mulai'),
						  'akhir_praktek' => $this->input->post('selesai'),
						  'spesial' => $this->input->post('spesial')
				         );
			$this->Mod_Query->renew('dokter',$data,$by);
			$this->set_log('Memperbaharui Data Dokter');
			$this->set_alert("<div class='alert alert-success alert-dismissable'>
							    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							    	<strong class='fa fa-check'> Data Telah Diubah</strong> 
							    </div>");
			redirect('main/index/dokter');
		}
		public function clear_dokter($value,$value2)
		{
			$data = array('nip' => $value);
			$this->Mod_Query->clear_by('dokter',$data);
			$this->delete_photo($value2);
			$this->set_log('Menghapus Data Dokter');
			$this->set_alert("<div class='alert alert-success alert-dismissable'>
							    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							    	<strong class='fa fa-check'> Data Telah Dihapus</strong> 
							    </div>");
			redirect('main/index/dokter');
		}
		function uploads($cmd)
		{
			$nama_album = 'dokter';
			$this->cek_dir($nama_album);
			$namafile = $this->input->post('nip');
        	$config['upload_path']          = './warehouse/'.$nama_album;
            $config['allowed_types']        = 'jpg|png|jpeg|GIF|';
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
                	echo "<script>window.alert('$value');window.location=('http://indieshu.net/main/index/dokter')</script>";
                }
            }
            else
            {     
            	$upload_data = $this->upload->data();
        		$config2['image_library'] = 'gd2';
				$config2['source_image'] = 'warehouse/'.$nama_album.'/'.$upload_data['file_name'];
				$config2['create_thumb'] = FALSE;
				$config2['maintain_ratio'] = TRUE;  	 		
				$config2['width']    = 200;
				$config2['height']   = 400;
        	 	$this->load->library('image_lib', $config2);
				$this->image_lib->resize();
				if ($cmd=="update") {
					redirect('main/index/dokter');
				}
				else{
					$photo = $upload_data['file_name'];
					$this->add_dokter($photo);
            		redirect('main/index/dokter');
				}
            }
		}
		public function cek_dir($value='')
		{
			$path = 'warehouse/'.$value;
			if (!is_dir($path)) {
				mkdir('warehouse/'.$value);
			}
		}
		function delete_photo($param)
		{
			$path = 'warehouse/dokter/'.$param;
			unlink($path);
		}
	}
?>