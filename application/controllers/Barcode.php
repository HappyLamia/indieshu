<?php 
 /**
 * 
 */
 class Barcode extends CI_Controller
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
		$this->session->set_flashdata('barcode_alert', $value);
	}
 	public function add_barcode()
 	{
 		$data = array('nilai'=>$this->input->post('bar'),
 					  'nama_barang'=>$this->input->post('nama_barang')
 					  );
 		$x = $this->Mod_Query->add('barcode',$data);
 		if ($x > 0) {
 			$this->set_log('Menambah Barcode');
			$this->set_alert("<div class='alert alert-info alert-dismissable'>
								    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								    	<strong class='fa fa-check'> Barcode Telah Ditambah </strong> 
								    </div>");
 			redirect('main/index/barcode');
 		}
 		else{
 			redirect('main/index/barcode');
 		}
 	}
 	public function delete_barcode($value)
 	{
 		$data = array('nilai'=>$value);
 		$x = $this->Mod_Query->clear_by('barcode',$data);
 		if ($x > 0) {
 			$this->set_log('Menghapus Barcode');
			$this->set_alert("<div class='alert alert-warning alert-dismissable'>
								    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								    	<strong class='fa fa-check'> Barcode Telah Dihapus </strong> 
								    </div>");
 			redirect('main/index/barcode');
 		}
 		else{
 			redirect('main/index/barcode');
 		}
 	}
 }
?>