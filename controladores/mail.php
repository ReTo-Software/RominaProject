<?php
# Reportar errores:
// error_reporting(E_ALL); ini_set('display_errors', 'On'); 

if ( !isset( $_POST['Submit'] ) ){
	header( 'Location: index2.php' );
}

ini_set( 'sendmail_from' , 'marian@guepgroup.com' );

$ToEmail = 'marian@guepgroup.com';
$EmailSubject = 'Consulta a través de doctormeneses.com';

$_POST['nombre'] = filter_var( htmlspecialchars( trim($_POST['nombre'] ) ), FILTER_SANITIZE_MAGIC_QUOTES );
$_POST['correo'] = filter_var( htmlspecialchars( trim($_POST['correo'] ) ), FILTER_SANITIZE_EMAIL );
$_POST['telf']   = filter_var( htmlspecialchars( trim($_POST['telf']   ) ), FILTER_SANITIZE_MAGIC_QUOTES );
$_POST['desc']   = filter_var( htmlspecialchars( trim($_POST['desc']   ) ), FILTER_SANITIZE_MAGIC_QUOTES );

$_POST['correo'] = filter_var( $_POST['correo'], FILTER_SANITIZE_EMAIL );

if ( !filter_var( $_POST['correo'] , FILTER_VALIDATE_EMAIL ) ) {  
	# Correo inválido
	//echo "Correo inválido";
}else{

	$mailheader  = 'From: ' . $_POST['correo'] . "\r\n";
	$mailheader .= 'Reply-To: ' . $_POST['correo'] . "\r\n";
	$mailheader .= 'MIME-Version: 1.0' . "\r\n";
	$mailheader .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$mailheader .= 'Content-Transfer-Encoding: quoted-printable' . "\r\n";

	$MESSAGE_BODY  = '<strong>Nombres</strong>: '				. $_POST['nombre'] 		. '<br>';
	$MESSAGE_BODY .= '<strong>Teléfono</strong>: ' 			 	. $_POST['telf'] 		. '<br>';
	$MESSAGE_BODY .= '<strong>Correo electrónico</strong>: ' 	. $_POST['correo'] 		. '<br>';
	$MESSAGE_BODY .= '<strong>Mensaje</strong>: '  				. nl2br($_POST['desc']) . '<br>';
	
	// $msj = '<br><b>ERROR</b>: El msj no pudo ser enviado.';

	// mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ($msj);
	if ( mail($ToEmail, $EmailSubject, stripslashes($MESSAGE_BODY) , $mailheader) ) {
		//echo 'Enviado';
	}else{
		//echo $msj.' Condicional';
	}

}  

header( 'Location: index2.php' );

?>