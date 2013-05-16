<?php
#INICIALIZACION DE LA VARIABLE $tab_activo
$tab_activo  = ''; 
if ( isset( $_GET['v'] ) ){
	if( $_GET['v'] == 'inicio' ){
		$tab_activo = "active in";
	}else if( $_GET['v'] != 'empresa' and $_GET['v'] != 'bateriaiq' and $_GET['v'] != 'bateriavmf' and $_GET['v'] != 'cargadores' and $_GET['v'] != 'distribuidores' and $_GET['v'] != 'serdistribuidor' and $_GET['v'] != 'ventajas' and $_GET['v'] != 'contactanos' and $_GET['v'] != 'rastrear' ){
		$tab_activo = "active in";
	}
}else{	
	$tab_activo = "active in";
}
?>

<link rel="stylesheet" href="css/pelota.css">

<div id="inicio" class="wrapper tab-pane fade <?php echo $tab_activo; $tab_activo=''; ?>" >
	<div class="bgFade">
		
	<div class="slider-wrapper theme-default">

		<div id="slider" class="nivoSlider">
			<?php for ($i=1; $i < 5; $i++) 
			{
				echo '<img src="img/cirugiaimg.png" alt=""/>';
				echo '<img src="img/botoximg.png" alt=""/>';
				echo '<img src="img/textoimg.png" alt=""/>';
			}?>
			
			<div id="containerBalls">
				<?php for ($i=1; $i < 9; $i++) 
				{ 
					echo '<div class="box'.$i.'"></div>';
				} ?>
			</div>
		</div>
		<div id="downContainer">
			<div id="sentence">
				<label id="firstPart">"La belleza es la grandeza en pos</label>
				<label id="secondPart">de reverencia ante la humildad".</label>
				<label id="author">Pedro Meneses</label>
			</div>

			<div id="noticiasblock">
				<div id="noticiasTituloIndex">
					<a href="#noticias" data-toggle="tab"><label id="titulo">Entrevistas y Art&iacute;culos</label></a>
				</div>
				<div id="noticiamincontainer">
					<?php
					$q = 'SELECT * FROM noticia ORDER BY RAND()';
					$result = $bd->query($q);
					$i = 0;

					while ( $row = mysql_fetch_assoc($result) and $i < 4 )
					{
						echo '<div id="noticiamin">';
							echo '<a href="'.$row['url'].'" target="_blank">'.$row['nombre'].'</a>';
						echo '</div>';
						$i++;
					}
					echo '<a id="noticiasLink" href="#noticias" data-toggle="tab">Ir a todas</a>'

					
					?>
				</div>
			</div>
		</div>
		
	</div>
	</div>
</div>