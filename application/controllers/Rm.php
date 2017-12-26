<?php 
	error_reporting(1);
	/**
	* 
	*/
	class Rm extends CI_Controller
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
			$this->session->set_flashdata('rm_alert', $value);
		}
		function uploads()
		{
			$nm = $this->input->post('file_name');
			$nama_album = $this->session->userdata('id_pasien');
			if ($nama_album=="") {
				$nama_album = "UMUM";
			}
			else{
				$nama_album;
			}
			$this->cek_dir($nama_album);
			$namafile = "RM-".$nm."-".$type."-".$nama_album.time();
        	$config['upload_path']          = './warehouse/rekam_medis/'.$nama_album;
            $config['allowed_types']        = 'jpg|png|jpeg|pdf';
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
            	$data = array('id_rekam_medis' => $this->session->userdata('id_rm'),
            				  'id_pasien' => $this->session->userdata('id_pasien'),
            				  'file_name' => $upload_data['file_name']
            				);
            	$x = $this->Mod_Query->add('rm_files',$data);
            	$this->set_log('Menambah Data Rekam Medis');
				$this->set_alert("<div class='alert alert-info alert-dismissable'>
								    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								    	<strong class='fa fa-check'> Rekam Medis Telah Ditambah</strong> 
								    </div>");
            	redirect('main/index/pasien/');
            }
		}
		public function cek_dir($value='')
		{
			$path = 'warehouse/rekam_medis/'.$value;
			if (!is_dir($path)) {
				mkdir('warehouse/rekam_medis/'.$value);
			}
		}
		function delete_file($param1='',$param2='')
		{
			$path = 'warehouse/rekam_medis/'.$param1."/".$param2;
			unlink($path);
			$data = array('file_name' => $param2);
			$x = $this->Mod_Query->clear_by('rm_files',$data);
			if ($x > 0) {
				$this->set_log('Menghapus Data Rekam Medis');
				$this->set_alert("<div class='alert alert-success alert-dismissable'>
								    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								    	<strong class='fa fa-check'> Rekam Medis Telah Dihapus</strong> 
								    </div>");
				redirect('main/index/pasien/');
			}
			else{
				redirect('main/index/pasien/');
			}
		}
		public function add_rm_umum()
		{
			$data = array('id_rm' => $this->input->post('id_rm'),
						  'id_pasien' => $this->session->userdata('id_pasien'),
						  'tensi_darah' => $this->input->post('tensi'),
						  'nadi' => $this->input->post('nadi'),
						  'suhu' => $this->input->post('suhu'),
						  'riwayat' => $this->input->post('riwayat'),
						  'anamnesa' => $this->input->post('anamnesa'),
						  'tb' => $this->input->post('tb'),
						  'bb' => $this->input->post('bb'),
						  'diagnosis' => $this->input->post('diagnosis'),
						  'terapi' => $this->input->post('terapi'),
						 );
			$this->Mod_Query->add('rm_umum',$data);
			$sessions =  array('id_rm' => $this->input->post('id_rm'),'jenis'=>'UMUM');
			$this->session->set_userdata($sessions);
			$this->set_log('Menambah Data Rekam Medis Umum');
			$this->set_alert("<div class='alert alert-success alert-dismissable'>
							    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							    	<strong class='fa fa-check'> Rekam Medis Telah Dihapus</strong> 
							    </div>");
			redirect('main/index/pasien');
		}
		public function add_rm_skin()
		{
			$data = array('id_rm' => $this->input->post('id_rm'),
						  'id_pasien' => $this->session->userdata('id_pasien'),
						  'kontrasepsi' => $this->input->post('kontrasepsi'),
						  'hormanal' => $this->input->post('kontrasepsi'),
						  'pekerjaan' => $this->input->post('pekerjaan'),
						  'riwayat' => $this->input->post('riwayat'),
						  'produk_perawatan' => $this->input->post('produk_perawatan'),
						  'keluhan' => $this->input->post('keluhan'),
						  'terapi' => $this->input->post('terapi'),
						 );
			$this->Mod_Query->add('rm_skin',$data);
			$sessions =  array('id_rm' => $this->input->post('id_rm'),'jenis'=>'SKIN');
			$this->session->set_userdata($sessions);
			$this->set_log('Menambah Data Rekam Medis Skin Care');
			$this->set_alert("<div class='alert alert-success alert-dismissable'>
							    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							    	<strong class='fa fa-check'> Rekam Medis Telah Ditambah</strong> 
							    </div>");
			redirect('main/index/pasien');
		}
		public function add_rm_slim()
		{
			$data = array('id_rm' => $this->input->post('id_rm'),
						  'id_pasien' => $this->session->userdata('id_pasien'),
						  'suhu' => $this->input->post('suhu'),
						  'tensi' => $this->input->post('tensi'),
						  'nadi' => $this->input->post('nadi'),
						  'riwayat' => $this->input->post('riwayat'),
						  'alergi' => $this->input->post('alergi'),
						  'tb' => $this->input->post('tb'),
						  'bb' => $this->input->post('bb'),
						  'pekerjaan' => $this->input->post('pekerjaan'),
						  'kb' => $this->input->post('kb'),
						  'jenis_kb' => $this->input->post('jenis_kb'),
						  'lama' => $this->input->post('lama'),
						  'lingkar_perut' => $this->input->post('lingkar_perut'),
						  'garis_rusuk' => $this->input->post('garis_rusuk'),
						  'sejajar' => $this->input->post('sejajar'),
						  'tulang_pinggul' => $this->input->post('tulang_pinggul'),
						  'lingkar_lengan' => $this->input->post('lingkar_lengan'),
						  'lingkar_paha' => $this->input->post('lingkar_paha'),
						  'obat_rutin' => $this->input->post('obat_rutin'),
						  'obat_diet' => $this->input->post('obat_diet'),
						  'pola_makan' => $this->input->post('pola_makan'),
						  'frekuensi' => $this->input->post('frekuensi'),
						  'sulit_bab' => $this->input->post('sulit_bab'),
						  'pencahar' => $this->input->post('pencahar'),
						  'karada_scan' => $this->input->post('karada_scan'),
						  'pemeriksaan' => $this->input->post('pemeriksaan'),
						  'terapi' => $this->input->post('terapi')
						 );
			$this->Mod_Query->add('rm_slim',$data);
			$sessions =  array('id_rm' => $this->input->post('id_rm'),'jenis'=>'SLIM');
			$this->session->set_userdata($sessions);
			$this->set_log('Menambah Data Rekam Medis Slimming');
			$this->set_alert("<div class='alert alert-success alert-dismissable'>
							    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							    	<strong class='fa fa-check'> Rekam Medis Telah Ditambah</strong> 
							    </div>");
			redirect('main/index/pasien');
		}
	}
?>