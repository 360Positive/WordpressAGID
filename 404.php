<?php get_header(); ?>
<section id="content" class="container">
   <div class="container">
      <div class="row">

  	    <div class="col-lg-8 offset-lg-2">
			   <article id="post-0" class="post not-found">
			      <header class="header">
			         <h1 class="entry-title"><?php _e( '404 Pagina non trovata', 'wppa' ); ?></h1>
			      </header>
			      <section class="entry-content">
			         <p class="text-center">
			         <?= __( 'La pagina che stavi cercando potrebbe non esiste più o potresti aver usato un vecchio collegamento alla pagina o al contenuto.');?>
			         <br><?= __('Effettua una ricerca oppure torna in Homepage.'); ?>
			         </p>
			         <?php get_search_form(); ?>
			      </section>
			   </article>
	 		</div>

 		</div>
	</div>
</section>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>