<?php
/*
    * Template Name: Aggiornamenti FAQ - template-aggiornamenti-faq.php
    * Template Post Type: post,page, product
*/

get_header();


?>
<script type="text/javascript">
    $('<link/>', {
        rel: 'stylesheet',
        type: 'text/css',
        href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/templates/aggiornamenti.css'//css da includere
    }).appendTo('head');

</script>
<?php pa360_breadcrumb(); ?>


<?php
/*Per il funzionamento del template deve essere attivata la struttura di campi personalizzati da associare al template
presenti nella cartella afc_pro del tema
 * */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    the_post();
    $ext = ['doc' => '<i class="icofont-file-document"></i>',
        'pdf' => '<i class="icofont-file-document"></i>',
        'xml' => '<i class="icofont-file-document"></i>',
        'jpg' => '<i class="icofont-image"></i>'
    ];
    //Lettura delle voci
    $sezioni = get_field('sezioni');
  
    $lastsez="";
    $pubblication=[];

    ?>

    <section id="articolo-dettaglio-testo">
        <div class="container">
            <div class="row">
                <div class="col-md-9" id='mainblock'>
                    <div class="row mb-2">
                            <div class="col-md-1"></div>
                            <div class="col-md-10"><?php the_content(); ?></div>
                            <div class="col-md-1"></div>
                    </div>
                    
                    <?php 
                    $sec=0;
                    foreach ($sezioni as $sezione) {
                        //Estrazione del contenuto della notizia
                        $titolo = $sezione['titolo'];
                        ?>
                        <!-- Creazione struttura grafica della notizia -->
                        <div class="row ">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <span id="arg-<?= str_replace(' ', '', $titolo) ?>"></span>
                                <div id="accordion-<?= str_replace(' ', '', $titolo) ?>">
       
                                <?php
                               
                                //Controllo cambiamento data e inserimento menu
                                if (strcmp($lastsez, $titolo) !== 0) {
                                    echo '<h2 class="datagiorno" id="day' . $titolo. '">' . $titolo . '
                                    <span class="badge badge-primary">'.count($sezione['domande_frequenti']).'</span>
                                    </h2>';
                                    //Memorizzazione data per creazione menu di navigazione
                                    array_push($pubblication, [$titolo,count($sezione['domande_frequenti'])]);
                                }
                                //Aggiornamento varibile controllo data
                                $lastsez = $titolo;
                                ?>

                                <!--                            Blocco singola notizia    -->
                                
                                <div class="text-justify">
                                    <?php
                                    //Lettura degli allegati disponibili e creazione voci
                                    $i=0; //elementi sezione iteratore
                                    foreach ($sezione['domande_frequenti'] as $faq) {

                                        ?><!--Stile data notizia-->
                                    <div class="data mr-2 my-1 px-2 py-1" style="cursor:pointer" data-toggle="collapse" data-target="#collapse-<?=$sec?>-<?=$i?>" aria-expanded="true" aria-controls="collapse-<?=$sec?>-<?=$i?>">
                                          <strong><?=$faq['domanda'] ?></strong></div>
                                             <div id="collapse-<?=$sec?>-<?=$i?>" class="collapse"  data-parent="#accordion-<?= str_replace(' ', '', $titolo) ?>">
                                            <div style="font-size:0.9em" class="px-2 py-1 mb-1"><?= $faq['risposta'] ?> </div>
                                            </div>
                                        
                                        <?php

                                   $i++; }
                                    ?>
                                </div>
                                </div>

                                <hr>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    <?php 
                    $sec++;} ?>
                </div>

                <div class="col-md-3">
                    <?php //Inclusione modulo per la gestione dei social
                    include '360Moduli/sharesocial.php'; ?>
                    <div class="my-0 widget-area w-100">
                        <?php
                        $val = get_field('menusidebar');
                        if ($val) {
                            wp_nav_menu(array('menu' => '"' . $val . '""'));
                        } ?>
                        <h1 class="w-103 py-3 mt-2 mx-0 px-0 text-center"
                            style="background:lightgray!important; font-size:1.25rem!important; font-weight:bold"><?= _('Sezioni domande frequenti'); ?></h1>
                        <?php
                        //                        Creazione menu di navigazione dalle date memorizzate nella variabile $pubblication
                        foreach ($pubblication as $data) {
                            ?>
                            <hr>
                            <div class="btn btn-info btn-block text-left"><a href="#arg-<?= str_replace(' ', '', $data[0])?>">
											<span class="badge badge-primary"><?= $data[1];?></span>
											<span style="font-size:1em!important">
												<?= $data[0]; ?>
											</span>
											
                                </a></div>

                            <?php

                        }
                        ?>

                        

                    </div>

                </div>
            </div>
        </div>
    </section>
    <script>
        /**
         * Script per l'inserimento delle icone dei collegamenti ai file esterni ed interni della pagina
         * @type {jQuery|HTMLElement -> single.php}
         */
        $(window).on('load', function () {
            var content = $('#mainblock');
            $('a', content).each(function (key, value) {
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

                $(this).before('<i class="' + typefile + '"></i> ')
                var hastitle = $(this).attr('title');
                // console.log(hastitle);

                if (!hastitle) {
                    $(this).attr({'title': title});
                }
            })
        })
    </script>
</article>

<?php get_footer(); ?>			