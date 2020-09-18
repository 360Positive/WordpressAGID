<?php
	/*
		* Template Name: Giunta - template-giunta.php
		* Template Post Type:page
	*/
	
get_header(); ?>
<script type="text/javascript">
	$('<link/>', {
		rel: 'stylesheet',
		type: 'text/css',
		href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/templates/giunta.css'//css da includere
	}).appendTo('head');
	
	
</script> 

<?php pa360_breadcrumb(); ?>
<section id="content" role="main" class="container mt-0 pt-0">
    <div class="row">
        <div class="col-sm-9 ">
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php the_content(); ?>
            <div class="row max-height-col" >
                <?php
					/**
						* Estrazione degli articoli associati alle nuove notizie
					*/
					$itemcol=3;
					global $post;
					$cat = 96;
					$args = array(
					'category' => $cat,
					'numberposts' => -1,
					);
					$myposts = get_posts($args);
					$count=0;
					foreach ($myposts as $post) : setup_postdata($post);
					
                    if ($count%$itemcol==0){
                        // blocco card deck
                        echo '</div><div class="row max-height-col">';
					}
                    $count++;
				?>
				<!--                        <div class="col-md-4">-->
				<div class="col-md-<?= round(12/$itemcol)?>">
                    <div class="giunta card h-100">
                        <img class="card-img-top" src="<?= get_the_post_thumbnail_url() ?>"
						alt="<?php the_title(); ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title">
                                <a href="<?= $post->guid; ?>"
								title="<?php the_title(); ?>">
                                    <?php the_title(); ?>
								</a>
								
							</h5><p class="card-text" style="font-size: 13px!important"><?= get_field('delega', $post->id); ?></p>
						</div>
					</div>
				</div>
				<!--                        </div>-->
                <?php endforeach; ?>
			</div>
            <?php wp_reset_postdata(); ?>
			
            <?php
				/*Stampa data e informazioni di aggiornamento della pagina
				echo _('<br>');
				echo _('Ultima modifica il: ');
				the_modified_time('d F Y');*/
			?>
		</div>
        <div class="col-sm-3">
            <div class="widget-area page-widget-area" style="padding-top: 0px">
                <?php //Inclusione modulo per la gestione dei social
				include '360Moduli/sharesocial.php'; ?>
                <?php
					$val = get_field('menusidebar');
					if ($val) {
						wp_nav_menu(array('menu' => '"' . $val . '""'));
					} ?>
			</div>
			
		</div>
		
	</div>
</section>
<?php get_footer(); ?>
