<?php
	/*
		* Template Name: Articolo Tema Modificato 
		* Template Post Type:product,page
	*/
	
get_header(); ?>



<section id="articolo-dettaglio-testo">
	<style>
		section.topimage{
		background:url(<?php echo the_field('big-image');?>);
		min-height:350px;
		background-position: center;
		background-size: cover;
		padding-bottom:0%!important;
		margin-top: -25px;
		margin-bottom:0px;
		}
		.over{
		padding:2%;
		}
		#sidebar:after{
		display:none;
		}
		.moreact{
		background:yellow;
		padding:1%;
		}
		.breadcrumb{
		    margin-top:0px;
		}
		
	</style>
	<section class="entry-content thumbnail topimage">
		<p class="dida"><?php the_post_thumbnail_caption() ?></p>
	</section>
	<?php wppa_breadcrumb(); ?>
	
	<section id="content" role="main" class="container">
		<div class="container">
            <div class="row">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <section class="entry-content contenuto">
						<?php the_content(); ?>
						<!--<div class="entry-links"><?php wp_link_pages(); ?></div>-->
					</section>
                    <?php endwhile; endif; ?>
				</article>
				
			</div>
		</div>
		
	</section>
	<?php get_footer(); ?>
