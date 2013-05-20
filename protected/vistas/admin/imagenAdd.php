<?php

$url_view = 'admin.php?v=imageAdd';

echo '
<form class="noticiasForm" action="manageImage.php" method="post" onsubmit="return confirm(\'¿Est&aacute; seguro que desea agregar esta Noticia?\')" enctype="multipart/form-data">
	<input type="hidden" name="function" value="add">

	<div>
	<label>T&iacute;tulo</label>
	<input type="text" name="title" id="title" />
	</div>

	<div>
	<label>Imagen</label>
	<input type="file" name="file" id="file" accept="image/*" required="required">
	</div>

	<input class="btn" id="buttonSubmit" type="submit" name="Submit" value="Agregar">
</form>';
?>