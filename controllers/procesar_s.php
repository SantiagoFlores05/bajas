<?php
    class bajas{
        public function store($id, $para, $de, $elaborado, $revisado, $aprovado, $usuariosTemp, $id_om, $parrafo){

            include ("../config/conexion.php");
            $arrayRecibido = json_decode($usuariosTemp, true );

            foreach ($arrayRecibido as $key => $value) {
                // var_dump($value);
                if($para == $value[0]){
                    $sql = "INSERT INTO `usuarios`(`nombre`, `etb`, `profesional`, `campo`, `equipo`, `firma`, `alcance`, `estado`) VALUES ('$value[1]','$value[2]','$value[3]','$value[4]','$value[6]','$value[5]','0','Inactivo')";
                    mysqli_query($db, $sql);
                    
                    $para =  mysqli_insert_id($db);

                }
                if($de == $value[0]){
                    $sql = "INSERT INTO `usuarios`(`nombre`, `etb`, `profesional`, `campo`, `equipo`, `firma`, `alcance`, `estado`) VALUES ('$value[1]','$value[2]','$value[3]','$value[4]','$value[6]','$value[5]','0','Inactivo')";
                    mysqli_query($db, $sql);    
                    
                    $de =  mysqli_insert_id($db);

                }
                if($elaborado == $value[0]){
                    $sql = "INSERT INTO `usuarios`(`nombre`, `etb`, `profesional`, `campo`, `equipo`, `firma`, `alcance`, `estado`) VALUES ('$value[1]','$value[2]','$value[3]','$value[4]','$value[6]','$value[5]','0','Inactivo')";
                    mysqli_query($db, $sql);
                    
                    $elaborado =  mysqli_insert_id($db);

                }
                if($revisado == $value[0]){
                    $sql = "INSERT INTO `usuarios`(`nombre`, `etb`, `profesional`, `campo`, `equipo`, `firma`, `alcance`, `estado`) VALUES ('$value[1]','$value[2]','$value[3]','$value[4]','$value[6]','$value[5]','0','Inactivo')";
                    mysqli_query($db, $sql);
                    
                    $revisado =  mysqli_insert_id($db);
                }
                if($aprovado == $value[0]){
                    $sql = "INSERT INTO `usuarios`(`nombre`, `etb`, `profesional`, `campo`, `equipo`, `firma`, `alcance`, `estado`) VALUES ('$value[1]','$value[2]','$value[3]','$value[4]','$value[6]','$value[5]','0','Inactivo')";
                    mysqli_query($db, $sql);
                    
                    $aprovado =  mysqli_insert_id($db);
                }
            }

            //Consulta de inserción en la tabla de bajas
            $sql = "INSERT INTO bajas (id) VALUES ('$id')";
            mysqli_query($db, $sql);

            //Consulta de inserción en la tabla de bajas_has_usuarios en la lista plegable de "para"
            $sql = "INSERT INTO bajas_has_usuarios (bajas_id, usuarios_id, rol_id) VALUES ('$id','$para', 1)";
            mysqli_query($db, $sql);

            //Consulta de inserción en la tabla de bajas_has_usuarios en la lista plegable de "de"
            $sql = "INSERT INTO bajas_has_usuarios (bajas_id, usuarios_id, rol_id) VALUES ('$id','$de', 2)";
            mysqli_query($db, $sql);

            //Consulta de inserción en la tabla de bajas_has_usuarios en la lista plegable de "elaborado"
            $sql = "INSERT INTO bajas_has_usuarios (bajas_id, usuarios_id, rol_id) VALUES ('$id','$elaborado', 3)";
            mysqli_query($db, $sql);

            //Consulta de inserción en la tabla de bajas_has_usuarios en la lista plegable de "revisado"
            $sql = "INSERT INTO bajas_has_usuarios (bajas_id, usuarios_id, rol_id) VALUES ('$id','$revisado', 4)";
            mysqli_query($db, $sql);

            //Consulta de inserción en la tabla de bajas_has_usuarios en la lista plegable de "aprovado"
            $sql = "INSERT INTO bajas_has_usuarios (bajas_id, usuarios_id, rol_id) VALUES ('$id','$aprovado', 5)";
                mysqli_query($db, $sql);  

            if (mysqli_affected_rows($db)>0) {

            $link = '../t_memo.php?om_memo='.$id_om.'&parrafo='.$parrafo.'&sm_memo='.$id;
            // var_dump($link);
            header('Location:'. $link);          
        }
        }
    }

    $bajas = new bajas;

    $bajas->store(
        $_POST['id_gpe_tmf'],
        $_POST['user_tmf'],
        $_POST['user_tmo'],
        $_POST['user_tme'],
        $_POST['user_tmr'],
        $_POST['user_tma'],
        $_POST['usuariosTemp'],
        $_POST['om_memo'],
        $_POST['parrafo']
    );
?>