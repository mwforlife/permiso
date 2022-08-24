<?php
/*Class Import */
/*PERSONALIZADOS */
class Controller{
    private $host = 'localhost';

    /*Variables BD Local 
    private $user = 'root';
    private $pass = '';
    private $db = 'gestionescolar';*/

    /*Variables BD Remota */
     private $user = 'colegi38_informatica';
     private $pass = 'informatica2022';
     private $db = 'colegi38_gestionescolar';
    public $mi;

    /*Conection Method */

    public function conexion() {
        $this->mi = new mysqli( $this->host, $this->user, $this->pass, $this->db );
        if ( $this->mi->connect_errno ) {
            echo 'Error Conexion: '.$this->mi->connect_error;
        }
    }

    public function escape_string( $string ) {
        $this->conexion();
        return $this->mi->real_escape_string( $string );
    }

    /*Close Method */

    public function desconexion() {
        $this->mi->close();
    }
    /*Insert Query Method */

    public function query( $sql ) {
        $this->conexion();
        $result = $this->mi->query( $sql );
        $this->desconexion();
        return json_encode( $result );
    }


    public function buscaralumno($rut){
        $this->conexion();
        $sql = "select id_alu from alumnos where rut='".$rut."'";
        $result = $this->mi->query($sql);
        if ($rs = mysqli_fetch_array($result)) {
            $id = $rs['id_alu'];
            $this->desconexion();
            return $id;
        }

        $this->desconexion();
        return false;
    }

    public function buscardatos($id){
        $this->conexion();
        $sql = "select nombres, ape_paterno from alumnos where id_alu=$id;";
        $result = $this->mi->query($sql);
        if ($rs = mysqli_fetch_array($result)) {
            $nombre = $rs['nombres'];
            $ape = $rs['ape_paterno'];
            $this->desconexion();
            return $nombre. " ". $ape;
        }

        $this->desconexion();
        return false;
    }



 public function verificarPermiso($id){
        $this->conexion();
        $sql = "select estado from permisos where id_alu=$id";
        $result = $this->mi->query($sql);
        if ($rs = mysqli_fetch_array($result)) {
            $estado = $rs['estado'];
            $this->desconexion();
            return $estado;
        }

        $this->desconexion();
        return false;
    }

}