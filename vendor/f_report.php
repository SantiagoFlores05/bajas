<?php

require ('../config/conexion.php');
$sql = "select *from usuarios";
$result = $db->query($sql);
require ('./phpoffice/phpword/bootstrap.php');

// CREACIÓN DEL PRIMER DOCUMENTO 

    $phpWord = new \PhpOffice\PhpWord\PhpWord();
    $phpWord->getSettings()->setHideGrammaticalErrors(true);
    $phpWord->getSettings()->setHideSpellingErrors(true);

    $section = $phpWord->addSection();

    $pageStyle = $section->getStyle();

    // Agregar encabezado

        $header = $section->addHeader();
        $header -> marginTop(0);

    // Variables GET

        $id = $_GET['om_memo'];

    // Variables de fuente, estilos y alineación del texto 

        $fontStyleEnc = array ('name' => 'Arial', 'size' => 8, 'line' => 1000, 'color' => '#808080'); 
        $fontStyleT = array ('name' => 'Arial', 'size' => 10, 'bold' => true);
        $fontStyleF = array ('name' => 'Arial', 'size' => 10, 'bold' => false);
        $fontStyleAnx = array ('name' => 'Arial', 'size' => 7, 'bold' => false);
        $fontStyleFoo = array ('name' => 'Calibri', 'size' => 8, 'bold' => false);
        $styleRightAlign = array ('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::END);
        $styleBothAlign = array ('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH);

    // Contenedor del encabezado
        
        $table = $header->addTable();
        $table->addRow();

        $table->addCell(5000)->addText('<w:br/>Carrera 8 No 20-70 Oficina de Correspondencia ETB <w:br/>Código postal: <w:br/>Conmutador:', $fontStyleEnc);

        $table->addCell(5000)->addImage(__DIR__ . '/../assets/image/etb_export.png',
                                        array(  'width'  => 70,
                                                'height' => 55,
                                                'align'  => 'right' ));

    // Memorando y código de referencia

        $table_two = $section->addTable();
        $table_two ->addRow();

        $celda = $table_two->addCell();
        $celda->addText('MEMORANDO' , $fontStyleT);   

        $table_two->addCell(7500)->addText('EAF '. $id, $fontStyleT, $styleRightAlign);

        $section->addLine(
                array(  'weight' => 1, 
                        'width' => 450, 
                        'height' => 0,  
                        'color' => '000000' ));


        $table_three = $section->addTable();
        $table_three ->addRow();

        $celda = $table_three->addCell(900);
        $celda->addText('Para:', $fontStyleF);

        $table_four = $section->addTable();
        $table_four ->addRow();

        $celda = $table_four->addCell(900);
        $celda->addText('De:' , $fontStyleF); 

    // Usuarios

        $people = "SELECT bajas_id, usuarios_id, nombre, rol, campo, profesional, etb, firma, equipo, rol.id AS id_rol FROM `bajas_has_usuarios` INNER JOIN usuarios on usuarios_id = usuarios.id INNER JOIN rol ON rol.id = rol_id WHERE bajas_id = '$id';";

        $result = $db->query($people);

    // Asuntos

        $as = "SELECT asunto FROM bajas WHERE id = '$id'";

        $re_as = $db->query($as);

        $para = '';
        $de = '';
        $elaboro = '';
        $reviso = '';
        $aprobo = '';

        while($row = $result -> fetch_assoc()){
            if($row['id_rol'] == 1){
                $para = [$row['nombre'], $row['profesional'], $row['equipo'], $row['campo'], $row['firma']];
            }
            if($row['id_rol'] == 2){
                $de = [$row['nombre'], $row['profesional'], $row['equipo'], $row['campo'], $row['firma']];
            }
            if($row['id_rol'] == 3){
                $elaboro = [$row['nombre'], $row['equipo'], $row['etb'], $row['firma']];
            }
            if($row['id_rol'] == 4){
                $reviso = [$row['nombre'], $row['equipo'], $row['etb'], $row['firma']];
            }
            if($row['id_rol'] == 5){
                $aprobo = [$row['nombre'], $row['equipo'], $row['etb'], $row['firma']];
            }
        }

        $table_three->addCell(7500)->addText($para[0].'<w:br/>'.$para[3],$fontStyleF);  
        $table_four->addCell(7500)->addText($de[0].'<w:br/>'.$de[3],$fontStyleF);   

        $fontStyle = array('bold' => false);

        $table_five = $section->addTable();
        $table_five ->addRow();

        $celda = $table_five->addCell(900);
        $celda->addText('Asunto: ' , $fontStyleF);

        $asunto = '';

        while($row = $re_as -> fetch_assoc()){
            $asunto = $row['asunto'];
        }

        $table_five->addCell(7500)->addText($asunto, $fontStyle);

    // Datos no alterables 

        $table_six = $section->addTable();
        $table_six ->addRow();

        $celda = $table_six->addCell(1500);
        $celda->addText('Fecha:', $fontStyleF);

        $styleRightAlign = array(
            'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::END
        );      
        $fontStyle = array('bold' => false);
        $table_six->addCell(8000)->addText('CECO: VT043', $fontStyleT, $styleRightAlign);

        $section->addLine(
            array(  'weight' => 1, 
                    'width' => 450, 
                    'height' => 0,  
                    'color' => '000000' ));

        $section->addText('Cordial saludo.' , $fontStyleF);     

        if($_GET['parrafo'] == 1){
            $section->addText('En cumplimiento al procedimiento establecido en el manual de inventarios corporativo vigente y publicado en intranet para el tema del asunto, atentamente se solicita aprobación al formato solicitud baja de activos fijos que se adjunta de los elementos listados a continuación, teniendo en cuenta el concepto entregado por la Gerencia Planeación de Tecnología en el memorando 365-2012 “Concepto de Planeación de Red para las centrales del Proyecto de Optimización TDM”.',$fontStyleF, $styleBothAlign);
        }else if($_GET['parrafo'] == 2){
            $section->addText('En cumplimiento al procedimiento establecido en el manual de inventarios corporativo vigente y publicado en intranet para el tema del asunto, atentamente se solicita aprobación al formato solicitud de baja de activos fijos que se adjunta, de acuerdo con el concepto técnico anexo. <w:br/><w:br/>Se tiene el (los) siguiente banco de baterías que técnicamente han culminado su vida útil, presentan deterioro y no se pueden volver a utilizar.',$fontStyleF, $styleBothAlign);
        }else if($_GET['parrafo'] == 3){
            $section->addText('En cumplimiento al procedimiento establecido en el manual de inventarios corporativo vigente y publicado en intranet para el tema del asunto, atentamente se solicita aprobación al formato solicitud de baja de activos fijos que se adjunta, de acuerdo con el concepto técnico anexo <w:br/>Se tiene el (los) siguiente equipo de aire acondicionado que técnicamente ha culminado su vida útil, presenta deterioro y no se puede volver a utilizar.',$fontStyle, $styleBothAlign);
        }

        $elem = "SELECT element_one, element_two, element_three, bajas_id FROM elementos WHERE bajas_id = '$id'";

        $result_elem = $db->query($elem);

        $element = '';

        while($row = $result_elem -> fetch_assoc()){
            $element = [$row['element_one'], $row['element_two'], $row['element_three']];
        }

        Foreach($element as $value){
            if ($value!=''){
                $section->addListItem($value, 0);
            }    
        } 

        $ax = "SELECT cantidad, referencia, tipoAnexo_id FROM anexos WHERE bajas_id = '$id'";

        $result_ax = $db->query($ax);

        $mem_vice = '';
        $mem_cont = '';
        $form_baja = '';
        $cant_co = '';
        $reg_fot = '';

        while($row = $result_ax -> fetch_assoc()){
            if($row['tipoAnexo_id'] == 1){
                $mem_vice = [$row['cantidad'], $row['referencia']];
            }
            if($row['tipoAnexo_id'] == 2){
                $mem_cont = [$row['cantidad'], $row['referencia']];
            }
            if($row['tipoAnexo_id'] == 3){
                $form_baja = [$row['cantidad']];
            }
            if($row['tipoAnexo_id'] == 5){
                $cant_co = [$row['cantidad']];
            }
            if($row['tipoAnexo_id'] == 4){
                $reg_fot = [$row['cantidad']];
            }
        }

        $cant_fol = $mem_vice[0] + $mem_cont[0] + $form_baja[0] + $cant_co[0] + $reg_fot[0];

        $section->addText('De acuerdo con el requerimiento del área de contabilidad, una vez aprobada la presente baja, estaremos enviando vía correo electrónico en PDF y Excel el formato solicitud de baja de activos fijos y el concepto técnico de baja.', $fontStyleF, $styleBothAlign );

        $section->addText('Por tal motivo se anexan ' . $cant_fol . ' folios originales enunciados en el pie de página.' , $fontStyleF, $styleBothAlign );

        $section->addText('<w:br/>Cordialmente,', $fontStyleT , $styleBothAlign );

            if($de[4]== 0){
                $section->addImage(__DIR__ . '/../assets/image/signa/user.png',
                                    array(  'width'  => 100,
                                            'height' => 50,
                                            'marginTop' => 0,
                                            'align'  => 'left' ));
            }else{
                $section->addImage(__DIR__ . '/' . $de[4],
                                    array(  'width'  => 100,
                                            'height' => 50,
                                            'marginTop' => 0,
                                             'align'  => 'left' ));
            }

        $section -> addText($de[0] . '<w:br/>' . 
                            $de[1] . '<w:br/>' . 
                            $de[2] . '<w:br/>' . 
                            $de[3] , $fontStyleT);

        $table_seven = $section->addTable();
        $table_seven ->addRow();

        $celda = $table_seven->addCell(900);
        $celda->addText('Anexo:' , $fontStyleAnx);

        $fontStyle = array('bold' => false);

        $table_seven->addCell(7500)->addText($cant_fol . ' folios originales <w:br/> - Memorando Vicepresidencia GPE '. $mem_vice[1] .' - ' . $mem_vice[0] . ' folio. <w:br/> - Memorando Contabilidad EAF '. $mem_cont[1] .' - ' . $mem_cont[0] . ' folio. <w:br/> - Formato solicitud de baja de activos fijos 07-07.4-F-017-1.0 - v 1 – ' .$form_baja[0]. ' folio. <w:br/> - Concepto técnico de baja – ' . $cant_co[0] . ' folios. <w:br/> - Registro fotográfico – '.$reg_fot[0].' folios.' . '<w:br/>' , $fontStyleAnx);

        $styleImage = 
            array(  'width'  => 10,
                    'height' => 5,
                    'marginTop' => 0 );

        $imgOne = (__DIR__ . '/../assets/image/signa/user.png');
        $imgTwo = (__DIR__ . '/../assets/image/signa/user.png');
        $imgThr = (__DIR__ . '/../assets/image/signa/user.png');

        $table = $section->addTable();
        $table->addRow();

        $table->addCell(1000)->addText('Elaboró: <w:br/>Revisó: <w:br/>Aprobó:', $fontStyleAnx); 
        $table->addCell(3000)->addText($elaboro[0].'<w:br/>'.$reviso[0].'<w:br/>'.$aprobo[0],$fontStyleAnx); 
        $table->addCell(1000)->addText($elaboro[2].'<w:br/>'.$reviso[2].'<w:br/>'.$aprobo[2],$fontStyleAnx); 
        $table->addCell(2500)->addText($elaboro[1].'<w:br/>'.$reviso[1].'<w:br/>'.$aprobo[1],$fontStyleAnx); 

    // Agregar pie de página 

        $footer = $section->addFooter();

        $tableFooter = $section->addFooter()->addTable();
        $tableFooter->addRow(20);
        $cellFooter = $tableFooter->addCell(8000);
        $cellFooter->addText('07-07.7-F-025-v.4 <w:br/>“Una vez impreso este documento, se considerará documento no controlado”.', $fontStyleFoo);

        $fechaActual = date('d/m/Y');

        $cellFecha = $tableFooter->addCell(1000);
        $cellFecha->addText($fechaActual, $fontStyleFoo);

        $footer->setMarginBottom(0);

    // Adding Text element with font customized using explicitly created font style object...
     
        $fontStyle = new \PhpOffice\PhpWord\Style\Font();
        $fontStyle->setBold(true);
        $fontStyle->setName('Arial');
        $fontStyle->setSize(10);
        $myTextElement = $section->addText(null);
        $myTextElement -> setFontStyle($fontStyle);

    // Guardar documento en formato .docx

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('1. Memorando EAF a GPE.docx');

// CREACIÓN DEL SEGUNDO DOCUMENTO 

    $phpWord = new \PhpOffice\PhpWord\PhpWord();
    $phpWord->getSettings()->setHideGrammaticalErrors(true);
    $phpWord->getSettings()->setHideSpellingErrors(true);
    
    $section = $phpWord->addSection();

    // Agregar encabezado

        $header = $section->addHeader();
        $header -> marginTop(0);

    // Variables GET

        $id = $_GET['om_memo'];
        $id_sm = $_GET['sm_memo'];

    // Variables de fuente, estilos y alineación del texto 

        $fontStyleEnc = array('name' => 'Arial', 'size' => 8, 'line' => 1000, 'color' => '#808080'); 
        $fontStyleT = array('name' => 'Arial', 'size' => 10, 'bold' => true);
        $fontStyleF = array('name' => 'Arial', 'size' => 10, 'bold' => false);
        $fontStyleAnx = array('name' => 'Arial', 'size' => 7, 'bold' => false);
        $fontStyleFoo = array('name' => 'Calibri', 'size' => 8, 'bold' => false);
        $styleRightAlign = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::END);
        $styleBothAlign = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH);

    // Contenedor del encabezado

        $table = $header->addTable();
        $table->addRow();

        $table->addCell(5000)->addText('<w:br/>Carrera 8 No 20-70 Oficina de Correspondencia ETB <w:br/>Código postal: <w:br/>Conmutador:', $fontStyleEnc);

        $table->addCell(5000)->addImage(__DIR__ . '/../assets/image/etb_export.png',
                                    array(  'width'  => 70,
                                            'height' => 55,
                                            'align'  => 'right' ));

    // Memorando y código de referencia

        $table_two = $section->addTable();
        $table_two ->addRow();

        $celda = $table_two->addCell();
        $celda->addText('MEMORANDO' , $fontStyleT);   

        $table_two->addCell(7500)->addText('EAF '. $id_sm, $fontStyleT, $styleRightAlign);

        $section->addLine(
                    array(  'weight' => 1, 
                            'width' => 450, 
                            'height' => 0,  
                            'color' => '000000' ));

        $table_three = $section->addTable();
        $table_three ->addRow();

        $celda = $table_three->addCell(900);
        $celda->addText('Para:', $fontStyleF);

        $table_four = $section->addTable();
        $table_four ->addRow();

        $celda = $table_four->addCell(900);
        $celda->addText('De:' , $fontStyleF); 

    // Usuarios
    
        $people_sm = "SELECT bajas_id, usuarios_id, nombre, rol, campo, profesional, etb, firma, equipo, rol.id AS id_rol FROM `bajas_has_usuarios` INNER JOIN usuarios on usuarios_id = usuarios.id INNER JOIN rol ON rol.id = rol_id WHERE bajas_id = '$id_sm';";

        $result = $db->query($people_sm);

    // Asuntos

        $as = "SELECT asunto FROM bajas WHERE id = '$id'";

        $re_as = $db->query($as);

        $para = '';
        $de = '';
        $elaboro = '';
        $reviso = '';
        $aprobo = '';

        while($row = $result -> fetch_assoc()){
            if($row['id_rol'] == 1){
                $para = [$row['nombre'], $row['profesional'], $row['equipo'], $row['campo'], $row['firma']];
            }
            if($row['id_rol'] == 2){
                $de = [$row['nombre'], $row['profesional'], $row['equipo'], $row['campo'], $row['firma']];
            }
            if($row['id_rol'] == 3){
                $elaboro = [$row['nombre'], $row['equipo'], $row['etb'], $row['firma']];
            }
            if($row['id_rol'] == 4){
                $reviso = [$row['nombre'], $row['equipo'], $row['etb'], $row['firma']];
            }
            if($row['id_rol'] == 5){
                $aprobo = [$row['nombre'], $row['equipo'], $row['etb'], $row['firma']];
            }
        }

        $table_three->addCell(7500)->addText($para[0]. '<w:br/>'. $para[3], $fontStyleF);  
        $table_four->addCell(7500)->addText($de[0]. '<w:br/>'. $de[3], $fontStyleF);   

        $fontStyle = array('bold' => false);

        $table_five = $section->addTable();
        $table_five ->addRow();

        $celda = $table_five->addCell(900);
        $celda->addText('Asunto: ' , $fontStyleF);

        $asunto = '';

        while($row = $re_as -> fetch_assoc()){
            $asunto = $row['asunto'];
        }

        $table_five->addCell(7500)->addText($asunto, $fontStyle);

    // Datos no alterables 

        $table_six = $section->addTable();
        $table_six ->addRow();

        $celda = $table_six->addCell(900);
        $celda->addText('Fecha:', $fontStyleF);

        $styleRightAlign = array(
            'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::END
        );      
        $fontStyle = array('bold' => false);
        $table_six->addCell(8000)->addText('CECO: VT040', $fontStyleT, $styleRightAlign);

        $section->addLine(
                        array(  'weight' => 1, 
                                'width' => 450, 
                                'height' => 0,  
                                'color' => '000000' ));

        $section->addText('Cordial saludo.' , $fontStyleF);     

        if($_GET['parrafo'] == 1){
            $section->addText('En cumplimiento al procedimiento establecido en el manual de inventarios corporativo vigente y publicado en intranet para el tema del asunto, atentamente se solicita aprobación al formato solicitud baja de activos fijos que se adjunta de los elementos listados a continuación, teniendo en cuenta el concepto entregado por la Gerencia Planeación de Tecnología en el memorando 365-2012 “Concepto de Planeación de Red para las centrales del Proyecto de Optimización TDM”.',$fontStyleF, $styleBothAlign );
        }else if($_GET['parrafo'] == 2){
            $section->addText('En cumplimiento al procedimiento establecido en el manual de inventarios corporativo vigente y publicado en intranet para el tema del asunto, atentamente se solicita aprobación al formato solicitud de baja de activos fijos que se adjunta, de acuerdo con el concepto técnico anexo. <w:br/><w:br/>Se tiene el (los) siguiente banco de baterías que técnicamente han culminado su vida útil, presentan deterioro y no se pueden volver a utilizar.',$fontStyleF, $styleBothAlign );
        }else if($_GET['parrafo'] == 3){
            $section->addText('En cumplimiento al procedimiento establecido en el manual de inventarios corporativo vigente y publicado en intranet para el tema del asunto, atentamente se solicita aprobación al formato solicitud de baja de activos fijos que se adjunta, de acuerdo con el concepto técnico anexo <w:br/>Se tiene el (los) siguiente equipo de aire acondicionado que técnicamente ha culminado su vida útil, presenta deterioro y no se puede volver a utilizar.',$fontStyle, $styleBothAlign );
        }
    
        $elem = "SELECT element_one, element_two, element_three, bajas_id FROM elementos WHERE bajas_id = '$id'";
    
        $result_elem = $db->query($elem);
    
        $element = '';
    
        while($row = $result_elem -> fetch_assoc()){
            $element = [$row['element_one'], $row['element_two'], $row['element_three']];
        }
    
        Foreach($element as $value){
            if ($value!=''){
                $section->addListItem($value, 0);
            }    
        }      
    
        $ax = "SELECT cantidad, referencia, tipoAnexo_id FROM anexos WHERE bajas_id = '$id'";
    
        $result_ax = $db->query($ax);
    
        $mem_vice = '';
        $mem_cont = '';
        $form_baja = '';
        $cant_co = '';
        $reg_fot = '';

        while($row = $result_ax -> fetch_assoc()){
            if($row['tipoAnexo_id'] == 1){
                $mem_vice = [$row['cantidad'], $row['referencia']];
            }
            if($row['tipoAnexo_id'] == 2){
                $mem_cont = [$row['cantidad'], $row['referencia']];
            }
            if($row['tipoAnexo_id'] == 3){
                $form_baja = [$row['cantidad']];
            }
            if($row['tipoAnexo_id'] == 5){
                $cant_co = [$row['cantidad']];
            }
            if($row['tipoAnexo_id'] == 4){
                $reg_fot = [$row['cantidad']];
            }
        }

        $cant_fol = $mem_cont[0] + $form_baja[0] + $cant_co[0] + $reg_fot[0];

        $section->addText('De acuerdo con el requerimiento del área de contabilidad, una vez aprobada la presente baja, estaremos enviando vía correo electrónico en PDF y Excel el formato solicitud de baja de activos fijos y el concepto técnico de baja.', $fontStyleF, $styleBothAlign );

        $section->addText('Por tal motivo se anexan ' . $cant_fol . ' folios originales enunciados en el pie de página.' , $fontStyleF, $styleBothAlign );

        $section->addText('<w:br/>Cordialmente,', $fontStyleT , $styleBothAlign );

            if($de[4]== 0){
                $section->addImage(__DIR__ . '/../assets/image/signa/user.png',
                                    array(  'width'  => 100,
                                            'height' => 50,
                                            'marginTop' => 0,
                                            'align'  => 'left' ));
            }else{
                $section->addImage(__DIR__ . '/' . $de[4],
                    array(  'width'  => 100,
                            'height' => 50,
                            'marginTop' => 0,
                            'align'  => 'left' ));
            }

        $section -> addText($de[0] . '<w:br/>' .
                            $de[1] . '<w:br/>' . 
                            $de[2] . '<w:br/>' . 
                            $de[3] , $fontStyleT);

        $table_seven = $section->addTable();
        $table_seven ->addRow();

        $celda = $table_seven->addCell(900);
        $celda->addText('Anexo:' , $fontStyleAnx);

        $fontStyle = array('bold' => false);

        $table_seven->addCell(7500)->addText($cant_fol .' folios originales <w:br/> - Memorando Contabilidad EAF '. $mem_cont[1] .' - ' . $mem_cont[0] . ' folio. <w:br/> - Formato solicitud de baja de activos fijos 07-07.4-F-017-1.0 - v 1 – ' .$form_baja[0]. ' folio. <w:br/> - Concepto técnico de baja – ' . $cant_co[0] . ' folios. <w:br/> - Registro fotográfico – '.$reg_fot[0].' folios.' . '<w:br/>' , $fontStyleAnx);
        
        $table = $section->addTable();
        $table->addRow();
        
        $table->addCell(1000)->addText('Elaboró: <w:br/>Revisó: <w:br/>Aprobó:', $fontStyleAnx);
        $table->addCell(3000)->addText($elaboro[0].'<w:br/>'.$reviso[0].'<w:br/>'.$aprobo[0],$fontStyleAnx);
        $table->addCell(1000)->addText($elaboro[2].'<w:br/>'.$reviso[2].'<w:br/>'.$aprobo[2],$fontStyleAnx);
        $table->addCell(2500)->addText($elaboro[1].'<w:br/>'.$reviso[1].'<w:br/>'.$aprobo[1],$fontStyleAnx);

    // Agregar pie de página 

        $footer = $section->addFooter();

        $tableFooter = $section->addFooter()->addTable();
        $tableFooter->addRow(20);
        $cellFooter = $tableFooter->addCell(8000);
        $cellFooter->addText('07-07.7-F-025-v.4 <w:br/>“Una vez impreso este documento, se considerará documento no controlado”.', $fontStyleFoo);

        $fechaActual = date('d/m/Y');

        $cellFecha = $tableFooter->addCell(1000);
        $cellFecha->addText($fechaActual, $fontStyleFoo);

        $footer->setMarginBottom(0);

    // Adding Text element with font customized using explicitly created font style object...}

        $fontStyle = new \PhpOffice\PhpWord\Style\Font();
        $fontStyle->setBold(true);
        $fontStyle->setName('Arial');
        $fontStyle->setSize(10);
        $myTextElement = $section->addText(null);
        $myTextElement->setFontStyle($fontStyle);

    // Guardar documento en formato .docx

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('2. Memorando GPE a Vicepresidencia.docx');

// CREACIÓN DEL TERCER DOCUMENTO 

    $phpWord = new \PhpOffice\PhpWord\PhpWord();
    $phpWord->getSettings()->setHideGrammaticalErrors(true);
    $phpWord->getSettings()->setHideSpellingErrors(true);

    $section = $phpWord->addSection();

    // Agregar encabezado

        $header = $section->addHeader();    

    // Variables GET

        $id = $_GET['om_memo'];
        $id_sm = $_GET['sm_memo'];
        $id_t = $_GET['t_memo'];

    // Variables de fuente, estilos y alineación del texto 

        $fontStyleEnc = array('name' => 'Arial', 'size' => 8, 'line' => 1000, 'color' => '#808080'); 
        $fontStyleT = array('name' => 'Arial', 'size' => 10, 'bold' => true);
        $fontStyleF = array('name' => 'Arial', 'size' => 10, 'bold' => false);
        $fontStyleAnx = array('name' => 'Arial', 'size' => 7, 'bold' => false);
        $fontStyleFoo = array('name' => 'Calibri', 'size' => 8, 'bold' => false);
        $styleRightAlign = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::END);
        $styleBothAlign = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH);

    // Contenedor del encabezadomm
    
        $table = $header->addTable();
        $table->addRow();


        $table->addCell(5000)->addText('<w:br/>Carrera 8 No 20-70 Oficina de Correspondencia ETB <w:br/>Código postal: <w:br/>Conmutador:', $fontStyleEnc);

        $table->addCell(5000)->addImage(__DIR__ . '/../assets/image/etb_export.png',
                                    array(  'width'  => 70,
                                            'height' => 55,
                                            'align'  => 'right' ));

    // Memorando y código de referencia

        $table_two = $section->addTable();
        $table_two ->addRow();

        $celda = $table_two->addCell();
        $celda->addText('MEMORANDO' , $fontStyleT);   

        $table_two->addCell(7500)->addText('EAF '. $id_t, $fontStyleT, $styleRightAlign);

        $section->addLine(
            array(  'weight' => 1, 
                    'width' => 450, 
                    'height' => 0,  
                    'color' => '000000' ));

        $table_three = $section->addTable();
        $table_three ->addRow();

        $celda = $table_three->addCell(900);
        $celda->addText('Para:', $fontStyleF);

        $table_four = $section->addTable();
        $table_four ->addRow();

        $celda = $table_four->addCell(900);
        $celda->addText('De:' , $fontStyleF); 

    // Usuarios
    
        $people = "SELECT bajas_id, usuarios_id, nombre, rol, campo, profesional, etb, firma, equipo, rol.id AS id_rol FROM `bajas_has_usuarios` INNER JOIN usuarios on usuarios_id = usuarios.id INNER JOIN rol ON rol.id = rol_id WHERE bajas_id = '$id_t';";

        $result = $db->query($people);

    // Asuntos

        $as = "SELECT asunto FROM bajas WHERE id = '$id'";

        $re_as = $db->query($as);

        $para = '';
        $de = '';
        $elaboro = '';
        $reviso = '';
        $aprobo = '';

        while($row = $result -> fetch_assoc()){
            if($row['id_rol'] == 1){
                $para = [$row['nombre'], $row['profesional'], $row['equipo'], $row['campo'], $row['firma']];
            }
            if($row['id_rol'] == 2){
                $de = [$row['nombre'], $row['profesional'], $row['equipo'], $row['campo'], $row['firma']];
            }
            if($row['id_rol'] == 3){
                $elaboro = [$row['nombre'], $row['equipo'], $row['etb'], $row['firma']];
            }
            if($row['id_rol'] == 4){
                $reviso = [$row['nombre'], $row['equipo'], $row['etb'], $row['firma']];
            }
            if($row['id_rol'] == 5){
                $aprobo = [$row['nombre'], $row['equipo'], $row['etb'], $row['firma']];
            }
        }

        $table_three->addCell(7500)->addText($para[0]. '<w:br/>'. $para[3], $fontStyleF);  
        $table_four->addCell(7500)->addText($de[0]. '<w:br/>'. $de[3], $fontStyleF);   

        $fontStyle = array('bold' => false);

        $table_five = $section->addTable();
        $table_five ->addRow();

        $celda = $table_five->addCell(900);
        $celda->addText('Asunto: ' , $fontStyleF);

        $asunto = '';

        while($row = $re_as -> fetch_assoc()){
            $asunto = $row['asunto'];
        }

        $table_five->addCell(7500)->addText($asunto, $fontStyle);

    // Datos no alterables 

        $table_six = $section->addTable();
        $table_six ->addRow();

        $celda = $table_six->addCell(900);
        $celda->addText('Fecha:', $fontStyleF);

        $styleRightAlign = array(
            'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::END
        );      
        $fontStyle = array('bold' => false);
        $table_six->addCell(8000)->addText('CECO: VT043', $fontStyleT, $styleRightAlign);

        $section->addLine(
            array(  'weight' => 1, 
                    'width' => 450, 
                    'height' => 0,  
                    'color' => '000000' ));

        $section->addText('Cordial saludo.' , $fontStyleF);     

        if($_GET['parrafo'] == 1){
            $section->addText('En cumplimiento al procedimiento establecido en el manual de inventarios corporativo vigente y publicado en intranet para el tema del asunto, atentamente se solicita aprobación al formato solicitud baja de activos fijos que se adjunta de los elementos listados a continuación, teniendo en cuenta el concepto entregado por la Gerencia Planeación de Tecnología en el memorando 365-2012 “Concepto de Planeación de Red para las centrales del Proyecto de Optimización TDM”.',$fontStyleF, $styleBothAlign );
        }else if($_GET['parrafo'] == 2){
            $section->addText('En cumplimiento al procedimiento establecido en el manual de inventarios corporativo vigente y publicado en intranet para el tema del asunto, atentamente se solicita aprobación al formato solicitud de baja de activos fijos que se adjunta, de acuerdo con el concepto técnico anexo. <w:br/><w:br/>Se tiene el (los) siguiente banco de baterías que técnicamente han culminado su vida útil, presentan deterioro y no se pueden volver a utilizar.',$fontStyleF, $styleBothAlign );
        }else if($_GET['parrafo'] == 3){
            $section->addText('En cumplimiento al procedimiento establecido en el manual de inventarios corporativo vigente y publicado en intranet para el tema del asunto, atentamente se solicita aprobación al formato solicitud de baja de activos fijos que se adjunta, de acuerdo con el concepto técnico anexo <w:br/>Se tiene el (los) siguiente equipo de aire acondicionado que técnicamente ha culminado su vida útil, presenta deterioro y no se puede volver a utilizar.',$fontStyle, $styleBothAlign );
        }

        $elem = "SELECT element_one, element_two, element_three, bajas_id FROM elementos WHERE bajas_id = '$id'";

        $result_elem = $db->query($elem);

        $element = '';

        while($row = $result_elem -> fetch_assoc()){
            $element = [$row['element_one'], $row['element_two'], $row['element_three']];
        }

        Foreach($element as $value){
            if ($value!=''){
                $section->addListItem($value, 0);
            }    
        } 

        $ax = "SELECT cantidad, referencia, tipoAnexo_id FROM anexos WHERE bajas_id = '$id'";

        $result_ax = $db->query($ax);

        $mem_vice = '';
        $mem_cont = '';
        $form_baja = '';
        $cant_co = '';
        $reg_fot = '';

        while($row = $result_ax -> fetch_assoc()){
            if($row['tipoAnexo_id'] == 1){
                $mem_vice = [$row['cantidad'], $row['referencia']];
            }
            if($row['tipoAnexo_id'] == 2){
                $mem_cont = [$row['cantidad'], $row['referencia']];
            }
            if($row['tipoAnexo_id'] == 3){
                $form_baja = [$row['cantidad']];
            }
            if($row['tipoAnexo_id'] == 5){
                $cant_co = [$row['cantidad']];
            }
            if($row['tipoAnexo_id'] == 4){
                $reg_fot = [$row['cantidad']];
            }
        }

        $cant_fol = $form_baja[0] + $cant_co[0] + $reg_fot[0];

        $section->addText('De acuerdo con el requerimiento del área de contabilidad, una vez aprobada la presente baja, estaremos enviando vía correo electrónico en PDF y Excel el formato solicitud de baja de activos fijos y el concepto técnico de baja.', $fontStyleF, $styleBothAlign );

        $section->addText('Por tal motivo se anexan ' . $cant_fol . ' folios originales enunciados en el pie de página.' , $fontStyleF, $styleBothAlign );

        $section->addText('<w:br/>Cordialmente,', $fontStyleT , $styleBothAlign );

            if($de[4]== 0){
                $section->addImage(__DIR__ . '/../assets/image/signa/user.png',
                    array(  'width'  => 100,
                            'height' => 50,
                            'marginTop' => 0,
                            'align'  => 'left' ));
            }else{
                $section->addImage(__DIR__ . '/' . $de[4],
                    array(  'width'  => 100,
                            'height' => 50,
                            'marginTop' => 0,
                            'align'  => 'left' ));
            }

        $section -> addText($de[0] . '<w:br/>' . 
                            $de[1] . '<w:br/>' . 
                            $de[2] . '<w:br/>' . 
                            $de[3] , $fontStyleT );

        $table_seven = $section->addTable();
        $table_seven ->addRow();

        $celda = $table_seven->addCell(900);
        $celda->addText('Anexo:' , $fontStyleAnx);

        $fontStyle = array('bold' => false);

        $table_seven->addCell(7500)->addText($cant_fol . ' folios originales <w:br/> - Formato solicitud de baja de activos fijos 07-07.4-F-017-1.0 - v 1 – ' .$form_baja[0]. ' folio. <w:br/> - Concepto técnico de baja – ' . $cant_co[0] . ' folios. <w:br/> - Registro fotográfico – '.$reg_fot[0].' folios.' . '<w:br/>' , $fontStyleAnx);

        $table = $section->addTable();
        $table->addRow();

        $table->addCell(1000)->addText('Elaboró: <w:br/>Revisó: <w:br/>Aprobó:', $fontStyleAnx);
        $table->addCell(3000)->addText($elaboro[0].'<w:br/>'.$reviso[0].'<w:br/>'.$aprobo[0],$fontStyleAnx);
        $table->addCell(1000)->addText($elaboro[2].'<w:br/>'.$reviso[2].'<w:br/>'.$aprobo[2],$fontStyleAnx);
        $table->addCell(2500)->addText($elaboro[1].'<w:br/>'.$reviso[1].'<w:br/>'.$aprobo[1],$fontStyleAnx);

    // Agregar pie de página 

        $footer = $section->addFooter();

        $tableFooter = $section->addFooter()->addTable();
        $tableFooter->addRow(20);
        $cellFooter = $tableFooter->addCell(8000);
        $cellFooter->addText('07-07.7-F-025-v.4 <w:br/>“Una vez impreso este documento, se considerará documento no controlado”.', $fontStyleFoo);

        $fechaActual = date('d/m/Y');

        $cellFecha = $tableFooter->addCell(1000);
        $cellFecha->addText($fechaActual, $fontStyleFoo);

        $footer->setMarginBottom(0);

    // Adding Text element with font customized using explicitly created font style object...

        $fontStyle = new \PhpOffice\PhpWord\Style\Font();
        $fontStyle->setBold(true);
        $fontStyle->setName('Arial');
        $fontStyle->setSize(10);
        $myTextElement = $section->addText(null);
        $myTextElement->setFontStyle($fontStyle);

    // Guardar documento en formato .docx

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('3. Memorando EAF a Contabilidad.docx');

?>