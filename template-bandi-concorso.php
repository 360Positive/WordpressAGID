<?php
/*
    * Template Name: Articolo Bandi Concorso - template-bandi-concorso.php
    * Template Post Type: post,page, product
    * Modifica vista con datatable
*/

get_header();

?>

<?php

$content = get_post_field('post_content', $post->ID);

$category_query_args = array(
    'category_name' => get_field('categoria_bandi'),
    'orderby' => 'date',
    'order' => 'ASC',
    'nopaging' => true,
);

$category_query = new WP_Query($category_query_args);
$scadenza=10;

function printAllegati($entry)
{ /*    La variabile $allegati deve essere un array */
    $ext = ['doc' => '<i class="icofont-file-document"></i>',
        'docx' => '<i class="icofont-file-document"></i>',
        'pdf' => '<i class="icofont-file-document"></i>',
        'xml' => '<i class="icofont-file-document"></i>',
        'jpg' => '<i class="icofont-image"></i>'
    ];


    if (!empty($entry['allegati'])) {
        echo '<div class="row">';
        foreach ($entry['allegati'] as $allegato) {
            $filename = str_replace(get_site_url(), '', $allegato['file']);
            $filepath = $allegato['file'];
            //Estrae estensione e icona
            $fileicon = $ext[explode('.', $filename)[1]];
            $filenameshow = strtoupper(strtolower($allegato['descrizione']));

            echo sprintf('
            <div class="col-md-12 p-2 text-left">
            <a href="%s" target="_blank" class=""style="font-size:1rem;">%s %s </a></div>            
            ', $filepath, $fileicon, $filenameshow);
        }
        echo '</div>';
    }

}

function printTopBanner($tipo, $entry)
{
    $rif = (!empty($entry['rif'])) ? $entry['rif'] : '';
    $settore = (!empty($entry['settore'])) ? $entry['settore'] : '';
    $link = $entry['link'];
    $titolo = $entry['title'];

    echo sprintf(
        ' <span class="%s p-2 mb-2" style="font-size: 1.2rem; font-variant: small-caps"> %s %s </span> <br>
     <span class="text-wrap text-right p-2 mb-2 w-100" style="font-size:1rem; text-transform: uppercase; "> 
     <a class="text-wrap p-2 mb-2 w-100" href="%s" target="_blank">%s</a></span>
', $tipo, $rif, $settore, $link, $titolo);


}

function printSideBanner($entry,$scadenza)
{
    /**
     * Stampa stato del bando controllando la data di scadenza e la data attuale di visualizzazione
     */
    $stato = "";
    $termine = $entry['termine'];
    $termine = explode("/", $entry['termine']);
    $termine = join('/', array_reverse($termine));
    $tipo = "";
    $style = "font-size: 1.25rem; font-variant: small-caps;";
//    $limit=10; //Limite di giorni per gli avvisi in scadenza
$limit=$scadenza;

    if ($termine == null) {
        $termine = "";
        $cod = sprintf('<span class="badge badge-success text-wrap p-2 mb-2" style="%s"> aperto </span>', $style);
        $tipo = 'text-success text-wrap w-100';
    } else {
        // Intervallo alla scadenza
        $intervall =  (strtotime($termine)-time())/(3600*24);

        if ($intervall> $limit) {
            $stato="badge badge-success";
            $codh='<span class="%s text-wrap p-2 mb-2" style="%s"> aperto </span>';
            $cod = sprintf($codh,$stato, $style);
            $tipo = 'text-wrap w-100';
        } elseif ($intervall >0 && $intervall< $limit) {
            $stato="badge badge-warning";
            $codh='<span class="%s text-wrap p-2 mb-2" style="%s"> aperto </span>';
            $cod = sprintf($codh,$stato, $style);
            $tipo = 'text-wrap w-100';
        } else {
            $stato="badge badge-danger";
            $codh='<span class=" %s text-wrap p-2 mb-2" style="%s"> chiuso </span>';
            $cod = sprintf($codh,$stato, $style);
            $tipo = 'text-wrap w-100';
        }
    }
    $termine = '<span class="text-primary text-wrap p-2 mt-2" style="font-size: 1rem;">' . $termine . '</span>';

    $htm = sprintf('%s <br> %s ', $cod, $termine);

    echo $htm;

    return $tipo;
}

function alertModifiy($aggior){
    $style = "font-size:0.8rem;";
    $intervall =  (time()-strtotime($aggior))/(3600*24);
//    echo $intervall;

    if($intervall<20){
        $stato="text-danger";
        $codh='<br><span class=" %s text-danger text-wrap p-2 mb-2" style="%s"> Aggiornamento del %s </span>';
        $cod = sprintf($codh,$stato, $style, $aggior);

        $htm = sprintf('%s', $cod);

        echo $htm;
    }
}
?>
<?php pa360_breadcrumb(); ?>
<script type="text/javascript">
    $('<link/>', {
        rel: 'stylesheet',
        type: 'text/css',
        href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/templates/bandiconcorso.css'//css da includere
    }).appendTo('head');
</script>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section id="articolo-dettaglio-testo">
        <div class="container">
            <div class="row my-2">
                <div class="col-md-12"><br>



                    <div class="row">
                        <div class="col-md-4">
                            <strong>Legenda:</strong>
                            <div class="row">
                                <div class="col-12"><span class="badge badge-success">Aperti:</span> Bandi attivi e non in scadenza</div>
                                <div class="col-12"><span class="badge badge-warning">Aperti:</span> In scadenza entro i prossimi <?=$scadenza?> giorni</div>
                                <div class="col-12"><span class="badge badge-danger">Chiusi:</span> Bandi chiusi</div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            Utilizza la lo spazio per la ricerca per filtrare le voci che ti interessano.<br>
                            Per visualizzare più contenuti, aumenta il numero di elementi da visualizzare. I primi elementi sono
                            voci ancora aperte e alle quali si può partecipare.
                        </div>
                    </div>

                    <table id="tablecreate" class="table table-striped w-100">
                        <thead>
                        <tr>
                            <th>Scadenza</th>
                            <th>Contenuto</th>
                        </tr>
                        </thead>
                        <tbody>


                        <?php

                        if ($category_query->have_posts()) : while ($category_query->have_posts()): $category_query->the_post();


                            $entry = ['title' => get_the_title(),
                                'rif' => get_field('riferimento'),
                                'tipo' => get_field('tipologia'),
                                'termine' => get_field('termine'),
                                'inizio' => get_field('inizio'),
                                'settore' => get_field('settore'),
                                'excerpt' => substr(get_the_content(), 0, 200),
                                'allegati' => get_field('allegati'),
                                'link' => get_post_permalink()];

                            ?>

                            <tr>
                                <td style="w-10" class="text-center align-top">
                                    <?php
                                    //Stampa il banner laterale e ritorna lo stato del bando (aperto chiuso)
                                    $tipo = printSideBanner($entry,$scadenza) ?>
                                </td>
                                <td style="w-90" class="align-top">
                                    <?php
                                    //Stampa intestazione bando
                                    printTopBanner($tipo, $entry);
                                    $aggior= get_the_modified_date("Y/m/d");
                                    alertModifiy($aggior);
                                    ?>

                                    <!--                                    <div class="row">-->
                                    <!--                                        <div class="col-md-8">-->
                                    <!--                                            <strong style="font-size:1.25rem; font-variant:small-caps">--><?php //echo __('Estratto'); ?>
                                    <!--                                                :</strong><br>-->
                                    <!--                                            --><? //= // Stampa solo un estratto dell'articolo
                                    //                                            the_excerpt(); ?>
                                    <!--                                        </div>-->
                                    <!--                                        <div class="col-md-4">-->
                                    <!--                                            <strong style="font-size:1.25rem; font-variant:small-caps">--><?php //echo __('Documentazione'); ?>
                                    <!--                                                :</strong><br>-->
                                    <!--                                            --><?php
                                    //                                            // Stampa allegati specifico bando
                                    //                                            printAllegati($entry);
                                    //                                            ?>
                                    <!--                                        </div>-->
                                    <!--                                    <div class="entry-links">-->
                                    <?php //echo wp_link_pages(); ?><!--</div>-->
                                    <!--                                                                     Link alla pagina con articolo-->
                                    <!--                                    <a href="-->
                                    <? //= get_permalink() ?><!--" class="btn btn-block" target="_blank" title="Apre pagina bando ">Leggi di-->
                                    <!--                                        più</a>-->
                                </td>
                            </tr>

                        <?php endwhile; endif; ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
    <section id="oldcontent-section">
        <div class="container">
            <span id="annipre" class="badge badge-danger text-wrap mt-3"
                  style="font-size: 1.5rem; width: 100%; display: none"> Dati anni precedenti </span>

            <div class="row">

                <div class="col-md-12" id="oldcontent">
                    <?= $content; ?>
                </div>
            </div>
        </div>
    </section>
</article>
<script>
    /**
     * La Lettura di vecchie tabelle con i bandi deve avere come id della tabelle 'oldcontent'
     */
    let mesi = {
        'Gennaio': "01",
        'Febbraio': "02",
        'Marzo': "03",
        'Aprile': "04",
        'Maggio': "05",
        'Giugno': "06",
        'Luglio': "07",
        'Agosto': "08",
        'Settembre': "09",
        'Ottobre': "10",
        'Novembre': "11",
        'Dicembre': "12"
    }

    /*Correzione formato date per visualizzazione */
    $("#oldcontent > table > tbody > tr").each(function (index) {
        var data_value = $('td:first', this).html();

        var res = data_value.split(" ");
        var mydate = "";
        var mese = "";

        mese = mesi[res[1]];
        if (typeof mese === 'undefined') {
            //  Se non presente significa che il formato è già corretto
            mydate = data_value.replace(' ', '');
        } else {
            //  Creazione della data nel formato corretto
            mydate = res[2] + '/' + mese + '/' + res[0]
            show_date = res[0] + '/' + mese + '/' + res[2] //formato per ordinamento

        }
        mydate = mydate.replace(' ', '');

        $('td:first', this).html(show_date);
        $('td:first', this).attr('data-sort', mydate);//attributo per ordinamento colonna

        console.log(mydate);

    });

    ///*Creazione della data nel formato corretto*/
    //$("#tablecreate > tbody > tr").each(function (index) {
    //    var data_value = $('td:first', this).html();
    //    data_value = data_value.replace(/(\r\n|\n|\r)/gm, "")
    //    data_value = data_value.replace(/\s+/g, "");
    //    var mydate = ""
    //    console.log(data_value)
    //
    //    if (data_value == 'Nondefinito') {
    //        <?php
    //        //  Creazione di una data avanti 1 anno dalla data di visualizzazione per mettere in top i bandi senza scadenza
    //        $oneYearOn = date('Y/m/d', strtotime(date("Y/m/d", mktime()) . " + 365 day"));
    //        ?>
    //        mydate = '<?//=$oneYearOn ?>//'
    //        show_date = 'Non definito'
    //    } else {
    //        var mydate = data_value.replace(" ", '');
    //        res = mydate.split("/");
    //        mydate = res[2] + '/' + res[1] + '/' + res[0]
    //        show_date = res[0] + '/' + res[1] + '/' + res[2]//formato per ordinamento
    //    }
    //
    //    $('td:first', this).html(show_date);
    //    $('td:first', this).attr('data-sort', mydate);//attributo per ordinamento colonna
    //
    //    console.log('--->' + mydate);
    //
    //
    //});


    //Unione delle due tabelle in una unica
    // $("#tablecreate > tbody").append($("#oldcontent > table > tbody").html())

    //Nasconde il container dove è presente la tabella con i vecchi dati
    // $("#oldcontent").hide()

    let groupColumn = 0;
    $('#tablecreate').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Italian.json"
        },
        responsive: true,
        "order": [[0, "asc"]],
        aLengthMenu: [
            [25, 50, 100, 200, -1],
            [25, 50, 100, 200, "All"]
        ],
        iDisplayLength: -1
    });


    //Portabilità vecchie tabelle creazione consultabile
    if ($('#olcontent').has('table')) {
        $('#annipre').show();
        var intestazione = '<thead><tr><th>Scadenza</th><th>Contenuto</th></tr></thead>'
        $("#oldcontent > table ").prepend(intestazione)

        $('#oldcontent > table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Italian.json"
            },
            responsive: true,
            "order": [[0, "desc"]]
        });
    }
</script>
<script>
    //COMPORTAMENTO MOBILE DESKTOP
    // alla modifica delle pagine nella versione mobile mostra un info sui contenuti
    let w_width = $(window).width();
    let table = $('#tablecreate')

    $(window).bind('load', function () {
        if (w_width < 684) {
            $('div.titled', table).show()
        } else {
            $('div.titled', table).hide()
        }
        $(document).trigger('change');
    })
    $(window).bind('resize', function () {
        if (w_width < 684) {
            $('div.titled', table).show()
        } else {
            $('div.titled', table).hide()
        }
        $(document).trigger('change');
    })
    $(window).trigger('load');

    $('#tablecreate').width(w_width)

</script>

<?php get_footer(); ?>
