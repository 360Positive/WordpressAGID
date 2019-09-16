<!DOCTYPE html>
<html <?php language_attributes(); ?>>
   <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
      <meta name="google-site-verification" content="tz7vJocI3ag-OFtd1MofDI5g1MDlSjdj0hgiBtAiAgk" />
      <meta name="yandex-verification" content="2a130b656effd4bf" />
      <?php wp_head(); ?>
      
      <!--Font Awsome -->
      <link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.1/icofont.css"  crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <!--<script src="https://kit.fontawesome.com/ac75254518.js"></script>-->
        
        <!-- Fa icon -->
        
        <link rel="stylesheet" href="/wp-content/themes/design-italia-child/lib/faicon/all.css">
        <script rel="stylesheet" href="/wp-content/themes/design-italia-child/lib/faicon/all.js"></script>
        

        <!-- Flag library -->
        <link rel="stylesheet" href="/wp-content/themes/design-italia-child/lib/block/flags/css/flag-icon.min.css">
        
        <!-- Carousel -->
        <link rel="stylesheet" href="/wp-content/themes/design-italia/lib/responsive-image-carousel-lightbox/css/lightbox.css">
        
        <script src="/wp-content/themes/design-italia-child/lib/responsive-image-carousel-lightbox/js/jquery.lightbox.js"></script>
        
        <link rel="stylesheet" href="/wp-content/themes/design-italia/lib/responsive-image-carousel-lightbox/css/lightbox.css">
        
        <link rel="stylesheet" 
              href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
              integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" 
              crossorigin="anonymous">
              
        <!-- jQuery Modal -->
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
      



   </head>
   <body <?php body_class(); ?>>
      <div id="wrapper" class="hfeed">
         <header id="header" class="" role="banner">

         <div class="it-header-wrapper">
           <div class="it-header-slim-wrapper">
             <div class="container">
               <div class="row">
                 <div class="col-12">
                   <div class="it-header-slim-wrapper-content">
                     <!-- <a class="d-none d-lg-block navbar-brand" href="#"> -->
                        <img class="header-slim-img" alt="" src="<?php header_image(); ?>">
                     <!-- </a> -->
                     <div class="header-slim-right-zone">
                        <label for="show-menu-lingua" class="show-menu-lingua">&#8942;</label>
                        <input type="checkbox" id="show-menu-lingua" role="button">
                        <?php wp_nav_menu(array( 'theme_location' => 'menu-language', 'container' => 'ul', 'menu_class' => 'nav float-right' )); ?>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <div class="it-nav-wrapper">
             <div class="it-header-center-wrapper">
               <div class="container">
                 <div class="row">
                   <div class="col-12">
                     <div class="it-header-center-content-wrapper">
                       <div class="it-brand-wrapper">
                         <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home">
                           <?php 
                              $custom_logo_id = get_theme_mod( 'custom_logo' );
                              $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                              if ( has_custom_logo() ) {
                                 echo '<img class="icon" src="'. esc_url( $logo[0] ) .'" alt="'. esc_html( get_bloginfo( 'name' ) ) .'">';
                              } else {
                                 echo '<img class="icon" src="'. get_template_directory_uri() . '/img/custom-logo.png' .'" alt="'. esc_html( get_bloginfo( 'name' ) ) .'">';
                           } ?>
                           <div class="it-brand-text">
                             <h2 class="no_toc"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h2>
                             <h3 class="no_toc d-none d-md-block"><?php bloginfo( 'description' ); ?></h3>
                           </div>
                         </a>
                       </div>
                       <div class="it-right-zone">
                           <div class="it-search-wrapper">
                           <?php get_search_form(); ?>
                         </div>
                         <style>
                             #menu-lingue > li > a > img{
min-height:15px}
                         </style>
                         <div class="it-socials d-none d-md-flex">
                           <?php wp_nav_menu( array( 'theme_location' => 'menu-social', 'container' => 'ul', 'menu_class' => 'nav')); ?>
                         </div>
                         
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>

             <div class="it-header-navbar-wrapper">
               <nav class="menu-main" role="navigation">
               <div class="container">
                 <div class="row">
                   <div class="col-12">
                     <label for="show-menu-main" class="show-menu-main">Menu</label>
                     <input type="checkbox" id="show-menu-main" role="button">
                     <?php wp_nav_menu(array( 'theme_location' => 'menu-main', 'container' => 'ul', 'menu_class' => 'nav' )); ?>
                   </div>
                 </div>
               </div>
               </nav>
             </div>

           </div>
         </div>
         </header>

 <div id="container">