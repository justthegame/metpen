<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kostx extends CI_Controller {

		function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('security');
		$this->load->helper('url');
		$this->load->model('model_kost');
		$this->load->library('pagination');
		$this->load->model('model_fakultas');
	}

	public function index()
	{
		$data["header"] = $this->model_fakultas->ambil_semua_fakultas();
		$data["kost"] = $this->model_kost->ambil_semua_kost();
		$this->load->view("v_header",$data);
		$this->load->view("v_kost",$data);
		$this->load->view("v_footer");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */