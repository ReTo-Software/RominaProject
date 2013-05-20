<?php

$url_view = 'admin.php?v=imageMod';

$q = 'SELECT * FROM news';

$result = $bd->query($q);

$i = 0;

echo '<form class="noticiaForm" method="POST" action="manageImage.php" onsubmit="return confirm(\'¿Est&aacute; seguro que desea GUARDAR los cambios en TODAS las Noticias?\')"  enctype="multipart/form-data">';
echo '<input type="hidden" name="function" value="mod">';
	while ( $row = mysql_fetch_assoc($result) ) 
	{
		echo '
			<div> 
				<input type="hidden" name="div'.$row['id'].'">
				<input type="text" id="titleMod" name="title'.$row['id'].'" value="'.$row['title'].'">
				<img src="img/galery/'.$row['url_img'].'" name="img'.$row['id'].'">
			</div>
			<div id="testDivisor"></div>
			'
		;
		$i = $row['id'];
	}

	if ($i == 0)
		echo "<label>No hay Noticias registradas.</label>";

	echo '<input class="btn" id="buttonSubmit" type="submit" name="Submit" value="Guardar" '; 

	if ($i == 0)
		echo 'disabled ';

	echo '>';
	echo '<input type="hidden" name="i" value="'.$i.'">';
echo '</form>';

?>