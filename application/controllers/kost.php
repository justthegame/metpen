<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kost extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = "Beranda - Portal Informasi Maharu UBAYA";

        if (!$this->session->userdata('role')) { // not set
            $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                    . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                    . "<span class='sr-only'>Close</span>"
                    . "</button><strong>Lakukan proses login dahulu.</strong> "
                    . "</div>";
            $this->session->set_flashdata('warning', $warning);
            redirect('/admin/login', 'location');
        } else {
            $this->session->set_flashdata('home', true);

            $this->load->view('back/b_header', $data);
            $this->load->view('back/b_backend');
            $this->load->view('back/b_footer');
        }
    }

    public function lihat() {
        if (!($this->session->userdata('role')))
            redirect('admin/login', 'location');
        $data['title'] = "Daftar Kost - Portal Informasi Mahasiswa Baru";
        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->load->model('model_kost');
        $data['kost'] = $this->model_kost->ambil_semua_kost();

        $this->load->view('back/b_header', $data);
        $this->load->view('back/b_lihat_kost');
        $this->load->view('back/b_footer');
    }

    function tambah() {
        if ($this->input->post('submit')) {
            $config1['upload_path'] = './foto/';
            $config1['allowed_types'] = 'gif|jpg|png';
            $config1['remove_spaces'] = TRUE;
            $config1['encrypt_name'] = TRUE;

            $this->load->library('upload', $config1);

            $this->load->model('model_kost');

            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
            $this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric');

            $this->form_validation->set_message('required', '%s harus diisi.');
            $this->form_validation->set_message('numeric', '%s harus berupa angka.');

            if ($this->form_validation->run() == FALSE) {
                $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>", "</strong> "
                        . "</div>");
                $this->session->set_flashdata('warning', validation_errors());
                redirect('/kost/tambah', 'location');
            } else {
                if (!$this->upload->do_upload('link')) {
                    $data = $this->upload->data();
                    $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                                . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                                . "<span class='sr-only'>Close</span>"
                                . "</button><strong>".$this->upload->display_errors()."</strong> "
                                . "</div>";
                    $this->session->set_flashdata('warning',$warning);
                    redirect('/kost/tambah', 'location');
                } else {
                    $alamat = $this->input->post('alamat');
                    $harga = $this->input->post('harga');
                    $telepon = $this->input->post('telepon');

                    $data = $this->upload->data();
                    $linkfoto = $data['file_name'];

                    $config['image_library'] = 'gd2';
                    $config['create_thumb'] = TRUE;
                    $config['width'] = 100;
                    $config['height'] = 100;
                    $config['source_image'] = "./foto/" . $linkfoto;
                    $config['maintain_ratio'] = TRUE;

                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    $this->image_lib->clear();

                    $pisah = explode('.', $linkfoto);
                    $linkfotobaru = $pisah[0] . "_thumb." . $pisah[1];

                    $status = $this->model_kost->tambah_kost($alamat, $harga, $telepon, $linkfotobaru);

                    if ($status == "success") {
                        $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                                . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                                . "<span class='sr-only'>Close</span>"
                                . "</button><strong>Kost berhasil ditambahkan.</strong> "
                                . "</div>";
                        $this->session->set_flashdata('warning', $warning);
                        redirect('/kost/tambah', 'location');
                    } else if ($status == "connection_failed") {
                        $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                                . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                                . "<span class='sr-only'>Close</span>"
                                . "</button><strong>Terjadi kesalahan, silahkan coba lagi.</strong> "
                                . "</div>";
                        $this->session->set_flashdata('warning', $warning);
                        redirect('/kost/tambah', 'location');
                    }
                }
            }
        } else {
            $this->session->set_flashdata('post', true);
            $data['title'] = "Tambah Kost - Portal Informasi Maharu UBAYA";

            $this->load->view('back/b_header', $data);
            $this->load->view('back/b_tambah_kost');
            $this->load->view('back/b_footer');
        }
    }
    
    function hapus($idKost){
        $this->load->model('model_kost');
        
        $status = $this->model_kost->hapus_kost($idKost);
        if ($status == "success"){
            $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Hak akses materi telah sukses dihapus</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/kost/lihat', 'location');
        }
        else if ($status == "connection_error"){
            $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Koneksi bermasalah. Silahkan coba lagi</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/kost/lihat', 'location');
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */