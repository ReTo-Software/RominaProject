<?php

$rt_code_id = '';		# codigo del texto
$url_view = 'admin.php?v=noticiaDel';

$q = 'SELECT * FROM news';

$result = $bd->query($q);

$i = 0;

echo '<form class="discografiaForm" action="manageDiscografia.php" method="POST" onsubmit="return confirm(\'¿Est&aacute; seguro que desea ELIMINAR estas Noticias?\')">';
echo '<input type="hidden" name="function" value="del">';
	while ( $row = mysql_fetch_assoc($result) ) 
	{
		echo '
			<div>
				<input type="checkbox" id="checkbox" name="check_list[]" value="'.$row['id'].'" /> 
				<img src="img/disks/'.$row['image'].'" width="50px;">
				<label id="label"> ('.$row['year'].') '.$row['name'].'"</label>
			</div>
			<div id="testDivisor"></div>
			'
		;
		$i++;
	}

	if ($i == 0)
		echo "<label>No hay Discograf&iacute;as registradas.</label>";

	echo '<input class="btn" id="buttonSubmit" type="submit" name="Submit" value="Eliminar" '; 

	if ($i == 0)
		echo 'disabled ';

	echo '>';
echo '</form>';
?>