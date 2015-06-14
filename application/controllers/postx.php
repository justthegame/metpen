<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Postx extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('security');
		$this->load->helper('url');
		$this->load->model('model_post');
		$this->load->library('pagination');
		$this->load->model('model_fakultas');
	}


	public function bacaPost($offset=0)
	{
		$data["header"] = $this->model_fakultas->ambil_semua_fakultas();
		$data["a"] = $this->model_post->getallpost($offset,6);


		$config['base_url'] = 
				base_url('index.php/postx/bacaPost');
		$config['total_rows'] = 100;
		$config['per_page'] = 6;
		$config['num_links'] = 5;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['first_link'] = '&nbsp;<i class="fa fa-reply"></i>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);  
		$data['paging'] = $this->pagination->create_links();

		$this->load->view("v_header",$data);
		$this->load->view("v_post",$data);
		$this->load->view("v_footer");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */