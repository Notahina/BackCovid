<?php 
    Class Regions extends CI_Model
    {
        Public function __construct() { 
            parent::__construct(); 
            $this->load->database();
        }
        public function getRegions($pays=null,$date=null){
            $data=null;
            $sql="SELECT * from regions";
            $query=$this->db->query($sql);
            $data=$query->result();
            $query->free_result();
            $this->db->close(); 
            return $data;
        }
    }
?>