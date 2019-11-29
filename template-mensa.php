<?php
/*
    * Template Name: Articolo Mensa - template-mensa.php
    * Template Post Type: post, product, page
*/

get_header();
?>
<style>
    h2.intestazione{
        padding:2%;
        font-size: 1.5em !important;
        background: #ffb401;
    }
h3.gruppo{
font-size: .9em!important;
    text-transform: uppercase;
}
    h2.titolo{
        font-size: 2em!important;
        font-variant: small-caps;
    }
</style>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (have_posts()) : while (have_posts()) : the_post();

        $entry = ['title' => get_the_title(),
            'situazione' => get_field('situazione'),
            'tabella' => get_field('tabelle_mensa'),
            'prodotti' => get_field('elenco_prodotti'),
            'gestione' => get_field('gestione_pasti'),
            'contenuto' => the_content()
        ];
        ?>
        <section id="mensa">
            <div class="container my-2">
                <div class="row">
                    <div class="col-md-6 text-justify">
                        <p><h2 class="intestazione"><?= __('Servizio di Refezione Scolastica') ?></h2>
                            <?= $entry['situazione']['descrizione'] ?>
                            <a title="pagina esterna"
                               href="<?= $entry['situazione']['url'] ?>"><?= __('Vai al contenuto') ?></a>
                        </p>
                        <hr>
                        <p><h2 class="intestazione"><?= __('Gestione pasti') ?></h2>
                            <?= $entry['gestione'] ?>
                        </p>
                    </div>
                    <div class="col-md-5 offset-1">
                        <p><h2 class="intestazione"><?= __('Tabelle menu') ?></h2>
                            <?= $entry['tabella'] ?>
                        </p>
                    </div>
                </div>
                <h2 class="intestazione"><?= __('Elenco prodotti') ?> <small>Clicca sulle voci per visualizzare la scheda allegata</small></h2>
                <div class="row">
                    <? if(!empty($entry['prodotti'])) {
                        foreach ($entry['prodotti'] as $voce) { ?>


                        <div class="btn col-md-2 text-center"> <a title="link documento"
                                                                  href="<?= $voce['documento'] ?>">
  <h3 class="gruppo">
                                    <i class="<?=$voce['gruppo']['value']?>"></i>
                                    <?= $voce['gruppo']['label'] ?></h3>
                                <h2 class="titolo"><?= $voce['titolo'] ?></h2>
                                </a>
                            </div>
                        <? }
                    }?>
                </div>
            </div>
        </section>

    <?php endwhile; endif; ?>


</article>


<?php get_footer(); ?>
