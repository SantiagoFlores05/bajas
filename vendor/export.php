<?php 

include './f_report.php'; 

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style_exp.css"> 
    <title>Equipos inactivos</title>
    <link rel="shortcut icon" href="../assets/image/ETB _Bogota.svg" type="image/x-icon">
</head>
<body>
    <div class="main">
        <div class="content">
            <h1>Exportar documentos</h1>

            <hr>
    
            <div class="memo">
                <div class="one_memo">
                    <div class="img">
                        <img src="../assets/image/word.svg" alt="">
                    </div>
                    <p id="mem">Memorando número uno:</p>
                    <p id="title">EAF a GPE</p>
                    <a href="./1. Memorando EAF a GPE.docx">Exportar</a>
                </div>
        
                <div class="two_memo">
                    <div class="img">
                        <img src="../assets/image/word.svg" alt="">
                    </div>
                    <p id="mem">Memorando número dos:</p>
                    <p id="title">GPE a Vicepresidencia</p>
                    <a href="./2. Memorando GPE a Vicepresidencia.docx">Exportar</a>
                </div>
        
                <div class="three_memo">
                    <div class="img">
                        <img src="../assets/image/word.svg" alt="">
                    </div>        
                    <p id="mem">Memorando número tres:</p>
                    <p id="title">EAF a Contabilidad</p>
                    <a href="./3. Memorando EAF a Contabilidad.docx">Exportar</a>
                </div>
            </div>

            <div class="alert"> 
                <img src="../assets/image/diamond-exclamation.svg" alt="">
                <p>Una vez seleccionada la opción de de "exportar" se descargara el docuento con base en los datos ingresados previamente</p>
            </div>

        </div>
    </div>
</body>
</html> 