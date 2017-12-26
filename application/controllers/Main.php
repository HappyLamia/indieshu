<?php 	
	error_reporting(1);
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Main extends CI_Controller
	{
		
		function index($url='',$sub_url='',$param='',$param2='')
		{
			if ($this->session->userdata('logged_in')) 
			{
				if ($url=='supplier') 
				{
					$data['section'] = 'POS';
					$data['sub_section'] = 'Supplier';
					$data['page'] = 'admin/v_supplier';
				}
				elseif ($url=='diskon') 
				{
					$data['section'] = 'POS';
					$data['sub_section'] = 'Diskon';
					$data['page'] = 'admin/v_harga';
				}
				elseif ($url=='barcode') 
				{
					$data['section'] = 'POS';
					$data['sub_section'] = 'Barcode Barang';
					$data['barcode'] = $this->Mod_Query->get('result','barcode');
					$data['val'] = $sub_url;
					$data['page'] = 'admin/v_barcode';
				}
				elseif ($url=='penjualan') 
				{
					$data['section'] = 'POS';
					$data['pj'] = $this->pj_id();
					$data['id_cust'] = $this->auto_id_cust('member');
					$data['id_guest'] = $this->auto_id_cust('guest');
					if ($this->session->userdata('id_penjualan')) 
					{
						$data['sub_section'] = 'Cart';
						$data['cek'] = $this->check_coupon($this->session->userdata('id_penjualan'));
						$data['page'] = 'admin/v_cart';
					}
					else{
						if ($sub_url=="detail") 
						{
							$data['sub_section'] = 'Detail Penjualan';
							$data['page'] = 'admin/v_dt_penjualan';
							$data['cek'] = $this->check_coupon($param);
							$data['dt_struk'] = $this->Mod_Query->get_where('result','v_struk',array('id_penjualan' =>$param));
							$data['dt_tr'] = $this->Mod_Query->get_where('result','v_treatment',array('id_penjualan' =>$param));
							$data['dtp'] = $param;
						} 
						else 
						{
							$data['sub_section'] = 'Penjualan';
							$data['page'] = 'admin/v_penjualan';	
						}
					}
				}
				elseif ($url=='pembelian')
				{
					$data['section'] = 'POS';
					if ($sub_url=="detail") {
						$data['sub_section'] = 'Detail Pembelian';
						$data['page'] = 'admin/v_dt_pembelian';
						$data['dt_supplier'] = $this->Mod_Query->get_where('row','supplier',array('id_supplier' =>$param2));
						$data['dt_pembelian'] = $this->Mod_Query->get_where('result','dt_pembelian',array('id_pembelian' =>$param));
						$data['invoice'] = $this->Mod_Query->get_where('row','pembelian',array('id_pembelian' =>$param));
					} else {
						$data['sub_section'] = 'Pembelian';
						$data['pb'] = $this->pb_id();
						$data['sc'] = $this->get_sales();
						$data['page'] = 'admin/v_pembelian';
					}
				}
				elseif ($url=='resep')
				{
					$data['section'] = 'Klinik';
					$data['sub_section'] = 'Penyakit & Resep';
					$data['penyakit'] = $this->Mod_Query->get('result','penyakit');
					$data['page'] = 'admin/v_resep';
				}
				elseif ($url=='barang') 
				{
					if ($sub_url=='detail') {
						$data['section'] = 'POS';
						$data['sub_section'] = 'Detail Barang';
						$data['dtl_barang'] = $this->Mod_Query->get_where('result','v_stok',array('id_barang'=>$param));
						$data['dt_satuan'] = $this->Mod_Query->get_where('result','barang',array('id_barang'=>$param));
						$data['page'] = 'admin/v_dt_barang';
					} 
					else 
					{
						$data['section'] = 'POS';
						$data['sub_section'] = 'Barang';
						$data['page'] = 'admin/v_barang';
					}
				}
				elseif ($url=='pasien') 
				{
					$data['id'] = $this->auto_id();
					$data['section'] = 'Rekam Medis';
					$data['sub_section'] = 'Data Pasien';
					if ($this->session->userdata('id_pasien')) {
						$data['profil_pasien'] = $this->profil_pasien($this->session->userdata('id_pasien'));
						$data['rm_umum'] = $this->rm_id('rm_umum','UMUM');
						$data['rm_skin'] = $this->rm_id('rm_skin','SKIN');
						$data['rm_slim'] = $this->rm_id('rm_slim','SLIM');
						$data['rm_files'] = $this->Mod_Query->get_where('result','rm_files',array('id_pasien'=>$this->session->userdata('id_pasien')));
						$data['page'] = 'admin/v_dt_pasien';
					}
					else{
						$data['page'] = 'admin/v_pasien';
					}
				}
				elseif ($url=='rm') 
				{
					if ($sub_url=="") {
						$data['id'] = 0;
						$data['rmu'] = $this->Mod_Query->get('result','rm_umum');
						$data['rmsc'] = $this->Mod_Query->get('result','rm_skin');
						$data['rms'] = $this->Mod_Query->get('result','rm_slim');
					} elseif ($sub_url=="umum") {
						$data['id'] = 1;
						$data['rm'] = $this->Mod_Query->get('row','rm_umum',array('id_rm' => $param));
					} elseif ($sub_url=="skin") {
						$data['id'] = 2;
						$data['rm'] = $this->Mod_Query->get('row','rm_skin',array('id_rm' => $param));
					} elseif ($sub_url=="slim") {
						$data['id'] = 3;
						$data['rm'] = $this->Mod_Query->get('row','rm_slim',array('id_rm' => $param));
					}
					$data['pasien_name'] = $this->profil_pasien($param2);
					$data['section'] = 'Rekam Medis';
					$data['sub_section'] = '';
					$data['page'] = 'admin/v_data_rm';
				}
				elseif ($url=='cetak_kartu') 
				{
					$data['section'] = 'Pasien';
					$data['sub_section'] = 'Kartu Anggota';
					if ($sub_url=="") {
						redirect('main/index/pasien');
					} else {
						$data['cetak_pasien'] = $this->profil_pasien($sub_url);
					}
					$data['page'] = 'admin/v_card';
				}
				elseif ($url=='intro') 
				{
					$data['section'] = 'Manage Intro';
					$data['sub_section'] = '';
					$data['page'] = 'admin/v_intro';
				}
				elseif ($url=='ruang') 
				{
					$data['section'] = 'Manage Ruang';
					$data['sub_section'] = '';
					$data['page'] = 'admin/v_ruang';
				}
				elseif ($url=='users') 
				{
					if ($this->session->userdata('level')=='Super Admin') {
						$data['occup'] = $this->Mod_Query->get('result','jabatan');
						$data['users'] = $this->Mod_Query->get_where('result','user',array('level !=' => 'Super Admin','username !='=> 'Admin System'));
						$data['section'] = 'Manage Users';
						$data['sub_section'] = '';
						$data['page'] = 'admin/v_users';
					} else {
						$data['section'] = 'Manage Users';
						$data['sub_section'] = 'Restricted Area';
						$data['page'] = 'admin/v_restrict';
					}
					
				}
				elseif ($url=='poli') 
				{
					$data['section'] = 'Manage Poli';
					$data['sub_section'] = '';
					$data['poli'] = $this->Mod_Query->get('result','poli');
					$data['page'] = 'admin/v_poli';
				}
				elseif ($url=='service') 
				{
					$data['section'] = 'Service';
					$data['sub_section'] = '';
					//$data['sisa'] = $this->hitung_sisa();
					//$data['queue'] = $this->Mod_Query->get_where('result','queue',array('status' => 'Menunggu'));
					//$data['served_queue'] = $this->Mod_Query->get_where('result','queue',array('status' => 'Dilayani'));
					//$data['serve'] = $this->Mod_Query->get_where('row','queue',array('status' => 'Menunggu'),1);
					$data['served'] = $this->Mod_Query->get_where('row','queue',array('status' => 'Dilayani'),1,'id_queue','DESC');
					$data['page'] = 'admin/v_services';
				}
				elseif ($url=='analysis') 
				{
					$data['section'] = 'Market Basket Analysis';
					$data['sub_section'] = 'Algoritma Apriori';
					$data['persenx'] = 20;
					$data['page'] = 'admin/v_mba';
				}
				elseif ($url=='laporan_pembelian')
				{
					$data['section'] = 'Laporan';
					$data['sub_section'] = 'Laporan Pembelian';
					if ($sub_url=="") {
						$data['rpt'] = 0;
					} else {
						$data['rpt'] = $this->get_report_pb($sub_url);
					}
					$data['page'] = 'admin/v_report_pembelian';
				}
				elseif ($url=='laporan_penjualan')
				{
					$data['section'] = 'Laporan';
					$data['sub_section'] = 'Laporan Penjualan';
					$data['pj'] = $this->Mod_Query->get('result','v_diskon_pembelian');
					$data['dt_pj'] = $this->Mod_Query->get('result','v_struk');
					$data['dt_tr'] = $this->Mod_Query->get('result','v_treatment');
					if ($sub_url=="") {
						$data['rpt'] = 0;
					} else {
						$data['rpt'] = $this->get_report_pj($sub_url);
					}
					//$data['page'] = 'admin/v_report_penjualan';
					$data['page'] = 'v_test';
				}
				elseif ($url=='setting') 
				{
					if ($this->session->userdata('level')=='Super Admin') {
						$data['section'] = 'Pengaturan';
						$data['sub_section'] = '';
						$data['page'] = 'admin/v_setting';
					}
					else{
						$data['section'] = 'Pengaturan';
						$data['sub_section'] = 'Restricted Area';
						$data['page'] = 'admin/v_restrict';
					}
					
				}
				elseif ($url=='penggajian') 
				{
					$data['section'] = 'Penggajian';
					$data['sub_section'] = '';
					$data['honor'] = $this->Mod_Query->get('result','v_gaji');
					$data['page'] = 'admin/v_penggajian';
				}
				elseif ($url=='artikel') 
				{
					$data['section'] = 'Artikel';
					if ($sub_url=='detail') {
						$data['st'] = 1;
						//$data['art'] = $this->Mod_Query->get_where('row','article',array('id_article' => $param));
						$data['sub_section'] = 'Detail Artikel';
					}
					else{
						$data['art'] = $this->Mod_Query->get('result','artikel');
						$data['st'] = 0;
						$data['sub_section'] = 'Manage Artikel';
					}
					$data['page'] = 'admin/v_article';
					
				}
				elseif ($url=='gallery') 
				{
					$data['section'] = 'Gallery';
					if ($sub_url==0) {
						$data['id'] = 0;
						$data['sub_section'] = 'Manage Gallery';
					}
					else{
						$data['id'] = 1;
						$data['sub_section'] ='Album';	
					}
					$data['album'] = $this->data_gallery('album');
					$data['all'] = $this->data_gallery('all');
					$data['by_album'] = $this->data_gallery($param);
					$data['page'] = 'admin/v_gallery';
				}
				elseif ($url=='treatment') 
				{
					$data['section'] = 'Treatment';
					if ($sub_url=='detail') {
						$data['st'] = 1;
						//$data['art'] = $this->Mod_Query->get_where('row','article',array('id_article' => $param));
						$data['sub_section'] = 'Detail Artikel';
					}
					else{
						$data['st'] = 0;
						$data['sub_section'] = 'Manage Artikel';
					}
					$data['page'] = 'admin/v_treatment';
					
				}
				elseif ($url=='dokter') 
				{
					$data['section'] = 'Dokter';
					$data['dokter'] = $this->Mod_Query->get('result','dokter');
					$data['page'] = 'admin/v_dokter';
				}
				elseif ($url=='diskon') 
				{
					$data['section'] = 'POS';
					$data['sub_section'] = 'Diskon';
					$data['page'] = 'admin/v_harga';
				}
				else{
					if ($this->session->userdata('level')=="Super Admin"){
						$data['log'] = $this->Mod_Query->get('result','v_log');
						$data['n_member'] = $this->Mod_Query->get('num_rows','member');
						$data['n_stok'] = $this->Mod_Query->get('num_rows','v_stok');
						$data['n_penjualan'] = $this->Mod_Query->get('num_rows','penjualan');
						$data['earn'] = $this->Mod_Query->get('result','total_pendapatan_2');
						$data['section'] = 'Dashboard';
						$data['sub_section'] = '';
						$data['page'] = 'admin/v_dashboard';
					}elseif($this->session->userdata('level')=="Kasir"){
						redirect('main/index/penjualan');
					}elseif($this->session->userdata('level')=="Administrasi"){
						redirect('main/index/pembelian');
					}elseif($this->session->userdata('level')=="Apoteker"){
						redirect('main/index/resep');
					}elseif($this->session->userdata('level')=="Beautician"){
						redirect('main/index/treatment');
					}else{
						redirect('main/logout');
					}
				}
				$data['trt'] = $this->Mod_Query->get('result','treatment');
				$data['pasien'] = $this->pasien();
				$data['birthday'] = $this->Mod_Query->get('result','coupon');
				$data['member'] = $this->Mod_Query->get('result','member');
				$data['bd_now'] = $this->Mod_Query->get_where('result','birthday',array('bd' => 'TODAY'));
				$data['bd_tmr'] = $this->Mod_Query->get_where('result','birthday',array('bd' => 'TOMORROW'));
				$data['bd_ytd'] = $this->Mod_Query->get_where('result','birthday',array('bd' => 'YESTERDAY'));
				$data['count_birthday'] = $this->Mod_Query->get_where('num_rows','birthday',array('bd' => 'TODAY'));
				$data['dc'] = $this->Mod_Query->get('row','diskon_coupon');
				$data['dpb'] = $this->Mod_Query->get('row','diskon_pembelian');
				$data['db'] = $this->Mod_Query->get('result','v_diskon_barang');
				$data['customer'] = $this->Mod_Query->get_where('result','customer',array('status' =>'Aktif'));
				$data['penjualan'] = $this->Mod_Query->get('result','penjualan');
				$data['pembelian'] = $this->Mod_Query->get('result','pembelian');
				$data['satuan'] = $this->Mod_Query->get('result','satuan');
				$data['h_satuan'] = $this->get_satuan('Level 1');
				$data['m_satuan'] = $this->get_satuan('Level 2');
				$data['l_satuan'] = $this->get_satuan('Level 3');
				$data['supplier'] = $this->Mod_Query->get('result','supplier');
				$data['barang'] = $this->Mod_Query->get('result','v_stok');
				$data['ruang'] = $this->Mod_Query->get('result','ruang');
				$data['about'] = $this->Mod_Query->get('result','setting');
				$data['ctrl'] = $this->Mod_Query->get('row','hak_akses');
				$data['bio'] = $this->bio($this->session->userdata('username'));
				$data['kota'] = $this->Mod_Query->get('result','kabupaten','','Nama','ASC');
				$this->load->view('admin/v_home',$data);
			}
			else{
				$data['about'] = $this->Mod_Query->get('result','setting');
				$this->load->view('v_login',$data);
			}
			
		}
		public function set_log($value)
		{
			$data_log = array('id_user' => $this->session->userdata('id_user'),
								 'aktifitas' => $value
								);
			$this->Mod_Query->add('log',$data_log);
		}
		public function set_alert($value)
		{
			$this->session->set_flashdata('login_alert', $value);
		}
		public function login()
		{
			$data = array('username' => $this->input->post('username'),
						  'password' => md5($this->input->post('password'))
				         );
			$x = $this->Mod_Query->get_where('num_rows','user',$data);
			if ($x > 0) {
				$row = $this->Mod_Query->get_where('row','user',$data);
				$session = array('logged_in' => TRUE,
								 'username' => $row->username,
								 'level' => $row->level,
								 'id_user' => $row->id_user
								);
				$this->session->set_userdata($session);
				$this->set_log('Login');
				redirect('main/');
			}
			else{
				$this->set_alert("<div class='alert alert-warning alert-dismissable'>
						    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						    <strong>Warning!</strong> Invalid Account , Please Input The Correct Account
						  </div>");
				redirect('main/');
			}
		}
		public function bio($value)
		{
			$data = array('username' => $value);
			$x = $this->Mod_Query->get_where('result','user',$data);
			return $x;
		}
		public function logout()
		{
			if ($this->session->userdata('logged_in')) {
				$this->set_log('Logout');
				$this->session->sess_destroy();
				redirect('main/');
			} else {
				redirect('main/');
			}
		}
		public function auto_id()
		{
			$query1 = "SELECT COUNT(id_pasien) + 1 AS no FROM pasien WHERE MID(id_pasien,3,4) = YEAR(NOW())";
			$x = $this->Mod_Query->get_query('row',$query1);
			$query2 = "SELECT CONCAT('PS',YEAR(NOW()),0,0,0,$x->no) AS id";
			$y = $this->Mod_Query->get_query('row',$query2);
			return $y->id;
		}
		public function auto_id_cust($value)
		{
			if ($value=='member') {
				$query1 = "SELECT COUNT(id_customer) + 1 AS no FROM customer";
			}
			else{
				$query1 = "SELECT COUNT(id_customer) + 1 AS no FROM penjualan WHERE LEFT(id_customer,5) = 'GUEST'";
			}
			$x = $this->Mod_Query->get_query('row',$query1);
			if ($value=='member') {
				$query2 = "SELECT CONCAT('CS-',0,0,$x->no) AS id";
			}
			else{
				$query2 = "SELECT CONCAT('GUEST-',0,0,$x->no) AS id";
			}
			$y = $this->Mod_Query->get_query('row',$query2);
			return $y->id;
		}
		public function rm_id($table,$type)
		{
			$query1 = "SELECT COUNT(id_rm) + 1 AS no FROM $table WHERE MID(id_rm,9,10) = DATE(NOW())";
			$x = $this->Mod_Query->get_query('row',$query1);
			$query2 = "SELECT CONCAT('RM-$type-',DATE(NOW()),0,0,0,$x->no) AS id";
			$y = $this->Mod_Query->get_query('row',$query2);
			return $y->id;
		}
		public function pb_id()
		{
			$query1 = "SELECT COUNT(id_pembelian) + 1 AS no FROM pembelian WHERE DATE(tgl_pembelian) = DATE(NOW())";
			$x = $this->Mod_Query->get_query('row',$query1);
			$query2 = "SELECT CONCAT('PB-',DATE(NOW()),'-',0,0,0,$x->no) AS id";
			$y = $this->Mod_Query->get_query('row',$query2);
			return $y->id;
		}
		public function pj_id()
		{
			$query1 = "SELECT COUNT(id_penjualan) + 1 AS no FROM penjualan WHERE DATE(tgl_penjualan) = DATE(NOW())";
			$x = $this->Mod_Query->get_query('row',$query1);
			$query2 = "SELECT CONCAT('TR-',DATE(NOW()),'-',0,0,0,$x->no) AS id";
			$y = $this->Mod_Query->get_query('row',$query2);
			return $y->id;
		}
		public function profil_pasien($value)
		{
			$data = array('id_pasien' => $value);
			$x = $this->Mod_Query->get_where('result','pasien',$data);
			return $x;
		}
		public function pasien()
		{
			$data = array('status' => 'Aktif');
			$x = $this->Mod_Query->get_where('result','pasien',$data);
			return $x;
		}
		/*public function hitung_sisa()
		{
			$query = "SELECT COUNT(id_queue) AS jumlah FROM queue WHERE status = 'Menunggu' AND DATE(waktu) = DATE(NOW()) ";
			$x = $this->Mod_Query->get_query('row',$query);
			return $x->jumlah;
		}*/
		public function get_satuan($value)
		{
			$data = array('level_satuan' => $value);
			$x = $this->Mod_Query->get_where('result','satuan',$data);
			return $x;
		}
		public function check_coupon($value)
		{
			$data = array('id_coupon' => $value);
			$x = $this->Mod_Query->get_where('num_rows','coupon',$data);
			if ($x > 0) {
				return 1;
			} else {
				return 0;
			}
		}
		public function get_sales()
		{
			$data = array('id_pembelian' => $this->session->userdata('id_pembelian'));
			$x = $this->Mod_Query->get_where('result','v_pembelian',$data);
			return $x;
		}
		public function get_report_pb($value)
		{
			if ($value=="periodik") {
					$by = date('Y-m-d',strtotime($this->input->post('dari')));
					$to = date('Y-m-d',strtotime($this->input->post('sampai')));
					$supplier = $this->input->post('id_supplier');
					if ($supplier=="semua") {
						$query = "SELECT * FROM v_pembelian WHERE tgl BETWEEN '$by' AND '$to'";
					} else {
						$query = "SELECT * FROM v_pembelian WHERE tgl BETWEEN '$by' AND '$to' AND id_supplier = '$supplier'";
					}
					$x = $this->Mod_Query->get_query('result',$query);
			} elseif($value=="bln") {
				$supplier = $this->input->post('id_supplier');
				if ($supplier=="semua") {
					$data = array('bln' => $this->input->post('bulan'));
				} else {
					$data = array('bln' => $this->input->post('bulan'),
								  'id_supplier' => $supplier
								 );
				}
				$x = $this->Mod_Query->get_where('result','v_pembelian',$data);
			} elseif ($value=="thn") {
				$supplier = $this->input->post('id_supplier');
				if ($supplier=="semua") {
					$data = array('thn' => $this->input->post('tahun'));
				} else {
					$data = array('thn' => $this->input->post('tahun'),
								  'id_supplier' => $supplier
								 );
				}
				$x = $this->Mod_Query->get_where('result','v_pembelian',$data);
			}
			else{
				$x = 0;
			}
			return $x;
		}
		public function get_report_pj($value)
		{
			if ($value=="periodik") {
					$by = date('Y-m-d',strtotime($this->input->post('dari')));
					$to = date('Y-m-d',strtotime($this->input->post('sampai')));
					$customer = $this->input->post('id_customer');
					if ($customer=="semua") {
						$query = "SELECT * FROM v_struk WHERE tgl BETWEEN '$by' AND '$to'";
					} else {
						$query = "SELECT * FROM v_struk WHERE tgl BETWEEN '$by' AND '$to' AND id_customer = '$customer'";
					}
					$x = $this->Mod_Query->get_query('result',$query);
			} elseif($value=="bln") {
				$customer = $this->input->post('id_customer');
				if ($customer=="semua") {
					$data = array('bln' => $this->input->post('bulan'));
				} else {
					$data = array('bln' => $this->input->post('bulan'),
								  'id_customer' => $customer
								 );
				}
				$x = $this->Mod_Query->get_where('result','v_struk',$data);
			} elseif ($value=="thn") {
				$customer = $this->input->post('id_customer');
				if ($customer=="semua") {
					$data = array('thn' => $this->input->post('tahun'));
				} else {
					$data = array('thn' => $this->input->post('tahun'),
								  'id_customer' => $customer
								 );
				}
				$x = $this->Mod_Query->get_where('result','v_struk',$data);
			}
			else{
				$x = 0;
			}
			return $x;
		}
		public function data_gallery($id='')
		{
			if ($id=='all') 
			{
				$x = $this->Mod_Query->get('result','files');
			}
			elseif ($id=='album') 
			{
				$query = "SELECT * FROM files GROUP BY jenis";
				$x = $this->Mod_Query->get_query('result',$query);
			}
			else
			{
				$data = array('jenis' => $id);
				$x = $this->Mod_Query->get_where('result','files',$data);
			}
			return $x;
		}
	}
?>