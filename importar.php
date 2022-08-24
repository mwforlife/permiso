<?php
require 'controller.php';
$c = new Controller();

if ( isset( $_FILES[ 'file_Perimport' ] ) ) {
    $filename = $_FILES[ 'file_Perimport' ][ 'name' ];
    $ext = pathinfo( $filename, PATHINFO_EXTENSION );
    $info = new SplFileInfo( $filename );

    if ( $ext == 'csv' ) {
        $file = $_FILES[ 'file_Perimport' ][ 'tmp_name' ];
        $handle = fopen( $file, 'r' );

        while ( ( $data = fgetcsv( $handle, 1000, ';' ) ) !== FALSE ) {
            if ( $handle == 0 ) {

            } else {
                $rut = str_replace(".","",$data[0]);
                $id = $c->buscaralumno($data[0]);
                if ($id!=false) {
                $sql = "insert into permisos values(null, $id, ".$data[1]." );";
                $result = $c->query( $sql );
                }
            }
        }
        fclose( $handle );
    } else {
        echo '2';
        return;
    }
    echo 1;
} else {
    echo 0;
}