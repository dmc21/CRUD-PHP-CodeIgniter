<?php 
include("ControllerUser.php");
    class ControllerMovies extends ControllerUser {
        public function __construct(){
            parent::__construct();
            $this->load->model("ModelMovies"); 
            $this->load->model("ModelUser");
        }

        public function insertMovie(){
            $titulo =  $this->input->post("titulo");
            $anio = $this->input->post("anio");
            $pais =  $this->input->post("pais");
            $cartel = $this->input->post("imagenData");

    
           $resultado = $this->ModelMovies->upFile($_FILES['imagenData']['name'],"imagenData");
       
           if (!$resultado){
               //*** ocurrio un error
               $this->mainMenu("msg","Error al insertar la IMAGEN");
           }else{
                $res = $this->ModelMovies->insertMovie($titulo,$anio,$pais,$_FILES['imagenData']['name']);
                if($res == 1){
                    $this->mainMenu("msg","Película insertada con éxito");
                }else{
                    $this->mainMenu("msg","Error al insertar una nueva película");
                }
           }
        }


        public function deleteMovie($id){

            $ruta = $this->ModelMovies->getSRC($id);
            if($ruta != "uploads/movies/")
                $this->ModelMovies->deleteFile($id);
            

                $res = $this->ModelMovies->deleteMovie($id);
                if($res == 10){
                    $this->mainMenu("msg","No puedes eliminar una película publicada");
                }else if ($res == 1){
                    $this->mainMenu("msg","Película eliminada con éxito");
                }else{
                    $this->mainMenu("msg","Error al eliminar la película");
                }
            } 

        public function updateMovie($id){
            $titulo =  $this->input->post("titulo");
            $anio = $this->input->post("anio");
            $pais =  $this->input->post("pais");
            $srcOculto = $this->input->post("srcOculto");

            $ruta = $this->ModelMovies->getSRC($id);

                if($ruta != "uploads/movies/")
                    $this->ModelMovies->deleteFile($id);
            
            $this->ModelMovies->deleteMovie($id);
            $resultado = $this->ModelMovies->upFile($_FILES['imagenData']['name'],"imagenData");
            $res = $this->ModelMovies->insertMovie($titulo,$anio,$pais,$_FILES['imagenData']['name']);
            
                 if($res == 1){
                     $this->mainMenu("msg","Película actualizada con éxito");
                 }else{
                     $this->mainMenu("msg","Error al actualizar la película");
                 }
            }
        }

?>