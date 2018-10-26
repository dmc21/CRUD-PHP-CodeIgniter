<?php 

    class ControllerMovies extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model("ModelMovies"); 
            $this->load->model("ModelUser");
            $this->load->model("ModelSites");
        }

        public function insertMovie(){
            $titulo =  $this->input->get("titulo");
            $anio = $this->input->get("anio");
            $pais =  $this->input->get("pais");
           $cartel = $this->input->get("imagen");
           
           $res = $this->ModelMovies->insertMovie($titulo,$anio,$pais,$cartel);

           if($res == 1){
            $this->mainMenu("Película insertada con éxito");
           }else{
            $this->mainMenu("Error al insertar una nueva película");
           }
        }

        public function deleteMovie($id){

            $res = $this->ModelMovies->deleteMovie($id);

            if($res == 1){
                $this->mainMenu("Película eliminada con éxito");
            }else{
                $this->mainMenu("Error al eliminar una nueva película");
            }
        }

        public function updateMovie($id){
            $titulo =  $this->input->get("titulo");
            $anio = $this->input->get("anio");
            $pais =  $this->input->get("pais");
           $cartel = $this->input->get("imagen");

            $res = $this->ModelMovies->updateMovie($id, $titulo, $anio, $pais, $cartel);

            if($res == 1){
                $this->mainMenu("Película modificada con éxito");
            }else{
                $this->mainMenu("Error al modificar una nueva película");
            }
        }


        public function mainMenu($cadena) {
            $data['msg'] = $cadena;
            $data['informacion'] = $this->ModelUser->getInfoUser();
            $data['movies'] = $this->ModelMovies->getAllMovies();
            $data['sites'] = $this->ModelSites->getAllSites();
            $data['view'] = "ViewLocation/admin";
            $this->load->view("template_admin",$data);
        }
    }

?>