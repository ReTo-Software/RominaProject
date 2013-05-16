<?php
include("login-update/include/session.php");

if( !( $session->logged_in and $session->isAdmin() and isset( $_POST['Submit'] ) ) ){
	header('Location: ./');
}

include_once('protegido/mysql.php');

# $idTxt = ''; #VARIABLES QUE ALMACENARAN LOS ID'S DEL CONTENIDO
$bd = new MYSQL;

#CONECTAR A LA BD
$bd->conectar();

switch ($_POST['function']) {
	case 'add':
		$q = 'INSERT INTO testimonios (nombre, contenido, mes_post, anio_post, fecha_ingreso, id) VALUES ("'.$_POST['nombre'].'","'.$_POST['contenidoAdd'].'","'.$_POST['mes'].'",'.$_POST['ano'].','.$_POST['ingresoAdd'].',null);';
		$bd->query($q);
		break;
	
	case 'del':
		$j = 0;
		if (!empty($_POST['check_list']))
		{
			foreach ($_POST['check_list'] as $checkbox) 
			{
				$q = 'DELETE FROM testimonios WHERE id='.$checkbox;
				$bd->query($q);
			}
		}
		break;

	case 'mod':
		$j = 0;
		while ($j <= $_POST['i']) 
		{	
			if (isset($_POST['div'.$j]))
			{
				$q = 'UPDATE testimonios SET nombre="'.$_POST['nombre'.$j].'",contenido="'.$_POST['contenido'.$j].'",mes_post="'.$_POST['mes'.$j].'",anio_post="'.$_POST['anio'.$j].'",fecha_ingreso="'.$_POST['fecha'.$j].'" WHERE id='.$j;
				$bd->query($q);
			}
			$j++;
		}
		break;

	default:
		# code...
		break;
}
# EJECUTA EL QUERY


#DESCONECTAR DE LA BD
$bd->desconectar();


header('Location: ./admin.php?v=null');

?>
