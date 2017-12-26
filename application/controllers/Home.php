<?php 
	error_reporting(1);	
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Home extends CI_Controller
	{
		
		function index($url='',$sub_url='')
		{
			$x = $this->Mod_Query->get('row','setting');
			if ($x->status=='Aktif' ) {
				//$data['poli'] = $this->Mod_Query->get('result','v_poli');
				//$data['video'] = $this->Mod_Query->get('row','files'); 
				$this->load->view('client/v_home',$data);
			}
			else{
				echo "Be Patient :) ";
			}
		}
		public function ambil_antrian()
		{
			$data  = array('id_poli' => $this->input->post('id_poli'), 
						   'no_queue' => $this->input->post('nomor'),
						   'waktu' => date('Y-m-d'),
						   'nama_ruang' => $this->input->post('nama_ruang')
						  );
			$this->Mod_Query->add('queue',$data);
			redirect('home/');
		}
		public function get_mesin()
		{
			$data['poli'] = $this->Mod_Query->get('result','v_poli');
			$this->load->view('client/v_mesin',$data);
		}
	}
?>