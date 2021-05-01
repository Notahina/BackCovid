<?php 
    Class Cas extends CI_Model
    {
        Public function __construct() { 
            parent::__construct(); 
            $this->load->database();
        }
        public function getListeCas($pays=null,$date=null){
            $data=null;
            $sql=null;
            if(!$date){
                $date="current_date - INTERVAL '1 DAYS'";
            }
            if($pays){
                $sql=sprintf("SELECT * FROM Cas WHERE Region='%s' and date= %s",$pays,$date);
            }else{
                $sql="SELECT * FROM Cas where date=".$date;
            }
            // echo $sql;
            $query=$this->db->query($sql);
            $data=$query->result();
            $query->free_result();
            $this->db->close(); 
            return $data;
        }
        public function insertCas($iduser,$region,$death,$title,$new,$heal){
            $id="CONCAT('C0',nextval('seq_cas'))";
            $sql=sprintf("INSERT INTO Cas (Idcas,Iduser,Region,Deaths,Title,Newcases,Healed) VALUES (%s,'%s','%s',%d,'%s',%d,%d)",$id,$iduser,$region,$death,$title,$new,$heal);
            // echo $sql;
            if($this->db->query($sql)){
                return 1;
            }else{
                throw new Exception("Veillez verifier votre saise!");
            }
        }
        public function deleteCas($idcas){
            $sql="DELETE FROM Cas where idcas='%s'";
            $sql=sprintf($sql,$idcas);
            if($this->db->query($sql)){
                return 1;
            }else{
                throw new Exception("N'as pas pu ete supprimer");
            }
        }
    }
    
?>