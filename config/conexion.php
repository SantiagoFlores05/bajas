<?php
mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
$db = new mysqli('localhost', 'root', '', 'baja_etb');
if($db -> connect_error> 0){
    die("Error de conexión ['. $db->connect_error . '] ");
}
?>
