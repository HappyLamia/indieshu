<?php 	
	error_reporting(1);
	defined('BASEPATH') OR exit('No direct script access allowed');
	class User extends CI_Controller
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
			$this->session->set_flashdata('user_alert', $value);
		}
		public function add()
		{
			$data = array('username' => $this->input->post('username'), 
						  'password' => md5($this->input->post('password')),
						  'name' => $this->input->post('nama'),
						  'email' => $this->input->post('email'),
						  'level' => $this->input->post('level'),
						  'kontak' => $this->input->post('kontak')
						);
			if ($this->input->post('v_password')==$this->input->post('password')) 
			{
				$x = $this->Mod_Query->add('user',$data);
				if ($x > 0) {
					$this->set_log('Menambah User');
					$this->set_alert("<div class='alert alert-info alert-dismissable'>
									    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									    	<strong class='fa fa-check'> User Telah Ditambah</strong> 
									    </div>");
					redirect('main/index/users');
				}
			}
			else{
				$this->set_alert('Konfirmasi Tidak Sama');
				redirect('main/index/users/');
			}
			
		}
		public function delete($value='')
		{
			$data = array('id_user' => $value);
			$x = $this->Mod_Query->clear_by('user',$data);
			if ($x > 0) {
				$this->set_log('Menghapus User');
				$this->set_alert("<div class='alert alert-warning alert-dismissable'>
									    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									    	<strong class='fa fa-check'> User Telah Dihapus </strong> 
									    </div>");
				redirect('main/index/users/');
			}
			else{
				redirect('main/index/users/');
			}
		}
		public function edit($value)
		{
			$by = array('id_user' => $this->input->post('id_user'));
			if ($value=='profil') {
				$data = array('name' => $this->input->post('nama'),
						  	  'email' => $this->input->post('email'),
						  	  'kontak' => $this->input->post('kontak')
						  	);
			}
			else{
				$data = array('password' => md5($this->input->post('password')));
				if ($this->input->post('v_password')!= $this->input->post('password')) 
				{
					redirect('main/index/users/');
				}
			}
			$x = $this->Mod_Query->renew('user',$data,$by);
			if ($x > 0) {
				$this->set_log('Memperbaharui User');
				$this->set_alert("<div class='alert alert-success alert-dismissable'>
									    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									    	<strong class='fa fa-check'> User Telah Diperbaharui </strong> 
									    </div>");
				redirect('main/index/users/');
			}
			else{
				redirect('main/index/users/');
			}
		}
	}
?>