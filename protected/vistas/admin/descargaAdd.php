<?php

$url_view = 'admin.php?v=noticiaAdd';

echo '
<form class="descargaForm" action="manageDescarga.php" method="post" onsubmit="return confirm(\'¿Est&aacute; seguro que desea agregar esta Noticia?\')" enctype="multipart/form-data">
	<input type="hidden" name="function" value="add">

	<div>
	<label>T&iacute;tulo</label>
	<input type="text" name="nombre" id="nombre" required/>
	</div>

	<div>
	<label>Archivo</label>
	<input type="file" name="file" id="file" required="required">
	</div>

	<input class="btn" id="buttonSubmit" type="submit" name="Submit" value="Agregar">
</form>';
?>