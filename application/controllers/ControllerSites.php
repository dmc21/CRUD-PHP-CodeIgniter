<?php 

class ControllerSites extends CI_Controller {

    public function __construct(){
        parent::__construct(); 
        $this->load->model("ModelUser");
        $this->load->model("ModelSites");
        $this->load->model("ModelMovies");
        $this->load->model("ModelLocations");
    }

    public function insertSite(){
        $nombre =  $this->input->get("nombre");
        $descripcion = $this->input->get("descripcion");
        $latitud =  $this->input->get("latitud");
        $longitud = $this->input->get("longitud");
    
    $res = $this->ModelSites->insertSite($nombre,$descripcion,$longitud, $latitud);

    if($res == 1){
        $this->mainMenu("Lugar insertado con éxito");
    }else if ($res == 10){
        $this->mainMenu("El nombre del lugar ya existe en la base de datos");
    }else{
        $this->mainMenu("Error al insertar un lugar");
    }
    }

    public function deleteSite($id){

        $res = $this->ModelSites->deleteSite($id);

        if($res == 1){
            $this->mainMenu("Lugar eliminado con éxito");
        }else if ($res == 10){
            $this->mainMenu("No puedes eliminar un lugar que está publicado");
        }else{
            $this->mainMenu("Error al eliminar un nuevo Lugar");
        }
    }

    public function updateSite($id){
        $nombre =  $this->input->get("nombre");
        $descripcion = $this->input->get("descripcion");
        $latitud =  $this->input->get("latitud");
        $longitud = $this->input->get("longitud");

        $res = $this->ModelSites->updateSite($id, $nombre, $descripcion, $longitud, $latitud);

        if($res == 1){
            $this->mainMenu("Lugar modificado con éxito");
        }else{
            $this->mainMenu("Error al modificar un nuevo Lugar");
        }
    }


    public function mainMenu($cadena) {
        $data['msgSite'] = $cadena;
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