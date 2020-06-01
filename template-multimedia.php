<?php
/*
    * Template Name: Multimedia - template-multimedia.php
    * Template Post Type: post,page, product
*/
require_once '360Moduli/XML/localfunc.php';
require_once '360Moduli/php_utils/utils.php';
get_header();


?>
<script type="text/javascript">
    $('<link/>', {
        rel: 'stylesheet',
        type: 'text/css',
        href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/templates/multimedia.css'//css da includere
    }).appendTo('head');

</script>
<?php pa360_breadcrumb(); ?>


<?php
/*Per il funzionamento del template deve essere attivata la struttura di campi personalizzati da associare al template
presenti nella cartella afc_pro del tema
 * */
function isaimage($file){
    $file=substr($file,-5);
        $ext = explode('.',$file)[1];
                switch ($ext) {
                    case 'jpg':
                        return true;
                        break;
                    case 'png':
                        return true;
                        break;
                    case 'gif':
                        return true;
                        break;
                    case 'doc':
                        return false;
                        break;
                    case 'docx':
                        return false;
                        break;
                    case 'xls':
                        return false;
                        break;
                    case 'pdf':
                        return false;
                        break;
                    default:
                        return false;
                        break;
                }
}
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
                    
                    <?php foreach ($sezioni as $sezione) {
                        //Estrazione del contenuto della notizia
                        $titolo = $sezione['intestazione'];
                        ?>
                        <!-- Creazione struttura grafica della notizia -->
                        <div class="row ">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <?php
                               
                                //Controllo cambiamento data e inserimento menu
                                if (strcmp($lastsez, $titolo) !== 0) {
                                    echo '<h2 class="intestazione" id="day' . str_replace(' ', '', $titolo) . '">' . $titolo . '</h2>';
                                    //Memorizzazione data per creazione menu di navigazione
                                    array_push($pubblication, $titolo);
                                }
                                //Aggiornamento varibile controllo data
                                $lastsez = $titolo;
                                ?>

                                <!-- Blocco materiale multimediale   -->
                                <div class="row row-eq-height mx-0" id="arg-<?= str_replace(' ', '', $titolo) ?>">
                                    <?php
                                    //Lettura degli allegati disponibili e creazione voci
                                    foreach ($sezione['files'] as $file) {

                                        ?><!--Documento da scaricare-->
                                        <? ($titolo== 'Materiale social')?$col=2:$col=6;?>
                                    <div class="align-middle  col-<?=$col?> px-2 py-1 h-100">
                                       
                                            <strong><?= $file['titolo'] ?></strong>
                                            <?php if(isaimage($file['file'])){?><img class="w-100" src="<?= $file['file'] ?>" alt="<?= $file['titolo'] ?>"><?php }?>
                                            <br>
                                            <a style="color:chocolate; font-size:0.9rem;" href="<?= $file['file'] ?>" target="_blank" title="<?= $file['titolo'] ?>">Clicca per scaricare</a>
                                        </div>
                                        
                                        <?php

                                    }
                                    ?>
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