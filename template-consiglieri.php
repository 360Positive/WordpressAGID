<?php
/*
    * Template Name: Consiglieri - template-consiglieri.php
    * Template Post Type:post,page
*/

get_header(); ?>
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

    .breadcrumb {
        margin-top: 0px;
    }

    h2.consiglio {
        font-size: 1.2rem !important;
        color: black;
        padding: 17px;
        font-weight: 800 !important;
    }

    .row {
        margin-bottom: 10px;
    }


</style>
<section class="entry-content thumbnail topimage">
    <p class=""><?php the_post_thumbnail_caption() ?></p>
</section>
<?php wppa_breadcrumb(); ?>
<section id="content" role="main" class="container">
    <div class="row">
        <div class="col-sm-9 ">
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php the_content(); ?>

            <div class="row max-height-col">
                <?php
                /**
                 * Legge il repeater presente nella pagina che gestisce i dati
                 */
                $consiglieri = get_field('consiglieri');
                if (!empty($consiglieri)) {
                    foreach ($consiglieri as $post) {
                        ?>
                        <div class="col-md-4">
                            <div class="card h-100 consiglieri ">
                                <img class="text-center mx-auto" src="<?= $post['foto'] ?>"
                                     alt="<?= $post['nome_cognome'] ?>" width="80%!important;">
                                <div class="card-body">
                                    <h5 class="card-title text-center"><?= $post['nome_cognome'] ?><small>
                                            <?= !$post['candidato_sindaco']? '': "Candidato sindaco"; ?>
                                        </small></h5>
                                    <hr>
                                    <p class="card-text">
                                        <?= $post['data_nascita'] ?>
                                        <?= $post['luogo_nascita'] ?><br>
                                    <hr>
                                    <strong>Data elezione: </strong> <?= $post['data_elezione'] ?>
                                    <strong>Data nomina: </strong><?= $post['data_nomina'] ?><br>
                                    <hr>
                                    <strong>Partito: </strong><?= $post['partito'] ?><br>
                                    <strong>Liste civiche: </strong><?= $post['liste_civiche'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php }
                }
                ?></div>

            <?php
            //Stampa data e informazioni di aggiornamento della pagina
            echo _('<br>');
            echo _('Ultima modifica il: ');
            the_modified_time('d F Y');
            ?>
        </div>
        <div class="col-sm-3">
            <div class="widget-area page-widget-area" style="padding-top: 0px">
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
<?php get_footer(); ?>
