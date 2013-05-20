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
		$directorio_imagenes = "img/news/";
		$allowedExts = array( "jpg" , "jpeg", "gif" , "png" );
		$extension = strtolower( end( explode( "." , $_FILES["file"]["name"] ) ) );

		if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/png")
			|| ($_FILES["file"]["type"] == "image/pjpeg"))
				&& ($_FILES["file"]["size"] < 10*(1048576) ) // 2^20 = 1048576 = 1Mb
				&& in_array($extension, $allowedExts))
		{
		  	if ( $_FILES["file"]["error"] > 0 )
			{
				echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
			}
			else
			{
		    	$name = iconv("utf-8", "ascii//TRANSLIT//IGNORE", $_FILES["file"]["name"] );
		
				$charsFilter = array( "\\" , "/" , ":" , "*" , "?" , "\"" ,  "<", ">" , "|" , "`" , "'" , "´" , " " );
				$name = str_replace( $charsFilter, "", $name );

				if(file_exists( $directorio_imagenes . $name ))
					$name = date('Ydmhis_') . $name;

				move_uploaded_file( $_FILES["file"]["tmp_name"],
					$directorio_imagenes . $name );

				echo "Stored in: " . $directorio_imagenes . $name;
		    }
		}
		else
		{
			echo "Invalid file";
		}
		$q = 'INSERT INTO galery (id, title, url_img) VALUES (null,"'.$_POST['title'].'", "'.$name.'");';

		$bd->query($q);
		break;
	
	case 'del':
		$j = 0;
		if (!empty($_POST['check_list']))
		{
			foreach ($_POST['check_list'] as $checkbox) 
			{
				$q = 'SELECT url_img FROM galery WHERE id ='.$checkbox;
				$result = $bd->query($q);

				$nombre_img = mysql_fetch_assoc($result);
				//delete('/img/noticia'.$nombre_img);

				$q = 'DELETE FROM galery WHERE id='.$checkbox;
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


header('Location: ./admin.php?v=null');

?>
