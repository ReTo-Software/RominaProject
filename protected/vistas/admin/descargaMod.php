<?php

$url_view = 'admin.php?v=noticiaMod';

$q = 'SELECT * FROM news';

$result = $bd->query($q);

$i = 0;

echo '<form class="descargaForm" action="manageDescarga.php" method="POST"  onsubmit="return confirm(\'¿Est&aacute; seguro que desea GUARDAR los cambios en TODAS las Noticias?\')"  enctype="multipart/form-data">';
echo '<input type="hidden" name="function" value="mod">';
	while ( $row = mysql_fetch_assoc($result) ) 
	{
		echo '
			<div> 
				<input type="hidden" name="div'.$row['id'].'">
				<input type="text" id="nameMod" name="name'.$row['id'].'" value="'.$row['name'].'">
				<input type="file" id="urlMod" name="url'.$row['id'].'" value="'.$row['url'].'" >
			</div>
			<div id="testDivisor"></div>
			'
		;
		$i = $row['id'];
	}

	if ($i == 0)
		echo "<label>No hay Descargas registradas.</label>";

	echo '<input class="btn" id="buttonSubmit" type="submit" name="Submit" value="Guardar" '; 

	if ($i == 0)
		echo 'disabled ';

	echo '>';
	echo '<input type="hidden" name="i" value="'.$i.'">';
echo '</form>';

?>