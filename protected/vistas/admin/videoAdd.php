<?php

$url_view = 'admin.php?v=videoAdd';

echo '
<form class="noticiasForm" action="manageVideo.php" method="post" onsubmit="return confirm(\'¿Est&aacute; seguro que desea agregar esta Noticia?\')" enctype="multipart/form-data">
	<input type="hidden" name="function" value="add">

	<div>
	<label>T&iacute;tulo</label>
	<input type="text" name="title" id="title" />
	</div>		

	<div>
	<label>URL</label>
	<input type="url" name="url" id="url" />
	</div>

	<input class="btn" id="buttonSubmit" type="submit" name="Submit" value="Agregar">
</form>';
echo date('Y-m-d');
?>