<?php 
	/**
	* 
	*/
	class Penyakit extends CI_Controller
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
			$this->session->set_flashdata('penyakit_alert', $value);
		}
		function tambah(){
			if ($this->session->userdata('logged_in')) {
				$data = array('id_penyakit' => $this->input->post('id_penyakit'),
							  'nama_penyakit' => $this->input->post('nama_penyakit'),
							  'resep' => $this->input->post('resep')
							);
				$x = $this->Mod_Query->add('penyakit',$data);
				try {
					if ($x) {
						$this->set_log('Menambah Data Penyakit');
						$this->set_alert("<div class='alert alert-success alert-dismissable'>
										    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
										    	<strong class='fa fa-check'> Data Telah Ditambah</strong> 
										    </div>");
						redirect('main/index/resep/');
					}
					else{
						redirect('main/index/resep/');
					}
				} catch (Exception $e) {
					echo $this->db->error();
				}		
			}
		}
		function ubah(){
			if ($this->session->userdata('logged_in')) {
				$by = array('id_penyakit' => $this->input->post('id_penyakit'));
				$data = array('nama_penyakit' => $this->input->post('nama_penyakit'),
							  'resep' => $this->input->post('resep')
							);
				$x = $this->Mod_Query->renew('penyakit',$data,$by);
				try {
					if ($x) {
						$this->set_log('Mengubah Data Penyakit');
						$this->set_alert("<div class='alert alert-success alert-dismissable'>
										    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
										    	<strong class='fa fa-check'> Data Telah Diubah</strong> 
										    </div>");
						redirect('main/index/resep/');
					}
					else{
						redirect('main/index/resep/');
					}
				} catch (Exception $e) {
					echo $this->db->error();
				}
			}
		}
		function hapus($value){
			if ($this->session->userdata('logged_in')) {
				$data = array('id_penyakit' => $value);
				$x = $this->Mod_Query->clear_by('penyakit',$data);
				if ($x > 0) {
					$this->set_log('Menghapus Data Penyakit');
					$this->set_alert("<div class='alert alert-success alert-dismissable'>
									    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									    	<strong class='fa fa-check'> Data Telah Dihapus</strong> 
									    </div>");
					redirect('main/index/resep/');
				}
				else{
					redirect('main/index/resep/');
				}
			}
		}
		function kirim($value){
			if ($this->session->userdata('logged_in')) {
				$by = array('id_penyakit' => $value);
				$data = array('status' => 1);
				$x = $this->Mod_Query->renew('penyakit',$data,$by);
				try {
					if ($x) {
						$this->set_log('Kirim Resep');
						$this->set_alert("<div class='alert alert-success alert-dismissable'>
										    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
										    	<strong class='fa fa-check'> Proses Telah Dilakukan</strong> 
										    </div>");
						redirect('main/index/resep/');
					}
					else{
						redirect('main/index/resep/');
					}
				} catch (Exception $e) {
					echo $this->db->error();
				}
			}
		}
		function batal_kirim($value){
			if ($this->session->userdata('logged_in')) {
				$by = array('id_penyakit' => $value);
				$data = array('status' => 0);
				$x = $this->Mod_Query->renew('penyakit',$data,$by);
				try {
					if ($x) {
						$this->set_log('Cancel Resep');
						$this->set_alert("<div class='alert alert-success alert-dismissable'>
										    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
										    	<strong class='fa fa-check'> Proses Dibatalkan</strong> 
										    </div>");
						redirect('main/index/resep/sukses_ubah');
					}
					else{
						redirect('main/index/resep/gagal');
					}
				} catch (Exception $e) {
					echo $this->db->error();
				}
			}
		}
		function get_resep(){
			if ($this->session->userdata('logged_in')) {
				$data = array('status' => 1);
				$x = $this->Mod_Query->get_where('row','penyakit',$data);
				if (!isset($x)) {
					$dt = array('id_penyakit' => '', 
								'nama_penyakit' => '',
								'resep' => ''
							   );
				echo json_encode($dt);
				} else {
					$dt = array('id_penyakit' => $x->id_penyakit, 
								'nama_penyakit' => $x->nama_penyakit,
								'resep' => $x->resep
							   );
					echo json_encode($dt);
				}
			}
		}
	}
?>