<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jadwal extends CI_Controller {

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
    
    function hapus($idJadwal){
        $this->load->model('model_jadwal');
        
        $status = $this->model_jadwal->hapus_jadwal($idJadwal);
        if ($status == "success"){
            $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Hak akses materi telah sukses dihapus</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/jadwal/lihat', 'location');
        }
        else if ($status == "connection_error"){
            $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Koneksi bermasalah. Silahkan coba lagi</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/jadwal/lihat', 'location');
        }
    }

    public function lihat(){
        if(!($this->session->userdata('role'))) redirect ('admin/login','location');
        $data['title']="Daftar Jadwal - Portal Informasi Mahasiswa Baru";
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        $this->load->model('model_jadwal');
        $data['jadwal'] = $this->model_jadwal->ambil_semua_jadwal();
        
        $this->load->view('back/b_header',$data);
        $this->load->view('back/b_lihat_jadwal');
        $this->load->view('back/b_footer'); 
    }
    
    function tambah(){
        if ($this->input->post('submit')) {
            $this->load->model('model_jadwal');

            $this->form_validation->set_rules('nama', 'Nama Acara', 'required');
            $this->form_validation->set_rules('tempat', 'Tempat', 'required');
            $this->form_validation->set_rules('jamAwal', 'Tanggal Awal', 'required');
            $this->form_validation->set_rules('jamAkhir', 'Tanggal Akhir', 'required');
            
            $this->form_validation->set_message('required', '%s harus diisi.');

            if ($this->form_validation->run() == FALSE) {
                $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>", "</strong> "
                        . "</div>");
                $this->session->set_flashdata('warning', validation_errors());
                redirect('/jadwal/tambah', 'location');
            } else {
                
                $nama = $this->input->post('nama');
                $tempat = $this->input->post('tempat');
                $jamAwal = $this->input->post('jamAwal');
                $jamAkhir = $this->input->post('jamAkhir');
                $idFakultas = $this->input->post('idFakultas');

                $status = $this->model_jadwal->tambah_jadwal($nama,$tempat,$jamAwal,$jamAkhir,$idFakultas);

                if ($status == "success")
                {
                    $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Jadwal berhasil ditambahkan.</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning',$warning);
                    redirect('/jadwal/tambah', 'location');
                }
                else if ($status == "connection_failed")
                {
                    $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Terjadi kesalahan, silahkan coba lagi.</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning',$warning);
                    redirect('/jadwal/tambah', 'location');
                }
            }
        }
        else
        {
            $this->session->set_flashdata('jadwal',true); 
            $data['title']="Tambah Jadwal - Portal Informasi Maharu UBAYA";
            
            $this->load->view('back/b_header',$data);
            $this->load->view('back/b_tambah_jadwal');
            $this->load->view('back/b_footer'); 
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */