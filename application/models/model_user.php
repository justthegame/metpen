<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_user
 *
 * @author Ryannathan
 */
class Model_user extends CI_Model {

    function  __construct(){
        parent::__construct();
        $this->load->database('default');
    }
    
    function ambil_semua_user(){
        $sql = " SELECT u.username as username, f.nama as namaFakultas "
                . " FROM user u "
                . " INNER JOIN fakultas f ON f.id = u.idFakultas ";
        
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
    
    function tambah_user($username,$password,$idFakultas){
        $this->db->trans_start();
        $this->db->query("INSERT INTO user(username,password,idFakultas) VALUES('".$username."','".$password."',".$idFakultas.")");
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
    
    function hapus_user($username){
        $sql = " DELETE FROM user "
                ." WHERE username=? ";
        
        $this->load->database('default');
        
        $this->db->trans_start();
        $this->db->query($sql, array($username));
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
