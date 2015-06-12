<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

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

    public function lihat(){
        if(!($this->session->userdata('role'))) redirect ('admin/login','location');
        $data['title']="Daftar User - Portal Informasi Mahasiswa Baru";
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        $this->load->model('model_user');
        $data['user'] = $this->model_user->ambil_semua_user();
        $this->session->set_flashdata('user',true); 
        $this->load->view('back/b_header',$data);
        $this->load->view('back/b_lihat_user');
        $this->load->view('back/b_footer'); 
    }
    
    public function tambah(){
        if ($this->input->post('submit')) {
            $this->load->model('model_user');

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|matches[ulangPassword]');
            $this->form_validation->set_rules('ulangPassword', 'Ulang Password', 'required');
            $this->form_validation->set_rules('idFakultas', 'ID Fakultas', 'required');

            $this->form_validation->set_message('required', '%s harus diisi.');
            $this->form_validation->set_message('matches[repassword]','Password yang diulang tidak sesuai.');

            if ($this->form_validation->run() == FALSE) {
                $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>", "</strong> "
                        . "</div>");
                $this->session->set_flashdata('warning', validation_errors());
                redirect('/user/tambah', 'location');
            } else {
                // tambah user
                $username = $this->input->post('username');
                $password = md5($this->input->post('password'));
                $idFakultas = $this->input->post('idFakultas');

                $status = $this->model_user->tambah_user($username,$password,$idFakultas);

                if ($status == "success")
                {
                    $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>User berhasil ditambahkan.</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning',$warning);
                    redirect('/user/tambah', 'location');
                }
                else if ($status == "connection_failed")
                {
                    $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Terjadi kesalahan, silahkan coba lagi.</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning',$warning);
                    redirect('/user/tambah', 'location');
                }
            }
        }
        else
        {
            $this->session->set_flashdata('user',true); 
            $this->load->model('model_fakultas');
            $data['title']="Tambah User - Portal Informasi Maharu UBAYA";
            $data['fakultas']=$this->model_fakultas->ambil_semua_fakultas();
            
            $this->load->view('back/b_header',$data);
            $this->load->view('back/b_tambah_user');
            $this->load->view('back/b_footer'); 
        }
    }
    
    function hapus($username){
        $this->load->model('model_user');
        
        $status = $this->model_user->hapus_user($username);
        if ($status == "success"){
            $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Hak akses materi telah sukses dihapus</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/user/lihat', 'location');
        }
        else if ($status == "connection_error"){
            $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Koneksi bermasalah. Silahkan coba lagi</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/user/lihat', 'location');
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */