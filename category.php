<?php get_header(); ?>
<style>
    body.archive article, body.search article {
        border-bottom: 0px;
        padding: 2% 0;
    }
</style>
<section id="content" role="main" class="container">
   <div class="container">
      <div class="row">
      	<div class="col-sm-12">
            <div class="jumbotron text-center my-1 py-2">
                 <h1 class="big-heading" style="font-size: 1.9rem!important;"><?php single_cat_title(); ?></h1>
                <p class="lead">Nella pagina potrete trovare gli articoli della corrispondente categoria del portale.<br>
                    Pagina di riepilogo. </p>
            </div>
            <div class="row">
					<header class="header">
						<?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>

					</header>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'entry' ); ?>
					<?php endwhile; endif; ?>
<!--					--><?php //get_template_part( 'nav', 'below' ); ?>
        </div>
   		</div>
      <div class="col-sm-2">
<!--         --><?php //get_sidebar(); ?>
      </div>

		</div>
	</div>
</section>

<?php get_footer(); ?>