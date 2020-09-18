<?php
/*
    * Template Name: Articolo Mensa - template-mensa.php
    * Template Post Type: post, product, page
*/

get_header();
?>
<script type="text/javascript">
	$('<link/>', {
		rel: 'stylesheet',
		type: 'text/css',
		href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/templates/mensa.css'//css da includere
	}).appendTo('head');
	
</script>
<?php pa360_breadcrumb(); ?>
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
            <div class="container my-2 pb-1">
                <div class="row" id="content">
                    <div class="col-md-6 text-justify">
                        <p>
                        <h1 class="intestazione"><?= __('Servizio di Refezione Scolastica') ?></h1>
                        <?= $entry['situazione']['descrizione'] ?>
                        <a title="pagina esterna"
                           href="<?= $entry['situazione']['url'] ?>" style="font-size:1.25rem; font-weight:800"><?= __('Clicca qui per accedere al servizio di MENSA ONLINE') ?> </a>
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
                            <td><a title="link documento" href="<?= $voce['documento'] ?>" target="_blank">
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

<script type="text/javascript">
            /**
             * Script per l'inserimento delle icone dei collegamenti ai file esterni ed interni della pagina
             * @type {jQuery|HTMLElement -> single.php}
             */
            $(window).on('load', function () {
                var content = $('#content');
                $('a', content).each(function (key, value) {
                    var file = $(this).attr('href');
                    console.log(file)
                    var ext = file.split('.').pop();
                    switch (ext) {
                        case 'jpg':
                            typefile = 'icofont-file-image';
                            title = "Apre un file immagine"
                            break;
                        case 'png':
                            typefile = 'icofont-file-image';
                            title = "Apre un file immagine"
                            break;
                        case 'gif':
                            typefile = 'icofont-file-image';
                            title = "Apre un file immagine";
                            break;
                        case 'doc':
                            typefile = 'icofont-file-document';
                            title = "Apre un file documneto";
                            break;
                        case 'docx':
                            typefile = 'icofont-file-document';
                            title = "Apre un file documneto";
                            break;
                        case 'xls':
                            typefile = 'icofont-file-excel';
                            title = "Apre un file foglio di calcolo";
                            break;
                        case 'pdf':
                            typefile = 'icofont-file-pdf';
                            title = "Apre un file pdf";
                            break;
                        default:
                            if(file.indexOf('<?= get_site_url()?>')!=0){
                                    typefile = 'icofont-link';
                                    title = "Apre un link";
                                    }
                            else{
                                    // typefile = '';
                                    // title = "Apre un link";
                                 }
                            
                            break;
                    }
                    

                    $(this).before('<i class="' + typefile + '"></i> ')
                    var hastitle = $(this).attr('title');
                    console.log(hastitle);

                    if (!hastitle) {
                        $(this).attr({'title': title});
                    }
                })
            })
        </script>
        
</article>


<?php get_footer(); ?>
