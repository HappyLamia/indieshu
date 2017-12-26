<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$i = 0;
		while ($i <= 10) {
			echo $i."<br>";
			$i++;
		} // while
		echo " Contoh Perulangan While Do ... <br><br><br>";
		for ($x=0; $x <= 10; $x++) { 
			echo $x."<br>";
		} // for
		echo " Contoh Perulangan For ... <br><br><br>";
		$a = 0;
		do {
			echo $a."<br>";
			$a++;
		} while ($a <= 10);
		// Do ... While
		echo " Contoh Perulangan Do While ... <br><br><br>";
	}
}
