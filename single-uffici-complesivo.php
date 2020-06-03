<?php
	/*
		* Template Name: Principale Uffici - single-uffici-complessivo.php
		* Template Post Type: post, page, product
	*/
	require_once '360Moduli/XML/localfunc.php';
    require_once '360Moduli/php_utils/utils.php';
	
get_header(); ?>
    <script type="text/javascript"
            src="<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/js/utils.js"></script>
<script type="text/javascript">
	$('<link/>', {
		rel: 'stylesheet',
		type: 'text/css',
		href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/templates/ufficigenerale.css'//css da includere
	}).appendTo('head');
	
</script>



<!--single.php -->

<!--    <section class="entry-content thumbnail topimage">-->
<!--        <p class="dida">--><?php //the_post_thumbnail_caption() ?><!--</p>-->
<!--    </section>-->

<?php pa360_breadcrumb(); ?>
<div class="container">
    <div class="row">
        <section id="content" role="main" class="container">
            <div class="row">
                <div class="col-md-9">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <?php					
						
						//Pulsante il menu a tendina
						
						// <a class="text-left btn angle btn-lg btn-block text-wrap"
						//   style="padding-right: 0px; border-radius: 0; "
						//   data-toggle="collapse"
						//   href="#uffici" role="button"
						//   aria-expanded="true" aria-controls="uffici"
						// > ELENCO UFFICI
						//         <span class="icofont-rounded-down pull-right"
						//               style="padding:1%; background: darkgrey; margin-top: -1%; ">
						//         </span>
						// </a>
						
					?>
                    <div id="uffici" >
                        <?php //Contenuto della pagina ?>
						<?php $val = get_field('menusidebar'); //Memorizzazione nome menu laterale se presente?>
                        <?php the_content(); //Contenuto pagina?> 
                        
                        
                        <?php
							//Estrazione articoli che hanno la categoria 'uffici'
							$category_query_args = array(
							'category_name' => 'uffici',
							'orderby' => 'title',
							'order' => 'ASC',
							'nopaging' => true,
							);
							
							//Risualtato query
							$category_query = new WP_Query($category_query_args);
						?>
						<?php echo '<br>';?>
                        <ul>
                            <?php
								//Elenco degli uffici associati alla categoria
								if ($category_query->have_posts()) : while ($category_query->have_posts()): $category_query->the_post();
							?>
							<li class="btn btn-block text-left" style="margin-bottom:10px!important; margin-top:10px!important">
								<a href="<?php the_permalink(); ?>" class="py-0">
									<h1 style="font-size: 1.2rem!important; word-break: break-word; white-space: pre-wrap;"><?php the_title(); ?></h1>
								</a>
							</li>							
                            <?php endwhile; endif; ?>
						</ul>
					</div>
					
                    <?php
						/*Spampa data e informazioni di aggiornamento della pagina
						echo '<br>';
						echo _('Ultima modifica il: ');
						the_modified_time('d F Y');*/
					?>					
				</div>
				
				<div class="col-md-3">
					<?php //Inclusione modulo per la gestione dei social
					include '360Moduli/sharesocial.php'; ?>
                    <div class="widget-area w-100 mt-0 py-0">
                        <?php  if (!empty($val)) { 
							wp_nav_menu(array('menu' => '"' . $val . '""'),'<a>');
						} ?>
					</div>
					
				</div>

                <div class="col-md-3">
                    <?php //Inclusione modulo per la gestione dei social
                    include '360Moduli/sharesocial.php'; ?>
                    <div class="widget-area w-100 mt-0 py-0">
                        <?php

                        $men = new MenuSide();
                        $men->sidebarMenuStructure();
                        $men->sidebarMenuTrasparenza();

                        ?>
                    </div>
                </div>
			</div>
		</section>
	</div>
</div>
    <script>linkIcon(); //Load function to add icon to links</script>
<?php get_footer(); ?>