<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_fakultas
 *
 * @author Ryannathan
 */
class Model_fakultas extends CI_Model {

    function  __construct(){
        parent::__construct();
        $this->load->database('default');
    }
    
    function ambil_semua_fakultas(){
        $sql = " SELECT f.id as id, f.nama as nama, f.deskripsi as deskripsi "
                . " FROM fakultas f ";
        
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
    
    function tambah_fakultas($nama,$deskripsi){
        $this->db->trans_start();
        $this->db->query("INSERT INTO fakultas(nama,deskripsi) VALUES('".$nama."','".$deskripsi."')");
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
    
    function hapus_fakultas($idFakultas){
        $sql = " DELETE FROM fakultas "
                ." WHERE id=? ";
        
        $this->load->database('default');
        
        $this->db->trans_start();
        $this->db->query($sql, array($idFakultas));
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
