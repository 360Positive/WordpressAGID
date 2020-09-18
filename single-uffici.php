<?php
	/*
		* Template Name: Articolo Uffici - single-uffici.php
		* Template Post Type: post, product
	*/
	require_once '360Moduli/XML/localfunc.php';
	require_once '360Moduli/php_utils/utils.php';
	
get_header(); ?>
<!--single uffici.php -->
<script type="text/javascript">
	$('<link/>', {
		rel: 'stylesheet',
		type: 'text/css',
		href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/templates/uffici.css'//css da includere
	}).appendTo('head');
	
	
</script>
<section class="entry-content thumbnail topimage" style="background: url(<?php echo the_field('big-image');?>);">
	<p class="dida"><?php the_post_thumbnail_caption() ?></p>
</section>

<?php pa360_breadcrumb(); ?>
<div class="container">
    <div class="row">
        <section id="content-uffici" role="main" class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="mr-2">
					
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php //get_template_part( 'entry' ); ?>
					<h1  class="entry-title"><?php the_title(); ?></h1>
					<hr>
					<?php //Messaggio attivazione pagoPA
					$page_url = get_permalink(); // verifica il permalink che sia quello della polizia locale per il controllo
					if (strpos($page_url, '/ufficio-polizia-locale/') > -1){
					?>
					<div class="alert alert-danger w-100" role="alert">
                        <span style="font-size:1.25rem; color:red">AVVISO PER PAGAMENTI VERBALI CODICE DELLA STRADA: </span>
                        <a href="http://pagopa.comune.acquiterme.al.it:8080/PmguServiziCittadinoAcquiTerme" target="_blank">DAL <strong class="alert-link" style="color:red; font-size:1.25rem">1/7/2020</strong> E' ATTIVO IL SERVIZIO PAGOPA</a>
                   
                    </div>
					<?php } else{
					?>
					<div class="alert alert-danger w-100" role="alert">
                        <span style="font-size:1.25rem; color:red">AVVISO PER PAGAMENTI: </span>
                        <a href="https://www.cittadinodigitale.it/apspagopa/Payment/PagamentiAnonimiTipoPagamento?codiceEnte=ACQUI" target="_blank">DAL <strong class="alert-link" style="color:red; font-size:1.25rem">1/7/2020</strong> E' ATTIVO IL SERVIZIO PAGOPA</a>
                   
                    </div>
                    <?php } ?>
					
					<div id="introduzione" style='line-height: 1.75em!important; letter-spacing: normal!important;'><?php the_field('introduzione'); ?></div>
					<strong>Assessore</strong><br>
					<?php
                        $iconuser = "icofont-hand-right";
                        $assessori = get_field('assessore') . '<br>';
                        $funz_el = explode(',', $assessori);
                        foreach ($funz_el as $el) {
                            echo '<i class="' . $iconuser . '"></i>' . $el . '<br>';
						}
					?>
					<!--<strong>Responsabile</strong><br>-->
					<?php
                        // $iconuser = "icofont-user-alt-4";
                        // $funzionari = get_field('funzionari');
                        // $funz_el = explode(',', $funzionari);
                        // foreach ($funz_el as $el) {
                        //     echo '<i class="' . $iconuser . '"></i>' . $el . '<br>';
                        // }
					?>
					
					
					
					<?php the_content(); ?>
					<?php //if ( ! post_password_required() ) comments_template( '', true ); ?>
                    <?php endwhile; endif; ?>
                    <hr>
                    <div class="row">						
                        <?php
							/*Campi dati*/
							$telefono = "";
							$mail = "";
							$orari = "";
							$manuale = get_field('manuale');
							if ($manuale) {
								$telefono = $manuale['telefono'];
								$mail = $manuale['mail'];
								$orari = $manuale['orari'];
							?>
                            <div class="col-md-6">
                                <i class="icofont-telephone"></i> <?= $telefono ?><br>
                                <i class="icofont-email"></i> <?= $mail ?>
							</div>
                            <div class="col-md-6">
                                <i class="icofont-wall-clock"> </i> <?= $orari ?>
							</div>
                            <?php
								} else {
								$xmi = new XMLINTERPRETER();
								$xmi->init(get_field('xml'));
								echo "<div class='col-md-12 text-left alert-primary p-2 mb-1'>";
								echo "<h2  class='alertbox p-3' style='letter-spacing: normal!important;'><strong><i class=\"icofont-institution\"></i> " . _("Sede") . ':</strong> ';
								$xmi->luogoList();
								echo "</h2></div>";
								
								echo "<div class='col-md-12 text-left alert-primary p-2 mb-1' >";
								echo "<h2  class='alertbox p-3' style='letter-spacing: normal!important;'><strong><i class=\"icofont-ui-office\"></i> " . _("Dirigente") . ':</strong> ';
								$xmi->dirigenteList();
								echo "</h2></div>";
								
								echo "<div class='col-md-12 text-left alert-primary p-2 mb-1' >";
								echo "<h2  class='alertbox p-3' style='letter-spacing: normal!important;'><strong><i class=\"icofont-notebook\"></i> " . _("Contatti") . ":</strong><br> ";
								$xmi->contattiList();
								echo "</h2></div>";
								
								echo "<div class='col-md-12 p-0 mb-1'>";
								echo "<h2  class='alertbox alert-primary p-3' style='letter-spacing: normal!important;'><strong> " . _("Orario di attenzione al pubblico") . '</strong></h2>';
								$xmi->orariList();
								echo "</div>";
								
								// La funzione scadenzaList() ritorna true se presenta del contenuto che viene renderizzato
								if($xmi->scadenzeList()){
									echo "<div class='col-md-12 alert-primary p-2 mb-1'>";
									echo "<h2  class='alertbox  p-3'>" . _("Scadenze") . '<br><small>Elenco delle prossime scadenze per gli utenti e i cittadini.</small></h2>';
									$xmi->scadenzeList();
								echo "</div>";}
							}
						?>
					</div>
                    <?php
						/*Stampa data e informazioni di aggiornamento della pagina
						echo _('<br>');
						echo _('Ultima modifica il: ');
						the_modified_time('d F Y');*/
					?>
                    </div>
				</div>
				
                <div class="col-md-3">
                    <?php //Inclusione modulo per la gestione dei social
					include '360Moduli/sharesocial.php'; ?>
                    <div class="widget-area w-100 mt-0 py-0">

                        <?php
                        $men=new MenuSide();
                        $men->sidebarMenuStructure();
                        $men->sidebarMenuTrasparenza();

                        ?>
					</div>
					
				</div>
			</div>
		</section>
	</div>
	
    <script type="text/javascript">
		
		
		
        /*Aggiunta classe struttura per i titoli*/
		$.each($('div.accordion-local > div'), function (index, el) {
			title = $('div > p:nth-child(1)', el).text()
			$('div > p:nth-child(1)', el).hide()
			$('div > p:nth-child(1)', el).append('<hr>')
			
			var button = "<a class=\"text-left btn angle btn-lg btn-block text-wrap\" style=\"padding-right: 0px; border-radius: 0; \"" +
			"data-toggle=\"collapse\" " +
			"href=\"#sec" + index + "\" " +
			"role=\"button\" " +
			"aria-expanded=\"false\" " +
			"aria-controls=\"sec" + index + "\" " +
			">" + title +
			"        <span class=\"icofont-rounded-down pull-right\" style=\"padding:1%; background: darkgrey; margin-top: -1%; \">" +
			"        </span>" +
			"</div>" +
			"<\/a> ";
			
			$(el).before(button)
			$(el).parent().addClass('my-1')
			
			
			
		});
		
		var links = $('#introduzione a')
		$.each(links, function (index, link) {
			var link_icon = "icofont-external-link"
			var testo = $(link).text()
			var testo_base = testo
			var lin = $(link).attr('href')
			
			//isa innerlink
			var local = document.location.host
			console.log(local);
			var n = lin.indexOf(local);
			if (n > 0) {
			    if (lin.indexOf('.pdf') > 0) {
					testo = 'Apre il documento pdf ' + testo
					link_icon = "icofont-file-pdf"
				} 
				else if (lin.indexOf('.doc') > 0) {
					console.log(lin.indexOf('.doc'));
					testo = 'Apre il documento testo ' + testo
					link_icon = "icofont-file-word"
				} 
				else {
					testo = 'Apre la pagina interna' + testo
					link_icon = "icofont-page"
				}
				
				} else {
				testo = 'Apre la pagina esterna del sito' + testo
				link_icon = "icofont-external-link"
			}
			testo = testo + " in una pagina nuova"
			
			
			//inserimento automatico del title per i link
			
			link.setAttribute("title", testo)
			
			$(link).html('' +
			'<i class=\"' + link_icon + '"></i> ' +
			testo_base +
			'<strong><small> (Clicca per aprire)</small>' +
			'</strong>')
		});
		
		/*Aggiunta classe struttura per i titoli*/
		$.each($('div.accordion-local > div > div > p:nth-child(1)'), function (index, el) {
			$(el).addClass('header-accordion')
		});
		
		/*Aggiunta classe collapse per toggle*/
		$.each($('div.accordion-local > div > div'), function (index, el) {
			$(el).addClass('collapse')
			el.setAttribute("id", 'sec' + index);
			el.setAttribute("target", '_blank');
			
		});
		
        /*Navigation menu*/
		
        $(document).ready(function () {
            $.each($('#introduzione > h5'), function (index, el) {
                var side = $('#sidenav > p#menu');
                var title = el.innerText
                var id = 'n-' + title.replace(/\s/g, '')
                var aid = "a" + id
                $(el).attr('id', id)
                side.append("<a id='" + aid + "'  class='navigation btn btn-block my-1 mx-0' href='#" + id + "'>" + title + "</a>");
				
                //Sfondo in evidenza al click del mouse
                $('#' + aid).click(function () {
                    if (!$('#' + id).hasClass('evidenza')) {
                        // alert('no evidenza '+aid)
                        $('#' + id).addClass('evidenza')
                        setTimeout(function () {
                            $('#' + id).removeClass('evidenza')
						}, 3000);
						
					}
				});
			});
			
			
		});
		
	</script>
</div>
<?php get_footer(); ?>