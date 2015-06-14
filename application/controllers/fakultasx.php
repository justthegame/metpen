<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fakultasx extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('security');
		$this->load->helper('url');
		$this->load->model('model_fakultas');
	}

	public function bacaFakultas($id=1)
	{
		$data["header"] = $this->model_fakultas->ambil_semua_fakultas();
		$data["fakultas"] = $this->model_fakultas->ambil_fakultas($id);


		$this->load->view("v_header",$data);
		$this->load->view("v_detailfakultas",$data);
		$this->load->view("v_footer");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */