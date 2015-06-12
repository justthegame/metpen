<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_jadwal
 *
 * @author Ryannathan
 */
class Model_jadwal extends CI_Model {

    function  __construct(){
        parent::__construct();
        $this->load->database('default');
    }
    
    function ambil_semua_jadwal(){
        $sql = " SELECT j.id as id, j.nama as namaAcara, j.jam_awal as jamAwal, j.jam_akhir as jamAkhir, j.tempat as tempat, f.nama as namaFakultas  "
                . " FROM info_jadwal_mob j "
                . " INNER JOIN fakultas f ON f.id = j.idFakultas ";
        
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
    
    function tambah_jadwal($nama,$tempat,$jamAwal,$jamAkhir,$idFakultas){
        $this->db->trans_start();
        $this->db->query("INSERT INTO info_jadwal_mob(nama,tempat,jam_awal,jam_akhir,idFakultas) VALUES('".$nama."','".$tempat."','".$jamAwal."','".$jamAkhir."',".$idFakultas.")");
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
    
    function hapus_jadwal($idJadwal){
        $sql = " DELETE FROM info_jadwal_mob "
                ." WHERE id=? ";
        
        $this->load->database('default');
        
        $this->db->trans_start();
        $this->db->query($sql, array($idJadwal));
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
