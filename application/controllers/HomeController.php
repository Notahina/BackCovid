<?php 

   class HomeController extends CI_Controller {
       private $idp;
        function __construct() { 
            parent::__construct(); 
            $this->load->helper('url'); 
            $this->load->library('session');
            $this->load->model('Cas');
            $this->load->model('Regions');
            $this->load->model('OtherNews');
        } 
        public function index(){
            // $idp=$this->input->get('id');
            $user = $this->session->userdata('user');
            $cas=$this->Cas->getListeCas(null,null);
            // var_dump($cas);
            $valiny=[
                "username"=>[
                    0=>$user->nom,
                    1=>$user->prenom,
                ],
                "cas"=>$cas,
            ];
            $val["valiny"]=$valiny;
            $this->load->view('Home',$val);
        }
        public function ListeOther(){
            // $idp=$this->input->get('id');
            $user = $this->session->userdata('user');
            $cas=$this->OtherNews->GetOther();
            // var_dump($cas);
            $valiny=[
                "username"=>[
                    0=>$user->nom,
                    1=>$user->prenom,
                ],
                "other"=>$cas,
            ];
            $val["valiny"]=$valiny;
            $this->load->view('Other',$val);
        }
        public function ListeNews(){
            // $idp=$this->input->get('id');
            $user = $this->session->userdata('user');
            $cas=$this->OtherNews->GetNews();
            // var_dump($cas);
            $valiny=[
                "username"=>[
                    0=>$user->nom,
                    1=>$user->prenom,
                ],
                "news"=>$cas,
            ];
            $val["valiny"]=$valiny;
            $this->load->view('News',$val);
        }
        public function saisieNews(){
            $regions=$this->Regions->getRegions();
            $user = $this->session->userdata('user');

            if ($this->input->server('REQUEST_METHOD') == 'POST'){
                $news=$this->input->post('news');
                $cas=$this->input->post('donne');
                $other=$this->input->post('other');
                if($news){
                    $title=$this->input->post('title');
                    $pays=$this->input->post('region');
                    $label=$this->input->post('label');
                    $res=$this->OtherNews->InsertNew($user->id,$pays,$title,$label);
                }else if($cas){
                    $title=$this->input->post('title');
                    $pays=$this->input->post('region');
                    $cases=$this->input->post('cas');
                    $deces=$this->input->post('deces');
                    $heal=$this->input->post('heal');
                    $res=$this->Cas->insertCas($user->id,$pays,$deces,$title,$cases,$heal);
                }else if($other){
                    $title=$this->input->post('title');
                    $pays=$this->input->post('region');
                    $lien=$this->input->post('lien');
                    $res=$this->OtherNews->InsertOther($user->id,$pays,$title,$lien);
                }
            }
            $valiny=[
                "username"=>[
                    0=>$user->nom,
                    1=>$user->prenom,
                ],
                "Pays"=>$regions,
            ];
            $val["valiny"]=$valiny;
            $this->load->view('Saisie',$val);
        }
        
   }
?>