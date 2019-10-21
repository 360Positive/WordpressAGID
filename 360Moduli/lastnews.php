<?php
/**
 * Sistema di visualizzazione delle ultime notizie
 * Deve essere impostato nel file l'id della categoria al quale associare i post
 */
?>
<style>
    div.rosso {
        background: #ff704d;
        padding: 1%;
        margin-bottom: 0px;
        margin-top: 10px;
    }

    div.arancio {
        background: #ff8533;
        padding: 1%;
        margin-bottom: 0px;
        margin-top: 10px;
    }

    div.giallo {
        background: #ffdb4d;
        padding: 1%;
        margin-bottom: 0px;
        margin-top: 10px;
    }

    h1.alert-heading, h1.alert-heading > i {
        font-size: 1.5rem !important;
    }

    .fullpge {
        width: 100% !important;
    }

    .container-fluid.lastnews {
        background: white !important;
    }

    .lastnews > a {
        font-size: 13px !important;
        font-weight: bold;
        color: #420101
    }

    h1.lastnews {
        font-size: 40px !important;
        color: black;
        padding: 15px;
        font-weight: 700 !important;
    }

    div.container-fluid.lastnews {
        background: #30373d !important;

    }

    .card-body.lastnews {
        background: #ffb401;
        pading: 1%;
    }

    .card {
        border: 0px;
    }

    .card-body {
        margin-bottom: 0px !important;
    }
    div.card:after{
        display: none!important;
    }

    a > h2.lastnews {
        font-size: 1.2rem !important;
        color: black;
        padding: 17px;
        font-weight: 800 !important;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h1 class="lastnews"><?= _('Ultime notizie') ?></h1>

            <div class="card-deck  ">
                <?php
                /**
                 * Estrazione degli articoli associati alle nuove notizie
                 */
                global $post;
                $cat = 86;
                $args = array('category' => $cat);
                $myposts = get_posts($args);
                foreach ($myposts as $post) : setup_postdata($post);
                    ?>
                    <div class="card">
                        <img class="card-img-top" src="<?= get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
                        <div class="card-body lastnews">
                            <h5 class="card-title text-center  align-middle ">
                                <a href="<?= get_category_link($cat) ?>"
                                   title="<?php the_title(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h5>
                            <p class="card-text"></p>
                        </div>
                        <!-- Footer, data di pubblicazione-->
                        <div class="card-footer text-center">
                            <small class="text-muted"><?= get_the_date(); ?></small>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <a href="<?= get_category_link($cat) ?>" class="pull-right" title="Tutte le notizie">
                <h2 class="lastnews">
                    Tutte le notizie</h2></a>
        </div>

    </div>

</div>
</div>
