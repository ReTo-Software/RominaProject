<?php
include("plugins/login-update/include/session.php");

if( !( $session->logged_in and $session->isAdmin() and isset( $_POST['Submit'] ) ) ){
	header('Location: ./');
}

include_once('protected/mysql.php');

# $idTxt = ''; #VARIABLES QUE ALMACENARAN LOS ID'S DEL CONTENIDO
$bd = new MYSQL;

#CONECTAR A LA BD
$bd->conectar();
	
echo $_POST['function'];

switch ($_POST['function']) {
	case 'add':
		
		$url_video = $_POST['url_video'];
		$url_image= "http://img.youtube.com/vi/"strtok($url_video, '=')"/1.jpg";
		echo $url_image;


		$q = 'INSERT INTO videos (id, title, url_video, url_image) VALUES (null,"'.$_POST['title'].'","'.$_POST['url_video'].'","'.$_POST['url_image'].'");';

		$bd->query($q);
		break;
	
	case 'del':
		$j = 0;
		if (!empty($_POST['check_list']))
		{
			foreach ($_POST['check_list'] as $checkbox) 
			{
				//$q = 'SELECT image FROM news WHERE id ='.$checkbox;
				//$result = $bd->query($q);

				//$nombre_img = mysql_fetch_assoc($result);
				//delete('/img/noticia'.$nombre_img);

				$q = 'DELETE FROM videos WHERE id='.$checkbox;
				$bd->query($q);
			}
		}
		break;

	

	default:
		# code...
		break;
}
# EJECUTA EL QUERY


#DESCONECTAR DE LA BD
$bd->desconectar();


//header('Location: ./admin.php?v=null');

?>
