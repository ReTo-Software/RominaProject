<?php

$url_view = 'admin.php?v=noticiaAdd';

echo '
<form class="noticiasForm" action="manageNoticia.php" method="post" onsubmit="return confirm(\'¿Est&aacute; seguro que desea agregar esta Noticia?\')" enctype="multipart/form-data">
	<input type="hidden" name="function" value="add">

	<div>
	<label>T&iacute;tulo</label>
	<input type="text" name="title" id="title" />
	</div>

	<div>
	<label>Resumen</label>
	<textarea type="text" name="resume" rows="3" col="50"></textarea>
	</div>

	<div>
	<label>Contenido</label>
	<textarea type="text" name="content" rows="20" col="50" class="ckeditor"></textarea>
	</div>				

	<div>
	<label>URL</label>
	<input type="url" name="url" id="url" />
	</div>

	<div>
	<label>Imagen</label>
	<input type="file" name="file" id="file" accept="image/*" required="required">
	</div>

	<input class="btn" id="buttonSubmit" type="submit" name="Submit" value="Agregar">
</form>';
?>