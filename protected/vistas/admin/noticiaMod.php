<?php

$url_view = 'admin.php?v=noticiaMod';

$q = 'SELECT * FROM news';

$result = $bd->query($q);

$i = 0;

echo '<form class="noticiaForm" method="POST" action="manageNoticia.php" onsubmit="return confirm(\'¿Est&aacute; seguro que desea GUARDAR los cambios en TODAS las Noticias?\')"  enctype="multipart/form-data">';
echo '<input type="hidden" name="function" value="mod">';
	while ( $row = mysql_fetch_assoc($result) ) 
	{
		echo '
			<div> 
				<input type="hidden" name="div'.$row['id'].'">
				<input type="text" id="titleMod" name="title'.$row['id'].'" value="'.$row['title'].'">
				<textarea type="text" name="resume'.$row['id'].'">'.$row['resume'].'</textarea>
				<textarea type="text" name="content'.$row['id'].'" class="ckeditor">'.$row['content'].'</textarea>
				<input type="text" id="urlMod" name="url'.$row['id'].'" value="'.$row['url'].'">
				<input type="file" id="imgMod" name="img'.$row['id'].'" value="'.$row['img'].'" >
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