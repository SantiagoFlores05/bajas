<?php

 class bajas {
    public function index(){
        include ("./config/conexion.php");
        $sql = "SELECT * FROM usuarios";
        $resultado = $db->query($sql);
        return $resultado;
    }
 }
 $bajas = new bajas;
 $resultado = $bajas->index();
 $de = [];
 $para = [];
 $general = [];
 while($row = $resultado-> fetch_assoc()){
    if ($row['alcance'] == 2){
        array_push($de, $row);
        array_push($general, $row);
    }
    else if ($row['alcance'] == 3){
        array_push($para, $row);
    }
    else if ($row['alcance'] == 3){
        array_push($para, $row);
    }
    else if ($row['alcance'] == 4){
        array_push($general, $row);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css"> 
    <title>Equipos inactivos</title>
    <link rel="shortcut icon" href="./assets/image/ETB _Bogota.svg" type="image/x-icon">
</head>
<body>

    <!--   MODEL CON EL FORMULARIO DE LA EXPORTACIÓN DEL DOCUMENTO DEL MEMORANDO DE EAF A CONTABILIDAD   -->

    <div class="popup-overlay-t" id="three_memo">
        <form action="./controllers/procesar_t.php" method="post" id="t_memo">
            <div class="popup_tm">
                <h2>Memorando GPE a Contabilidad</h2>
        
                <label for="id_gpe_thmf">Ingresar GPE</label>
                <input type="text" id="id_gpe_thmf" name ="id_gpe_thmf">
        
                <label for="user_thmf">Para</label>
                    <select name="user_thmf" id="list_user_thmf">
                        <option value="" selected hidden>Seleccionar...</option>
                            <?php for($i = 0; $i < count($para); $i++){ ?>
                                <option value="<?php echo $para[$i]['id'] ?>"><?php echo $para[$i]['nombre'] ?></option>
                            <?php } ?>
                    </select> 
                
                <button type="button" id="add_thmf" onclick="openPopup('popup_thmf')">Agregar</button>
                
                <div class="popup-overlay" id="popup_thmf">
                    <div class="popup">
                        <h2>Agregar usuario</h2>
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="name_thmf" name="name_user_thmf">
                    
                            <label for="identificacion">Profesional:</label>
                            <input type="text" id="profession_thmf" name="profession_user_thmf">
                    
                            <label for="profesion">Equipo:</label>
                            <input type="text" id="team_thmf" name="team_user_thmf">
                    
                            <label for="laboral">Campo laboral:</label>
                            <input type="text" id="labor_thmf" name="labor_user_thmf">
                    
                            <div class="bottom-popup">
                                <button type="button" id="submit-popup-thmf">Agregar</button>
                                <a href="#" onclick="closePopup('popup_thmf')" id="btn-cerrar">Cancelar</a>
                            </div>
                    </div>
                </div>
            
                <label for="user_thmo">De</label>
                    <select name="user_thmo" id="list_user_thmo">
                        <option value="" selected hidden>Seleccionar...</option>
                            <?php for($i = 0; $i < count($de); $i++){ ?>
                                <option value="<?php echo $de[$i]['id'] ?>"><?php echo $de[$i]['nombre'] ?></option>
                            <?php } ?>
                        </select>
                    
                <button type="button" id="add_thmf" onclick="openPopup('popup_thmo')">Agregar</button>
                    
                <div class="popup-overlay" id="popup_thmo">
                    <div class="popup">
                        <h2>Agregar usuario</h2>
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="name_thmo" name="name_user_thmo">
                    
                            <label for="identificacion">Profesional:</label>
                            <input type="text" id="profession_thmo" name="profession_user_thmo">
                    
                            <label for="profesion">Equipo:</label>
                            <input type="text" id="team_thmo" name="team_user_thmo">
                    
                            <label for="laboral">Campo laboral:</label>
                            <input type="text" id="labor_thmo" name="labor_user_thmo">
                    
                            <div class="bottom-popup">
                                <button type="button" id="submit-popup-thmo">Agregar</button>
                                <a href="#" onclick="closePopup('popup_thmo')" id="btn-cerrar">Cancelar</a>
                            </div>
                    </div>
                </div>
            
                <label for="user_thme">Elaborado por:</label>
                    <select name="user_thme" id="list_user_thme">
                        <option value="" selected hidden>Seleccionar...</option>
                            <?php for($i = 0; $i < count($general); $i++){ ?>
                                <option value="<?php echo $general[$i]['id'] ?>"><?php echo $general[$i]['nombre'] ?></option>
                            <?php } ?>
                    </select>
                
                <button type="button" id="add_thmf" onclick="openPopup('popup_thme')">Agregar</button>
                
                <div class="popup-overlay" id="popup_thme">
                    <div class="popup">
                        <h2>Agregar usuario</h2>
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="name_thme" name="name_user_thme">

                            <label for="etb">ETB:</label>
                            <input type="text" id="etb_thme" name="etb_user_thme">

                            <label for="equipo">Equipo:</label>
                            <input type="text" id="team_thme" name="team_user_thme">

                            <div class="bottom-popup">
                                <button type="button" id="submit-popup-thme">Agregar</button>
                                <a href="#" onclick="closePopup('popup_thme')" id="btn-cerrar">Cancelar</a>
                            </div>
                    </div>
                </div>
            
                <label for="user_thmr">Revisado por:</label>
                    <select name="user_thmr" id="list_user_thmr">
                        <option value="" selected hidden>Seleccionar...</option>
                            <?php for($i = 0; $i < count($general); $i++){ ?>
                                <option value="<?php echo $general[$i]['id'] ?>"><?php echo $general[$i]['nombre'] ?></option>
                            <?php } ?>
                    </select>
                 
                 <button type="button" id="add_thmf" onclick="openPopup('popup_thmr')">Agregar</button>
 
                 <div class="popup-overlay" id="popup_thmr">
                     <div class="popup">
                         <h2>Agregar usuario</h2>
                             <label for="nombre">Nombre:</label>
                             <input type="text" id="name_thmr" name="name_user_thmr">
 
                             <label for="etb">ETB:</label>
                             <input type="text" id="etb_thmr" name="etb_user_thmr">
 
                             <label for="equipo">Equipo:</label>
                             <input type="text" id="team_thmr" name="team_user_thmr">
 
                             <div class="bottom-popup">
                                 <button type="button" id="submit-popup-thmr">Agregar</button>
                                 <a href="#" onclick="closePopup('popup_thmr')" id="btn-cerrar">Cancelar</a>
                             </div>
                     </div>
                 </div>
             
                <label for="user_thma">Aprobado por:</label>
                    <select name="user_thma" id="list_user_thma">
                        <option value="" selected hidden>Seleccionar...</option>
                            <?php for($i = 0; $i < count($general); $i++){ ?>
                                    <option value="<?php echo $general[$i]['id'] ?>"><?php echo $general[$i]['nombre'] ?></option>
                            <?php } ?>
                    </select>
                
                <button type="button" id="add_thmf" onclick="openPopup('popup_thma')">Agregar</button>
                
                <div class="popup-overlay" id="popup_thma">
                    <div class="popup">
                        <h2>Agregar usuario</h2>
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="name_thma" name="name_user_thma"> 
                    
                            <label for="etb">ETB:</label> 
                            <input type="text" id="etb_thma" name="etb_user_thma"> 
                    
                            <label for="equipo">Equipo:</label>
                            <input type="text" id="team_thma" name="rev_user_thma"> 
                    
                            <div class="bottom-popup">
                                <button type="button" id="submit-popup-thma">Agregar</button> 
                                <a href="#" onclick="closePopup('popup_thma')" id="btn-cerrar">Cancelar</a> 
                            </div>
                    </div>
                </div>
                                
                <div class="bottom-popup">

                    <button type="button" id="submit-popup-tm" onclick="openPopup('popup_send')">Agregar</button> 
                        <div class="popup-overlay" id="popup_send">
                            <div class="popup">
                                <img src="assets/Image/exclamacion.svg" alt="" id="img_send">
                                <h2 id="tittle_send">¿Desea exportar este archivo?</h2>
                                <p id="text_send">Al seleccionar la opción de "siguiente" se redireccionara a la inferfaz mediante la cual puede descargar los documentos reviamente diligenciados.</p>
                            
                                <div class="bottom-popup">
                                    <button type="button" class="send_word" id="send_export_document" onclick="openPopup('two_memo')">Siguiente</button>
                                    <a href="#" onclick="closePopup('popup_send')" id="btn-cerrar">Cancelar</a>
                                </div>
                                <input type="text" name="om_memo" style='display:none;' value='<?php echo $_GET['om_memo'] ?>'>
                                <input type="text" name="parrafo" style='display:none;' value='<?php echo $_GET['parrafo'] ?>'>
                                <input type="text" name="sm_memo" style='display:none;' value='<?php echo $_GET['sm_memo'] ?>'>
                            </div>
                        </div> 
                </div>
            </div>
        </form>    
    </div>

    <script src="./librerias/jquery.js"></script>
    <script src="./assets/scripts/script.js"></script>
    <script src="./assets/scripts/tm_user.js"></script>
    
</body>
</html> 