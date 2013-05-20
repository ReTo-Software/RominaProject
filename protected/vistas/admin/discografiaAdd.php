<?php

$url_view = 'admin.php?v=noticiaAdd';

echo '
<form class="discografiaForm" action="manageDiscografia.php" method="post" onsubmit="return confirm(\'¿Est&aacute; seguro que desea agregar esta Noticia?\')" enctype="multipart/form-data">
	<input type="hidden" name="function" value="add">

	<div>
	<label>Imagen</label>
	<input type="file" name="file" id="file" accept="image/*" required="required">
	</div>

	<div>
	<label>T&iacute;tulo</label>
	<input type="text" name="title" id="title" />
	</div>

	<div>
	<label>Productores</label>
	<input type="text" name="producers" id="producers" />
	</div>

	<div>
	<label>A&ntilde;o</label>
	<input type="text" name="anio" id="anio" pattern="[0-9]{4}"/>
	</div>

	<div>
	<label>Canciones</label>
	<textarea type="text" name="tracks" rows="20" col="50" class="ckeditor"></textarea>
	</div>				

	<input class="btn" id="buttonSubmit" type="submit" name="Submit" value="Agregar">
</form>';
?>