<?php 
	error_reporting(1);
	/**
	* 
	*/
	class Ruang extends CI_Controller
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
			$this->session->set_flashdata('ruang_alert', $value);
		}
		public function tambah_ruang()
		{
			$data = array('kode_ruang' => $this->input->post('kode_ruang'), 
						   'nama_ruang' => $this->input->post('nama_ruang')
				          );
			$x = $this->Mod_Query->add('ruang',$data);
			if ($x > 0) {
				$this->set_log('Menambah Ruang');
				$this->set_alert("<div class='alert alert-info alert-dismissable'>
								    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								    	<strong class='fa fa-check'> Ruang Telah Ditambah</strong> 
								    </div>");
				redirect('main/index/ruang/');
			}
			else{
				redirect('main/index/ruang/');
			}
		}
		public function update_ruang()
		{
			$by = array('kode_ruang' => $this->input->post('kode_ruang'));
			$x = $this->Mod_Query->renew('ruang',$data,$by);
			if ($x > 0) {
				$this->set_log('Memperbaharui Ruang');
				$this->set_alert("<div class='alert alert-success alert-dismissable'>
								    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								    	<strong class='fa fa-check'> Ruang Telah Diperbaharui</strong> 
								    </div>");
				redirect('main/index/ruang/');
			}
			else{
				redirect('main/index/ruang/');
			}
		}
		public function hapus_ruang($value)
		{
			$data = array('kode_ruang' => $value);
			$x = $this->Mod_Query->clear_by('ruang',$data);
			if ($x > 0) {
				$this->set_log('Menghapus Ruang');
					$this->set_alert("<div class='alert alert-warning alert-dismissable'>
									    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									    	<strong class='fa fa-check'> Ruang Telah Dihapus</strong> 
									    </div>");
				redirect('main/index/ruang/sukses');
			}
			else{
				redirect('main/index/ruang/gagal');
			}
		}
	}
?>