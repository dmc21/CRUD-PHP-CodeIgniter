<?php

    class Seguridad extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model("ModelUser");
        }
        public function poder(){
            $puede = false;
            if($this->session->userdata("logueado")){
                $puede = true;
            }else{
                $puede = false;
                $data['view'] = "ViewUser/login";
                $data['intentaEntrarMal'] = "A DONDE VAS CRUUUUCK";
                $this->load->view("template_admin",$data);
            }
            return $puede;
        }
    }
?>
