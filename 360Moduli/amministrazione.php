<?php
/**
 * Sistema di blocchi amministrativi
 * Deve essere impostato nel file l'id della categoria al quale associare i post
 */
?>
<style>
   .amministrazione > a {
        font-size: 13px !important;
        font-weight: bold;
        color: #420101
    }

    h1.amministrazione {
        font-size: 40px !important;
        color: black;
        padding: 15px;
        font-weight: 700 !important;
    }

    div.container-fluid.amministrazione {
        background: #30373d !important;

    }

    .card-body.amministrazione {
        background: #ffb401;
        pading: 1%;
    }

    .card-body {
        margin-bottom: 0px !important;
        line-height: 95%;
        padding-bottom: 0px !important;
    }

    div.card:after {
        display: none !important;
    }

    small.date-card {
        font-size: 0.8em !important;
    }

    small.categroy-card {
        color: #be880b;
        font-weight: bolder;
    }

    a > h2.amministrazione {
        font-size: 1.2rem !important;
        color: black;
        padding: 17px;
        font-weight: 800 !important;
    }

    .card.amministrazione {
        box-shadow: 1px 1px 5px 0px rgba(156, 156, 156, 1);
    }

    h5.card-title.align-middle {
        margin-top: 2%;
        margin-bottom: 0%;
    }
</style>

<div class="container " style="padding-bottom: 3%;">
    <div class="row">
        <div class="col-md-12">
            <h1 class="amministrazione"><?= _('Dall\'amministrazione') ?></h1>
            <div class="card-deck">
                <?php
                /**
                 * Estrazione degli articoli associati alle nuove notizie
                 */
                $pages=[];
                $ids= array(523, 538, 2479, 2494);

                //Carciamento delle pagine da visualizzare
                foreach ($ids as $page_id){
                    array_push($pages,get_page( $page_id ));
                }

                foreach ($pages as $post) : setup_postdata($post);
                    ?>
                    <div class="card amministrazione text-center">
                        <img class="card-img-top h-75" src="<?= get_the_post_thumbnail_url() ?>"
                             alt="<?php the_title(); ?>">
                        <div class="card-body">
                            <br><small class="categroy-card"><?php echo get_the_category_list(', '); ?></small>
                            <br>
                            <h5 class="card-title align-middle ">
                                   <a href="<?= $post->guid; ?>"
                                   title="<?php the_title(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h5>
                        </div>
                    </div>
                <?php endforeach;
                ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>

</div>
</div>
