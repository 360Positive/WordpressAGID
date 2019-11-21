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

    .card-body {
        margin-bottom: 0px !important;
        line-height: 95%;
        padding-bottom: 0px!important;
    }
    div.card:after{
        display: none!important;
    }
    small.date-card{
        font-size: 0.8em!important;
    }
    small.categroy-card{
        color: #be880b;
        font-weight: bolder;
    }

    a > h2.lastnews {
        font-size: 1.2rem !important;
        color: black;
        padding: 17px;
        font-weight: 800 !important;
    }
    .card.lastnews{
        box-shadow: 1px 1px 5px 0px rgba(156,156,156,1);
        }

    h5.card-title.align-middle {
        margin-top: 2%;
        margin-bottom: 0%;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="lastnews"><?= _('Ultime notizie') ?></h1>
            <div class="card-deck">
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
                    <div class="card lastnews">
                        <img class="card-img-top" src="<?= get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
                        <div class="card-body">
                            <br><small class="categroy-card"><?php echo get_the_category_list( ', '); ?></small>
                            <br>
                            <small class="text-muted date-card"><?= get_the_date(); ?></small>
                            <h5 class="card-title  align-middle ">
                                <a href="<?= get_post_permalink() ?>"
                                   title="<?php the_title(); ?>" target="_blank">
                                    <?php the_title(); ?>
                                </a>
                            </h5>
                           </div>
                    </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            </div>

        <a href="<?= get_category_link($cat) ?>" class="pull-right" title="Apre sezione interna del sito con tutte le notizie">
            <h2 class="lastnews">
                Tutte le notizie</h2></a>
    </div></div>

</div>
</div>
