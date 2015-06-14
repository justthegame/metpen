<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwalx extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('security');
		$this->load->helper('url');
		$this->load->model('model_jadwal');
		$this->load->library('pagination');
		$this->load->model('model_fakultas');
	}
	 
	public function index($offset=0)
	{
		$data["header"] = $this->model_fakultas->ambil_semua_fakultas();
		$data["a"] = $this->model_jadwal->getalljadwal($offset,6);


		$this->load->view("v_header",$data);
		$this->load->view("v_detailacara",$data);
		$this->load->view("v_footer");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */