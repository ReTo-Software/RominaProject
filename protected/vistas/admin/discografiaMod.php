<?php

$url_view = 'admin.php?v=noticiaMod';

$q = 'SELECT * FROM news';

$result = $bd->query($q);

$i = 0;

echo '<form class="discografiaForm" action="manageDiscografia.php" method="POST" onsubmit="return confirm(\'¿Est&aacute; seguro que desea GUARDAR los cambios en TODAS las Noticias?\')"  enctype="multipart/form-data">';
echo '<input type="hidden" name="function" value="mod">';
	while ( $row = mysql_fetch_assoc($result) ) 
	{
		echo '
			<div> 
				<input type="hidden" name="div'.$row['id'].'">
				<input type="file" id="imgMod" name="img'.$row['id'].'" value="'.$row['img'].'" >
				<input type="text" id="nameMod" name="name'.$row['id'].'" value="'.$row['name'].'">
				<input type="text" id="producersMod" name="producers'.$row['id'].'" value="'.$row['producers'].'">
				<input type="text" id="yearMod" name="year'.$row['id'].'" value="'.$row['year'].'" pattern="[0-9]{4}">
				<textarea type="text" name="tracks'.$row['id'].'" class="ckeditor">'.$row['tracks'].'</textarea>
			</div>
			<div id="testDivisor"></div>
			'
		;
		$i = $row['id'];
	}

	if ($i == 0)
		echo "<label>No hay Discograf&iacute;as registradas.</label>";

	echo '<input class="btn" id="buttonSubmit" type="submit" name="Submit" value="Guardar" '; 

	if ($i == 0)
		echo 'disabled ';

	echo '>';
	echo '<input type="hidden" name="i" value="'.$i.'">';
echo '</form>';

?>