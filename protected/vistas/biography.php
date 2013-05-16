<?php
#INICIALIZACION DE LA VARIABLE $tab_activo

$tab_activo  = ''; 
if ( isset( $_GET['v'] ) ){
	if( $_GET['v'] == 'biography' ){
		$tab_activo = "active in";
	}else if( $_GET['v'] != 'discography' and $_GET['v'] != 'videos' and $_GET['v'] != 'galery' and $_GET['v'] != 'news' and $_GET['v'] != 'downloads' and $_GET['v'] != 'contact'){
		$tab_activo = "active in";
	}
}else{	
	$tab_activo = "active in";
}

?>

<div id="biography" class="wrapper tab-pane fade <?php echo $tab_activo; $tab_activo=''; ?>" >
	<div class="bgFade">

		<div id="divisorPink">
			<p id="nameSection">
				BIO				
			</p>
		</div>

		<div id="bioContent">
			<img src="img/banners/bio_block1.jpg">
			<img src="img/banners/bio_block2.png">
			<img src="img/banners/bio_block3.png">
			<img src="img/banners/bio_block4.png">
			<img src="img/banners/bio_block5.png">
			<img src="img/banners/bio_block6.png">
			<img src="img/banners/bio_block7.png">
			<img src="img/banners/bio_block8.png">
			<img src="img/banners/bio_block9.png">
			<img src="img/banners/bio_block10.png">
			<img src="img/banners/bio_block11.png">
			<img src="img/banners/bio_block12.png">
			<img src="img/banners/bio_block13.png">
			<img src="img/banners/bio_block14.png">
		</div>
	</div>
</div>