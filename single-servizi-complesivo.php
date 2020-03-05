<?php
/*
    * Template Name: Principale Servizi - single-servizi-complessivo.php
    * Template Post Type: post, page, product
*/
require_once '360Moduli/XML/localfunc.php';

get_header(); ?>
<style>
    .small, small {
        font-size: 80% !important;
        font-weight: 800;
    }
    .navigation:hover{
        background: #ffb402!important;
    }
    .submenu.collapsed:hover{
        background: #ffb402!important;
    }
    .activeback{
        background:#ffb402!important;
    }
    .activeback-sub{
        background:#ffb402!important;
    }
    h2.headersub{
        background:#ffb402!important;
        padding:1%;
        padding-left: 2%;
        font-weight: 500;
        font-size: 1.5rem!important;
        vertical-align: middle!important;
    }
    h2 > i[class*='icofont']{
        font-size: 1.5em!important;
        vertical-align: middle!important;
    }

</style>
<script type="text/javascript">
    function insertSecondMenu(tag) {
        var htmltext = $(tag).html();
        $("#secondNavigation").html(htmltext);
    }
    function scrolltoElement(tag){

        $([document.documentElement, document.body]).animate({
            scrollTop: $(tag).position().top
        }, 2000);
    }

    $(document).ready(function () {
        console.log("Documento caricato")

        $("a.navigation.btn.btn-warning.btn-block.text-left").click(function(){
            console.log("Click primary ")
            $('.activeback').removeClass('activeback');
            $(this).addClass('activeback');
            tag="#sec-"+$(this).attr('id');
            console.log(tag);
            scrolltoElement(tag)
        });

        $("a.submenu.collapsed").click(function(){
            console.log("Click sub ")
            $('.activeback').removeClass('activeback-sub');
            $(this).addClass('activeback');
        });

        let searchParams = new URLSearchParams(window.location.search)
        if(searchParams.has('sezione')){

            let param = searchParams.get('sezione')
            console.log(param)
            insertSecondMenu('#sec-'+param);
        }
    })


</script>
<?php
//Recupera gli articoli associati ai servizi
$args = array(
    'category_name' => 'servizi-erogati',
    'orderby' => 'title',
    'order' => 'ASC',
    'nopaging' => true,
);
$category_post = get_posts($args);

//Configuration file
$xmlconfigfile = get_template_directory() . "-child/360Moduli/servizi.xml";
$xml = simplexml_load_file($xmlconfigfile);
$sezioni = $xml->sezione;
//print_r($xml);

// reset choices
$field['choices'] = array();
// get the textarea value from options page without any formatting
$choices = get_field('servizi', 'option', false);
// explode the value so that each line is a new array piece
$choices = explode("\n", $choices);

$choices = [];
$servizi = [];

foreach ($sezioni as $sezione) {
    $voci = $sezione->voce;
    $servizio = $sezione->attributes()->nome;
    $sezchoices = [];

    foreach ($voci as $voce) {
        array_push($sezchoices, $voce[0]);
        array_push($choices, $sezione['nome'] . ' - ' . $voce[0]);
    }
    array_push($servizi, [$servizio, $sezchoices]);
}

// remove any unwanted white space
$choices = array_map('trim', $choices);
foreach ($choices as $choice) {
    $field['choices'][$choice] = $choice;
}

//Articoli collegati ai gruppi delle sezioni
$param = array(
    'numberposts' => -1,
    'post_type' => 'post',
    'category' => 90,
);

$posts = get_posts($param);
$art = [];

//Elenco degli uffici associati alla categoria
foreach ($posts as $post) {
//  DEBUG
//    echo '<hr>';
//    print_r($post);
//    echo '<br>';
//    echo get_field('servizi', $post->ID) . '  <br>';;
//    echo $post->ID . '<br>';

    $value = get_field('servizi', $post->ID);
//    echo $value;

    $group = md5($value);
    if (empty($art[$group])) {
        //aggiunge valori nella pagina
        $art[$group] = [];
    }
    array_push($art[$group], $post->ID);
//    echo '<hr>';
}
//print_r($art);

?>

<div class="container">
    <div class="row">
        <section id="content" role="main" class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    //Contenuto della pagina
                    the_content();
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            <?php
                            //Elenco sezioni
                            foreach ($servizi as $sez) { ?>
                                <a href='#sec-<?= $sez[0][0]; ?>' id="<?= $sez[0][0]; ?>"
                                   class="navigation btn btn-warning btn-block text-left"
                                   onclick="insertSecondMenu('#sec-<?= $sez[0][0]; ?>')">
                                    <h2 class="main" style="text-transform: uppercase"> <i class="icofont-arrow-right"></i> <?= str_replace('_', ' ', $sez[0][0]) ?> </h2>
                                </a>


                            <?php } ?>
                        </div>
                        <div class="col-md-8">
                            <div class="" id="secondNavigation"></div>
                        </div>
                        </div>
                    <?php
                    //Spampa data e informazioni di aggiornamento della pagina
                    echo _('<br>');
                    echo _('Ultima modifica il: ');
                    the_modified_time('d F Y');
                    ?>
                </div>
            </div>
            <?php
            //Strutta menu secondario
            foreach ($servizi

                     as $sez) { ?>
            <div class="d-none" id="sec-<?= $sez[0][0] ?>">
                <h2  class="headersub"style="text-transform: uppercase">
                    <i class="icofont-info-square"></i>
                    <?= str_replace('_', ' ', $sez[0][0]) ?> </h2>
                <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                    <?php
                    $i=0;
                    foreach ($sez[1] as $voce) {
                        $field = $sez[0][0] . ' - ' . trim(preg_replace('/\s\s+/', ' ', $voce[0]));
                        $field = md5($field);
//                        $field = str_replace(' ','', $voce[0]);
//                        $field = str_replace('’','', $field);
//                        $field = str_replace(' ','',trim(preg_replace('/\s\s+/', ' ', $field)));

                        ?>
                            <div class="card-header" role="tab" id="heading<?= $field ?>">
                                <a class="submenu collapsed" data-toggle="collapse" data-parent="#accordionEx"
                                   href="#collapse<?= $field ?>" aria-expanded="true"
                                   aria-controls="collapse<?= $field ?>"
                                   style="text-transform: uppercase; ">
                                    <div style="word-break: break-word;   white-space: normal;"><?=
                                        str_replace('_', ' ', $voce[0]) ?>

                                            <?=array_key_exists($field, $art) ?
                                            '<span class="badge badge-secondary">'.sizeof($art[$field]).'</span>' :''?></div>
                                </a>

                            </div>

                            <!-- Card body -->
                            <div id="collapse<?= $field ?>" class="collapse <?= $i==0? 'show':'' ?>" role="tabpanel"
                                 aria-labelledby="heading<?= $field ?>" data-parent="#accordionEx">
                                <div class="card-body">
                                    <?php
                                    //INTEGRAZIONE ARTICOLI
                                    $field = $sez[0][0] . ' - ' . trim(preg_replace('/\s\s+/', ' ', $voce[0]));
                                     $field = md5($field);

                                    if (array_key_exists($field, $art)) {
                                        //Articoli collegati ai gruppi delle sezioni
                                        foreach ($art[$field] as $postID) {
                                            $post = get_post($postID);
                                            ?>
                                            <a href="<?= $post->guid; ?>">
                                                <h1><?= $post->post_title; ?></h1>
                                            </a>
                                            <?php
                                        }
                                    } ?>

                            </div>
                        </div>
                    <?php
                    $i++;
                    } ?>
                </div>
                <?php } ?>
            </div>


            <!--                <div class="col-sm-3">-->
            <!--                    <div class="container-fluid widget-area page-widget-area">-->
            <!--                        --><?php ////Inclusione modulo per la gestione dei social
            //                        include '360Moduli/sharesocial.php'; ?>
            <!--                        --><?php
            //                        $val = get_field('menusidebar');
            //                        if ($val) {
            //                            wp_nav_menu(array('menu' => '"' . $val . '""'));
            //                        } ?>
            <!--                    </div>-->
            <!--                </div>-->
    </div>
    </section>
</div>



<?php get_footer(); ?>

