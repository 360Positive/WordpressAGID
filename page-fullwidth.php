<?php 
   /* Template Name: Pagina full-width */
   get_header(); 
?>
<?php pa360_breadcrumb(); ?>
 <script type="text/javascript">
			$('<link/>', {
				rel: 'stylesheet',
				type: 'text/css',
				href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/templates/pagesidebar.css'
			}).appendTo('head');
            
			
		</script> 
<div id="content" role="main" class="container">
   <div class="container">
      <div class="row">

      <div class="col-12">
         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
         <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="header">
               <h1 class="entry-title"><?php the_title(); ?></h1>
               <?php edit_post_link(); ?>
            </header>
            <section class="entry-content">
               <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
               <?php the_content(); ?>
               <div class="entry-links"><?php wp_link_pages(); ?></div>
            </section>
         </article>
         <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
         <?php endwhile; endif; ?>
      </div>
      
      </div>
   </div>
</div>

<?php get_footer(); ?>