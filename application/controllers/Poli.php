<?php 
	error_reporting(1);
	/**
	* 
	*/
	class Poli extends CI_Controller
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
			$this->session->set_flashdata('poli_alert', $value);
		}
		public function add_poli()
		{
			if ($this->input->post('type')=='merge') 
			{
				$in_poli = $this->input->post('id_poli');
				$kd_ruang =  $this->input->post('kode_ruang');
				$id = $in_poli.$kd_ruang;
				$data = array('id_poli' => $id, 
						   	  'nama_poli' => $this->input->post('nama_poli'),
						   	  'kode_ruang' => $kd_ruang,
						   	  'type' => $this->input->post('type')
				          	);
				$x = $this->Mod_Query->add('poli',$data);
				$session = array('id' => $in_poli,
								 'tipe' => $this->input->post('type')
								);
				$this->session->set_userdata($session);
				$this->set_log('Menambah Poli');
				$this->set_alert("<div class='alert alert-info alert-dismissable'>
								    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								    	<strong class='fa fa-check'> Data Telah Dihapus</strong> 
								    </div>");
				redirect('main/index/poli/');
			}
			else
			{
				$data = array('id_poli' => $this->input->post('id_poli'), 
						   	  'nama_poli' => $this->input->post('nama_poli'),
						   	  'kode_ruang' => $this->input->post('kode_ruang'),
						   	  'type' => $this->input->post('type')
				          	);
				$x = $this->Mod_Query->add('poli',$data);
				$this->set_log('Menambah Poli');
				$this->set_alert("<div class='alert alert-info alert-dismissable'>
								    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								    	<strong class='fa fa-check'> Data Telah Dihapus</strong> 
								    </div>");
				redirect('main/index/poli/');
			}
		}
		public function add_merge()
		{
			$in_poli = $this->session->userdata('id');
			$kd_ruang =  $this->input->post('kode_ruang');
			$id = $in_poli.$kd_ruang;
			$data = array('id_poli' => $id, 
						  'nama_poli' => $this->input->post('nama_poli'),
						  'kode_ruang' => $kd_ruang,
						  'type' => $this->session->userdata('tipe')
				         );
			$x = $this->Mod_Query->add('poli',$data);
			$this->session->unset_userdata('tipe');
			redirect('main/index/poli/');
		}
		public function remove_poli($value)
		{
			$data = array('id_poli' => $value);
			$x = $this->Mod_Query->clear_by('poli',$data);
			$this->set_log('Menghapus Poli');
			$this->set_alert("<div class='alert alert-info alert-dismissable'>
							    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							    	<strong class='fa fa-check'> Data Telah Dihapus</strong> 
							    </div>");
			redirect('main/index/poli/');
		}
		public function hapus()
		{
			$in_poli = $this->session->userdata('id');
			$kd_ruang =  $this->input->post('kode_ruang');
			$id = $in_poli.$kd_ruang;
			$data = array('id_poli' => $id, 
						  'nama_poli' => $this->input->post('nama_poli'),
						  'kode_ruang' => $kd_ruang,
						  'type' => $this->session->userdata('tipe')
				         );
			$x = $this->Mod_Query->add('poli',$data);
			$this->session->unset_userdata('tipe');
			redirect('main/index/poli/');
		}
		public function layani()
		{
			$by = array('id_queue' => $this->input->post('id_queue'));
			$data = array('status' => $this->input->post('status'));
			$this->Mod_Query->renew('queue',$data,$by);
			$this->set_log('Melayani Antrian');
			$this->set_alert("<div class='alert alert-info alert-dismissable'>
							    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							    	<strong class='fa fa-check'> Antrian Telah Dilayani</strong> 
							    </div>");
			redirect('main/index/service/');
		}
		public function antrian()
		{
			$queue = $this->Mod_Query->get_where('result','queue',array('status' => 'Menunggu','waktu'=>date('Y-m-d')),"",'no_queue','ASC');
			echo "<table class='table table-stripped table-bordered'>
					<thead>
						<tr>
							<th>No Urut</th><th>Poli Antrian</th><th>Ruang</th>
						</tr>
					</thead>
					<tbody>";
					foreach ($queue as $key) {
						echo "<tr>
								<td> $key->no_queue </td>
								<td> $key->id_poli </td>
								<td> $key->nama_ruang </td>
							</tr>";
					}
			echo "</tbody>
				</table>
			";
		}
		public function sisa_antrian()
		{
			$query = "SELECT COUNT(id_queue) AS jumlah FROM queue WHERE status = 'Menunggu' AND DATE(waktu) = DATE(NOW()) ";
			$x = $this->Mod_Query->get_query('row',$query);
			echo $x->jumlah;
		}
		public function serve_queue()
		{
			$data['serve'] = $this->Mod_Query->get_where('row','queue',array('status' => 'Menunggu'),1);
			$this->load->view('admin/v_panggil',$data);
		}
		public function served_queue()
		{
			$queue = $this->Mod_Query->get('result','served_queue');
			echo "<table class='table table-stripped table-bordered'>
					<thead>
						<tr>
							<th>No Urut</th><th>Poli Antrian</th><th>Ruang</th>
						</tr>
					</thead>
					<tbody>";
					foreach ($queue as $key) {
						echo "<tr>
								<td> $key->no_queue </td>
								<td> $key->id_poli </td>
								<td> $key->nama_ruang </td>
							</tr>";
					}
			echo "</tbody>
				</table>
			";
		}
		public function current_queue()
		{
			$key = $this->Mod_Query->get_where('row','queue',array('status' => 'Menunggu'),1,'id_queue','DESC');
			echo "<p>$key->no_queue</p>
				  <p>$key->nama_ruang</p>
				  <p>$key->waktu</p>";
		}
	}
?>