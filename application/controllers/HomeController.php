<?php 

   class HomeController extends CI_Controller {
        function __construct() { 
            parent::__construct(); 
            $this->load->helper('url'); 
            $this->load->model('User');
        } 
        public function home(){
            $this->load->view('Home');
            echo 'ddd';
        }
   }
?>