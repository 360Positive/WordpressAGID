<?php
/**
 * Sistema di visualizzazione degli eventi
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

    .container.featuredevent {
        background: #30373d !important;
    }

  .card-title.featuredevent {
        font-size: 2em !important;
      padding-bottom: 2%;
        font-weight: bold;
      background: rgb(255,179,0);
      background: linear-gradient(180deg, rgba(255,179,0,1) 0%, rgba(255,255,255,0) 100%);
    }

    p.card-text.featuredevent {
        color: #5a6772 !important;
    }

    div.card-header.featuredevent {
        border-radius: 5px 5px 0px 0px;
        background: #ffb300 !important;
        min-height: 50px;
        padding-bottom: 0px!important;
        }

    h1.featuredevent {
        font-size: 40px !important;
        color: white;
        padding: 15px;
        font-weight: 700 !important;
    }

    a > h2.featuredevent {
        font-size: 1.2rem !important;
        color: white;
        padding: 17px;
        font-weight: 800 !important;
    }


    .card .card-body {
        margin-bottom: 0px;
        margin-top: 0px;
        padding-top: 0px;


    }

</style>
<div class="dark">
    <div class="container featuredevent">
        <div class="row">
            <div class="col-md-12">
                <h1 class="featuredevent"><?php _('Eventi');?></h1>
                <div class="card-deck">

                    <?php

                    global $post;
                    $args = array('category' => 85);

                    $myposts = get_posts($args);
                    foreach ($myposts as $post) : setup_postdata($post);

                        ?>

                        <div class="card text-center">
                            <div class="card-header featuredevent">
                                <strong><?= get_field('categoria') ?></strong>
                            </div>
                            <img class="card-img-top " src="<?= get_the_post_thumbnail_url() ?>"
                                 alt="<?php the_title(); ?>" style="max-height:400px;min-height:180px;">
                            <div class="card-title featuredevent">
                                <a href="<?= get_permalink() ?>"
                                   title="<?php the_title(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </div>
                            <div class="card-body">
                                <p cla="text-sm-center"><? echo substr(get_the_excerpt(), 0, 100) . '...'; ?>
                               <a href="<?= get_permalink() ?>"
                                   title="<?php the_title(); ?>">
                                    <strong><?= _("Leggi"); ?></strong>
                                </a></p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted" style="font-size: 0.9em !important">Dal <?= get_field('da') ?> al <?= get_field('a') ?></small>
                            </div>
                        </div>
                    <?php endforeach;
                    wp_reset_postdata(); ?>
                </div>

            <a class="pull-right" href="https://turismo.comuneacqui.it/" title="Apre sito esterno Turismo Comune di Acqui Terme"><h2 class="featuredevent">Tutti gli eventi</h2></a>
        </div>
        </div>

    </div>
</div>


