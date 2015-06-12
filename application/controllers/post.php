<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Post extends CI_Controller {

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
        $data['title']="Daftar Post - Portal Informasi Mahasiswa Baru";
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        $this->load->model('model_post');
        $data['post'] = $this->model_post->ambil_semua_post();
        $this->session->set_flashdata('post',true); 
        
        $this->load->view('back/b_header',$data);
        $this->load->view('back/b_lihat_post');
        $this->load->view('back/b_footer'); 
    }

    function tambah(){
        if ($this->input->post('submit')) {
            $this->load->model('model_post');

            $this->form_validation->set_rules('judul', 'Judul', 'required');
            $this->form_validation->set_rules('isi', 'Deskripsi', 'required');
            $this->form_validation->set_rules('idFakultas', 'ID Fakultas', 'required');

            $this->form_validation->set_message('required', '%s harus diisi.');

            if ($this->form_validation->run() == FALSE) {
                $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>", "</strong> "
                        . "</div>");
                $this->session->set_flashdata('warning', validation_errors());
                redirect('/post/tambah', 'location');
            } else {
                
                $judul = $this->input->post('judul');
                $isi = $this->input->post('isi');
                $idFakultas = $this->input->post('idFakultas');

                $status = $this->model_post->tambah_post($judul,$isi,$idFakultas);

                if ($status == "success")
                {
                    $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Post berhasil ditambahkan.</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning',$warning);
                    redirect('/post/tambah', 'location');
                }
                else if ($status == "connection_failed")
                {
                    $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Terjadi kesalahan, silahkan coba lagi.</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning',$warning);
                    redirect('/post/tambah', 'location');
                }
            }
        }
        else
        {
            $this->session->set_flashdata('post',true); 
            $data['title']="Tambah Post - Portal Informasi Maharu UBAYA";
            
            $this->load->view('back/b_header',$data);
            $this->load->view('back/b_tambah_post');
            $this->load->view('back/b_footer'); 
        }
    }
    
    function hapus($idPost){
        $this->load->model('model_post');
        
        $status = $this->model_post->hapus_post($idPost);
        if ($status == "success"){
            $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Hak akses materi telah sukses dihapus</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/post/lihat', 'location');
        }
        else if ($status == "connection_error"){
            $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Koneksi bermasalah. Silahkan coba lagi</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/post/lihat', 'location');
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */