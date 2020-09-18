<!DOCTYPE html>
<?php
	/*---  SVILUPPO ----
		Il presente file è stato sviluppato dalla Riccardo Testa - Kerwin Macias - 360Positive
		Integrazione di tema AGID compatibile per PA.
		Copyright - 2019
	*/
?>

<?php 
	/*Impostato xmlns strict per la validazione del codice e lo standard HTML5
	*/
?>

<html lang="it-IT"   xmlns="http://www.w3.org/1999/xhtml" >
	<!--<html <?php language_attributes(); ?>>-->
    
	<head>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-WKSSVW2');</script>
		<!-- End Google Tag Manager -->
		
		<meta charset="<?php bloginfo('charset'); ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="google-site-verification" content="tz7vJocI3ag-OFtd1MofDI5g1MDlSjdj0hgiBtAiAgk"/>
		<meta name="yandex-verification" content="2a130b656effd4bf"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Sito istituzionale Comune di Acqui Terme - Acqui Terme Municipality - Italy">
		<?php wp_head(); ?>
		
		<?php /*---   Font Locali    ----*/ ?>
		<style>
			@font-face {
            font-family: 'UrbsDisplay-Regular';
            src: 	url('<?= get_site_url()?>/wp-content/themes/design-italia-child/lib/font-local/UrbsDisplay-Regular.eot');
			src:	url('<?= get_site_url()?>/wp-content/themes/design-italia-child/lib/font-local/UrbsDisplay-Regular.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
			}
			
			@font-face {
            font-family: 'UrbsDisplay-Bold';
            src: 	url('<?= get_site_url()?>/wp-content/themes/design-italia-child/lib/font-local/UrbsDisplay-Bold.eot');
			src:	url('<?= get_site_url()?>/wp-content/themes/design-italia-child/lib/font-local/UrbsDisplay-Bold.ttf') format('truetype');
            font-weight: bold;
            font-style: normal;
			}
		</style>
		<?php /*---  Sviluppo ----
			Le librerie utilizzate localmente son salvate nel tema Child, nella cartella /lib
		*/ ?>
		
		<?php /*---  IcoFont   ----*/ ?>
		<link rel="stylesheet" href="<?= get_site_url() ?>/wp-content/themes/design-italia-child/lib/iconfont/icofont.min.css">
		<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
		
		<?php /*---   Google Font   ----*/ ?>
		<link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
		
		<?php /*---   FontAwsome ----*/ ?>
		<link rel="stylesheet" href="<?= get_site_url() ?>/wp-content/themes/design-italia-child/lib/fontawsome/font-awesome.min.css">
		<link rel="stylesheet" href="<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/all.css">
		
		<?php /*---   Fa Icon ----*/ ?>
		<link rel="stylesheet" href="<?= get_site_url() ?>/wp-content/themes/design-italia-child/lib/faicon/all.css">
		<script async defer src="<?= get_site_url() ?>/wp-content/themes/design-italia-child/lib/faicon/all.js"></script>
		
		<?php /*---   Libreria Bandiere Flag   ----*/ ?>
		<link rel="stylesheet" href="<?= get_site_url() ?>/wp-content/themes/design-italia-child/lib/block/flags/css/flag-icon.min.css">	
		
		
		
		<?php /*---   JQuery Carousel   ----*/ ?>
		<link rel="stylesheet"
		href="<?= get_site_url() ?>/wp-content/themes/design-italia-child/lib/responsive-image-carousel-lightbox/css/lightbox.css">
		<link rel="stylesheet"
		href="<?= get_site_url() ?>/wp-content/themes/design-italia-child/lib/responsive-image-carousel-lightbox/css/lightbox.css">
		
		<script async defer src="<?= get_site_url() ?>/wp-content/themes/design-italia-child/lib/responsive-image-carousel-lightbox/js/jquery.lightbox.js"></script>
		
		
		<?php /*---   jQuery Modal   ----*/ ?>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css"/>
		
		<?php /*---   Librerie javascript BOOTSTRAP   ----*/ ?>
		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
		
		<?php /*---   Librerie javascript BOOTSTRAP   ----*/ ?>
		<!--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"-->
		<!--            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"-->
		<!--            crossorigin="anonymous"></script>-->
		<script src="<?= get_site_url() ?>/wp-content/themes/design-italia-child/lib/popper.js"></script>
		
		<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"-->
		<!--        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"-->
		<!--        crossorigin="anonymous"></script> 
			<link rel="stylesheet" async defer href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
		
		<?php /*---   jQuery Library   ----*/ ?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.js"></script>
		<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
		
		
		
		<?php /*---   Data table   ----*/ ?>
		<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
		<!--    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>-->
		<link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
		
		<?php /*---   Data table mobile   ----*/ ?>
		<script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
		<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
		<!--    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>-->
		
		
		<link type="text/css" rel="stylesheet"
		href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css"/>
		<link type="text/css" rel="stylesheet"
		href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"/>
		<link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
		<link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
		
		
		
		<meta name="google-site-verification" content="VNoDgDBaDmAExxL8n9sehqLaV3B8WTh1O25He6a5N_8" />
		
		<style id='mainstyle'>
			<?php /*---   Classe Stile  ----
				La classe di stile che segue è obbligatoria per la gestione della corretta
				visualizzazione del header del portale. Nel codice è presente l'integrazione
				dei font personalizzati.
				
			*/?>
			
			* {
			font-family: UrbsDisplay-Regular, Titillium Web, Arial, sans-serif !important;
			/*font-size: 18px !important;*/
			
			}
			
			#menu-lingue > li > a > img {
			min-height: 15px
			}
			
			.it-header-center-content-wrapper {
			padding-right: 0px;
			}
			
			.it-brand-wrapper {
			padding-right: 0px;
			}
			
			.it-brand-wrapper > a > img {
			display: grid;
			width: 100%;
			max-width: 30rem;
			padding-right: 0px;
			}
			
			.it-search-wrapper {
			margin-left: 0px !important;
			}
			
			.it-footer .searchform input[type="text"], .it-header-wrapper .searchform input[type="text"] {
			color: #000;
			box-shadow: inset 0 -1px 0px #fff;
			width: auto;
			z-index: 4;
			}
			
			/*---   Altezza menu navigazione TOP  ----*/
			.it-header-slim-wrapper {
			height: auto;
			padding: 0;
			}
			
			.button_dropdown {
			text-align: center;
			width: 100%;
			background: #e09d34 !important;
			font-family: UrbsDisplay-Regular, Titillium Web, Arial, sans-serif;
			font-size: 18px !important;
			}
			
			.dropdown {
			padding: 0px;
			background: #e09d34 !important;
			margin-bottom: 14px;
			text-align: center;
			font-family: UrbsDisplay-Regular, Titillium Web, Arial, sans-serif;
			}
			
			#message_drop_top {
			background: #e09d34 !important;
			text-align: center;
			font-family: UrbsDisplay-Regular, Titillium Web, Arial, sans-serif;
			padding: 10px;
			margin-right: 0px;
			}
			
			a, a:hover {
			color: unset;
			}
			
			
			
			/*li[id^="mega-menu"].mega-menu-row {
			box-shadow: 5px 20px 20px -10px rgba(0, 0, 0, 0.75) !important;
			}
			
			ul.mega-sub-menu {
			padding-bottom: 0px !important;
			}*/
			
			@media only screen and (max-width: 600px) {
			.showmobile {
            display: block;
			}
			}
			
			#flags {
			width: 112px;
			}
			
			ul, ul > li {
			list-style-type: circle;
                list-style-position: inside !important;
			}

            #wpadminbar {
			display: block!important;
			}
			
			ul.breadcrumb {
			padding-left: 2%!important;
			}
			
			.logomain{
			height: 100%!important;
			width: 100%!important;
			min-height: 30px!important;
			max-height: 100px!important;
			margin-left: -9px!important;
			max-width: 500px!important;}
			
			#content{
			letter-spacing:normal!important;
			line-height: 1.5em!important;
			}
			p{
			margin-bottom:0px!important;
			}
			
			body.archive article, body.search article {
				border-bottom: 0px;
				padding: 0px;
}
			
			
			/*MENU*/
			.mega-sticky-wrapper{
			background:#420101;
			}
			.space { 
	/*width: 20%!important; 
	max-width:300px;*/
}
h2{
	letter-spacing:normal!important;
}

		</style>
	</head>
	
	<body <?= body_class(); ?> style="width:100%!important" >
		<div id="wrapper" class="hfeed">
			
			<!-- Google Tag Manager (noscript) -->
			<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WKSSVW2"
			height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
			<!-- End Google Tag Manager (noscript) -->
			
		
			<?php //Inclusione modulo per la gestione dell'header con effetto hamburger
            include '360Moduli/headerham.php'; ?>
			
			
		</div>
		
	    <div id="container" class="container-fluid w-100 mx-0 px-0">			