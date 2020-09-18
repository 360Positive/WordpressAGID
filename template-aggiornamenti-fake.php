<?php
/*
    * Template Name: Aggiornamenti FAKE - template-aggiornamenti-fake.php
    * Template Post Type: post,page, product
*/
require_once '360Moduli/XML/localfunc.php';
require_once '360Moduli/php_utils/utils.php';
get_header();


?>
<script type="text/javascript"
        src="<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/js/utils.js"></script>

<script type="text/javascript">
    $('<link/>', {
        rel: 'stylesheet',
        type: 'text/css',
        href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/templates/aggiornamenti-fake.css'//css da includere
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
    $news = get_field('fakenews');

    $lastsez="";
    $pubblication=[];

    ?>

    <section id="articolo-dettaglio-testo">
        <div class="container">
            <div class="row">
                <div class="col-md-9 mainblock" id='mainblock'>
                    <?php foreach ($news as $new) {
                        //Estrazione del contenuto della notizia
                        $titolo = $new['titolo'];
                        ?>
                        <!-- Creazione struttura grafica della notizia -->
                        <div class="row ">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <!--  Blocco singola notizia    -->
                                <div class="row text-justify" id="arg-<?= str_replace(' ', '', $titolo) ?>">
                                    
                                    <div class="col-md-8 description">
                                        <?php
                               
                                //Controllo cambiamento data e inserimento menu
                                if (strcmp($lastsez, $titolo) !== 0) {
                                    echo '<h2 class="datagiorno" id="day' . $titolo. '">' . $titolo . '</h2>';
                                    //Memorizzazione data per creazione menu di navigazione
                                    array_push($pubblication, $titolo);
                                }
                                //Aggiornamento varibile controllo data
                                $lastsez = $titolo;
                                ?>
                                        <?= $new['descrizione'];?>
                                        </div>
                                        <div class="col-md-4">
                                    <?php
                                    //Lettura degli allegati disponibili e creazione voci
                                    foreach ($new['immagini'] as $image) {

                                        ?><!--Immagine-->
                                    <div class="col-md mr-2 px-2 py-1">
                                        <a href="<?= $image['immagine'];?>" target="_blank"><img src="<?= $image['immagine'];?>" class="w-100"></a>
                                    </div>
                                    <?php

                                    }
                                    ?>
                                    </div>
                                </div>

                                <hr>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    <?php } ?>
                </div>

                <div class="col-md-3">
                    <?php //Inclusione modulo per la gestione dei social
                    include '360Moduli/sharesocial.php'; ?>
                    <div class="widget-area w-100 mt-0 py-0">
                        <?php

                        $men = new MenuSide();
                        $men->sidebarMenuStructure();
                        $men->sideMenuPubblication($pubblication);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
    scrollto(id){
        var p=$(id);
        var offset = p.offset();
        var off=offset.top-100;
        $(window).scrollTop(off);
        
    }
        /**
         * Script per l'inserimento delle icone dei collegamenti ai file esterni ed interni della pagina
         * @type {jQuery|HTMLElement -> single.php}
         */
        linkIcon();

    </script>
</article>

<?php get_footer(); ?>			