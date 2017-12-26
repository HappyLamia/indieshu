<?php 	
	error_reporting(1);
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Artikel extends CI_Controller
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
			$this->session->set_flashdata('artikel_alert', $value);
		}
		public function add()
		{
			$data = array('judul' => $this->input->post('judul'), 
						  'kategori' => $this->input->post('kategori'),
						  'isi' => $this->input->post('isi'),
						  'penulis' => $this->input->post('penulis')
						);
			$x = $this->Mod_Query->add('artikel',$data);
			if ($x > 0) {
				$this->set_log('Menambah Artikel');
				$this->set_alert("<div class='alert alert-info alert-dismissable'>
									    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									    	<strong class='fa fa-check'> Data Tersimpan </strong> 
									    </div>");
				redirect('main/index/artikel/');
			}
			else{
				redirect('main/index/artikel/');
			}	
		}
		public function delete($value='')
		{
			$data = array('id_artikel' => $value);
			$x = $this->Mod_Query->clear_by('artikel',$data);
			if ($x > 0) {
				$this->set_log('Menhapus Artikel');
				$this->set_alert("<div class='alert alert-warning alert-dismissable'>
									    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									    	<strong class='fa fa-check'> Data Terhapus </strong> 
									    </div>");
				redirect('main/index/artikel/');
			}
			else{
				redirect('main/index/artikel/');
			}
		}
		public function empty_data()
		{
			$x = $this->Mod_Query->clear_all('artikel');
			if ($x > 0) {
				redirect('main/index/artikel/');
			}
			else{
				redirect('main/index/artikel/');
			}
		}
		public function update()
		{
			$by = array('id_artikel' => $this->input->post('id_artikel'));
			$data = array('judul' => $this->input->post('judul'),
						  'kategori' => $this->input->post('kategori'),
						  'isi' => $this->input->post('isi')
						);
			$x = $this->Mod_Query->renew('artikel',$data,$by);
			if ($x > 0) {
				$this->set_log('Memperbaharui Artikel');
				$this->set_alert("<div class='alert alert-info alert-dismissable'>
									    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									    	<strong class='fa fa-check'> Data Diperbaharui </strong> 
									    </div>");
				redirect('main/index/artikel/');
			}
			else{
				redirect('main/index/artikel/');
			}
		}
	}
?>