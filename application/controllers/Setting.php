<?php 
	error_reporting(1);
	/**
	* 
	*/
	class Setting extends CI_Controller
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
			$this->session->set_flashdata('setting_alert', $value);
		}
		public function update()
		{
			$by = array('id' => $this->input->post('id'));
			$data = array('nama_perusahaan' => $this->input->post('nama'),
						  'telpon' => $this->input->post('telpon'),
						  'email' => $this->input->post('email'),
						  'alamat' => $this->input->post('alamat'),
						  'status' => $this->input->post('st'));
			$x = $this->Mod_Query->renew('setting',$data,$by);
			if ($x > 0) {
				$this->set_log('Memperbaharui Pengaturan');
				$this->set_alert("<div class='alert alert-info alert-dismissable'>
								    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								    	<strong class='fa fa-check'> Pengaturan Telah Diperbaharui</strong> 
								    </div>");
				redirect('main/index/setting');
			}
			else{
				redirect('main/index/setting');
			}
		}
		public function hak_akses()
		{
			$by = array('id_hak_akses' => 1);
			$data = array('ctrl' => $this->input->post('ctrl'));
			$x = $this->Mod_Query->renew('hak_akses',$data,$by);
			if ($x > 0) {
				redirect('main/index/');
			}
			else{
				redirect('main/index/');
			}
		}
	}
?>