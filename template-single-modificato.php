<?php
	/*
		* Template Name: Articolo Tema Modificato - template-single-modificato.php
		* Template Post Type: post, product
	*/
	
get_header(); ?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<section id="articolo-dettaglio-testo">
		<style>
			section.topimage{
			background:url(<?php echo the_field('big-image');?>);
			min-height:350px;
			background-position: center;
			background-size: cover;
			padding-bottom:2%!important;
			margin-top:0px;
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
			
		</style>
		<section class="entry-content thumbnail topimage">
			
			<img class="alignfull wp-post-image" alt="">
			
			<p class="dida"><?php the_post_thumbnail_caption() ?></p>
		</section>
		<div class="container">
			<div class="row"> 
				
				<div class="col-md-1">
					
				</div>
				<div class="col-md-10">
					
					<section class="entry-content contenuto">
						<?php the_content(); ?>
						<div class="entry-links"><?php wp_link_pages(); ?></div>
					</section>
				</div>
				<div class="col-md-1">
					
				</div>
			</div>
		</div>
	</section>
	
	<?php endwhile; endif; ?>
	
	
</article>


<?php get_footer(); ?>
