<?php

    class ModelUser extends CI_Model{

        public function confirmLogin($nombre, $pass){
           $consulta = $this->db->query("SELECT idusuario, nick, passwd FROM usuarios WHERE nick = '$nombre' AND passwd = '$pass'");
           $datos =  $consulta->row_array();
           $this->session->idusu = $datos['idusuario'];
           return $consulta->num_rows();

        }

        public function getInfoUser(){
            $id = $this->session->idusu;
            $consulta = $this->db->query("SELECT * FROM usuarios WHERE idusuario = $id");

            $datos = array();

            for ($i=0;$i<$consulta->num_rows();$i++){
                $fila[$i] = $consulta->result_array();
                $datos = $fila[$i];
            }

            return $datos;
        }

    }



?>