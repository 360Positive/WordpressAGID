<?php
/*
    * Template Name: Principale Uffici - single-uffici-complessivo.php
    * Template Post Type: post, page, product
*/
require_once '360Moduli/XML/localfunc.php';

get_header(); ?>
    <style>
        .small, small {
            font-size: 80% !important;
            font-weight: 800;
        }
    </style>

<?php
$category_query_args = array(
    'category_name' => 'uffici',
    'orderby' => 'title',
    'order' => 'ASC',
    'nopaging' => true,
);

$category_query = new WP_Query($category_query_args);
?>

    <!--single.php -->

<!--    <section class="entry-content thumbnail topimage">-->
<!--        <p class="dida">--><?php //the_post_thumbnail_caption() ?><!--</p>-->
<!--    </section>-->

<?php wppa_breadcrumb(); ?>
    <div class="container">
    <div class="row">
        <section id="content" role="main" class="container">
            <div class="row">
                <div class="col-md-9">
                    <?php
                    //Contenuto della pagina
                    the_content();

                    //Pulsante il menu a tendina
                    ?>

                    <a class="text-left btn angle btn-lg btn-block text-wrap"
                       style="padding-right: 0px; border-radius: 0; "
                       data-toggle="collapse"
                       href="#uffici" role="button"
                       aria-expanded="true" aria-controls="uffici"
                    > ELENCO UFFICI
                            <span class="icofont-rounded-down pull-right"
                                  style="padding:1%; background: darkgrey; margin-top: -1%; ">
                            </span>
                    </a>
                    <div id="uffici" class="collapse">
                        <ul>
                            <?php
                            echo _('<br>');
                            //Elenco degli uffici associati alla categoria
                            if ($category_query->have_posts()) : while ($category_query->have_posts()): $category_query->the_post();
                                ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
                                </li>
                            <?php
                            endwhile; endif; ?>
                        </ul>
                    </div>

                    <?php
                    //Spampa data e informazioni di aggiornamento della pagina
                    echo _('<br>');
                    echo _('Ultima modifica il: ');
                    the_modified_time('d F Y');
                    ?>

                </div>

                <div class="col-sm-3">
                    <div class="container-fluid widget-area page-widget-area">
                        <?php //Inclusione modulo per la gestione dei social
                        include '360Moduli/sharesocial.php'; ?>
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