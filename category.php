<?php get_header(); ?>
    <script type="text/javascript">
        $('<link/>', {
            rel: 'stylesheet',
            type: 'text/css',
            href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/wp/category.css'//css da includere
        }).appendTo('head');

    </script>

<?php pa360_breadcrumb(); ?>
    <section id="content" role="main" class="container">
        <div class="container mb-5">
            <div class="row ">
                <div class="col-sm-12">

                    <div class="jumbotron text-center my-1 py-2">
                        <h1 class="big-heading" style="font-size: 1.9rem!important;"><?php single_cat_title(); ?></h1>
                        <p class="lead">Nella pagina potrete trovare gli articoli della corrispondente categoria del
                            portale.<br>
                            Pagina di riepilogo. </p>
                        <header class="header">
                            <?php if ('' != category_description()) echo apply_filters('archive_meta', '<div class="archive-meta">' . category_description() . '</div>'); ?>

                        </header>
                    </div>
                    <hr>
                    <div class="row row-eq-height mx-md-n5">

                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <div class="col-md-2">
                                <?php get_template_part('entry'); ?>
                            </div>
                        <?php endwhile; endif; ?>

                    </div>
                </div>
                <div class="col-sm-2">
                    <!--         --><?php //get_sidebar(); ?>
                </div>

            </div><hr>
        </div>

    </section>
    <div>
<?php get_footer(); ?>