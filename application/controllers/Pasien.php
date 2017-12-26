<?php 
	error_reporting(1);
	/**
	* 
	*/
	class Pasien extends CI_Controller
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
			$this->session->set_flashdata('pasien_alert', $value);
		}
		function tambah_pasien()
		{
			if ($this->session->userdata('logged_in')) 
			{
				$nama_album = $this->input->post('id_pasien');
				$this->cek_dir($nama_album);
				$namafile = "IMG-AKP-".$nama_album;
	        	$config['upload_path']          = './uploads/'.$nama_album;
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
	                	echo "<script>window.alert('$value');window.location=('http://indieshu.net/main/index/pasien')</script>";
	                }
	            }
	            else
	            {     

	            	$upload_data = $this->upload->data();
	            	$config2['image_library'] = 'gd2';
					$config2['source_image'] = 'uploads/'.$nama_album.'/'.$upload_data['file_name'];
					$config2['create_thumb'] = FALSE;
					$config2['maintain_ratio'] = TRUE;  	 		
					$config2['width']  = 512;
					$config2['height'] = 512;
	            	$this->load->library('image_lib', $config2);
					$this->image_lib->resize(); 
					$val_date = $this->input->post('tgl_lhr');
					$tgl_lhr = date('Y-m-d',strtotime($val_date));
					$data = array('id_pasien' => $this->input->post('id_pasien'),
								  'photo' => $upload_data['file_name'],
								  'nama_pasien' => $this->input->post('nama_pasien'),
								  'tgl_lahir' => $tgl_lhr,
								  'jk' => $this->input->post('jk'),
								  'pekerjaan' => $this->input->post('pekerjaan'),
								  'alamat' => $this->input->post('alamat'),
								  'asal_daerah' => $this->input->post('asal_kota'),
								  'kebangsaan' => $this->input->post('kebangsaan'),
								  'nama_keluarga' => $this->input->post('nama_keluarga'),
								  'agama' => $this->input->post('agama'),
								  'kontak' => $this->input->post('kontak')
								);
					$x = $this->Mod_Query->add('pasien',$data);
					if ($x > 0) {
						$data_log = array('id_user' => $this->session->userdata('id_user'),
								 'aktifitas' => 'Tambah Pasien'
								);
						$this->Mod_Query->add('log',$data_log);
						redirect('main/index/pasien/sukses');
					}
					else{
						redirect('main/index/pasien/gagal');
					}
	            }
	        }
		}
		public function cek_dir($value='')
		{
			$path = 'uploads/'.$value;
			if (!is_dir($path)) {
				mkdir('uploads/'.$value);
			}
		}
		function hapus_pasien($value)
		{
			if ($this->session->userdata('logged_in')) {
				$by = array('id_pasien' => $value);
				$data = array('status' => 'Tidak Aktif');
				$x = $this->Mod_Query->renew('pasien',$data,$by);
				if ($x > 0) {
					$data_log = array('id_user' => $this->session->userdata('id_user'),
								      'aktifitas' => 'Hapus Pasien'
								);
					$this->Mod_Query->add('log',$data_log);
					redirect('main/index/pasien/');
				}
				else{
					redirect('main/index/pasien/');
				}
			}
		}
		function edit_pasien()
		{
			if ($this->session->userdata('logged_in')) {
				$val_date = $this->input->post('tgl_lhr');
				$tgl_lhr = date('Y-m-d',strtotime($val_date));
				$by = array('id_pasien' => $this->input->post('id_pasien'),
						   );
				$data = array('nama_pasien' => $this->input->post('nama_pasien'),
							  'tgl_lahir' => $tgl_lhr,
							  'jk' => $this->input->post('jk'),
							  'pekerjaan' => $this->input->post('pekerjaan'),
							  'alamat' => $this->input->post('alamat'),
							  'asal_daerah' => $this->input->post('asal_kota'),
							  'kebangsaan' => $this->input->post('kebangsaan'),
							  'nama_keluarga' => $this->input->post('nama_keluarga'),
							  'agama' => $this->input->post('agama'),
							  'kontak' => $this->input->post('kontak')
							);
				$x = $this->Mod_Query->renew('pasien',$data,$by);
				if ($x > 0) {
					$data_log = array('id_user' => $this->session->userdata('id_user'),
								 'aktifitas' => 'Edit Pasien'
								);
					$this->Mod_Query->add('log',$data_log);
					redirect('main/index/pasien/');
				}
				else{
					redirect('main/index/pasien/');
				}
			}
		}
		public function set_id($type,$value)
		{
			if ($type=='edit') 
			{
				$id = array('id_pasien' => $value,
							'edit' => TRUE
						   );
				$this->session->set_userdata($id);
				redirect('main/index/pasien/');
			}
			elseif($type='rm'){
				$id = array('id_pasien' => $value,
							'rm' => TRUE
						   );
				$this->session->set_userdata($id);
				redirect('main/index/pasien/');
			}
			
		}
		public function unset_id()
		{
			$array = array('id_pasien','rm','id_rm','jenis');
			$this->session->unset_userdata($array);
			redirect('main/index/pasien/');
		}
		public function get_files($file_name)
		{
			$path = 'warehouse/rekam_medis/'.$this->session->userdata('id_pasien').'/'.$file_name;
			force_download($path,NULL);
		}
	}
?>