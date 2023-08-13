<?php

class bajas {
    public function index(){
        include ("./config/conexion.php");
        $sql = "SELECT * FROM usuarios WHERE estado = 1";
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

    <div class="doc">
        <form action="./controllers/procesar_f.php" method="post" id="om_form">
            <header>

                <div class="first_head">
                    <div class="hleft">
                        <p>Carrera 8 No 20-70 Oficina de Correspondencia ETB </p>
                        <p>Código postal:</p>
                        <p>Conmutador:</p> 
                    </div>

                    <div class="hright">
                        <img src="assets/Image/etb.svg">
                    </div>
                </div>

                <div class="second_head">
                    <h2>MEMORANDO</h2>
                    <input type="text" placeholder="Ingrese EAF" id="eafh" name="eafh" required>
                </div>

            </header>

            <hr>

            <div class="main">

                <div class="init">
                    <label for="user_for">Para</label>
                    <select name="user_for" id="list_user_for">
                        <option value="" selected hidden>Seleccionar...</option>
                        <?php for($i = 0; $i < count($para); $i++){ ?>
                                <option value="<?php echo $para[$i]['id'] ?>"><?php echo $para[$i]['nombre'] ?></option>
                            <?php } ?>
                    </select> 

                    <button type="button" onclick="openPopup('popup_for')">Agregar</button>

                        <div class="popup-overlay" id="popup_for">
                            <div class="popup">
                                <h2>Agregar usuario</h2>
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" id="name_for" name="name_user_for">

                                    <label for="identificacion">Profesional:</label>
                                    <input type="text" id="profession_for" name="profession_user_for">

                                    <label for="profesion">Equipo:</label>
                                    <input type="text" id="team_for" name="team_user_for">

                                    <label for="laboral">Campo laboral:</label>
                                    <input type="text" id="labor_for" name="labor_user_for">

                                    <div class="bottom-popup">
                                        <button type="button" id="submit-popup-for">Agregar</button>
                                        <a href="#" onclick="closePopup('popup_for')" id="btn-cerrar">Cancelar</a>
                                    </div>
                            </div>
                        </div>

                    <label for="user_of">De</label>
                    <select name="user_of" id="list_user_of">
                        <option value="" selected hidden>Seleccionar...</option>
                            <?php for($i = 0; $i < count($de); $i++){ ?>
                                <option value="<?php echo $de[$i]['id'] ?>"><?php echo $de[$i]['nombre'] ?></option>
                            <?php } ?>
                    </select>

                    <button type="button" onclick="openPopup('popup_of')">Agregar</button>

                        <div class="popup-overlay" id="popup_of">
                            <div class="popup">
                                <h2>Agregar usuario</h2>
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" id="name_of" name="name_user_of">

                                    <label for="identificacion">Profesional:</label>
                                    <input type="text" id="profession_of" name="profession_user_of">

                                    <label for="profesion">Equipo:</label>
                                    <input type="text" id="team_of" name="team_user_of">

                                    <label for="laboral">Campo laboral:</label>
                                    <input type="text" id="labor_of" name="labor_user_of">

                                    <div class="bottom-popup">
                                        <button type="button" id="submit-popup-of">Agregar</button>
                                        <a href="#" onclick="closePopup('popup_of')" id="btn-cerrar">Cancelar</a>
                                    </div>
                            </div>
                        </div>

                    <label for="as">Asunto:</label>
                    <input type="text" placeholder="Ingrese el asunto" id="as" name="asunto" required>
                </div>

                <hr>

                <div class="baja">
                    <label for="user_as">Seleccione la descripción</label>
                        <select name="user_as" id="list_as">
                            <option value="0" selected hidden>Seleccionar...</option>
                            <option value="1">Párrafo 1</option>
                            <option value="2">Párrafo 2</option>
                            <option value="3">Párrafo 3</option>
                        </select>

                    <button type="button" onclick="openPopup('popup_baja')">Info</button>

                        <div class="popup-overlay" id="popup_baja">
                            <div class="popup">
                                <h2>Valores de cada párrafo</h2>

                                <h3>Párrafo uno:</h3>
                                <p>En cumplimiento al procedimiento establecido en el manual de inventarios corporativo vigente y publicado en intranet para el tema del asunto, atentamente se solicita aprobación al formato solicitud baja de activos fijos que se adjunta de los elementos listados a continuación, teniendo en cuenta el concepto entregado por la Gerencia Planeación de Tecnología en el memorando 365-2012 “Concepto de Planeación de Red para las centrales del Proyecto de Optimización TDM”.</p>

                                <h3>Párrafo dos:</h3>
                                <p>En cumplimiento al procedimiento establecido en el manual de inventarios corporativo vigente y publicado en intranet para el tema del asunto, atentamente se solicita aprobación al formato solicitud de baja de activos fijos que se adjunta, de acuerdo con el concepto técnico anexo.</p>

                                <p>Se tiene el (los) siguiente banco de baterías que técnicamente han culminado su vida útil, presentan deterioro y no se pueden volver a utilizar.</p>

                                <h3>Párrafo tres:</h3>
                                <p>En cumplimiento al procedimiento establecido en el manual de inventarios corporativo vigente y publicado en intranet para el tema del asunto, atentamente se solicita aprobación al formato solicitud de baja de activos fijos que se adjunta, de acuerdo con el concepto técnico anexo </p>

                                <p>Se tiene el (los) siguiente equipo de aire acondicionado que técnicamente ha culminado su vida útil, presenta deterioro y no se puede volver a utilizar.</p>

                                <div class="bottom-popup">
                                    <a href="#" onclick="closePopup('popup_baja')" id="btn-cerrar">Salir</a>
                                </div>
                            </div>
                        </div>
                        <div class="con-elementos" style="grid-column: 1/4;" >
                            <div class="header-con-elemen" style="padding: 20px 0px 10px 0px;">
                                <label> Ingrese la cantidad de elementos necesarios</label><input type="number" id="can_elementos" placeholder="Cantidad" value="1" style="max-width: 50px; margin-left: 15px;">
                                
                                <h5>Descripción</h5>
                                <h6>Cantidad</h6>
                            </div>
                            <div class="con-elementos-ad" id="con-elementos-ad">
                                <textarea type="text" placeholder="Ingrese el elemento a dar de baja" name="elementos[]" class="element-main" id="element-main" required></textarea>
                                <input type="number" name="cantidad_elementos[]" class="can-elementos" value="1">
                            </div>
                        </div>

                </div>

                <p>De acuerdo con el requerimiento del área de contabilidad, una vez aprobada la presente baja, estaremos enviando vía correo electrónico en PDF y Excel el formato solicitud de baja de activos fijos y el concepto técnico de baja. </p>

                <div class="con-pref">
                    <h2>Preferencias de visualización</h2>
                    <span class="con-sel-v-e">
                        <label>Representación de los elementos</label>
                        <select name="view_elements" id="select_elem">
                            <option value="0">Lista (Default)</option>
                            <option value="1">Tabla</option>
                        </select>
                    </span>
                </div>

                <div class="anx">
                    <p>Anexos:</p>

                    <label>Memorando Vicepresidencia</label>
                    <input type="number" placeholder="Cant. folios" id="cant_vice" name="cant_vice" min="1" required>
                    <input type="text" placeholder="Ingrese el GPE" id="ref_vice" name="ref_vice" required>

                    <label>Memorando Contabilidad</label>
                    <input type="number" placeholder="Cant. folios" id="cant_cont" name="cant_cont" min="1" required>
                    <input type="text" placeholder="Ingrese el EAF" id="ref_cont" name="ref_cont" required>

                    <label>Formato solicitud de baja de activos</label>
                    <input type="number" placeholder="Cant. folios" id="cant_baj" name="cant_baj" min="1" required>

                    <label>Concepto técnico de baja</label>
                    <input type="number" placeholder="Cant. folios" id="cant_co" name="cant_co" min="1" required>

                    <label>Registro fotográfico</label>
                    <input type="number" placeholder="Cant. folios" id="cant_fot" name="cant_fot" min="1" required>
                </div>

                <div class="dropdown">
                    <label for="user_elab">Elaborado por:</label>
                        <select name="user_elab" id="list_user_elab">
                            <option value="" selected hidden>Seleccionar...</option>
                                <?php for($i = 0; $i < count($general); $i++){ ?>
                                    <option value="<?php echo $general[$i]['id'] ?>"><?php echo $general[$i]['nombre'] ?></option>
                                <?php } ?>
                        </select>

                        <button type="button" onclick="openPopup('popup_elab')">Agregar</button>

                        <div class="popup-overlay" id="popup_elab">
                            <div class="popup">
                                <h2>Agregar usuario</h2>
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" id="name_elab" name="name_user_elab">

                                    <label for="etb">ETB:</label>
                                    <input type="text" id="etb_elab" name="etb_user_elab">

                                    <label for="equipo">Equipo:</label>
                                    <input type="text" id="team_elab" name="team_user_elab">

                                    <div class="bottom-popup">
                                        <button type="button" id="submit-popup-elab">Agregar</button>
                                        <a href="#" onclick="closePopup('popup_elab')" id="btn-cerrar">Cancelar</a>
                                    </div>
                            </div>
                        </div>

                    <label for="user_rev">Revisado por:</label>
                        <select name="user_rev" id="list_user_rev">
                            <option value="" selected hidden>Seleccionar...</option>
                                <?php for($i = 0; $i < count($general); $i++){ ?>
                                    <option value="<?php echo $general[$i]['id'] ?>"><?php echo $general[$i]['nombre'] ?></option>
                                <?php } ?>
                        </select>

                        <button type="button" onclick="openPopup('popup_rev')">Agregar</button>

                        <div class="popup-overlay" id="popup_rev">
                            <div class="popup">
                                <h2>Agregar usuario</h2>
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" id="name_rev" name="name_user_rev">

                                    <label for="etb">ETB:</label>
                                    <input type="text" id="etb_rev" name="etb_user_rev">

                                    <label for="equipo">Equipo:</label>
                                    <input type="text" id="team_rev" name="team_user_rev"> 

                                    <div class="bottom-popup">
                                        <button type="button" id="submit-popup-rev">Agregar</button>
                                        <a href="#" onclick="closePopup('popup_rev')" id="btn-cerrar">Cancelar</a>
                                    </div>
                            </div>
                        </div>

                        <label for="user_ap">Aprobado por:</label>
                        <select name="user_ap" id="list_user_ap">
                            <option value="" selected hidden>Seleccionar...</option>
                                <?php for($i = 0; $i < count($general); $i++){ ?>
                                        <option value="<?php echo $general[$i]['id'] ?>"><?php echo $general[$i]['nombre'] ?></option>
                                <?php } ?>
                        </select>
                        
                        <button type="button" onclick="openPopup('popup_ap')">Agregar</button>

                        <div class="popup-overlay" id="popup_ap">
                            <div class="popup">
                                <h2>Agregar usuario</h2>
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" id="name_ap" name="name_user_ap"> 

                                    <label for="etb">ETB:</label> 
                                    <input type="text" id="etb_ap" name="etb_user_ap"> 

                                    <label for="equipo">Equipo:</label>
                                    <input type="text" id="team_ap" name="rev_user_ap">

                                    <div class="bottom-popup">
                                        <button type="button" id="submit-popup-ap">Agregar</button> 
                                        <a href="#" onclick="closePopup('popup_ap')" id="btn-cerrar">Cancelar</a> 
                                    </div>
                            </div>
                        </div>
                </div>
            </div>

            <hr>

            <footer>

                    <input type="button" id="send" value="Siguiente" onclick="openPopup('popup_send')">

                        <div class="popup-overlay" id="popup_send">
                            <div class="popup">
                                <img src="assets/Image/exclamacion.svg" alt="" id="img_send">
                                <h2 id="tittle_send">¿Desea exportar este archivo?</h2>
                                <p id="text_send">Al seleccionar la opción de "siguiente" se redireccionara al formulaio para la generación del segundo memorando (de GPE a Vicepresidencia).</p>

                                <div class="bottom-popup">
                                    <button type="button" class="send_word" id="send_export_document" onclick="openPopup('two_memo')">Siguiente</button>
                                    <a href="#" onclick="closePopup('popup_send')" id="btn-cerrar">Cancelar</a>
                                </div>
                            </div>
                        </div>            
           </footer>
        </form>
    </div>

    <script src="./librerias/jquery.js"></script>
    <script src="./assets/scripts/script.js"></script>
    <script src="./assets/scripts/om_user.js"></script>

</body>
</html> 