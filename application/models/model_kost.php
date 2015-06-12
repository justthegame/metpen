<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_kost
 *
 * @author Ryannathan
 */
class Model_kost extends CI_Model {

    function  __construct(){
        parent::__construct();
        $this->load->database('default');
    }
    
    function ambil_semua_kost(){
        $sql = " SELECT k.id as id, k.gambar_kamar as gambar, k.alamat as alamat, k.telepon as telepon, k.harga as harga "
                . " FROM info_tempat_kost k ";
        
        $this->load->database('default');
        $row = $this->db->query($sql,array());
        
        if ($row->num_rows() > 0)
        {
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    function tambah_kost($alamat,$harga,$telepon,$gambar){
        $this->db->trans_start();
        $this->db->query("INSERT INTO info_tempat_kost(alamat,harga,telepon,gambar_kamar) VALUES('".$alamat."','".$harga."','".$telepon."','".$gambar."')");
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->close();
            return "connection_error";
        }
        else
        {
            $this->db->close();
            return "success";
        }
    }
    
    function hapus_kost($idKost){
        $sql = " DELETE FROM info_tempat_kost "
                ." WHERE id=? ";
        
        $this->load->database('default');
        
        $this->db->trans_start();
        $this->db->query($sql, array($idKost));
        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->close();
            return "connection_error";
        }
        else
        {
            $this->db->close();
            return "success";
        }
    }
}
