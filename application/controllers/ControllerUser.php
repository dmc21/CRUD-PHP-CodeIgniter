<?php 
    class ControllerUser extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model("ModelUser"); 
        }

        public function index(){
            $this->load->view("ViewUser/login");
        }

        public function confirmLogin(){
           $nombre =  $this->input->get("nombre");
           $password = $this->input->get("pass");
           $respuesta =  $this->ModelUser->confirmLogin($nombre,$password);
           

          if ($respuesta == 1){
              $this->load->view("ViewLocation/admin");
          }else{
            $this->load->view("ViewUser/login");
          }
           
        }


    }

?>