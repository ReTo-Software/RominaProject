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
		$directorio = "img/downloads/";
		$extension = strtolower( end( explode( "." , $_FILES["file"]["name"] ) ) );

		if ($_FILES["file"]["size"] < 10*(1048576))// 2^20 = 1048576 = 1Mb
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

				if(file_exists( $directorio . $name ))
					$name = date('Ydmhis_') . $name;

				move_uploaded_file( $_FILES["file"]["tmp_name"],
					$directorio_imagenes . $name );

				echo "Stored in: " . $directorio . $name;
		    }
		}
		else
		{
			echo "Invalid file";
		}
		$q = 'INSERT INTO downloads (id, name, url) VALUES (null, "'.$_POST['name'].'","'.$name.'");';
		$bd->query($q);
		break;
	
	case 'del':
		$j = 0;
		if (!empty($_POST['check_list']))
		{
			foreach ($_POST['check_list'] as $checkbox) 
			{
				$q = 'SELECT url FROM downloads WHERE id ='.$checkbox;
				$result = $bd->query($q);

				$nombre_img = mysql_fetch_assoc($result);
				//delete('/img/noticia'.$nombre_img);

				$q = 'DELETE FROM downloads WHERE id='.$checkbox;
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
				$directorio = "img/downloads/";
				$extension = strtolower( end( explode( "." , $_FILES["file"]["name"] ) ) );

				if ($_FILES["file"]["size"] < 10*(1048576))// 2^20 = 1048576 = 1Mb
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

						if(file_exists( $directorio . $name ))
							$name = date('Ydmhis_') . $name;

						move_uploaded_file( $_FILES["file"]["tmp_name"],
							$directorio_imagenes . $name );

						echo "Stored in: " . $directorio . $name;
				    }
				}
				else
				{
					echo "Invalid file";
				}

				$q = 'UPDATE downloads SET name="'.$_POST['name'.$j].'",url="'.$name.'" WHERE id='.$j;
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
