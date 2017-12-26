<?php 
	/**
	* 
	*/
	class Treatment extends CI_Controller
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
			$this->session->set_flashdata('treatment_alert', $value);
		}
		public function add_treatment()
		{
			$data = array('nama_treatment' => $this->input->post('nama_treatment'),
						  'deskripsi' => $this->input->post('deskripsi'),
						  'harga' => $this->input->post('harga')
				         );
			$this->Mod_Query->add('treatment',$data);
			$this->set_log('Menambah Treatment');
			$this->set_alert("<div class='alert alert-info alert-dismissable'>
							    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							    	<strong class='fa fa-check'> Data Telah Ditambah</strong> 
							    </div>");
			redirect('main/index/treatment');
		}
		public function update_treatment()
		{
			$by = array('id_treatment' => $this->input->post('id_treatment'));
			$data = array('nama_treatment' => $this->input->post('nama_treatment'),
						  'deskripsi' => $this->input->post('deskripsi'),
						  'harga' => $this->input->post('harga')
				         );
			$this->Mod_Query->renew('treatment',$data,$by);
			$this->set_log('Memperbaharui Treatment');
			$this->set_alert("<div class='alert alert-info alert-dismissable'>
							    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							    	<strong class='fa fa-check'> Data Telah Diubah</strong> 
							    </div>");
			redirect('main/index/treatment');
		}
		public function clear_treatment($value)
		{
			$data = array('id_treatment' => $value);
			$this->Mod_Query->clear_by('treatment',$data);
			$this->set_log('Menghapus Treatment');
			$this->set_alert("<div class='alert alert-info alert-dismissable'>
							    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							    	<strong class='fa fa-check'> Data Telah Dihapus</strong> 
							    </div>");
			redirect('main/index/treatment');
		}
	}
?>