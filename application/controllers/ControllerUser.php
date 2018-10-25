<?php 
    class ControllerUser extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model("ModelUser"); 
            $this->load->model("ModelMovies");
        }

        public function index(){
            $this->load->view("ViewUser/login");
        }

        public function confirmLogin(){
           $nick =  $this->input->get("nombre");
           $password = $this->input->get("pass");
           $respuesta =  $this->ModelUser->confirmLogin($nick,$password);

           

          if ($respuesta == 1){
            $this->mainPanel();
        }else{
            $this->load->view("ViewUser/login");
          }
           
        }

        public function mainPanel() {
            $data['informacion'] = $this->ModelUser->getInfoUser();
            $data['movies'] = $this->ModelMovies->getAllMovies();
            $this->load->view("ViewLocation/admin",$data);

        }
    }

?>