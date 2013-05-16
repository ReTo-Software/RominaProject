<?php
/**
 * UserEdit.php
 *
 * This page is for users to edit their account information
 * such as their password, email address, etc. Their
 * usernames can not be edited. When changing their
 * password, they must first confirm their current password.
 *
 * Please subscribe to our feeds at http://blog.geotitles.com for more such tutorials
 */
include("include/session.php");
?>

<html>
<title>Edit Account | jQuery, AJAX, PHP, MySQL, javascript, web design tutorials &amp; demos | PHP login script demo</title>
<body>

<p>
  <?php
/**
 * User has submitted form without errors and user's
 * account has been edited successfully.
 */
if(isset($_SESSION['useredit'])){
   unset($_SESSION['useredit']);
   
   echo "<h1>Cambio de contrase&ntilde;a exitoso!</h1>";
   echo "<p><strong>$session->username</strong>, sus datos fueron cambiados con &eacute;xito.</br>"
       ."<a href=\"../\">Regresar al m&oacute;dulo de administraci&oacute;n</a>.</p>";
}
else{
?>

  <?php
/**
 * If user is not logged in, then do not display anything.
 * If user is logged in, then display the form to edit
 * account information, with the current email address
 * already in the field.
 */
if($session->logged_in){
?>
</p>

<h1><img src="images/user_edit.png" width="32" height="32" alt="Edit Account">Usuario: <?php echo $session->username; ?></h1>
<?php
if($form->num_errors > 0){
   echo "<td><font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) found</font></td>";
}
?>
<form action="process.php" method="POST">
<table align="left" border="0" cellspacing="0" cellpadding="3">
<tr>
<td><img src="images/key.png" width="32" height="32" alt="Current Password"></td>
<td>Contrase&ntilde;a actual: </td>
<td><input type="password" name="curpass" maxlength="30" value="
<?php echo $form->value("curpass"); ?>"></td>
<td><?php echo $form->error("curpass"); ?></td>
</tr>
<tr>
<td><img src="images/key_add.png" width="32" height="32" alt="New Password"></td>
<td>Nueva contrase&ntilde;a:</td>
<td><input type="password" name="newpass" maxlength="30" value="
<?php echo $form->value("newpass"); ?>"></td>
<td><?php echo $form->error("newpass"); ?></td>
</tr>
<tr>
<td><img src="images/email_add.png" width="32" height="32" alt="New Email"></td>
<td>Correo electr&oacute;nico:</td>
<td><input type="text" name="email" maxlength="50" value="
<?php
if($form->value("email") == ""){
   echo $session->userinfo['email'];
}else{
   echo $form->value("email");
}
?>">
</td>
<td><?php echo $form->error("email"); ?></td>
</tr>
<tr><td colspan="2" align="right">
<input type="hidden" name="subedit" value="1">
<input type="submit" value="Edit Account"></td></tr>
<tr><td colspan="2" align="left"></td></tr>
</table>
</form>

<?php
}
}

?>

</body>
</html>
