<!-- ##############################################

      _|  _      _  |  _  ._   _   _|   |_           
     (_| (/_ \/ (/_ | (_) |_) (/_ (_|   |_) \/       
                          |                 /
  _   _ ___ _     __      _ ___            _   _ 
 |_) |_  | / \   (_  / \ |_  | \    / /\  |_) |_ 
 | \ |_  | \_/   __) \_/ |   |  \/\/ /--\ | \ |_ 


#################################################-->

<!--Encode and compress Website-->
<?php #if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<!doctype html>

<html lang="en">
<head>

	<!--##################################################-->
	<!--META-->
		<meta charset="UTF-8">
	<!--END META-->
	<!--##################################################-->

	<title>ROMINA</title>

	<!--##################################################-->
	<!--FAVICON-->
		<!--link rel="shortcut icon" href="images/favicon.ico"-->
	<!--END FAVICON-->
	<!--##################################################-->

	<!--##################################################-->
	<!--STYLESHEETS-->

		<!--Bootstrap-->
			<link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
			<link rel="stylesheet" href="plugins/bootstrap/css/bootstrap-responsive.min.css">
			<link rel="stylesheet" href="plugins/bootstrap/css/bootstrap-image-gallery.min.css">
		<!--End Bootstrap-->

		<!--JQuery-->
			<!-- <link rel="stylesheet" href="css/jquery.tweet.css"> -->
			<!-- <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css"> -->
		<!--End JQuery-->
	
		<!--Plugins-->
			<!--NivoSlider-->
				<link rel="stylesheet" href="plugins/nivo-slider/css/nivo-slider.css">
				<link rel="stylesheet" href="plugins/nivo-slider/themes/default/default.css">
			<!--End NivoSlider-->
			<!--Shadowbox-->
				<!--link rel="stylesheet" href="css/shadowbox.css"-->
			<!--End Shadowbox-->
		<!--End Plugins-->

		<!--Local-->
			<link rel="stylesheet" href="css/main.css">
		<!--End Local-->

	<!--END STYLESHEETS-->
	<!--##################################################-->

	<!--##################################################-->
	<!--SCRIPTS-->

		<!--JQuery-->
			<script type="text/javascript" src="plugins/jquery/jquery-1.9.1.min.js"></script> 
			<!-- <script type="text/javascript" src="js/jquery.tweet.js"></script> -->
			<!-- <script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script> -->
			<!-- <script type="text/javascript" src="js/jquery.mousewheel.min.js"></script> -->
			<!-- <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> -->
		<!--End JQuery-->

		<!--Bootstrap-->
			<script type="text/javascript" src="plugins/bootstrap/js/bootstrap.min.js" ></script>
			<script type="text/javascript" src="plugins/bootstrap/js/bootstrap-tab.js"></script>
			<!-- <script type="text/javascript" src="js/bootstrap-modal.js"></script> -->
			<script type="text/javascript" src="plugins/bootstrap/js/bootstrap-modal.js"></script>
		<!--End Bootstrap-->

		<!--Plugins-->
			<!--NivoSlider-->
				<script type="text/javascript" src="plugins/nivo-slider/js/jquery.nivo.slider.js"></script>
			<!--End NivoSlider-->
			<!--CkEditor-->
				<script type="text/javascript" src="plugins/ckeditor/ckeditor.js"></script>
				<script type="text/javascript" src="plugins/ckeditor/styles.js"></script>
				<script type="text/javascript" src="plugins/ckeditor/lang/es.js"></script>
			<!--End CkEditor-->
			<!--Shadowbox-->
				<!-- <script type="text/javascript" src="js/shadowbox.js"></script> -->
			<!--End Shadowbox-->
		<!--End Plugins-->

		<!--Local-->
			<script type="text/javascript" src="js/main.js"></script>

			<script type="text/javascript">
				var _gaq = _gaq || [];
				_gaq.push(['_setAccount', 'UA-38701661-1']);
				_gaq.push(['_trackPageview']);

				(function() 
				{
					var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
					ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
				})();
			</script>

			<script type="text/javascript">
				$(window).load(
					function()
					{
						$('#slider').nivoSlider();
					}
				);

			</script>
		<!--End Local-->
	<!--END SCRIPTS-->
	<!--##################################################-->
</head>

<!--##################################################-->
<!--CODE-->
<body style="position: relative; z-index: 1;">
<div id="content"> 
	<!--Main Logo: ROMINA logo top page-->
	<div id="mainLogo">
		<a href="#home">
			<img src="img/logos/rominaLogo.png">
		</a>
	</div>

	<div id="menuAndBanner">
		<div id="menu">
			<ul id="listMenu" class="nav-tab nav-stacked">
				
				<li id="bio">
					<a href="#biography" data-toggle="tab">
						BIO
					</a>
				</li>
				<li id="discography">
					<a href="#discography" data-toggle="tab">
						DISCOGRAF&Iacute;A
					</a>
				</li>
				<li id="videos">
					<a href="#videos" data-toggle="tab">
						VIDEOS
					</a>
				</li>
				<li id="galery">
					<a href="#galery" data-toggle="tab">
						GALER&Iacute;A
					</a>
				</li>
				<li id="news">
					<a href="#news" data-toggle="tab">
						NOTICIAS
					</a>
				</li>
				<li id="downloads">
					<a href="#downloads" data-toggle="tab">
						DESCARGAS
					</a>
				</li>
				<li id="contact">
					<a href="#contact" data-toggle="tab">
						CONT&Aacute;CTAME
					</a>
				</li>
			</ul>
		</div>
		<div id="banner" class="slider-wrapper theme-default">
			<div id="slider" class="nivoSlider">
				<a href="">
					<img src="img/banners/banner1.jpg">
				</a>
				<a href="">
					<img src="img/banners/banner2.jpg">
				</a>
				<a href="">
					<img src="img/banners/banner3.jpg">
				</a>
			</div>
		</div>
	</div>

	<div id="sotialAndMusic">
		<div id="sotials">
			<div id="sotialNetworks">
				<a href="http://www.facebook.com">
					<img src="img/sotialNetworks/facebook.png">
				</a>
				<a href="http://www.twitter.com">
					<img src="img/sotialNetworks/twitter.png">
				</a>
				<a href="http://www.youtube.com">
					<img src="img/sotialNetworks/youtube.png">
				</a>
				<a href="http://www.instagram.com">
					<img src="img/sotialNetworks/instagram.png">
				</a>
			</div>
			<div id="phrase">
				<p id="firstPhrase">
					SUSCR&Iacute;BETE
				</p>
				<p id="secondPhrase">
					A MI CLUB
				</p>
				<p id="thirdPhrase">
					DE FANS
				</p>
			</div>
			<div id="facebookLike">
				<!--facebook Like logo or link-->
			</div>
		</div>
		<div id="music">
			<!--Embet Plugin-->
		</div>
		<div id="twitterTimeLine">

		</divisorPink>
	</div>

	<!--Content--> 
	<div id="mainTab" class="tab-content" stile="position: relative; z-index: 1; height: auto; min-height: 500px;">
		
		<!--Content from dinamic display-->

		<?php 
			
			include_once('protegido/mysql.php');

			$idTxt = ''; #VARIABLES QUE ALMACENARAN LOS ID'S DEL CONTENIDO

			//$bd = new MYSQL;

			#CONECTAR A LA BD
			//$bd->conectar();

			#INCLUDE AL FILES TO RENDER
			@include_once('protegido/vistas/biography.php');
			@include_once('protegido/vistas/discography.php');
			@include_once('protegido/vistas/videos.php');
			@include_once('protegido/vistas/galery.php');
			@include_once('protegido/vistas/news.php');
			@include_once('protegido/vistas/downloads.php');
			@include_once('protegido/vistas/contact.php');

			#DESCONECTAR DE LA BD
			//$bd->desconectar();
			
		?>

	</div>

	<div id="footer">
		<div id="foo_content">
			<div id="foo_logoAndSotialNetworks">
				<a href="#home" id="foo_logo">
					<img src="img/logos/rominaLogoFooter.png">
				</a>
				<div id="foo_sotialNetworks">
					<a href="http://www.facebook.com">
						<img src="img/sotialNetworks/facebookFooter.png">
					</a>
					<a href="http://www.twitter.com">
						<img src="img/sotialNetworks/twitterFooter.png">
					</a>
					<a href="http://www.youtube.com">
						<img src="img/sotialNetworks/youtubeFooter.png">
					</a>
					<a href="http://www.instagram.com">
						<img src="img/sotialNetworks/instagramFooter.png">
					</a>
				</div>
			</div>
			<div id="foo_menuSections">
				<label id="foo_menuSectionsTitle">
					SECCIONES
				</label>
				<ul id="foo_menuSectionsList">
					<li>
						<a href="#biography">
							Bio
						</a>
					</li>
					<li>
						<a href="#discography">
							Discograf&iacute;a
						</a>
					</li>
					<li>
						<a href="#videos">
							Videos
						</a>
					</li>
					<li>
						<a href="#galery">
							Galer&iacute;a
						</a>
					</li>
					<li>
						<a href="#news">
							Noticias
						</a>
					</li>
					<li>
						<a href="#downloads">
							Descargas
						</a>
					</li>
					<li>
						<a href="#contact">
							Cont&aacute;ctame
						</a>
					</li>
				</ul>
			</div>
			<div id="foo_news">
				<label id="foo_newsTitle">
					&Uacute;LTIMAS NOTICIAS
				</label>
				<?php 
					#consulta a la BD para la verificación de las últimas 4 noticias
				 ?>
			</div>
			<div id="foo_videos">
				<label id="foo_videosTitle">
					&Uacute;LTIMOS VIDEOS
				</label>
				<?php 
					#consulta por los últimos videos
				 ?>
			</div>
			<div id="foo_sponsors">
				<div id="topSponsors">
					<a href="#">
						<img src="img/logos/pepsimusic.png">
					</a>
					<a href="#">
						<img src="img/logos/vp.png">
					</a>
					<a href="#">
						<img src="img/logos/pepsi.png">
					</a>
				</div>
				<div id="bottomSponsors">
					<a href="#">
						<img src="img/logos/traffic.png">
					</a>
				</div>
			</div>
			<div id="foo_developers">
				<label id="foo_developersTitle">
					Desarrollado por:
				</label>
				<a href="http://www.guepgroup.com/" target="_blank"><img src="img/logos/guepgroup.png" ></a>
			</div>
		</div>
	</div>
</body>
<!--END CODE-->
<!--##################################################-->

</html>