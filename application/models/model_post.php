<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_post
 *
 * @author Ryannathan
 */
class Model_post extends CI_Model {

    function  __construct(){
        parent::__construct();
        $this->load->database('default');
    }
    
    function getallpost($offset, $limit) {

        $sql = " SELECT p.judul as judul, p.isi as isi, f.nama as namaFakultas, p.id as id "
                . " FROM post p "
                . " INNER JOIN fakultas f ON f.id = p.idFakultas "
                . " LIMIT ".$limit." OFFSET ".$offset;
        
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

    function ambil_semua_post(){
        $sql = " SELECT p.judul as judul, p.isi as isi, f.nama as namaFakultas, p.id as id "
                . " FROM post p "
                . " INNER JOIN fakultas f ON f.id = p.idFakultas ";
        
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
    
    function tambah_post($judul,$isi,$idFakultas){
        $this->db->trans_start();
        $this->db->query("INSERT INTO post(judul,isi,idFakultas) VALUES('".$judul."','".$isi."',".$idFakultas.")");
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
    
    function hapus_post($idPost){
        $sql = " DELETE FROM post "
                ." WHERE id=? ";
        
        $this->load->database('default');
        
        $this->db->trans_start();
        $this->db->query($sql, array($idPost));
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
