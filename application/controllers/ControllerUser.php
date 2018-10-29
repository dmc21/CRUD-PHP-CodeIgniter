<?php 
    class ControllerUser extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model("ModelUser"); 
            $this->load->model("ModelMovies");
            $this->load->model("ModelSites");
            $this->load->model("ModelLocations");
        }

        public function index(){
            $this->load->view("ViewUser/login");
        }

        public function confirmLogin(){
           $nick =  $this->input->post("nombre");
           $password = $this->input->post("pass");
           $respuesta =  $this->ModelUser->confirmLogin($nick,$password);

          if ($respuesta == 1){
            $this->mainPanel();
        }else{
            $data['view'] = "ViewUser/login";
            $this->load->view("template_admin",$data);
          }
           
        }

        public function mainPanel() {
            $data['informacion'] = $this->ModelUser->getInfoUser();
            $data['movies'] = $this->ModelMovies->getAllMovies();
            $data['sites'] = $this->ModelSites->getAllSites();
            $data['locations'] = $this->ModelLocations->getAllLocations();
            $data['unpublishiedMovies'] = $this->ModelMovies->unpublishiedMovies();
            $data['view'] = "ViewLocation/admin";
            $this->load->view("template_admin",$data);
        }

        public function logout(){
            $data['view'] = "ViewUser/login";
            $this->load->view("template_admin",$data);
        }
    }

?>