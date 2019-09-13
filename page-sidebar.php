<?php 
   /* Template Name: Pagina con sidebar - page-sidebar.php */
   get_header(); 
?>
<?php wppa_breadcrumb(); ?>
<section id="content" role="main" class="container">
    
   <div class="container">
      <div class="row">
      <div class="col-md-9">
          
         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
         
         <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="header">
               <h1 class="entry-title"><?php the_title(); ?></h1>
               
            </header>
            <section class="entry-content">
               <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); 
               } ?>
               <?php the_content(); ?>
               <div class="entry-links"><?php wp_link_pages(); ?></div>
            </section>
         </article>
         
         <?php if ( ! post_password_required() ) comments_template( '', false );
         endwhile; endif; ?>
      </div>
      
      <div class="col-sm-3 ">
   		<?php if ( is_active_sidebar( 'page-widget-area' ) ) : ?><?php endif; ?>
   		<div class="container-fluid widget-area page-widget-area">
            <?php //Inclusione modulo per la gestione dei pulsanti per la condivisione
            include '360Moduli/sharesocial.php'; 
            ?>
   		      <?php 
            $defaults = array(
            'menu'=> "'".get_field('sidebar-content')."'",
            'container'       => 'div',
            'menu_class'      => "",
            
    		);
    		
            echo	wp_nav_menu( $defaults );
   		      
   		      ?>
   		   
   		</div>
   		
		</div>
      
      </div>
  
</section>

<?php get_footer(); ?>