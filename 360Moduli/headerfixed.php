<header id="header-top" class="h-auto w-auto d-none mx-0" role="banner" style="position:fixed!important; top:0px!important;z-index:999; width:100%!important">
	<?php
		/*---   Script caricamento stile   ----
			Permette il caricamento live dei fogli di stile nell'header del documento
		*/ ?>
		<script>
			$('<link/>', {
				rel:'stylesheet',
		    		    type: 'text/css',
				href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/headerfixed.css'//css da includere
			}).appendTo('head');
			
		</script>
		
		<div class="it-header-wrapper">
			<div class="it-header-slim-wrapper d-none d-sm-none d-md-block d-lg-block d-xl-block">
				<div class="container-fluid" style="margin:0px">
					<?php
						/*---   Menu navigazione Top pagina   ----
							Menu a scomparsa con i collegamenti ai siti istituzionali, animazione su apertura
							e chiusura a scomparsa.
						*/ ?>
						<div class="row">
							<div class="dropdown col-12 my-0" style="padding:10px">
								<a href="#droptop_btn-fix" id="droptop_btn-fix" class="button_dropdown"
								title="Turismo, Acquistoria, Acquiambiente">
									URP, Turismo, Acquistoria, Acquiambiente <i id="frecciahead"
								class="icofont-rounded-down"></i></a>
								<div id="message_drop_top-fix" class="row" style="display:none">
									<div class="col-md-2"></div>
									<div class="col-md-8">
										<div class="row">
										<div class="col-md-3"><a target="_blank" href="https://comune.acquiterme.al.it/ufficio-relazioni-con-il-pubblico-urp/"
														title="Apre pagina ufficio URP">
														Ufficio Relazioni Pubblico <i class="icofont-external-link"></i></a>
													</div>
											<div class="col-md-3"><a target="_blank" href="https://turismo.comuneacqui.it/"
												title="Apre sito esterno del Turismo di Acqui Terme">
												Sito Turistico di Acqui Terme <i class="icofont-external-link"></i></a>
											</div>
											<div class="col-md-3"><a target="_blank" href="https://acquistoria.it/"
												title="Apre sito esterno del Premio Acqui Storia">
												Sito Premio Acqui Storia <i class="icofont-external-link"></i></a></div>
												<div class="col-md-3"><a target="_blank" href="https://acquiambiente.it/"
													title="Apre sito esterno del Premio Acqui Ambiente">
													Sito Premio Acqui Ambiente <i class="icofont-external-link"></i></a>
												</div>
										</div>
									</div>
									<div class="col-2"></div>
								</div>
								
							</div>
							
							<script>
								<?php
									/*---   Script Toggle menu lik siti esterni   ----
										L'evento click sul collegamento associato all'id 'droptop_btn-fix, invoca la funzione slideToggle di JQuery
										con un tempo di esecuzione dell'animazione di 800ms.
										Lo stato del bottone è gestito dalla variabile state che è un booleano numerico (0,1), la quale va a sostituire
										la calsse dell'icona del menu a scomparsa (freccia su e freccia giù)
									*/?>
									var state = 0;
									$(document).ready(function () {
										$("#droptop_btn-fix").click(function () {
											$("#message_drop_top-fix").slideToggle(800, function () {
												
												state = (state + 1) % 2;
												
												$('#frecciahead').removeClass();
												
												if (state == 0) {
													$('#frecciahead').addClass('icofont-rounded-down');
													} else {
													$('#frecciahead').addClass('icofont-rounded-up');
												}
												
											})
										});
									});
							</script>
						</div>
				</div>
			</div>
		</div>
		<div class="it-nav-wrapper text-center">
			<div class="it-header-wrapper" style="min-height:auto;">
				<div class="container">
					<div class="row pt-3 pb-0">
						<div class="col-12 my-0 py-0">
							<div class="it-header-center-content-wrapper row my-0 py-0 ">
								<div class="it-brand-wrapper col-md-8 col-sx-12 my-0 py-0 ">
									<a href="<?php echo esc_url(home_url('/')); ?>"
									title="<?php echo esc_html(get_bloginfo('name')); ?>" rel="home">
										<?php
											$custom_logo_id = get_theme_mod('custom_logo');
											$logo = wp_get_attachment_image_src($custom_logo_id, 'full');
											if (has_custom_logo()) {
												/*---   Impostazione del logo FISSO - Problema di cropping bassa risoluzione   ----*/
												$path = "http://comune.acquiterme.al.it/wp-content/uploads/2019/09/logo_acqui_terme_-2.png";
												echo '<img  class="logomain" src="' . $path . '" alt="logo-comune-acqui">';
												
												//echo '<img  src="'. esc_url( $logo[0] ) .'" alt="'. esc_html( get_bloginfo( 'name' ) ) .'">';
												} else {
												echo '<img  class="icon logomain" src="' . get_template_directory_uri() . '/img/custom-logo.png' . '" alt="' . esc_html(get_bloginfo('name')) . '">';
											} ?>
											<?php /*
												<div class="it-brand-text">
												<h2 class="no_toc"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h2>
												<h3 class="no_toc d-none d-md-block"><?php bloginfo( 'description' ); ?></h3>
												</div>
											*/ ?>
									</a>
								</div>
								<div class="it-right-zone col-md-4 col-sx-12 my-2 ">
									<div class="row ">
										
										<div class="it-search-wrapper col-md-12 pull-right">
											<?php get_search_form(); ?>
											<script>
												$("#s").attr("placeholder", "Cerca");
												$("#searchsubmit").attr("value", "Cerca");
											</script>
											
										</div>
										
									</div>
								</div>
							</div>
						</div>
						<div class="col-1"></div>
					</div>
				</div>
			</div>
			
			<div class="it-header-navbar-wrapper">
				<nav class="menu-main" role="navigation">
					<div class="container-fluid">
						<div class="row">
							
							<div class="col-12" id="navigationtop">
							<?php wp_nav_menu(array('theme_location' => 'menu-main', 'container' => 'ul', 'menu_class' => 'nav')); ?>
							</div>
							
						</div>
					</div>
				</nav>
			</div>
			
		</div>
</header>


<script type="text/javascript">
    /* Gestione menu di navigazione ottimizzazione per scroll mobile e W3c
	*/
    
    let nav=$("#navigation").html()
	
    $(window).scroll(function () {
		
		
        function inpage(elem) {
            var t = $(elem);
            var offset = t.offset();
            var win = $(window);
            var winST = win.scrollTop();
            var elHeight = t.outerHeight(true);
			
            if (offset.top > winST - elHeight && offset.top < winST + elHeight + win.height()) {
                return true;
			}
            return false;
		}
        		
        if (inpage($("#header"))) {
								
            $("#header-top").slideUp(); //scomparsa a salire
			//$("#navigation").html(nav);
			//$("#navigationtop").html('');
			
			//nav=$("#navigation").html()
			
			} else {
						
            $("#header-top").removeClass("d-none"); //menu nascosto
            $("#header-top").slideDown();//scomparsa a scendere
            
			//$("#navigationtop").html(nav);
			//$("#navigation").html('');
			
			//nav=$("#navigationtop").html()
		}
	})
	
	
</script>
