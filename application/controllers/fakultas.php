<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fakultas extends CI_Controller {

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
    
    function hapus($idFakultas){
        $this->load->model('model_fakultas');
        
        $status = $this->model_fakultas->hapus_fakultas($idFakultas);
        if ($status == "success"){
            $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Hak akses materi telah sukses dihapus</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/fakultas/lihat', 'location');
        }
        else if ($status == "connection_error"){
            $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Koneksi bermasalah. Silahkan coba lagi</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/fakultas/lihat', 'location');
        }
    }
    
    function tambah(){
        if ($this->input->post('submit')) {
            $this->load->model('model_fakultas');

            $this->form_validation->set_rules('nama', 'Nama Fakultas', 'required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

            $this->form_validation->set_message('required', '%s harus diisi.');

            if ($this->form_validation->run() == FALSE) {
                $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>", "</strong> "
                        . "</div>");
                $this->session->set_flashdata('warning', validation_errors());
                redirect('/fakultas/tambah', 'location');
            } else {
                
                $nama = $this->input->post('nama');
                $deskripsi = $this->input->post('deskripsi');

                $status = $this->model_fakultas->tambah_fakultas($nama,$deskripsi);

                if ($status == "success")
                {
                    $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>User berhasil ditambahkan.</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning',$warning);
                    redirect('/fakultas/tambah', 'location');
                }
                else if ($status == "connection_failed")
                {
                    $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Terjadi kesalahan, silahkan coba lagi.</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning',$warning);
                    redirect('/fakultas/tambah', 'location');
                }
            }
        }
        else
        {
            $this->session->set_flashdata('fakultas',true); 
            $data['title']="Tambah Fakultas - Portal Informasi Maharu UBAYA";
            
            $this->load->view('back/b_header',$data);
            $this->load->view('back/b_tambah_fakultas');
            $this->load->view('back/b_footer'); 
        }
    }
    
    function lihat(){
        if(!($this->session->userdata('role'))) redirect ('admin/login','location');
        $data['title']="Daftar Fakultas - Portal Informasi Mahasiswa Baru";
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        $this->load->model('model_fakultas');
        $data['fakultas'] = $this->model_fakultas->ambil_semua_fakultas();
        
        $this->load->view('back/b_header',$data);
        $this->load->view('back/b_lihat_fakultas');
        $this->load->view('back/b_footer'); 
    }

    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */