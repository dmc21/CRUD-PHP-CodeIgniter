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

            $this->db->query("INSERT INTO peliculas VALUES ($maxID,'$titulo','$anio','$pais','$imagen')");

            return $this->db->affected_rows();
        }

        public function deleteMovie($id){
            $this->db->query("DELETE FROM peliculas WHERE id = $id");

            return $this->db->affected_rows();
        }

        public function updateMovie($id,$titulo,$anio,$pais,$imagen){
            $this->db->query("UPDATE peliculas SET titulo = '$titulo', anio = $anio, pais = '$pais', cartel_src = '$imagen'");

            return $this->db->affected_rows();


        }
    }


?>