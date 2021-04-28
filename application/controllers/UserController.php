<?php 

   class UserController extends CI_Controller {
        function __construct() { 
            parent::__construct(); 
            $this->load->helper('url'); 
            $this->load->model('User');
        } 
        public function index(){
            if ($this->input->server('REQUEST_METHOD') == 'POST'){
               $username=$this->input->post('username');
               $mdp=$this->input->post('mdp');
               $pass['val']=null;
               try{
                    $data=$this->User->getUser($username,$mdp);
                    $_SESSION['user']=$data;
                    redirect('HomeController','refresh');
                    // var_dump($data);
               }catch(Exception $e){           
                $error['erreur']=$e->getMessage();
                $pass['val']=$error['erreur'];
               }
               $this->load->view('Login',$pass);
            }else{
                  $this->load->view('Login');
            }
        }
   }
?>