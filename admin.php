<?php
include("login-update/include/session.php");

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
	<title>TÍTULO PÁGINA</title>
	
	<!--##################################################-->
	<!--FAVICON-->
		<!--link rel="shortcut icon" href="images/favicon.ico"-->
	<!--END FAVICON-->
	<!--##################################################-->

	<!--##################################################-->
	<!--STYLESHEETS-->

		<!--Bootstrap-->
			<link rel="stylesheet" href="css/bootstrap.min.css">
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
			<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script> 
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
				<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
				<script type="text/javascript" src="js/ckeditor/styles.js"></script>
				<script type="text/javascript" src="js/ckeditor/lang/else.js"></script>
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
			echo "Bienvenido <b>$session->username</b>.";
			echo "[<a href=\"login-update/process.php\">Cerrar sesi&oacute;n</a>]";
		}		
	?>

	<!--Content Container: Default size 000x000 (main.css)-->
	<div id="content">
		<div id="menuContainer">
			<div class="wrapper">
				<!--Returning Image-->
				<a href="./">
					<img id="logo" src="img/Logo.png" title="Regresar" alt="UDM Logo">
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
			<img src="img/logos/logoPrincipal.png">

			<!--Title Administrator List-->
			<H3 style="text-align: center; display: inline;">M&oacute;dulo de administraci&oacute;n</H3>

			<!--Option List-->
			<select name="" id="" style="margin: 0 12px 10px;width: 320px;" onchange="window.location.href=this.options[this.selectedIndex].value">
				<!--Default Value-->
				<option selected value="./admin.php?v=null"> -- Seleccione -- </option>				
				
				<!--Block Identifier-->
				<option disabled>NOMBRE DE BLOQUE</option>				
				<!--Options-->
				<option value="./admin.php?v=opcion1" <?php echo ($a == 'opcion1' or $a == '') ? 'selected="selected"':''?> > - opcion1</option>
				<option value="./admin.php?v=opcion2" <?php echo ($a == 'opcion2' or $a == '') ? 'selected="selected"':''?> > - opcion2</option>					
				
				<!--Block MultiMod Identifier-->
				<option disabled>NOMBRE BLOQUE MULTIMOD</option>
				<option value="./admin.php?v=categoriaAdd" <?php echo ($a == 'categoriaAdd' or $a == '') ? 'selected="selected"':''?> > - Agregar categoria</option>
				<option value="./admin.php?v=categoriaDel" <?php echo ($a == 'categoriaDel' or $a == '') ? 'selected="selected"':''?> > - Eliminar categoria</option>
				<option value="./admin.php?v=categoriaMod" <?php echo ($a == 'categoriaMod' or $a == '') ? 'selected="selected"':''?> > - Modificar categoria</option>
			</select>

			<?php
				# Session Started:
				echo "Bienvenido <b>$session->username</b>. &nbsp;&nbsp;[<a href=\"login-update/useredit.php\">Cambiar contrase&ntilde;a</a>] &nbsp;&nbsp;";
				echo "[<a href=\"login-update/process.php\">Cerrar sesi&oacute;n</a>]"; // SI
				echo '<br><hr style="margin: 0 0 20px 0;">';

				#Database Information
				include_once('protegido/mysql.php');

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

					case "Content to modify":
					@include_once('protegido/vistas/admin/Content_to_modify.php');
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
					<form action="login-update/process.php" method="POST">
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