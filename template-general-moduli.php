<?php
/*
    * Template Name: Modulistica - template-general-moduli.php
    * Template Post Type: post, page
*/
require_once '360Moduli/Modulistica/localfuncmoduli.php';

get_header(); ?>
    <!--single.php -->
    <style>
        section.topimage {
            background: url(<?php echo the_field('big-image');?>);
            min-height: 350px;
            background-position: center;
            background-size: cover;
            padding-bottom: 0% !important;
            margin-top: -25px;
            margin-bottom: 0px;
        }

        .over {
            padding: 2%;
        }

        #sidebar:after {
            display: none;
        }

        .moreact {
            background: yellow;
            padding: 1%;
        }

        .breadcrumb {
            margin-top: 0px;
        }

        .icofont- * {
            font-size: 2em !important;
        }

        .entry-title {
            background: lightgray;
            padding: 1%;
            display: block !important;
            font-size: 1.5rem !important;
        }

    </style>
    <section class="entry-content thumbnail topimage">
        <p class="dida"><?php the_post_thumbnail_caption() ?></p>

    </section>
<?php wppa_breadcrumb(); ?>
    <div class="container">
    <div class="row">

        <section id="content" role="main" class="container">

            <div class="row">
                <div class="col-md-9">

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php //get_template_part( 'entry' ); ?>
                        <h2 class="entry-title"><?php the_title(); ?></h2>
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


<?php get_footer(); ?>