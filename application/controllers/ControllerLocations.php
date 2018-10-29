<?php
    class ControllerLocations extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model("ModelUser"); 
            $this->load->model("ModelLocations");
            $this->load->model("ModelMovies");
            $this->load->model("ModelSites");
        }

        public function insertLocation(){
            $descripcion = $this->input->get("descripcion");
            $fotografiaSrc = $this->input->get("imagen");
            $idLugar = $this->input->get("sites");
            $idPelicula = $this->input->get("pelis");
            $check = $this->input->get("check");

            $res = $this->ModelLocations->insertLocation($descripcion,$fotografiaSrc,$check,$idLugar,$idPelicula);

            if($res == 1){
                $this->mainMenu("Localización insertada con éxito");
            }else{
                $this->mainMenu("Error al insertar una localización");
            }
        }

        public function deleteLocation($id){
            $res = $this->ModelLocations->deleteLocation($id);

            if($res == 0){
                $this->mainMenu("Localización eliminada con éxito");
            }else if($res == 1){
                $this->mainMenu("Error al eliminar la localización");
            }
        }

        public function mainMenu($cadena) {
            $data['msgLocations'] = $cadena;
            $data['informacion'] = $this->ModelUser->getInfoUser();
            $data['movies'] = $this->ModelMovies->getAllMovies();
            $data['sites'] = $this->ModelSites->getAllSites();
            $data['locations'] = $this->ModelLocations->getAllLocations();
            $data['unpublishiedMovies'] = $this->ModelMovies->unpublishiedMovies();
            $data['view'] = "ViewLocation/admin";
            $this->load->view("template_admin",$data);
        }
    }


?>