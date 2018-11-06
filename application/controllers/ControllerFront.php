<?php 
    class ControllerFront extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model("ModelUser");
            $this->load->model("ModelMovies");
            $this->load->model("ModelSites");
            $this->load->model("ModelLocations");
        }

        public function index(){
            $data['movies'] = $this->ModelMovies->getAllMovies();
            $data['sites'] = $this->ModelSites->getAllSites();
            $data['locations'] = $this->ModelLocations->getInfoLocations();
            $data['view'] = "front-end/index";
            $this->load->view("template_admin",$data);
            
        }

    }

?>