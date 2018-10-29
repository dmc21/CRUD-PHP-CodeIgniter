<?php 
    class ModelMovies extends CI_Model {

        public function getAllMovies(){

            $consulta = $this->db->query("SELECT * from peliculas");

            $datos = array();
            for ($i=0;$i<$consulta->num_rows();$i++){
                $fila[$i] = $consulta->result_array();
                $datos = $fila[$i];
            }
            return $datos;
        }

        public function insertMovie($titulo,$anio,$pais,$imagen){
            $consulta = $this->db->query("SELECT MAX(id) AS id from peliculas");
            $fila = $consulta->result_array();
            $maxID = $fila[0]['id']+1;

            if(empty($maxID)){
            $this->db->query("INSERT INTO peliculas VALUES (1,'$titulo','$anio','$pais','$imagen')");
            }else{
                $this->db->query("INSERT INTO peliculas VALUES ($maxID,'$titulo','$anio','$pais','$imagen')");
            }

            return $this->db->affected_rows();
        }

        public function deleteMovie($id){
            $consulta = $this->db->query("SELECT * FROM peliculas INNER JOIN localizaciones ON peliculas.id = localizaciones.id_pelicula WHERE peliculas.id = $id;");
            $fila = $consulta->result_array();
            if(!empty($fila[0]['id'])){
                return 10;
            }else{
                $this->db->query("DELETE FROM peliculas WHERE id = $id");
                return $this->db->affected_rows();
            }
        }

        public function updateMovie($id,$titulo,$anio,$pais,$imagen){
            $this->db->query("UPDATE peliculas SET titulo = '$titulo', anio = $anio, pais = '$pais', cartel_src = '$imagen' WHERE id = $id");

            return $this->db->affected_rows();

        }

        public function unpublishiedMovies(){ //metodo que devuelve el nombre de las peliculas que no se han publicado
            $consulta = $this->db->query("SELECT peliculas.id, peliculas.titulo FROM peliculas WHERE peliculas.id NOT IN (SELECT id_pelicula FROM localizaciones);");

            $datos = array();
            for($i=0;$i<$consulta->num_rows();$i++){
                $fila[$i] = $consulta->result_array();
                $datos = $fila[$i];
            }

            return $datos;
        }
    }


?>