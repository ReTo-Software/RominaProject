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
		$directorio_imagenes = "img/disks/";
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
		$q = 'INSERT INTO disks (id, front, name, producers, year, tracks) VALUES (null, "'.$name.'","'.$_POST['name'].'","'.$_POST['producers'].'","'.$_POST['year'].'","'.$_POST['tracks'].'");';

		$bd->query($q);
		break;
	
	case 'del':
		$j = 0;
		if (!empty($_POST['check_list']))
		{
			foreach ($_POST['check_list'] as $checkbox) 
			{
				$q = 'SELECT front FROM disks WHERE id ='.$checkbox;
				$result = $bd->query($q);

				$nombre_img = mysql_fetch_assoc($result);
				//delete('/img/noticia'.$nombre_img);

				$q = 'DELETE FROM disks WHERE id='.$checkbox;
				$bd->query($q);
			}
		}
		break;

	case 'mod':
		$j = 0;
		while ($j <= $_POST['i']) 
		{	
			if (isset($_POST['div'.$j]) and !empty($_POST['img'.$j]))
			{
				$directorio_imagenes = "img/disks/";
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
				    }
				}
				else
				{
					echo "Invalid file";
				}

				$q = 'UPDATE disks SET front="'.$name.'",name="'.$_POST['name'.$j].'",producers="'.$_POST['producers'.$j].'",year="'.$_POST['year'.$j].'",tracks="'.$_POST['tracks'.$j].'" WHERE id='.$j;
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
