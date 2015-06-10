<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title']="Beranda - Portal Informasi Maharu UBAYA";
        
        if (!$this->session->userdata('role')) // not set
        {
            $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Lakukan proses login dahulu.</strong> "
                        . "</div>";
            $this->session->set_flashdata('warning',$warning);
            redirect('/admin/login', 'location'); 
        }
        else  
        {
            $this->session->set_flashdata('home',true); 
            
            $this->load->view('back/b_header',$data);
            $this->load->view('back/b_backend');
            $this->load->view('back/b_footer'); 
        }
        
    }

    public function logout() {
        $this->session->sess_destroy();

        redirect('/admin', 'location');
    }

    public function login() {
        if ($this->input->post('submit')) {
            $this->load->model('model_admin');

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            $this->form_validation->set_message('required', '%s harus diisi.');

            if ($this->form_validation->run() == FALSE) {
                $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>", "</strong> "
                        . "</div>");
                $this->session->set_flashdata('warning', validation_errors());
                redirect('/admin/login', 'location');
            } else {
                // check account, etc
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $admincheck = $this->model_admin->check_admin($username, $password);
                $membercheck = $this->model_admin->check_member($username, $password);    
                
                if ($admincheck){
                    $loginarray = array(
                        'username' => $admincheck->username,
                        'role' => 'Administrator'
                    );
                    $this->session->set_userdata($loginarray);

                    // redirect to contact page + notification
                    $this->session->set_flashdata('home', true);
                    redirect('/admin/login', 'location');
                }
                else if ($membercheck){
                    $loginarray = array(
                        'username' => $membercheck->username,
                        'fakultas' => $membercheck->nama,
                        'role' => 'Member'
                    );
                    $this->session->set_userdata($loginarray);

                    // redirect to contact page + notification
                    $this->session->set_flashdata('home', true);
                    redirect('/admin/login', 'location');
                }
                else {
                    $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Username atau Password salah. Silahkan cek lagi.</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning', $warning);
                    redirect('/admin/login', 'location');
                }
            }
        }
        else
        {
            if($this->session->userdata('role')) redirect('/guidance/home', 'location');
            $data['title'] = "Masuk - Portal Informasi Mahasiswa Baru";
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            $this->load->view('back/b_login',$data);
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */