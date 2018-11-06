<?php 
include("ControllerUser.php");
class ControllerSites extends ControllerUser {

    public function __construct(){
        parent::__construct(); 
        $this->load->model("ModelUser");
    }

    public function insertSite(){
        $nombre =  $this->input->get("nombre");
        $descripcion = $this->input->get("descripcion");
        $latitud =  $this->input->get("latitud");
        $longitud = $this->input->get("longitud");
    
    $res = $this->ModelSites->insertSite($nombre,$descripcion,$longitud, $latitud);

    if($res == 1){
        $this->mainMenu("msgSite","Lugar insertado con éxito");
    }else if ($res == 10){
        $this->mainMenu("msgSite","El nombre del lugar ya existe en la base de datos");
    }else{
        $this->mainMenu("msgSite","Error al insertar un lugar");
    }
    }

    public function deleteSite($id){

        $res = $this->ModelSites->deleteSite($id);

        if($res == 1){
            $this->mainMenu("msgSite","Lugar eliminado con éxito");
        }else if ($res == 10){
            $this->mainMenu("msgSite","No puedes eliminar un lugar que está publicado");
        }else{
            $this->mainMenu("msgSite","Error al eliminar un nuevo Lugar");
        }
    }

    public function updateSite($id){
        $nombre =  $this->input->get("nombre");
        $descripcion = $this->input->get("descripcion");
        $latitud =  $this->input->get("latitud");
        $longitud = $this->input->get("longitud");

        $res = $this->ModelSites->updateSite($id, $nombre, $descripcion, $longitud, $latitud);

        if($res == 1){
            $this->mainMenu("msgSite","Lugar modificado con éxito");
        }else{
            $this->mainMenu("msgSite","Error al modificar un nuevo Lugar");
        }
    }
}


?>