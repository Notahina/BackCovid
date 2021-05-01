<?php 
    Class OtherNews extends CI_Model
    {
        Public function __construct() { 
            parent::__construct(); 
            $this->load->database();
        }
        public function GetNews(){
            $sql ="SELECT * from News where Dateajout<= current_date and dateajout>= current_date- INTERVAL '1 DAYS' order by dateajout desc";
            $query=$this->db->query($sql);
            $data=$query->result();
            $query->free_result();
            $this->db->close(); 
            return $data;
        }
        public function GetOther(){
            $sql ='SELECT * from OtherNews';
            $query=$this->db->query($sql);
            $data=$query->result();
            $query->free_result();
            $this->db->close(); 
            return $data;
        }
        public function InsertNew($iduser,$region,$title,$label){
            $idother="CONCAT('N',nextval('seq_news'))";
            $title=$this->add_s($title);
            $label =$this->add_s($label);
            $sql="INSERT INTO News VALUES(%s,'%s','%s','%s','%s',null,current_date)";
            $sql=sprintf($sql,$idother,$iduser,$region,$title,$label);
            echo $sql;
            if($this->db->query($sql)){
                return 1;
            }else{
                throw new Exception("Veillez verifier votre saise!");
            }
        }
        public function InsertOther($iduser,$region,$label,$lien){
            $idother="CONCAT('ON',nextval('seq_other'))";
            $sql="INSERT INTO OtherNews VALUES(%s,'%s','%s','%s','%s',1)";
            $sql=sprintf($sql,$idother,$iduser,$region,$label,$lien);
            if($this->db->query($sql)){
                return 1;
            }else{
                throw new Exception("Veillez verifier votre saise!");
            }
        }
        public function deleteNew($idnew){
            $sql="DELETE FROM News where Idnew='%s'";
            $sql=sprintf($sql,$idnew);
            if($this->db->query($sql)){
                return 1;
            }else{
                throw new Exception("N'as pas pu édiscté supprimer");
            }
        }
        public function deleteOhter($idother){
            $sql="DELETE FROM OtherNEws where idother='%s'";
            $sql=sprintf($sql,$idother);
            if($this->db->query($sql)){
                return 1;
            }else{
                throw new Exception("N'as pas pu édiscté supprimer");
            }
        }
        public function add_s($valuer){
            $pattern = "/'/i";
            $valuer= preg_replace($pattern, "''", $valuer);
            return $valuer;
        }
    }