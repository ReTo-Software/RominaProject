<?php
include("login-update/include/session.php");

if( !( $session->logged_in and $session->isAdmin() and isset( $_POST['Submit'] ) ) ){
	header('Location: ./');
}

#
# Codificar:
# 'RT' Prefijo
# base64_encode($id); - (ID TXT)
# calcular uniqueid, substr($uuid,7,6);
# Concatenar
#
function rt_id_encode( $id ){
	return 'RT' . base64_encode( $id ) . substr( uniqid() , 7 , 6 );
}
#
# Decodificar:
# substr($codigo,2,4);
# base64_decode($id);
#
function rt_id_decode( $id ){
	return base64_decode( substr( $id , 2 , 4 ) );
}

#Database Information
include_once('protegido/mysql.php');

#New Mysql
$bd = new MYSQL;

#Connection to Database
$bd->conectar();

#Query
$q = 'UPDATE contenido SET description =\''. $_POST["textToEdit"] .'\' WHERE id=' . $_POST['edit'];

#Exec Query
$bd->query($q);

#Disconnect from DB
$bd->desconectar();

#Set Default Modifiable Content
header('Location: ./admin.php?v=null');

?>
