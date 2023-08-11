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

<!--   MODEL CON EL FORMULARIO DE LA EXPORTACIÓN DEL DOCUMENTO DEL MEMORANDO DE GPE A VICEPRESIDENCIA   -->

    <div class="popup-overlay-s" id="two_memo">
        <form action="./controllers/procesar_s.php" method="post" id="s_memo">    
            <div class="popup_tm">
                <h2>Memorando GPE a Vicepresidencia</h2>

                <label for="id_gpe_tmf">Ingresar GPE</label>
                <input type="text" id="id_gpe_tm" name ="id_gpe_tmf">

                <label for="user_tmf">Para</label>
                    <select name="user_tmf" id="list_user_tmf">
                        <option value="" selected hidden>Seleccionar...</option>
                            <?php for($i = 0; $i < count($para); $i++){ ?>
                                <option value="<?php echo $para[$i]['id'] ?>"><?php echo $para[$i]['nombre'] ?></option>
                            <?php } ?>
                    </select> 

                <button type="button" id="add_tmf" onclick="openPopup('popup_tmf')">Agregar</button>

                <div class="popup-overlay" id="popup_tmf">
                    <div class="popup">
                        <h2>Agregar usuario</h2>
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="name_tmf" name="name_user_tmf">

                            <label for="identificacion">Profesional:</label>
                            <input type="text" id="profession_tmf" name="profession_user_tmf">

                            <label for="profesion">Equipo:</label>
                            <input type="text" id="team_tmf" name="team_user_tmf">

                            <label for="laboDral">Campo laboral:</label>
                            <input type="text" id="labor_tmf" name="labor_user_tmf">

                            <div class="bottom-popup">
                                <button type="button" id="submit-popup-tmf">Agregar</button>
                                <a href="#" onclick="closePopup('popup_tmf')" id="btn-cerrar">Cancelar</a>
                            </div>
                    </div>
                </div>
        
                <label for="user_tmo">De</label>
                    <select name="user_tmo" id="list_user_tmo">
                        <option value="" selected hidden>Seleccionar...</option>
                            <?php for($i = 0; $i < count($de); $i++){ ?>
                                <option value="<?php echo $de[$i]['id'] ?>"><?php echo $de[$i]['nombre'] ?></option>
                            <?php } ?>
                    </select>
                    
                <button type="button" id="add_tmf" onclick="openPopup('popup_tmo')">Agregar</button>
                    
                <div class="popup-overlay" id="popup_tmo">
                    <div class="popup">
                        <h2>Agregar usuario</h2>
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="name_tmo" name="name_user_tmo">
                    
                            <label for="identificacion">Profesional:</label>
                            <input type="text" id="profession_tmo" name="profession_user_tmo">
                    
                            <label for="profesion">Equipo:</label>
                            <input type="text" id="team_tmo" name="team_user_tmo">
                    
                            <label for="laboral">Campo laboral:</label>
                            <input type="text" id="labor_tmo" name="labor_user_tmo">
                    
                            <div class="bottom-popup">
                                <button type="button" id="submit-popup-tmo">Agregar</button>
                                <a href="#" onclick="closePopup('popup_tmo')" id="btn-cerrar">Cancelar</a>
                            </div>
                    </div>
                </div>

                <label for="user_tme">Elaborado por:</label>
                    <select name="user_tme" id="list_user_tme">
                        <option value="" selected hidden>Seleccionar...</option>
                            <?php for($i = 0; $i < count($general); $i++){ ?>
                                <option value="<?php echo $general[$i]['id'] ?>"><?php echo $general[$i]['nombre'] ?></option>
                            <?php } ?>
                    </select>
                
                <button type="button" id="add_tmf" onclick="openPopup('popup_tme')">Agregar</button>

                <div class="popup-overlay" id="popup_tme">
                    <div class="popup">
                        <h2>Agregar usuario</h2>
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="name_tme" name="name_user_tme">

                            <label for="etb">ETB:</label>
                            <input type="text" id="etb_tme" name="etb_user_tme">

                            <label for="equipo">Equipo:</label>
                            <input type="text" id="team_tme" name="team_user_tme">

                            <div class="bottom-popup">
                                <button type="button" id="submit-popup-tme">Agregar</button>
                                <a href="#" onclick="closePopup('popup_tme')" id="btn-cerrar">Cancelar</a>
                            </div>
                    </div>
                </div>

                <label for="user_tmr">Revisado por:</label>
                    <select name="user_tmr" id="list_user_tmr">
                        <option value="" selected hidden>Seleccionar...</option>
                            <?php for($i = 0; $i < count($general); $i++){ ?>
                                <option value="<?php echo $general[$i]['id'] ?>"><?php echo $general[$i]['nombre'] ?></option>
                            <?php } ?>
                    </select>
                
                <button type="button" id="add_tmf" onclick="openPopup('popup_tmr')">Agregar</button>

                <div class="popup-overlay" id="popup_tmr">
                    <div class="popup">
                        <h2>Agregar usuario</h2>
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="name_tmr" name="name_user_tmr">

                            <label for="etb">ETB:</label>
                            <input type="text" id="etb_tmr" name="etb_user_tmr">

                            <label for="equipo">Equipo:</label>
                            <input type="text" id="team_tmr" name="team_user_tmr">

                            <div class="bottom-popup">
                                <button type="button" id="submit-popup-tmr">Agregar</button>
                                <a href="#" onclick="closePopup('popup_tmr')" id="btn-cerrar">Cancelar</a>
                            </div>
                    </div>
                </div>

                <label for="user_tma">Aprobado por:</label>
                    <select name="user_tma" id="list_user_tma">
                        <option value="" selected hidden>Seleccionar...</option>
                            <?php for($i = 0; $i < count($general); $i++){ ?>
                                    <option value="<?php echo $general[$i]['id'] ?>"><?php echo $general[$i]['nombre'] ?></option>
                            <?php } ?>
                    </select>
                
                <button type="button" id="add_tmf" onclick="openPopup('popup_tma')">Agregar</button>

                <div class="popup-overlay" id="popup_tma">
                    <div class="popup">
                        <h2>Agregar usuario</h2>
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="name_tma" name="name_user_tma"> 

                            <label for="etb">ETB:</label> 
                            <input type="text" id="etb_tma" name="etb_user_tma"> 

                            <label for="equipo">Equipo:</label>
                            <input type="text" id="team_tma" name="rev_user_tma">

                            <div class="bottom-popup">
                                <button type="button" id="submit-popup-tma">Agregar</button> 
                                <a href="#" onclick="closePopup('popup_tma')" id="btn-cerrar">Cancelar</a> 
                            </div>
                    </div>
                </div>
        
                <div class="bottom-popup">

                    <button type="button" id="submit-popup-tm" onclick="openPopup('popup_send_two')">Agregar</button> 
                        <div class="popup-overlay" id="popup_send_two">
                            <div class="popup">
                                <img src="assets/Image/exclamacion.svg" alt="" id="img_send">
                                <h2 id="tittle_send">¿Desea exportar este archivo?</h2>
                                <p id="text_send">Al seleccionar la opción de "siguiente" se redireccionara al formulaio para la generación del tercer memorando (de EAF a Comtabilidad).</p>
                            
                                <div class="bottom-popup">
                                    <button type="button" class="send_word" id="send_export_document" onclick="openPopup('three_memo')">Siguiente</button>
                                    <a href="#" onclick="closePopup('popup_send_two')" id="btn-cerrar">Cancelar</a>
                                </div>
                                <input type="text" name="om_memo" style='display:none;' value='<?php echo $_GET['om_memo'] ?>'>
                                <input type="text" name="parrafo" style='display:none;' value='<?php echo $_GET['parrafo'] ?>'>
                            </div>
                        </div> 
                </div>

            </div>
        </form>     
    </div>
    
    <script src="./librerias/jquery.js"></script>
    <script src="./assets/scripts/script.js"></script>
    <script src="./assets/scripts/sm_user.js"></script>
    
</body>
</html> 