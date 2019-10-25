<?php
   /* Template Name: Pagina con sidebar - page-sidebar.php */
   get_header();
?>
<style>
    .entry-title{
        background: lightgray;
        padding:1%;
        display:block!important;
        font-size:1.5rem!important;
    }
</style>
<?php wppa_breadcrumb(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section id="content" role="main" class="container">

    <div class="row">
      <div class="col-md-9">
          <h1 class="entry-title"><?php the_title(); ?></h1>
          <?php the_content(); ?>

          <?php
          //Spampa data e informazioni di aggiornamento della pagina
          echo _('<br>');
          echo _('Ultima modifica il: ');
          the_modified_time('d F Y');
          ?>
      </div>

      <div class="col-sm-3 ">
   	   		<div class="widget-area page-widget-area" style="padding-top: 0px">
                <?php //Inclusione modulo per la gestione dei social
                include '360Moduli/sharesocial.php';?>
                <?php
                $val=get_field('menusidebar');
                if($val){
                wp_nav_menu(array('menu'=>'"'.$val.'""'));
                } ?>
   		</div>

		</div>

      </div>

</section>
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>

<?php get_footer(); ?>