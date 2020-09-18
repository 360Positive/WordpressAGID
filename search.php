<?php get_header(); ?>
<style>
	.entry-title{
	background: lightgray;
	padding:5px;
	display:block!important;
	font-size:1.1rem!important;
	}
	.widget-title{
	background: lightgray;
	padding:1%;
	display:block!important;
	font-size:1.5rem!important;
	}
	
	.widget-area > ul{
	margin:0px
	}
	.widget-area {
    padding: 0px!important;
	}
	.widget_last_post_wrap > .widget_last_post_inner > h5{
    display:none;
	}
	.widget_last_post_wrap > .widget_last_post_inner > h4{
    background:#FFC300;
    padding:2%!important;
	}
	.widget_last_post_inner{
    padding:2%!important;
    margin:1%!important;
	}
	
</style>
<?php pa360_breadcrumb(); ?>
<section id="content" role="main">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php if ( have_posts() ) : ?>
				<header class="header">
					<h1 class="entry-title"><?php printf( __( 'Risultati per: %s', 'wppa' ), get_search_query() ); ?></h1>
				</header>
				    <div class="row w-100">
					<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'entry' ); ?>
					<?php endwhile; ?>
					
					<?php get_template_part( 'nav', 'below' ); ?></div>
					<?php else : ?>
					<div id="post-0" class="post no-results not-found col-md-12">
						<header class="header">
							<h2 class="entry-title"><?php _e( 'Nessun risultato', 'wppa' ); ?></h2>
						</header>
						<section class="entry-content">
							<p><?php _e( 'La ricerca non ha prodotto risultati per i termini utilizzati.', 'wppa' ); ?></p>
							<?php get_search_form(); ?>
						</section>
					</div>
					<?php endif; ?>
							
			</div>
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
			
			</div>
		</div>

</section>

<?php get_footer(); ?>