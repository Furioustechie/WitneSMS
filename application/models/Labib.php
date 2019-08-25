<?php
class Labib extends CI_Model 
{
    public function __construct(){
        parent::__construct();$this->load->database();
    }
    
	public function getData($tbl,$whr=array()){
        return $this->db->get_where($tbl,$whr)->result();
    }

}
