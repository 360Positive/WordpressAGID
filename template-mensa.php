<?php
/*
    * Template Name: Articolo Mensa - template-mensa.php
    * Template Post Type: post, product, page
*/

get_header();
?>
<style>
    h2.intestazione {
        padding: 2%;
        font-size: 1.5em !important;
        background: #ffb401;
    }

    h3.gruppo {
        font-size: .9em !important;
        text-transform: uppercase;
    }

    div.titolo {
        font-size: 1em !important;
        word-wrap: break-word !important;
        line-break: normal !important;
    }

    div.prodotto {
        background: lightgray;
        border-color: darkgrey;

    }

    .latticini {
        background: lightgoldenrodyellow !important;
    }

    .carne {
        background: #FF9F9F !important;
    }

    .cereali {
        background: #D2B06A !important;
    }

    .pesce {
        background: #71B2CF !important;
    }

    .vegetali_e_frutta {
        background: #82C168 !important;
    }

    .btn:not(:disabled):not(.disabled) {
       margin-left:0px;
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
        <div id="mensa">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-justify">
                        <p>
                        <h2 class="intestazione"><?= __('Servizio di Refezione Scolastica') ?></h2>
                        <?= $entry['situazione']['descrizione'] ?>
                        <a title="pagina esterna"
                           href="<?= $entry['situazione']['url'] ?>"><?= __('Vai al contenuto') ?></a>
                        </p>
                        <hr>
                        <p>
                        <h2 class="intestazione"><?= __('Gestione pasti') ?></h2>
                        <?= $entry['gestione'] ?>
                        </p>
                    </div>
                    <div class="col-md-5 offset-1">
                        <p>
                        <h2 class="intestazione"><?= __('Tabelle menu') ?></h2>
                        <?= $entry['tabella'] ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="intestazione"><?= __('Elenco prodotti') ?> <small>Clicca sulle voci per visualizzare
                                la scheda allegata</small></h2>
                        <p>Nella presente sezione potrai visualizzare le schede dei prodotti utilizzati per le preparazioni della mensa.
                            <br><strong>LLEGENDA:</strong>
                        <div class="btn carne">CARNE</div>
                        <div class="btn latticini">LATTICINI</div>
                        <div class="btn vegetali_e_frutta">VERDURA E FRUTTA</div>
                        <div class="btn pesce">PESCE</div>
                        <div class="btn cereali ">CEREALI</div>
                        <div class="btn prodotto ">ALTRO</div>
                        </p>
                     <table id="prodotti-mensa" class="w-100">
                        <thead>
                        <th>Classe</th>
                        <th>Prodotto</th>
                        <th>Allegato</th>
                        </thead>
                        <tbody>
                        <?
                        $elem=3;
                        $i=1;
                        if (!empty($entry['prodotti'])) {
                        foreach ($entry['prodotti'] as $voce) { ?>
                        <tr class="prodotto <?= str_replace(' ', '_', strtolower($voce['gruppo']['label'])) ?>">
                            <td>
                                <h3 class="gruppo">
                                    <i class="<?= $voce['gruppo']['value'] ?>"></i>
                                    <?= $voce['gruppo']['label'] ?></h3>
                            </td>
                            <td><div class="titolo"><?= $voce['titolo'] ?></div></td>
                            <td><a title="link documento" href="<?= $voce['documento'] ?>">
                                Allegato
                                </a></td>
                        </tr>
                        <? }
                        } ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                <script type="text/javascript">
                    $('#prodotti-mensa').DataTable(  {"language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Italian.json"
                    },
                        "pageLength": -1
                    });
                </script>
            </div>
        </div>

    <?php endwhile; endif; ?>


</article>


<?php get_footer(); ?>
