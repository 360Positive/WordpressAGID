<?php
	/*
		* Template Name: Articolo Bandi - template-bandi.php
		* Template Post Type: post, product
	*/
	
get_header();

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();

        $entry=['title'=>get_the_title(),
            'rif'=>get_field('riferimento'),
            'tipo'=>get_field('tipologia'),
            'termin'=>get_field('termine'),
            'inizio'=>get_field('inizio'),
            'settore'=>get_field('settore'),
            'excerpt'=>substr(get_the_content(), 0, 200),
            'link'=> get_post_permalink()];

    ?>
	
	<section id="articolo-dettaglio-testo">
		<style>
            a > h2.bandi{
                color:black!important;
                font-size: 1.2rem!important;
                padding: 17px;
                font-weight: 800!important;
            }

            tipo{
                color:red;
                text-transform: capitalize;
            }
            label{
                font-weight:700;
            }
            titolo{
                font-size:1.5rem!important;
            }

			
		</style>
		<div class="container">
			<div class="row my-2">
				
				<div class="col-md-3">
                    <label>rif:</label> <tipo><?=$entry['rif']?></tipo><br>
                    <label>Tipologia:</label> <tipo><?=$entry['tipo']?></tipo><br>
                    <label>Inizio:</label> <?=$entry['inizio']?> <br>
                    <label>Scadenza:</label> <?=$entry['termin']?> <br>
                    <label>Settore:</label> <?=$entry['settore']?> <br>
				</div>
				<div class="col-md-8">
                    <titolo> <?=$entry['title']?> </titolo>
					<?php the_content(); ?>
						<div class="entry-links"><?php wp_link_pages(); ?></div>
									</div>
				<div class="col-md-1">
					
				</div>
			</div>
		</div>
	</section>
	
	<?php endwhile; endif; ?>
	
	
</article>


<?php get_footer(); ?>
