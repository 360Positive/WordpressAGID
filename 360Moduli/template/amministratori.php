<?php
/*
 * Template per la gestione della grafica degli amministratori
 * 360Moduli/template/amministratori.php
*/
?>
    <style>
        .toolbar {
            float: left;
            width: min-content;
        }

        .nominativo {
            font-size: 2em !important;
        }
        tr.group,
        tr.group:hover {
            text-transform:uppercase!important;
            background-color: #ddd !important;
        }
    </style>
<?php
/**
 * Rendering structure function
 */
$cognome = get_field('cognome');
$nome = get_field('nome');
$language = "//cdn.datatables.net/plug-ins/1.10.20/i18n/Italian.json";


function renderDocumentation($files)
{
    $cognome = get_field('cognome');
    $nome = get_field('nome');
    foreach ($files as $file) {
//                            print_r($files);
        $allegato = $file['allegato'];
        ?>
        <br>
        <a class="links" href="<?= $allegato['url'] ?>"
           title="Apre curriculum di <?= $cognome ?>  <?= $nome ?>"> <?= $allegato['title']; ?></a>
        <?php
        //Sezione Curriculum
    }
}

function renderRowDocumentation($files, $nameTable)
{ if (!$files) {//Se non fossero presenti documenti associati alla categoria
    ?>
    <tr>
        <td><?= $nameTable ?></td>
        <td>Non sono presenti documneti della tipologia indicata.</td>
        <td></td>
        <td></td>
    </tr>
    <?php
    return '';
}

    foreach ($files as $file) {
        $allegato = $file['allegato'];
        ?>
        <tr>
            <td><?= str_replace('_',' ',$nameTable); ?></td>
            <td><a class="links" href="<?= $allegato['url'] ?>"
                   title="Apre il documneto <?= $allegato['title'] ?>"> <?= str_replace('-', ' ', $allegato['title']); ?></a>
            </td>
            <td><?= $file['protocollo'] ?></td>
            <td><?= $file['data'] ?></td>
        </tr>
        <?php

    }


}

function renderRowTabelle($importi, $nameTable, $sy = "")
{ if (!$importi) {//Se non fossero presenti documenti associati alla categoria
    ?>
    <tr>
        <td><?= $nameTable ?></td>
        <td>Non sono presenti documneti della tipologia indicata.</td>
        <td></td>
    </tr>
    <?php
    return '';
}

    foreach ($importi as $importo) {
        ?>
        <tr>
            <td><?= str_replace('_',' ',$nameTable); ?></td>
            <td><?= $importo['importo'] ?><?= $sy ?> </td>
            <td><?= $importo['data'] ?></td>
        </tr>
        <?php

    }


}

function renderTableDocumentation($nameTable)
{
    $language = "//cdn.datatables.net/plug-ins/1.10.20/i18n/Italian.json";


    $cognome = get_field('cognome');
    $nome = get_field('nome');

    echo '<table class="display compact" id="' . $nameTable . '">';
    echo '<thead>
            <th>Tipologia</th>
            <th>Documento</th>
            <th>Protocollo</th>
            <th>Anno</th>
            </thead>
            <tbody>';
    $files = get_field('documentazione_generale');
    renderRowDocumentation($files, 'documentazione_generale');
     $files = get_field('redditi');
    renderRowDocumentation($files, 'redditi');
    $files = get_field('patrimoniale');
    renderRowDocumentation($files, 'patrimoniale');

    echo '</tbody></table>';
    echo '<script type="text/javascript">
            $(document).ready( function () {
                 var groupColumn = 0;
                $(\'#' . $nameTable . '\').DataTable({
                    "columnDefs": [
            { "visible": false, "targets": groupColumn }
        ],
        "responsive": true,
        "paging":false,
         "language": {
                "url": "'.$language.'"
            },
        "order": [[ groupColumn, \'asc\' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:\'current\'} ).nodes();
            var last=null;
 
            api.column(groupColumn, {page:\'current\'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        \'<tr class="group"><td colspan="5">\'+group+\'</td></tr>\'
                    );
 
                    last = group;
                }
            } );
        }});
            });
           
            </script>';

}

function renderTableImporti($nameTable)
{
    $language = "//cdn.datatables.net/plug-ins/1.10.20/i18n/Italian.json";

    echo '<table class="display compact" id="' . $nameTable . '">';
    echo '<thead>
            <th>Tipologia</th>
            <th>Importo</th>
            <th>Anno</th></thead>
            <tbody>';

            $importi = get_field('importi');
            renderRowTabelle($importi, 'importi', $sy = "€");

            $importi = get_field('emolumenti');
            renderRowTabelle($importi, 'emolumenti', $sy = "€");

    echo '</tbody>
    </table>';
    echo '<script type="text/javascript">
            $(document).ready( function () {
                 var groupColumn = 0;
                $(\'#' . $nameTable . '\').DataTable({
                    "columnDefs": [
            { "visible": false, "targets": groupColumn }
        ],
        "responsive": true,
        "paging":false,
        "order": [[ groupColumn, \'asc\' ]],
        "displayLength": 25,
        "language": {
                "url": "'.$language.'"
            },
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:\'current\'} ).nodes();
            var last=null;
 
            api.column(groupColumn, {page:\'current\'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        \'<tr class="group"><td colspan="5">\'+group+\'</td></tr>\'
                    );
 
                    last = group;
                }
            } );
        }});
            });
            </script>';
}

?>

    <div class="container">
    <div class="row">

        <section id="content" role="main" class="container">


            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h1 class="display-4 nominativo">
                            <?= $cognome ?>  <?= $nome ?>
                            <small>
                                <?php if (get_field('tipologia')=='giunta') {
                                    echo get_field('giunta');
                                    }
                                    else{
                                        echo "Consigliere di ".get_field('consiglieri');
                                    }
 ?>
                            </small></h1>
                        <h2>
                            <?php if (get_field('deleghe')) {
                                echo '<strong>' . __('Deleghe: ') . '</strong>';
                                foreach (get_field('deleghe') as $delega) {
//                                   print_r($delega);
                                    echo $delega['delega'];
                                }
                            } ?>

                        </h2>


                        <p class="lead">
                            <?php if (get_field('in_carica') == 1) {
                                echo '<strong>' . __('Nominato il: ') . '</strong>' . get_field('data_nomina');
                            } else {
                                echo '<strong>' . __('Dimissionario dal: ') . '</strong>' . get_field('data_dimissioni');
                            } ?>
                        </p>
                        <hr class="my-4">

                        <h3>Documentazione</h3>
                        <?php
                        //Rendering tabella documenti allegati
                        renderTableDocumentation('Documentazione');
                        renderTableImporti('Importi');

                        ?>

                        <h4>Importi di viaggio e missioni<br><small>art.14 comma 1 lettera c</small></h4>
                        <h4>Emolumenti percepiti per l'incarico politico<br>Indennità di carica - <small>art.14 comma 1</small></h4>

                    </div>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                        <?php the_content(); ?>
                        <?php //if ( ! post_password_required() ) comments_template( '', true ); ?>
                    <?php endwhile; endif; ?>
                    <hr>


                    <div class="col-md-3 offset-md-1">
                        <?php //get_sidebar(); ?>
                    </div>
                </div>
        </section>


        <div class="alert alert-info" role="alert" style="padding-top: 2.5em">
            <p>Legenda <br>
                Riferimenti normativi delle sezioni indicate nella pagina. Art. 14, c. 1, lett. a), d.lgs. n. 33/2013
            </p>

            <p><b style="font-size: 25pt;">A</b>
                Atto di nomina o di proclamazione, con l'indicazione della durata dell'incarico o del mandato elettivo.
            </p>
            <hr>
            <p><b style="font-size: 25pt;">B</b>
                Curricula
            </p>
            <hr>
            <p><b style="font-size: 25pt;">C</b>
                Compensi di qualsiasi natura connessi all'assunzione della carica; importi di viaggio, servizio e
                missioni
                pagati
                con fondi pubblici. </p>
            <hr>
            <p><b style="font-size: 25pt;">D</b>
                Dati relativi all'assunzione di altre cariche, presso enti pubblici o privati, e relativi compensi a
                qualsiasi
                titolo corrisposti. </p>
            <hr>
            <p><b style="font-size: 25pt;">E</b>
                Altri eventuali incarichi con oneri a carico della finanza pubblica e indicazione dei compensi
                spettanti. </p>
            <hr>
            <p><b style="font-size: 25pt;">F</b>
                Le dichiarazioni di cui all'articolo 2 della legge 5 luglio1982, n. 441, nonché le attestazioni e
                dichiarazioni di cui agli articoli 3 e 4 della medesima legge, come modificata dal presente decreto,
                limitatamente
                al soggetto, al coniuge non separato e ai parenti entro il secondo grado, ove gli stessi vi consentano.
                Viene in
                ogni caso data evidenza al mancato consenso. Alle informazioni di cui alla presente lettera concernenti
                soggetti
                diversi dal titolare dell'organo di indirizzo politico non si applicano le disposizioni di cui
                all'articolo 7.
            </p>
        </div>

        <script type="text/javascript">
            /**
             * Script per l'inserimento delle icone dei collegamenti ai file esterni ed interni della pagina
             * @type {jQuery|HTMLElement}
             */
            $(window).on('load', function () {
                var content = $('#content');
                $('a.links', content).each(function (key, value) {
                    var file = $(this).attr('href');
                    // console.log(file)
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
                            typefile = 'icofont-link';
                            title = "Apre un link";
                            break;
                    }

                    $(this).before('<i class="' + typefile + '"></i>')
                    var hastitle = $(this).attr('title');
                    console.log(hastitle);

                    if (!hastitle) {
                        $(this).attr({'title': title});
                    }
                })
            })
        </script>

    </div>
<?php get_footer(); ?>