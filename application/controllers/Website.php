<?php 
	/**
	* 
	*/
	class Website extends CI_Controller
	{
		public function get_desc()
		{
			$x = $this->Mod_Query->get('result','setting');
			$data  = array();
			foreach ($x as $key) {
				array_push($data,$key);
			}
			echo json_encode($data);
		}
		public function get_artikel($value='',$param='')
		{
			if ($value=="") {
				$x = $this->Mod_Query->get('result','artikel');
			}
			elseif ($value=="kategori") {
				$x = $this->Mod_Query->get_where('result','artikel',array('kategori' => $param));
			}
			else{
				$x = $this->Mod_Query->get_where('result','artikel',array('id_artikel' => $value));
			}
			$data  = array();
			foreach ($x as $key) {
				array_push($data,$key);
			}
			echo json_encode($data);
		}
		public function get_treatment()
		{
			$x = $this->Mod_Query->get('result','treatment');
			$data  = array();
			foreach ($x as $key) {
				array_push($data,$key);
			}
			echo json_encode($data);
		}
		public function get_dokter()
		{
			$x = $this->Mod_Query->get('result','dokter');
			$data  = array();
			foreach ($x as $key) {
				array_push($data,$key);
			}
			echo json_encode($data);
		}
		public function get_gallery($id='')
		{
			if ($id=='all') 
			{
				$x = $this->Mod_Query->get('result','files');
				$data  = array();
				foreach ($x as $key) {
					array_push($data,$key);
				}
				echo json_encode($data);
			}
			elseif ($id=='album') 
			{
				$query = "SELECT * FROM files GROUP BY jenis";
				$x = $this->Mod_Query->get_query('result',$query);
				$data  = array();
				foreach ($x as $key) {
					array_push($data,$key);
				}
				echo json_encode($data);
			}
			else
			{
				$data = array('jenis' => $id);
				$x = $this->Mod_Query->get_where('result','files',$data);
				$data  = array();
				foreach ($x as $key) {
					array_push($data,$key);
				}
				echo json_encode($data);
			}
			return $x;
		}
	}
?>