<?php
/*
    * Template Name: Pagina - Articolo Aggiornamenti - template-aggiornamenti.php
    * Template Post Type: post,page, product
    * Gestione degli aggiornamenti e della navigazione nelle voci
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
        href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/templates/aggiornamenti.css'//css da includere
    }).appendTo('head');

</script>
<?php pa360_breadcrumb(); ?>

<?php
/*Per il funzionamento del template deve essere attivata la struttura di campi personalizzati da associare al template
presenti nella cartella afc_pro del tema
 * */
//Cartella del tema dove prendere i loghi da inserire
$cloghi = get_template_directory_uri() . "-child/360Moduli/css/loghi/";

//Configurazioni
$loghi = [
    'comune' => $cloghi . 'logo_acqui_terme.png',
    'regione' => $cloghi . 'logo_regione_piemonte.png',
    'nazionale' => $cloghi . 'logo_ministero.png'
];
$ltesto = [
    'comune' => 'Acqui Terme',
    'regione' => 'Piemonte',
    'nazionale' => 'Italia'
];
//Tipologie di file e icone corrispondenti
$ext = ['doc' => '<i class="icofont-file-document"></i>',
    'pdf' => '<i class="icofont-file-document"></i>',
    'xml' => '<i class="icofont-file-document"></i>',
    'jpg' => '<i class="icofont-image"></i>'
];

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    the_post();

    //Lettura delle voci
    $aggiornamenti = get_field('informazioni');

    //Ordinamento in base alla voce del campo data_ora
    usort($aggiornamenti, function ($b, $a) {
        return $a['data_ora'] <=> $b['data_ora'];
    });
    //Variabile per la verifica della variazione della giornata
    $lastdate = "";
    //Setting lingua locale per la visualizzazione delle date - def:Italiano
    setlocale(LC_ALL, 'it_IT.UTF-8');

    //Variabile per la memorizzazione dei giorni delle notizie
    $pubblication = array();

    ?>

    <section id="articolo-dettaglio-testo">
        <div class="container">
            <div class="row">
                <div class="col-md-9 mainblock" id='mainblock'>
                    <?php foreach ($aggiornamenti as $voce) {
                        //Estrazione della data e dell'ora
                        $dateora = explode(' ', $voce['data_ora']);
                        $date = $dateora[0];
                        $time = $dateora[1];
                        //Estrazione del contenuto della notizia
                        $notizia = $voce['notizia'];
                        ?>
                        <!-- Creazione struttura grafica della notizia -->
                        <div class="row ">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <?php
                                //Allineamento del formato della data per menu e intestazioni
                                $dprint = date_create_from_format('Y-m-d', $date);
                                $pdate = strftime("%A %e %B %Y", strtotime($dprint->format('Y-m-d')));

                                //Controllo cambiamento data e inserimento menu
                                if (strcmp($lastdate, $date) !== 0) {
                                    echo '<h2 class="datagiorno" id="day' . $dprint->format('Y-m-d') . '">' . $pdate . '</h2>';
                                    //Memorizzazione data per creazione menu di navigazione
                                    array_push($pubblication, $dprint->format('Y-m-d'));
                                }
                                //Aggiornamento varibile controllo data
                                $lastdate = $date;
                                //Bollettino
                                $bollettino=$voce['grafica_bollettino'];
                                $css="";
                                
                                if(!empty($bollettino)){
                                   $css= 'databollettino';
                                   $cssnot='bollettino';
                                   $mex="Bollettino";
                                }
                                else{
                                    $css= 'data';
                                    $cssnot='';
                                    $mex="";
                                }
                                //Origine
                                $origine=$voce['origine'];
                                $orig="";
                                $tlogo="";
                                
                                if(!empty($origine)){
                                   $orig= $loghi[$origine];
                                   $tlogo= $origine;
                                }
                                ?>

                                <!--  Blocco singola notizia    -->
                               <?php $id_date=str_replace(' ', '', $voce['data_ora']);
                               echo $id_date;?>
                                <div class="text-justify" id="arg-<?= $id_date ?>">
                                    <!--Stile data notizia-->
                                    <div class="<?= $css ?> mr-2 px-2 py-1">
                                        <strong class="p-1">
                                        Ora <?= $time ?> - 
                                        <img src="<?=  $orig ?>" style='max-width:30px;'>
                                        <?= $ltesto[$tlogo] ?> 
                                        </strong>
                                        <?php if(!empty($mex)){?>
                                        <strong class="p-1" style="background:white; color:#C70039; text-transform:uppercase;" ><?= $mex ?></strong>
                                        <?php }?>
                                    </div>
                                    <hr>
                                    <div style="font-size:0.9em" class="<?= $cssnot ?>"><?= $notizia; ?></div>

                                    <?php
                                    //Lettura degli allegati disponibili e creazione voci
                                    foreach ($voce['allegati'] as $allegato) {

                                        ?>
                                        <br>
                                        <!-- Creazione grafica pulsante allegato-->
                                        <div class="btn btn-info"><a href="<?= $allegato['file']; ?>" target="_blank">
											<span style="font-size:1em!important">
<!-- Titolo allegato-->
												<?= $allegato['titolo']; ?>
											</span>
                                            </a></div>

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
        linkIcon();

    </script>
</article>

<?php get_footer(); ?>			