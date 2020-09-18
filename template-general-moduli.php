<?php
/*
    * Template Name: Modulistica - template-general-moduli.php
    * Template Post Type: post, page
*/
require_once '360Moduli/Modulistica/localfuncmoduli.php';

get_header(); ?>
    <!--single.php -->
    <script type="text/javascript">    $('<link/>', {
            rel: 'stylesheet',
            type: 'text/css',
            href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/templates/moduli.css'
        }).appendTo('head');    </script>
    <section class="entry-content thumbnail topimage" style="background: url(<?php echo the_field('big-image'); ?>);">
        <p class="dida"><?php the_post_thumbnail_caption() ?></p>
    </section>

<?php pa360_breadcrumb(); ?>
    <div class="container">

        <div class="row">

            <section id="content" role="main" class="container">

                <div class="row">
                    <div class="col-md-9">

                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <?php //get_template_part( 'entry' ); ?>
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                            <hr>
                            <?php the_content(); ?>
                            <?php //if ( ! post_password_required() ) comments_template( '', true ); ?>
                        <?php endwhile; endif; ?>


                        <?php
                        $xmi = new XMLINTERPRETERMODULISTICA();
                        //get_field('xml')
                        $xmi->init('');
                        $xmi->createLayout();
                        $xmi->script();

                        ?>


                    </div>

                    <div class="col-md-3">
                        <?php //Inclusione modulo per la gestione dei social
                        include '360Moduli/sharesocial.php'; ?>
                        <div class="container-fluid widget-area page-widget-area">


                            <?php
                            $val = get_field('menusidebar');
                            if ($val) {
                                wp_nav_menu(array('menu' => '"' . $val . '""'));
                            } ?>
                        </div>
                    </div>


                </div>


            </section>
        </div>
    </div>

<?php get_footer(); ?>