<?php
/**
 * Template name: Ospitalità
 * Template Post Type: post, page
 **/
get_header(); ?>
<style>
    .label.label-orange{
        text-align: center;
    background: #ffcc99!important;
    padding: 5px;
    padding-right: 50px;
    padding-left: 50px;
    font-weight: 700;
    vertical-align: middle;
    }
   .topimage{
                    min-height:350px;
                    background-position: center;
                    background-size: cover;
                    padding-bottom:2%!important;
                    width:100%;
                }
                
       img.mainimage{
        width:100%;
        min-height: 350px;
    }
    
    .container-fluid {
    width: 100%;
    padding-right: 0px;
    padding-left: 0px;
    margin-right: auto;
    margin-left: auto;
}
</style>


    <div class="container-fluid no-padding topimage">
        <div class="row">
            <div class="col-md-12" style="padding:0px">
                <?php
                if (get_field('img0')) {

                    ?>
                    <img class="mainimage"
                        style="background:  url(<?php echo get_field('img0') ?>); background-position: center;background-size: cover">
                    <?php

                } else {
                    echo ' <img src="https://turismo.comuneacqui.it/wp-content/uploads/2019/06/full-no-foto-turismo-acqui-terme-.jpg" width="100%" class="img-responsive" />';

                } ?>
            </div>
        </div>
    </div>
    <br>
    <section id="content" role="main" class="container home-content">

        <div class="container">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="header"></header>
                    <section class="entry-content">
                        <?php // if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                        <?php if (!is_search()) get_template_part('entry-footer'); ?>
                        <?php //if (!is_search()) get_template_part('entry', 'meta'); ?>
                           <hr>
                        <h4 class="entry-title"><a href="<?php the_permalink(); ?>"
                                                   title="<?php the_title_attribute(); ?>" rel="bookmark">

                                <?php
                                //Se presenti stelle
                                if (get_field('star')) {
                                    for ($st = 0; $st < get_field('star'); $st++) {
                                        echo '<i class="icofont-star"></i>';
                                    }
                                }
                                if (get_field('girasoli')) {
                                    for ($st = 0; $st < get_field('girasoli'); $st++) {
                                        echo '<i class="icofont-sun"></i>';
                                    }
                                } ?>


                                <?php the_title(); ?></a></h4>


                        <!-- contenuto template ospitalità -->


                        <div class="row">

                            <div class="col-md-12">
                                <?php if (get_field('descrizione')) {

                                    echo '<i class="icofont icofont-book-mark" ></i>' . get_field('descrizione');

                                } ?>
                                
                            </div>
                            <div class="col-md-12" >
                                <hr>
                                <?php
                                if (get_field('lingue')) {
                                   
                                    echo "<span class='label label-orange'>"._("Lingue parlate:")."</span>";
                                    echo "<span style='margin-left:20px'>";
                                    foreach (get_field('lingue') as $lang) {
                                        echo '<i class="flag-icon flag-icon-'.$lang.' flag-icon-squared" style="width: 30px; height:30px; vertical-align: middle;"></i>  ';
                                    }
                                     echo "</span>";
                                }
                                ?>
                               <hr>
                            </div>
                        </div>
                        <div class="row row-eq-heigh">

                            <!-- Prima colonna -->
                            <div class="col-md-6">
                                <div class="row ">
                                    <!-- Primo blocco-->
                                    <div class="col-md-12">


                                        <?php if (get_field('apertura')) {

                                            if (get_field('chiusura') == "") {
                                                echo '<i class="icofont-calendar" ></i> ' . _('Aperto tutto l\'anno');
                                            } else {
                                                echo '<i class="icofont-calendar" ></i> ' . _('Dal') . " " . get_field('apertura') . " " . _('al') . " " . get_field('chiusura');
                                            }
                                        }

                                        ?>
                                      

                                    </div>
                                    <div class="col-md-12">

                                        <?php if (get_field('indirizzo')) {


                                            echo '<i class="icofont-location-pin"></i> ' . get_field('indirizzo');


                                        } ?>
                                      
                                    </div>
                                    <div class="col-md-12">

                                        <?php if (get_field('piva')) {

                                            echo '<strong>' . _('P.IVA') . ':</strong> ' . get_field('piva');

                                        } ?>
                                    </div>
                                    <div class="col-md-12">

                                        <?php if (get_field('cf')) {

                                            echo '<strong>' . _('Codice fiscale') . ':</strong> ' . get_field('cf');

                                        } ?>
                                    </div>
                                    <div class="col-md-12">
                                        <?php if (get_field('pec')) {

                                            echo '<strong>' . _('PEC') . ':</strong> ' . get_field('pec');

                                        } ?>
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                        <?php if (get_field('mail')) {


                                            echo '<a href="mailto:' . get_field('mail') . '">';
                                            echo '<i class="icofont-email"></i> ' . get_field('mail');
                                            echo '</a>';

                                        } ?>
                                    </div>
                                    <div class="col-md-12">
                                        <?php if (get_field('web')) {


                                            echo '<a href="' . get_field('web') . '">';
                                            echo '<i class="icofont-web"></i>  ' . get_field('web');
                                            echo '</a>';

                                        } ?>
                                        <hr>
                                    </div>

                                    <!-- Colonna recapiti -->


                                    <div class="col-md-12">

                                        <?php if (get_field('telefono')) {

                                            echo '<a href="tel:' . get_field('telefono') . '">';
                                            echo '<i class="icofont-phone"></i> ' . get_field('telefono');
                                            echo ' <small>' . _('Chiama') . '</small></a>';

                                        } ?>
                                    </div>
                                    <div class="col-md-12">
                                        <?php if (get_field('cellulare')) {


                                            echo '<a href="tel:' . get_field('cellulare') . '">';
                                            echo '<i class="icofont-mobile-phone"></i> ' . get_field('cellulare');
                                            echo ' <small>' . _('Chiama') . '</small></a>';
                                        } ?>
                                    </div>
                                    <div class="col-md-12">
                                        <?php if (get_field('whatsapp')) {

                                            echo '<a href="https://api.whatsapp.com/send?phone=' . get_field('whatsapp') . '">';
                                            echo '<i class="icofont-brand-whatsapp"></i> ' . get_field('whatsapp');
                                            echo ' <small>' . _('Messaggia') . '</small></a>';

                                        } ?>
                                    </div>
                                    <div class="col-md-12">
                                        <?php if (get_field('fax')) {

                                            echo '<i class="icofont-fax"></i> ' . get_field('fax');

                                        } ?></div>


                                    <!-- Colonna fisco -->


                                </div>
                            </div>

                                <div class="col-md-6">
                                    <div id="gallery">
                                    <div class="row">
                                        <div class="col-md-6">


                                            <a href="<?php echo get_field('img1') ?>" class="gal_link">


                                                <?php
                                                $nophoto = "https://turismo.comuneacqui.it/wp-content/uploads/2019/06/no-foto-turismo-acqui-terme.jpg";
                                                if (get_field('img1')) {

                                                    echo '<img src="' . get_field('img1') . '">';

                                                } else {
                                                    echo '<img src="' . $nophoto . '">';
                                                } ?>
                                            </a>

                                        </div>
                                        <div class="col-md-6">
                                            <a href="<?php echo get_field('img2') ?>" class="gal_link">
                                            <?php
                                            if (get_field('img2')) {

                                                echo '<img src="' . get_field('img2') . '">';

                                            } else {
                                                echo '<img src="' . $nophoto . '">';
                                            } ?>
                                                </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="<?php echo get_field('img3') ?>" class="gal_link">
                                            <?php
                                            if (get_field('img3')) {

                                                echo '<img src="' . get_field('img3') . '">';

                                            } else {
                                                echo '<img src="' . $nophoto . '">';
                                            } ?>
                                                </a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="<?php echo get_field('img4') ?>" class="gal_link">
                                            <?php
                                            if (get_field('img4')) {

                                                echo '<img src="' . get_field('img4') . '">';

                                            } else {
                                                echo '<img src="' . $nophoto . '">';
                                            } ?>
                                                </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <!-- end contenuto template ospitalità -->


                        <?php the_content(); ?>
                        <div class="entry-links"><?php wp_link_pages(); ?></div>
                    </section>
                </article>
                <?php // if ( ! post_password_required() ) comments_template( '', true ); ?>
            <?php endwhile; endif; ?>

        </div>
        <!-- Vista imamgine tutto schermo -->
        <!-- Modal HTML embedded directly into document -->


        <script>
            (function ($) {

                $(document).ready(function () {

                    var galLink = $("a.gal_link");

                    galLink.lightbox();

                });

            })(jQuery);
        </script>

    </section>

    <section class="home-widget">
        <div class="container">

            <?php if (is_active_sidebar('home-widget-area')) : ?>
                <div class="widget-area">
                    <div class="row xoxo">
                        <?php dynamic_sidebar('home-widget-area'); ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </section>


<?php //get_sidebar(); ?>
<?php get_footer(); ?>