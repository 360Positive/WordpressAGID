<?php
/**
 * Template name: Ristorazione
 * Template Post Type: post, page
 **/
get_header(); ?>


    <div class="container-fluid no-padding">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (get_field('img0')) {

                    ?>
                    <img
                        style="width:100%;min-height: 600px; background:  url(<?php echo get_field('img0') ?>); background-position: center;background-size: cover">
                    <?php

                } else {
                    echo ' <img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=1300%C3%97400&w=1300&h=400" alt="placeholder 960" class="img-responsive" />';

                } ?>
            </div>
        </div>
    </div>
    <p>prova</p>
    <section id="content" role="main" class="container home-content">

        <div class="container">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="header"></header>
                    <section class="entry-content">
                        <?php // if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                        <?php if (!is_search()) get_template_part('entry-footer'); ?>
                        <?php //if (!is_search()) get_template_part('entry', 'meta'); ?>
                        <h4 class="entry-title"><a href="<?php the_permalink(); ?>"
                                                   title="<?php the_title_attribute(); ?>" rel="bookmark">

                                <?php the_title(); ?></a></h4>


                        <!-- contenuto template ristorazione -->


                        <div class="row">

                            <div class="col-md-12">
                                <?php if (get_field('descrizione')) {

                                    echo '<i class="icofont icofont-book-mark" ></i>' . get_field('descrizione');

                                } ?>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <?php
                                if (get_field('lingue')) {
                                    echo _("Lingue parlate:")." ";
                                    foreach (get_field('lingue') as $lang) {
                                        echo '<i class="flag-icon flag-icon-'.$lang.' flag-icon-squared" style="width: 30px; height:30px"></i>  ';
                                    }
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
                                        <?php if (get_field('giornochiusura')) {

                                            echo '<br>'._('Giorno chiusura').' : '.get_field('giornochiusura');

                                        }

                                        ?>
                                        <hr>

                                    </div>
                                    <div class="col-md-12">

                                        <?php if (get_field('indirizzo')) {


                                            echo '<i class="fas fa-map-pin"></i> ' . get_field('indirizzo');


                                        } ?>
                                        <hr>
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
                                            echo '<i class="fas fa-at"></i> ' . get_field('mail');
                                            echo '</a>';

                                        } ?>
                                    </div>
                                    <div class="col-md-12">
                                        <?php if (get_field('web')) {


                                            echo '<a href="' . get_field('web') . '">';
                                            echo '<i class="fas fa-globe-europe"></i>  ' . get_field('web');
                                            echo '</a>';

                                        } ?>
                                        <hr>
                                    </div>

                                    <!-- Colonna recapiti -->


                                    <div class="col-md-12">

                                        <?php if (get_field('telefono')) {

                                            echo '<a href="tel:' . get_field('telefono') . '">';
                                            echo '<i class="fas fa-phone"></i> ' . get_field('telefono');
                                            echo ' <small>' . _('Chiama') . '</small></a>';

                                        } ?>
                                    </div>
                                    <div class="col-md-12">
                                        <?php if (get_field('cellulare')) {


                                            echo '<a href="tel:' . get_field('cellulare') . '">';
                                            echo '<i class="fas fa-mobile-alt"></i> ' . get_field('cellulare');
                                            echo ' <small>' . _('Chiama') . '</small></a>';
                                        } ?>
                                    </div>
                                    <div class="col-md-12">
                                        <?php if (get_field('whatsapp')) {

                                            echo '<a href="https://api.whatsapp.com/send?phone=' . get_field('whatsapp') . '">';
                                            echo '<i class="fab fa-whatsapp"></i> ' . get_field('whatsapp');
                                            echo ' <small>' . _('Messaggia') . '</small></a>';

                                        } ?>
                                    </div>
                                    <div class="col-md-12">
                                        <?php if (get_field('fax')) {

                                            echo '<i class="fas fa-fax"></i> ' . get_field('fax');

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
                                                $nophoto = "https://turismo.comuneacqui.it/wp-content/uploads/2019/04/no-foto-turismo-acqui-terme.jpg";
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