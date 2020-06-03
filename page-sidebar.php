<?php
/* Template Name: Pagina con sidebar - page-sidebar.php
Template Post Type: post, page, product*/
require_once '360Moduli/XML/localfunc.php';
require_once '360Moduli/php_utils/utils.php';
get_header();
?>
    <script type="text/javascript"
            src="<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/js/utils.js"></script>
    <script type="text/javascript">
        $('<link/>', {
            rel: 'stylesheet',
            type: 'text/css',
            href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/templates/pagesidebar.css'
        }).appendTo('head');


    </script>
<?php pa360_breadcrumb(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <section id="content" role="main" class="container">

        <div class="row">
            <div class="col-md-9 pr-5">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <?php the_content(); ?>

                <?php
                /*Spampa data e informazioni di aggiornamento della pagina
                echo _('<br>');
                echo _('Ultima modifica il: ');
                the_modified_time('d F Y');*/
                ?>
            </div>

            <div class="col-md-3">
                <?php //Inclusione modulo per la gestione dei social
                include '360Moduli/sharesocial.php'; ?>
                <div class="widget-area w-100 mt-0 py-0">
                    <?php

                    $men = new MenuSide();
                    $men->sidebarMenuStructure();
                    $men->sidebarMenuTrasparenza();

                    ?>
                </div>
            </div>

        </div>

    </section>

<?php endwhile; endif;

?>
<script>linkIcon(); //Load function to add icon to links</script>
<?php get_footer(); ?>