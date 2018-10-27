<?php
    class ControllerLocations extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model("ModelUser"); 
            $this->load->model("ModelLocations");
        }
    }


?>