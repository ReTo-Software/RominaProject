<?php
include("plugins/login-update/include/session.php");

if( ( $session->logged_in and $session->isAdmin() ) ){
	// header( 'Location: ./' );
	# Agregar la ruta de la pag de administración:
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
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>ROMINA - ADMINISTRADOR -</title>
	
	<!--##################################################-->
	<!--FAVICON-->
		<!--link rel="shortcut icon" href="images/favicon.ico"-->
	<!--END FAVICON-->
	<!--##################################################-->

	<!--##################################################-->
	<!--STYLESHEETS-->

		<!--Bootstrap-->
			<link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
		<!--End Bootstrap-->

		<!--JQuery-->
			<!-- <link rel="stylesheet" href="css/jquery.tweet.css"> -->
			<!-- <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css"> -->
		<!--End JQuery-->
	
		<!--Plugins-->
			<!--Plugin Name-->
				<!-- <link rel="stylesheet" href="css/nivo-slider/nivo-slider.css"> -->
				<!-- <link rel="stylesheet" href="css/nivo-slider/themes/default/default.css"> -->
			<!--End Plugin Name-->
		<!--End Plugins-->

		<!--Local-->
			<link rel="stylesheet" href="css/main.css">
		<!--End Local-->

	<!--END STYLESHEETS-->
	<!--##################################################-->

	<!--##################################################-->
	<!--SCRIPTS-->

		<!--Bootstrap-->
			<!-- <script type="text/javascript" src="js/bootstrap.min.js" ></script> -->
			<!-- <script type="text/javascript" src="js/bootstrap-tab.js"></script> -->
		<!--End Bootstrap-->

		<!--JQuery-->
			<script type="text/javascript" src="plugins/jquery/jquery-1.9.1.min.js"></script> 
			<!-- <script type="text/javascript" src="js/jquery.tweet.js"></script> -->
			<!-- <script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script> -->
			<!-- <script type="text/javascript" src="js/jquery.mousewheel.min.js"></script> -->
			<!-- <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> -->
		<!--End JQuery-->

		<!--Plugins-->
			<!--NivoSlider-->
				<!-- <script type="text/javascript" src="js/nivo-slider/jquery.nivo.slider.js"></script> -->
			<!--End NivoSlider-->
			<!--CkEditor-->
				<script type="text/javascript" src="plugins/ckeditor/ckeditor.js"></script>
				<script type="text/javascript" src="plugins/ckeditor/styles.js"></script>
				<script type="text/javascript" src="plugins/ckeditor/lang/es.js"></script>
			<!--End CkEditor-->
		<!--End Plugins-->

		<!--Local-->
			<script type="text/javascript" src="js/main.js"></script>
		<!--End Local-->
	<!--END SCRIPTS-->
	<!--##################################################-->
</head>
<body>
	<!--Main session verification: Set "Hello" block-->
	<?php 
		if( ($session->logged_in and $session->isAdmin()) )
		{
			//echo "Bienvenido <b>$session->username</b>.";
			
		}		
	?>

	<!--Content Container: Default size 000x000 (main.css)-->
	<div id="content">
		<div id="menuContainer">
			<div class="wrapper">
				<!--Returning Image-->
				<a href="./">
					<!--img id="logo" src="img/Logo.png" title="Regresar" alt="UDM Logo"-->
				</a>
			</div>
		</div>
		<!--Second Session Verification: Set Modifier Page-->
		<?php
			if($session->logged_in)
			{
				$a = 'null';
				if ( isset( $_GET['v'] ) ) 
				{
					$a = $_GET['v'];
				}
		?>

		<!--Inside Content: Administrator List-->
		<div id="mainTab" class="tab-content bgFade">
			<!--Main Logo-->
			<img src="img/logos/rominaLogo.png"><br>

			<!--Title Administrator List-->
			<H3 style="text-align: center; display: inline;">M&oacute;dulo de administraci&oacute;n</H3>

			<!--Option List-->
			<select name="" id="" style="margin: 0 12px 10px;width: 320px;" onchange="window.location.href=this.options[this.selectedIndex].value">
				<!--Default Value-->
				<option selected value="./admin.php?v=null"> -- Seleccione -- </option>	

				<option disabled>DISCOGRAF&Iacute;A</option>
				<option value="./admin.php?v=discografiaAdd" <?php echo ($a == 'discografiaAdd' or $a == '') ? 'selected="selected"':''?> > - Agregar Disco</option>
				<option value="./admin.php?v=discografiaDel" <?php echo ($a == 'discografiaDel' or $a == '') ? 'selected="selected"':''?> > - Eliminar Discos</option>
				<option value="./admin.php?v=discografiaMod" <?php echo ($a == 'discografiaMod' or $a == '') ? 'selected="selected"':''?> > - Modificar Discos</option>			
				
				<option disabled>VIDEOS</option>
				<option value="./admin.php?v=videoAdd" <?php echo ($a == 'videoAdd' or $a == '') ? 'selected="selected"':''?> > - Agregar Video</option>
				<option value="./admin.php?v=videoDel" <?php echo ($a == 'videoDel' or $a == '') ? 'selected="selected"':''?> > - Eliminar Video</option>

				<option disabled>GALER&Iacute;A</option>
				<option value="./admin.php?v=imagenAdd" <?php echo ($a == 'imagenAdd' or $a == '') ? 'selected="selected"':''?> > - Agregar Im&aacute;gen</option>
				<option value="./admin.php?v=imagenDel" <?php echo ($a == 'imagenDel' or $a == '') ? 'selected="selected"':''?> > - Eliminar Im&aacute;genes</option>

				<option disabled>NOTICIA</option>
				<option value="./admin.php?v=noticiaAdd" <?php echo ($a == 'noticiasAdd' or $a == '') ? 'selected="selected"':''?> > - Agregar Noticia</option>
				<option value="./admin.php?v=noticiaDel" <?php echo ($a == 'noticiasDel' or $a == '') ? 'selected="selected"':''?> > - Eliminar Noticias</option>
				<option value="./admin.php?v=noticiaMod" <?php echo ($a == 'noticiasMod' or $a == '') ? 'selected="selected"':''?> > - Modificar Noticias</option>

				<option disabled>DESCARGAS</option>
				<option value="./admin.php?v=descargaAdd" <?php echo ($a == 'descargaAdd' or $a == '') ? 'selected="selected"':''?> > - Agregar Descarga</option>
				<option value="./admin.php?v=descargaDel" <?php echo ($a == 'descargaDel' or $a == '') ? 'selected="selected"':''?> > - Eliminar Descargas</option>
				<option value="./admin.php?v=descargaMod" <?php echo ($a == 'descargaMod' or $a == '') ? 'selected="selected"':''?> > - Modificar Descargas</option>
			</select>
			<br>
			<?php
				# Session Started:
				echo "Bienvenido <b>$session->username</b>. &nbsp;&nbsp;[<a href=\"plugins/login-update/useredit.php\">Cambiar contrase&ntilde;a</a>] &nbsp;&nbsp;";
				echo "[<a href=\"plugins/login-update/process.php\">Cerrar sesi&oacute;n</a>]"; // SI
				echo '<br><hr style="margin: 0 0 20px 0;">';

				#Database Information
				include_once('protected/mysql.php');

				#Holder of the content ids
				$idTxt = ''; 

				#New Mysql
				$bd = new MYSQL;

				#Connection to Database
				$bd->conectar();
				$msjNotFound = 'Lo sentimos, el contenido no pudo ser encontrado.';

				#Shitch case to select editable content
				switch ($a) 
				{
					case "":
			   		break;

			   		case "discografiaAdd":
					@include_once('protected/vistas/admin/discografiaAdd.php');
					break;

					case "discografiaMod":
					@include_once('protected/vistas/admin/discografiaMod.php');
					break;

					case "discografiaDel":
					@include_once('protected/vistas/admin/discografiaDel.php');
					break;

					case "videoAdd":
					@include_once('protected/vistas/admin/videoAdd.php');
					break;

					case "videoMod":
					@include_once('protected/vistas/admin/videoMod.php');
					break;

					case "videoDel":
					@include_once('protected/vistas/admin/videoDel.php');
					break;

					case "imagenAdd":
					@include_once('protected/vistas/admin/imagenAdd.php');
					break;

					case "imagenMod":
					@include_once('protected/vistas/admin/imagenMod.php');
					break;

					case "imagenDel":
					@include_once('protected/vistas/admin/imagenDel.php');
					break;

					case "noticiaAdd":
					@include_once('protected/vistas/admin/noticiaAdd.php');
					break;

					case "noticiaMod":
					@include_once('protected/vistas/admin/noticiaMod.php');
					break;

					case "noticiaDel":
					@include_once('protected/vistas/admin/noticiaDel.php');
					break;

					case "descargaAdd":
					@include_once('protected/vistas/admin/descargaAdd.php');
					break;

					case "descargaMod":
					@include_once('protected/vistas/admin/descargaMod.php');
					break;

					case "descargaDel":
					@include_once('protected/vistas/admin/descargaDel.php');
					break;

				}

				#Disconnect from DB
				$bd->desconectar();

			}else
			{
			?>
			<div id="mainTab" class="tab-content">
				<div style="margin: 0 auto; width: 400px;" class="bgFade">
					<H3 style="text-align: center;">M&oacute;dulo de administraci&oacute;n</H3>
					<hr style="margin: 0 0 20px 0;">

					<!--Login Form-->
					<form action="plugins/login-update/process.php" method="POST">
						<table border="0" cellspacing="0" cellpadding="3" style="margin: 0 auto;">
							<tr><td>Usuario:</td><td><input id="usuario" required="required" type="text" name="user" maxlength="30" value="<?php echo $form->value("user"); ?>"></td><td><?php echo $form->error("user"); ?></td></tr>
							<tr><td>Contrase&ntilde;a:</td><td><input required="required" type="password" name="pass" maxlength="30" value="<?php echo $form->value("pass"); ?>"></td><td><?php echo $form->error("pass"); ?></td></tr>
							<tr><td colspan="2" align="left" style="text-align: right;">
	 						<?php if($form->value("remember") != ""){ echo "checked"; } ?>
							<input type="hidden" name="sublogin" value="1">
							<input class="btn" type="submit" value="Ingresar"></td></tr>
						</table>
					</form>

					<script type="text/javascript">
						$("#usuario").focus();
					</script>
				</div>
			<?php 
			}
			?>

			</div>

		<div id="footer" style="height: 79px;">
			<span>
				Todos los derechos reservados <?php echo date("Y")?>.
			</span>
		</div>
	</body>
</html>