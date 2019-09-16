<?php
	/*
		* Template Name: Articolo Tema Modificato
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
					
						<!--<div class="float-right over">
						<ul class="menu-moreaction">
						<li>
						<a href="#" onclick="window.print();return false;">
						<span class="it-print"></span> Stampa
						</a>
						</li>
						<li>
						<a href="mailto:?subject=Condiviso&body=<?php the_title(); ?>%0D%0A<?php the_excerpt(); ?>">
						<span class="it-mail"></span> Invia
						</a>
						</li>
						<li>
						<a target="_blank" href="https://twitter.com/home?status=<?php the_title(); ?> - <?php echo 'http://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>">
						<span class="it-twitter"></span> Twitter
						</a>
						</li>
						<li>
						<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo 'http://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>">
						<span class="it-facebook"></span> Facebook
						</a>
						</li>
						<li>
						<a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo 'http://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>&title=<?php the_title(); ?>&summary=&source=<?php echo 'http://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>">
						<span class="it-linkedin"></span> LinkedIn
						</a>
						</li>
						</ul>
						<div class="menu-moreaction moreact"><?php echo the_field('personallinks');?></div>
						</div>
					-->
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
