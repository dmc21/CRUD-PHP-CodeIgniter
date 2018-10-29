<?php 
    class ModelLocations extends CI_Model{
        
        public function getAllLocations(){

            $consulta = $this->db->query("SELECT localizaciones.id, localizaciones.descripcion, localizaciones.fotografia_src, localizaciones.id_pelicula FROM peliculas
            INNER JOIN localizaciones ON localizaciones.id_pelicula = peliculas.id 
            INNER JOIN lugares ON localizaciones.id_lugar = lugares.id GROUP BY localizaciones.id_pelicula;");


            $datos = array();
            for ($i=0;$i<$consulta->num_rows();$i++){
                $fila[$i] = $consulta->result_array();
                $datos = $fila[$i];
            }
            return $datos;
        }

        public function insertLocation($descripcion,$fotografiaSrc,$check,$idLugar,$idPelicula){
            $consulta = $this->db->query("SELECT MAX(id) AS id from localizaciones");

            $fila = $consulta->result_array();
            $maxID = $fila[0]['id']+1;

            $valor = "";

            if($check == "s"){
                $valor = "s";
            }else{
                $valor = "n";
            }

            if(empty($maxID)){
            for ($i=0;$i<count($idLugar);$i++){
                $info = $idLugar[$i];
                $this->db->query("INSERT INTO localizaciones VALUES ($i+1,'$descripcion','$fotografiaSrc', '$valor','$info','$idPelicula')");
            }
        }else{
            for ($i=0;$i<count($idLugar);$i++){
                $info = $idLugar[$i];
                $this->db->query("INSERT INTO localizaciones VALUES ($maxID+$i,'$descripcion','$fotografiaSrc','$valor','$info','$idPelicula')");
            }
        }
        return $this->db->affected_rows();
        }

        public function deleteLocation($id){

           $consulta = $this->db->query("SELECT * FROM localizaciones WHERE id_pelicula = $id");
           
            $this->db->query("DELETE FROM localizaciones WHERE id_pelicula = $id");

            if($consulta->num_rows() == $this->db->affected_rows()){
                return 0;
            }else{
                return 1;
            }
        }

        public function updateMovie($id,$titulo,$anio,$pais,$imagen){
            $this->db->query("UPDATE peliculas SET titulo = '$titulo', anio = $anio, pais = '$pais', cartel_src = '$imagen' WHERE id = $id");

            return $this->db->affected_rows();

        }
    }

?>