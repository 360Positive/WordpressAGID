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
                    Utilizza la lo spazio per la ricerca per filtrare le voci che ti interessano.<br>
                    Per visualizzare più contenuti, aumenta il numero di elementi da visualizzare. I primi elementi sono voci ancora aperte e alle quali si può partecipare. 
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

                            $ext = ['doc' => '<i class="icofont-file-document"></i>',
                                'pdf' => '<i class="icofont-file-document"></i>',
                                'xml' => '<i class="icofont-file-document"></i>',
                                'jpg' => '<i class="icofont-image"></i>'
                            ];

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
                            <?php
                            /**
                             * Stampa stato del bando controllando la data di scadenza e la data attuale di visualizzazione
                             */
                            $stato = "";
                            $termine=$entry['termine'];
                            $termine=explode("/",$entry['termine']);
                            $termine=join('/',array_reverse($termine));
                            $tipo="";

                            if ($termine == null) {
                                $termine = "Non definito";
                                $stato = '<span class="badge badge-success text-wrap " style="font-size: 1.5rem; width: 100%;"> Aperto </span>';
                                $tipo='badge badge-success text-wrap w-100';
                            } else {
//                                echo $termine.' ::: '.(time() - strtotime($termine)).'<br>';

                                if(time() - strtotime($termine)<0){
                                    $stato = '<span class="badge badge-success text-wrap" style="font-size: 1.5rem; width: 100%;"> Aperto </span>';
                                    $tipo='badge badge-success text-wrap w-100';
                                }
                                else {
                                    $stato = '<span class="badge badge-danger text-wrap" style="font-size: 1.5rem; width: 100%;"> Scaduto </span>';
                                    $tipo='badge badge-danger text-wrap w-100';
                                }
                            }
                            $termine='<span class="badge badge-primary text-wrap p-2 mt-2" style="font-size: 1.2rem; width: 100%;">'.$termine.'</span>'
                            ?>
                            <tr>
                                <td style="width:10%" class="text-center">
                                    <?= $stato ?>
                                    <br>
                                    <?= $termine ?>
                                    <div class="titled text-center my-2 font-weight-bold" style="display: none">
                                        <?= $entry['title'] ?>
                                    </div>
                                </td>
                                <td style="width:90%">
                                    <span class="<?= $tipo?> mb-2" style="font-size: 1.5rem; width: 100%; font-variant: small-caps">
                                        <?= (!empty($entry['rif'])) ? $entry['rif'] : '' ?>
                                        <?= (!empty($entry['tipo'])) ? $entry['tipo'] : '' ?>
                                        <?= (!empty($entry['settore'])) ? $entry['settore'] : '' ?></span><br>
                                    <span class="badge badge-info text-wrap text-center p-2 mb-2" style="font-size:1.25rem; text-transform: uppercase; width:100%"> <a href="<?= $entry['link'] ?>"><?= $entry['title'] ?> </a></span>
                                    <br>

                                    <?php the_content(); ?>
                                    <div class="entry-links"><?php wp_link_pages(); ?></div>
                                    <hr>
                                    <strong style="font-size:1.25rem;font-variant:small-caps"><?php echo __('Documentazione relativa'); ?>:</strong><br>
                                    <?php
                                    // 		print_r($entry);
                                    if (!empty($entry['allegati'])) {
                                        foreach ($entry['allegati'] as $allegato) {
                                            $filename = str_replace(get_site_url(), '', $allegato['file']);
                                            echo '<span class="badge badge-light p-2 text-left">
<a href="' . $allegato['file'] . '" target="_blank" class=" text-wrap"style="font-size:1rem;">' . $ext[explode('.', $filename)[1]] . '  ' .strtoupper(strtolower( $allegato['descrizione'])) . '</a>

</span> ';
                                        }
                                    }
                                    ?>

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
            <span id="annipre" class="badge badge-danger text-wrap mt-3" style="font-size: 1.5rem; width: 100%; display: none"> Dati anni precedenti </span>

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
        "order": [[0, "asc"]]
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
    let w_width=$(window).width();
    let table=$('#tablecreate')

    $(window).bind('load',function(){
        if(w_width <684){
            $('div.titled',table).show()
        }
        else{
            $('div.titled',table).hide()
        }
        $(document).trigger('change');
    })
    $(window).bind('resize',function(){
        if(w_width <684){
            $('div.titled',table).show()
        }
        else{
            $('div.titled',table).hide()
        }
        $(document).trigger('change');
    })
    $(window).trigger('load');

    $('#tablecreate').width(w_width)

</script>

<?php get_footer(); ?>
