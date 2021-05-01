<?php 
    Class User extends CI_Model
    {
        Public function __construct() { 
            parent::__construct(); 
            $this->load->database();
        }
        public function getUser($username,$mdp){
            $data=null;
            $sql=sprintf("SELECT * FROM Users WHERE Username='%s' and Mdp='%s'",$username,$mdp);
            $query=$this->db->query($sql);
            $data=$query->result();
            if(!$data){
                throw new Exception("Username ou le mot de passe est incorrect");
            }
            $query->free_result();
            $this->db->close(); 
            return $data[0];
        }
    }
?>
