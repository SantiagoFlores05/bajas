<?php
    class bajas{
        public function store($id, $asunto, $viewEle, $para, $de, $elaborado, $revisado, $aprovado, $elementos, $canelementos, $cantVice, $memoVice, $cantCont, $memoCont, $cantBaj, $cantCo, $cantFot, $parrafo, $usuariosTemp){

            include ("../config/conexion.php");
            $arrayRecibido = json_decode($usuariosTemp, true );

            foreach ($arrayRecibido as $key => $value) {
                if($para == $value[0]){
                    $sql = "INSERT INTO `usuarios`(`nombre`, `etb`, `profesional`, `campo`, `equipo`, `firma`, `alcance`, `estado`) VALUES ('$value[1]','$value[2]','$value[3]','$value[4]','$value[6]','$value[5]','0','Inactivo')";
                    mysqli_query($db, $sql);

                    $para = mysqli_insert_id($db);

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
            $sql = "INSERT INTO bajas (id, asunto, type_elem) VALUES ('$id','$asunto', '$viewEle')";
            mysqli_query($db, $sql);

            //Consulta de inserción en la tabla de bajas_has_usuarios en la lista plegable de "para"
            $sql = "INSERT INTO bajas_has_usuarios (bajas_id, usuarios_id, rol_id) VALUES ('$id','$para', 1)";
            // echo $sql;
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

            for ($i=0; $i < sizeof($elementos); $i++) { 
                $sql = "INSERT INTO elementos (element, bajas_id, cantidad) VALUES ('$elementos[$i]', '$id', '$canelementos[$i]')";
                mysqli_query($db, $sql);
                
                
            }
            //Consulta de inserción en la tabla de anexos en el memorando vicepredicencia 
            $sql = "INSERT INTO anexos (tipoAnexo_id, cantidad, referencia, bajas_id) VALUES (1,'$cantVice', '$memoVice', '$id')";
                mysqli_query($db, $sql);

            //Consulta de inserción en la tabla de anexos en el memorando contabilidad 
            $sql = "INSERT INTO anexos (tipoAnexo_id, cantidad, referencia, bajas_id) VALUES (2,'$cantCont', '$memoCont', '$id')";
                mysqli_query($db, $sql);

            //Consulta de inserción en la tabla de anexos en el memorando solicitud de bajas 
            $sql = "INSERT INTO anexos (tipoAnexo_id, cantidad, bajas_id) VALUES (3,'$cantBaj', '$id')";
                mysqli_query($db, $sql);

            //Consulta de inserción en la tabla de anexos en el registro fotografico
            $sql = "INSERT INTO anexos (tipoAnexo_id, cantidad, bajas_id) VALUES (4,'$cantFot', '$id')";
                mysqli_query($db, $sql);
            
            //Consulta de inserción en la tabla de anexos la concepto técnico de baja
            $sql = "INSERT INTO anexos (tipoAnexo_id, cantidad, bajas_id) VALUES (5,'$cantCo', '$id')";
            mysqli_query($db, $sql);    

            if (mysqli_affected_rows($db)>0) {

            $link = '../s_memo.php?om_memo='.$id.'&parrafo='.$parrafo;
            header('Location:'. $link);          
        }
        }
    }

    $bajas = new bajas;

    $bajas->store(
        $_POST['eafh'],
        $_POST['asunto'],
        $_POST['view_elements'],
        $_POST['user_for'],
        $_POST['user_of'],
        $_POST['user_elab'],
        $_POST['user_rev'],
        $_POST['user_ap'],
        $_POST['elementos'],
        $_POST['cantidad_elementos'],
        $_POST['cant_vice'],
        $_POST['ref_vice'],
        $_POST['cant_cont'],
        $_POST['ref_cont'],
        $_POST['cant_baj'],
        $_POST['cant_co'],
        $_POST['cant_fot'],
        $_POST['user_as'], 
        $_POST['usuariosTemp'],
    );
?>