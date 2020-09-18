<?php
	/*
		* Template Name: Articolo Bandi - template-bandi.php
		* Template Post Type: post, product
	*/
	
get_header();

?>
<?php pa360_breadcrumb(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
     
        $ext=['doc' => '<i class="icofont-file-document"></i>',
        'pdf' => '<i class="icofont-file-pdf"></i>',
        'xml' => '<i class="icofont-file-alt"></i>',
        'jpg' => '<i class="icofont-image"></i>',
        'doc' => '<i class="icofont-file-word"></i>'
         ];

        $entry=['title'=>get_the_title(),
            'rif'=>get_field('riferimento'),
            'tipo'=>get_field('tipologia'),
            'termine'=>get_field('termine'),
            'inizio'=>get_field('inizio'),
            'settore'=>get_field('settore'),
            'excerpt'=>substr(get_the_content(), 0, 200),
            'allegati' => get_field('allegati'),
            'link'=> get_post_permalink()];

    ?>
	
	<section id="articolo-dettaglio-testo">
	<script type="text/javascript">
			$('<link/>', {
				rel: 'stylesheet',
				type: 'text/css',
				href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/templates/bandi.css'//css da includere
			}).appendTo('head');
            
			
		</script> 

		<div class="container">
		    <div class="row">
		        <div id="content" class="col-md-9 mt-0 pt-0">
		            	
				               	<h1 class="intestazione"> <?=$entry['title']?> </h1>
            				    <label>Rif:</label> <span class="tipo"><?=$entry['rif']?></span> -
                                <label>Tipologia:</label> <span class="tipo"><?=$entry['tipo']?></span> -
                                <label>Inizio:</label> <?=$entry['inizio']?> -
                                <label>Scadenza:</label> <?=$entry['termine']?> -
                                <label>Settore:</label> <?=$entry['settore']?> <br>
                               <hr>
				               	    <div class="contenuto" id="maincontent">
										<?php the_content(); ?>
									</div>   					
            						<div class="entry-links"><?php wp_link_pages(); ?></div><br>
								
									<div class="w-100 p-3" style="background:#990000;color:white;  text-transform: uppercase; letter-spacing: 2px; "><strong ><?php echo __('Documentazione relativa');?>:</strong></div><br>
									<div class="row">
            						<?php
            				            				
            						foreach($entry['allegati'] as $allegato){
            						    $filename=str_replace(get_site_url(),'',$allegato['file']);
            						    echo '<div class="col-md-4"><a class="" href="'.$allegato['file'].'" target="_blank">'.$ext[explode('.',$filename)[1]].'  '.$allegato['descrizione'].'</a></div> ';
            						}
            						?>
            						</div>
									<hr>
            			
		        </div>
		        <div class="col-md-3">
                    <?php //Inclusione modulo per la gestione dei social
                    include '360Moduli/sharesocial.php'; ?>
                    <div class="my-0 widget-area w-100">
                        
                        <?php
                        $val = get_field('menusidebar');
                        if ($val) {
                            wp_nav_menu(array('menu' => '"' . $val . '""'));
                        } ?>
                    </div>
                   
                </div>
		    </div>
		</div>
	</section>
	
	<?php endwhile; endif; ?>
	<script type="text/javascript">
            /**
             * Script per l'inserimento delle icone dei collegamenti ai file esterni ed interni della pagina
             * @type {jQuery|HTMLElement -> single.php}
             */
            $(window).on('load', function () {
                var content = $('#maincontent');
                $('a', content).each(function (key, value) {
                    var file = $(this).attr('href');
                    // console.log(file)
					var typefile="";
                    var ext = file.split('.').pop();
					
                    switch (ext) {
                        case 'jpg':
                            typefile = 'icofont-file-image';
                            title = "Apre un file immagine"
                            break;
                        case 'png':
                            typefile = 'icofont-file-image';
                            title = "Apre un file immagine"
                            break;
                        case 'gif':
                            typefile = 'icofont-file-image';
                            title = "Apre un file immagine";
                            break;
                        case 'doc':
                            typefile = 'icofont-file-document';
                            title = "Apre un file documneto";
                            break;
                        case 'docx':
                            typefile = 'icofont-file-document';
                            title = "Apre un file documneto";
                            break;
                        case 'xls':
                            typefile = 'icofont-file-excel';
                            title = "Apre un file foglio di calcolo";
                            break;
                        case 'pdf':
                            typefile = 'icofont-file-pdf';
                            title = "Apre un file pdf";
                            break;
                        default:
                            typefile = 'icofont-link';
                            title = "Apre un link";
                            break;
                    }

                    $(this).before('<i class="' + typefile + '"></i> ')
                    var hastitle = $(this).attr('title');
                    console.log(hastitle);

                    if (!hastitle) {
                        $(this).attr({'title': title});
                    }
                })
            })
        </script>
	
</article>


<?php get_footer(); ?>
