<?php
    include("ControllerUser.php");
    class ControllerLocations extends ControllerUser {

        public function __construct(){
            parent::__construct();
            $this->load->model("ModelUser"); 
            $this->load->model("ModelLocations");
        }

        public function insertLocation(){
            if($this->poder()){
            $descripcion = $this->input->post("descripcion");
            $idLugar = $this->input->post("sites");
            $idPelicula = $this->input->post("pelis");
            $check = $this->input->post("check");

            $resultado = $this->ModelLocations->upFile($_FILES['imagenLocation']['name'],"imagenLocation");
            echo $check;
       
            if (!$resultado){
                //*** ocurrio un error
                $this->mainMenu("msgLocations","Error al insertar la IMAGEN");
            }else{
                $res = $this->ModelLocations->insertLocation($descripcion,$_FILES['imagenLocation']['name'],$check,$idLugar,$idPelicula);
                 if($res == 1){
                     $this->mainMenu("msgLocations","Localización insertada con éxito");
                 }else{
                     $this->mainMenu("msgLocations","Error al insertar una nueva localización");
                 }
            }
        }
    }

        public function deleteLocation($id){
            if($this->poder()){
            $ruta = $this->ModelLocations->getSRC($id);
            if($ruta != "uploads/locations/")
                $this->ModelLocations->deleteFile($id);

                $res = $this->ModelLocations->deleteLocation($id);

            if($res == 1){
                $this->mainMenu("msgLocations","Localización eliminada con éxito");
            }else {
                $this->mainMenu("msgLocations","Error al eliminar la localización");
            }
        }
    }

        public function updateLocation($id){
            if($this->poder()){
            $descripcion = $this->input->post("descripcion");
            $fotografiaSrc = $this->input->post("imagen");
            $idLugar = $this->input->post("sites");
            $idPelicula = $this->input->post("pelis");
            $check = $this->input->post("checkUpdate");

            

            $ruta = $this->ModelLocations->getSRC($id);

            if($ruta != "uploads/locations/")
                $this->ModelLocations->deleteFile($id);
        
        $this->ModelLocations->deleteLocation($id);
        $resultado = $this->ModelLocations->upFile($_FILES['imagenLocation']['name'],"imagenLocation");
        $res = $this->ModelLocations->insertLocation($descripcion,$_FILES['imagenLocation']['name'],$check,$idLugar,$idPelicula);
            if ($res == 1){
                $this->mainMenu("msgLocations","La localización se ha modificado con éxito");
            }else{
                $this->mainMenu("msgLocations","Error al modificar la localización");
            }
        }
    }
}
?>