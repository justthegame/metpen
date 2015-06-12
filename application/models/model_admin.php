<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_admin
 *
 * @author Ryannathan
 */
class Model_admin extends CI_Model {

    function  __construct(){
        parent::__construct();
    }
    
    //------------------------------------------------------------------------
    // Authentication
    //------------------------------------------------------------------------
    // cek login admin / member
    function check_admin($username,$password){
        $sql = "SELECT username FROM admin "
                . " WHERE username=? AND "
                . " password=?";
        
        $npassword = md5($password);
        
        $this->load->database('default');
        $row = $this->db->query($sql,array($username, $npassword));
        if ($row->num_rows()==1)
        {
            return $row->row();
        }
        else
        {
            return false;
        }
    }
    
    function check_member($username,$password){
        $sql = "SELECT f.id as idFakultas, u.username as username, f.nama as nama  FROM user u "
                . " INNER JOIN fakultas f ON f.id = u.idFakultas "
                . " WHERE username=? AND "
                . " password=?";
        
        $npassword = md5($password);
        
        $this->load->database('default');
        $row = $this->db->query($sql,array($username, $npassword));
        if ($row->num_rows()==1)
        {
            return $row->row();
        }
        else
        {
            return false;
        }
    }
    
}
