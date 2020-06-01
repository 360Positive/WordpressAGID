<?php
/*
    * Template Name: Articolo Base mod - single.php
    * Template Post Type: post, product
*/



require_once '360Moduli/XML/localfunc.php';
require_once '360Moduli/php_utils/utils.php';
//use function Composer\Autoload\includeFile;

get_header();

/***
 * Se la variabile trasparenza è attiva inserisce un itestazione per l'immagine nella posizione di banner in alto
 */

$isadmin = current_user_can('administrator');
//Verifica che siano presenti documenti da mostrare e li associa alla variabile $document
get_field('documenti') ? $document = get_field('documenti') : $document = [];

if (isset($_GET['page'])) {
    $trasp_section = $_GET['page'];
}

?>

    <!--single.php -->
    <script type="text/javascript"
            src="<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/js/utils.js"></script>

    <script type="text/javascript">
        <?php  /* Aggiunge header file di stile */?>
        $path = "<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/templates/single.css";
        addHeader($path);

        <?php
        if (the_field('trasparenza')) {
        /* Aggiunge header file di stile */?>
        $path = "<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/templates/singletra.css";
        addHeader($path);
        <?php } ?>
    </script>

<?php
if (the_field('trasparenza')) {
    /*Immagine intestazione pagina*/ ?>
    <section class="entry-content thumbnail topimage" style="background: url(<?php echo the_field('big-image'); ?>);">
        <p class="dida"><?php the_post_thumbnail_caption() ?></p>
    </section>
<?php } ?>

<?php /*Breadcrumb modificato per PA*/
pa360_breadcrumb(); ?>

<?php
if (get_field('isamministratore') == 'attivo') {
    /*Template amministratori*/
    require('360Moduli/template/amministratori.php');
} else {
    /*Template base*/
    ?>
    <div class="container">
        <div class="row">

            <section id="content" role="main" class="container">

                <div class="row">
                    <div class="col-md-9 mainblock">
                        <?= $trasp_section ?>

                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <?php //get_template_part( 'entry' ); ?>
                            <?php the_field('riferimento_normativo'); ?>
                            <h1 class="intestazione"><?php the_title(); ?></h1>
                            <?php if (get_field('descrizione')) {
                                echo get_field('descrizione');
                                echo '<hr>';
                            };
                            ?>

                            <?php the_content(); ?>
                            <?php //if ( ! post_password_required() ) comments_template( '', true ); ?>
                        <?php endwhile; endif; ?>
                        <?php if ($isadmin) { ?>
                            <span class="text-danger">I documenti con le scritte in rosso sono documenti archiviati visualizzabili solo dall'amministratore, accesibili tramite FOIA.</span>

                        <?php } ?>

                        <?php
                        foreach ($document as $doc) {
                            if (!$doc['archivio']) {
                                echo '<div class="int-allegati">' . $doc['intestazione'] . '</div>';
                                foreach ($doc['allegati'] as $allegato) {
                                    echo '<span> ';
                                    echo '<a href="' . $allegato['url'] . '">' . $allegato['nome'] . '</a>';
                                    echo '</span><br>';
                                }
                            } else {
                                if ($isadmin) {
                                    echo '<div class="text-danger int-allegati">' . $doc['intestazione'] . '</div>';
                                    foreach ($doc['allegati'] as $allegato) {
                                        echo '<span class="text-danger"> ';
                                        echo '<a class="text-danger" href="' . $allegato['url'] . '"><strong>Archiviato</strong> : ' . $allegato['nome'] . '</a>';
                                        echo '</span><br>';
                                    }
                                } else {

                                }
                            }
                        }

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

            <script>linkIcon(); //Load function to add icon to links</script>
        </div>
        <?php } ?>

    </div>
<?php get_footer(); ?>