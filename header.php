<!DOCTYPE html>
<?php
/*---  SVILUPPO ----
Il presente file è stato sviluppato dalla Riccardo Testa - Kerwin Macias - 360Positive
Integrazione di tema AGID compatibile per PA.
Copyright - 2019
*/
?>


<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="tz7vJocI3ag-OFtd1MofDI5g1MDlSjdj0hgiBtAiAgk"/>
    <meta name="yandex-verification" content="2a130b656effd4bf"/>
    <?php wp_head(); ?>

    <?php /*---  Sviluppo ----
		 Le librerie utilizzate localmente son salvate nel tema Child, nella cartella /lib
		  */ ?>

    <?php /*---  IcoFont   ----*/ ?>
    <link rel="stylesheet"
          href="<?= get_site_url() ?>/wp-content/themes/design-italia-child/lib/iconfont/icofont.min.css">

    <?php /*---   Google Font   ----*/ ?>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">

    <?php /*---   Font Locali - Comune di Roma   ----*/ ?>
    <style>
        @font-face {
            font-family: 'UrbsDisplay-Regular';
            src: url('<?= get_site_url()?>/wp-content/themes/design-italia-child/lib/font-local/UrbsDisplay-Regular.eot');
            src: url('<?= get_site_url()?>/wp-content/themes/design-italia-child/lib/font-local/UrbsDisplay-Regular.ttf') format('truetype'),
            url('<?= get_site_url()?>/wp-content/themes/design-italia-child/lib/font-local/UrbsDisplay-Regular.svg#UrbsDisplay-Regular') format('svg'),
            url('<?= get_site_url()?>/wp-content/themes/design-italia-child/lib/font-local/urbs/UrbsDisplay-Regular.eot?#iefix') format('embedded-opentype');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'UrbsDisplay-Bold';
            src: url('<?= get_site_url()?>/wp-content/themes/design-italia-child/lib/font-local/UrbsDisplay-Bold.eot');
            src: url('<?= get_site_url()?>/wp-content/themes/design-italia-child/lib/font-local/UrbsDisplay-Bold.ttf') format('truetype'),
            url('<?= get_site_url()?>/wp-content/themes/design-italia-child/lib/font-local/UrbsDisplay-Bold.svg#UrbsDisplay-Bold') format('svg'),
            url('<?= get_site_url()?>/wp-content/themes/design-italia-child/lib/font-local/UrbsDisplay-Bold.eot?#iefix') format('embedded-opentype');
            font-weight: bold;
            font-style: normal;
        }
    </style>

    <?php /*---   FontAwsome ----*/ ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/all.css">

    <?php /*---   Fa Icon ----*/ ?>
    <link rel="stylesheet" href="<?= get_site_url() ?>/wp-content/themes/design-italia-child/lib/faicon/all.css">
    <script rel="stylesheet"
            href="<?= get_site_url() ?>/wp-content/themes/design-italia-child/lib/faicon/all.js"></script>

    <?php /*---   Libreria Bandiere Flag   ----*/ ?>
    <link rel="stylesheet"
          href="<?= get_site_url() ?>/wp-content/themes/design-italia-child/lib/block/flags/css/flag-icon.min.css">

    <?php /*---   JQuery Carousel   ----*/ ?>
    <link rel="stylesheet"
          href="<?= get_site_url() ?>/wp-content/themes/design-italia-child/lib/responsive-image-carousel-lightbox/css/lightbox.css">
    <script src="<?= get_site_url() ?>/wp-content/themes/design-italia-child/lib/responsive-image-carousel-lightbox/js/jquery.lightbox.js"></script>
    <link rel="stylesheet"
          href="<?= get_site_url() ?>/wp-content/themes/design-italia-child/lib/responsive-image-carousel-lightbox/css/lightbox.css">

    <?php /*---   jQuery Modal   ----*/ ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css"/>

    <?php /*---   Librerie javascript BOOTSTRAP   ----*/ ?>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->

    <?php /*---   Librerie javascript BOOTSTRAP   ----*/ ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <?php /*---   jQuery Library   ----*/ ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

    <?php /*---   Libreria pulsanti social   ----*/ ?>
    <script type="text/javascript"
            src="<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/jssocial/jssocials.min.js"></script>

    <link type="text/css" rel="stylesheet"
          href="<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/jssocial/jssocials.css"/>

    <link type="text/css" rel="stylesheet"
          href="<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/jssocial/jssocials-theme-flat.css"/>

    <?php /*---   Data table   ----*/ ?>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>

    <?php /*---   Data table mobile   ----*/ ?>
    <script type="text/javascript"
            src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
    <script type="text/javascript"
            src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


    <link type="text/css" rel="stylesheet"
          href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css"/>
    <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>


    <style>
        <?php /*---   Classe Stile  ----
        La classe di stile che segue è obbligatoria per la gestione della corretta
        visualizzazione del header del portale. Nel codice è presente l'integrazione
        dei font personalizzati.

        */?>

        * {
            font-family: UrbsDisplay-Regular, Titillium Web, Arial, sans-serif !important;
            font-size: 18px !important;

        }

        #menu-lingue > li > a > img {
            min-height: 15px
        }

        .it-header-center-content-wrapper {
            padding-right: 0px;
        }

        .it-brand-wrapper {
            padding-right: 0px;
        }

        .it-brand-wrapper > a > img {
            display: grid;
            width: 100%;
            max-width: 30rem;
            padding-right: 0px;
        }

        .it-search-wrapper {
            margin-left: 0px !important;
        }

        .it-footer .searchform input[type="text"], .it-header-wrapper .searchform input[type="text"] {
            color: #000;
            box-shadow: inset 0 -1px 0px #fff;
            width: auto;
            z-index: 4;
        }

        /*---   Altezza menu navigazione TOP  ----*/
        .it-header-slim-wrapper {
            height: auto;
            padding: 0;
        }

        .button_dropdown {
            text-align: center;
            width: 100%;
            background: #e09d34 !important;
            font-family: UrbsDisplay-Regular, Titillium Web, Arial, sans-serif;
            font-size: 18px !important;
        }

        .dropdown {
            padding: 0px;
            background: #e09d34 !important;
            margin-bottom: 14px;
            text-align: center;
            font-family: UrbsDisplay-Regular, Titillium Web, Arial, sans-serif;
        }

        #message_drop_top {
            background: #e09d34 !important;
            text-align: center;
            font-family: UrbsDisplay-Regular, Titillium Web, Arial, sans-serif;
            padding: 10px;
            margin-right: 0px;
        }

        a, a:hover {
            color: unset;
        }

        a[class^="icofont-"].social, i[class^="icofont-"].social {
            display: inline-block;
            border-radius: 60px;
            padding: 0.4em;
            background: white;
            color: #420101 !important;

            margin-right: 5px;
        }

        i[class^="icofont-"].social:hover {
            background: #e09d34 !important;
        }

        li[class^="icofont-"] > a {
            padding-left: 1%;

        }

        li[id^="mega-menu"].mega-menu-row {
            box-shadow: 5px 20px 20px -10px rgba(0, 0, 0, 0.75) !important;
        }

        ul.mega-sub-menu {
            padding-bottom: 0px !important;
        }

        @media only screen and (max-width: 600px) {
            .showmobile {
                display: block;
            }
        }

        #flags {
            width: 112px;
        }
    </style>

</head>
<body <?php echo body_class(); ?>>

<div id="wrapper" class="hfeed">


    <header id="header" class="" role="banner">

        <div class="it-header-wrapper">
            <div class="it-header-slim-wrapper">
                <div class="container-fluid" style="margin:0px">
                    <?php
                    /*---   Menu navigazione Top pagina   ----
                    Menu a scomparsa con i collegamenti ai siti istituzionali, animazione su apertura
                    e chiusura a scomparsa.
                    */ ?>
                    <div class="row">
                        <div class="dropdown col-12" style="padding:10px">
                            <a href="#" id="droptop_btn" class="button_dropdown"
                               title="Turismo, Acquistoria, Acquiambiente">
                                Turismo, Acquistoria, Acquiambiente <i id="freccia"
                                                                       class="icofont-rounded-down"></i></a>

                            <div id="message_drop_top" class="row" style="display:none">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-4"><a href="https://turismo.comuneacqui.it/"
                                                                 title="Apri sito esterno del Turismo di Acqui Terme">
                                                Sito Turistico di Acqui Terme <i class="icofont-external-link"></i></a>
                                        </div>
                                        <div class="col-md-4"><a href="https://acquistoria.it/"
                                                                 title="Apri sito esterno del Premio Acqui Storia">
                                                Sito Premio Acqui Storia <i class="icofont-external-link"></i></a></div>
                                        <div class="col-md-4"><a href="https://acquiambiente.it/"
                                                                 title="Apri sito esterno del Premio Acqui Ambiente">
                                                Sito Premio Acqui Ambiente <i class="icofont-external-link"></i></a>
                                        </div>
                                    </div
                                </div>
                                <div class="col-2"></div>
                            </div>


                        </div>

                        <script>
                            <?php
                            /*---   Script Toggle menu lik siti esterni   ----
                            L'evento click sul collegamento associato all'id 'droptop_btn, invoca la funzione slideToggle di JQuery
                            con un tempo di esecuzione dell'animazione di 800ms.
                            Lo stato del bottone è gestito dalla variabile state che è un booleano numerico (0,1), la quale va a sostituire
                            la calsse dell'icona del menu a scomparsa (freccia su e freccia giù)
                            */?>
                            var state = 0;
                            $(document).ready(function () {
                                $("#droptop_btn").click(function () {
                                    $("#message_drop_top").slideToggle(800, function () {

                                        state = (state + 1) % 2;

                                        $('#freccia').removeClass();

                                        if (state == 0) {
                                            $('#freccia').addClass('icofont-rounded-down');
                                        } else {
                                            $('#freccia').addClass('icofont-rounded-up');
                                        }

                                    })
                                });
                            });
                        </script>
                    </div>

                    <div class=" col-md-12">
                        <div class="row" style="margin-bottom:0.8%; margin-left:0.90%">
                            <?= '<!-- <a class="d-none d-lg-block navbar-brand" href="#"> 
									<img class="" alt="" src="<?php header_image(); ?>">--><!-- </a> -->' ?>


                            <div class="col-md-4"><a href="https://www.regione.piemonte.it"
                                                     title="Apri sito esterno della Regione Piemonte">Regione
                                    Piemonte</a></div>
                            <div class="col-md-7 d-none d-md-block d-lg-block d-xl-block">

                                <i class="icofont-compass"></i> Piazza Levi, 12-15011 - Acqui Terme - AL
                                <i class="icofont-email"></i> urp@comune.acquiterme.al.it
                                <i class="icofont-telephone"></i> Tel. 01447701
                                <!--
									    <label for="show-menu-lingua" class="show-menu-lingua">&#8942;</label>
										<input type="checkbox" id="show-menu-lingua" role="button">
										<?php wp_nav_menu(array('theme_location' => 'menu-language', 'container' => 'ul', 'menu_class' => 'nav float-right')); ?>
                                        -->
                            </div>
                            <div class="col-md-1">
                                <?php echo do_shortcode('[google-translator]'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="it-nav-wrapper">
            <div class="it-header-center-wrapper" style="min-height:150px">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="it-header-center-content-wrapper row">
                                <div class="it-brand-wrapper col-md-8 col-sx-12">
                                    <a href="<?php echo esc_url(home_url('/')); ?>"
                                       title="<?php echo esc_html(get_bloginfo('name')); ?>" rel="home">
                                        <?php
                                        $custom_logo_id = get_theme_mod('custom_logo');
                                        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                                        if (has_custom_logo()) {
                                            /*---   Impostazione del logo FISSO - Problema di cropping bassa risoluzione   ----*/
                                            $path = "http://comune.acquiterme.al.it/sviluppo/wp-content/uploads/2019/09/logo_acqui_terme_-2.png";
                                            echo '<img src="' . $path . '" alt="logo-comune-acqui">';

                                            //echo '<img  src="'. esc_url( $logo[0] ) .'" alt="'. esc_html( get_bloginfo( 'name' ) ) .'">';
                                        } else {
                                            echo '<img class="icon" src="' . get_template_directory_uri() . '/img/custom-logo.png' . '" alt="' . esc_html(get_bloginfo('name')) . '">';
                                        } ?>
                                        <?php /*
													<div class="it-brand-text">
														<h2 class="no_toc"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h2>
														<h3 class="no_toc d-none d-md-block"><?php bloginfo( 'description' ); ?></h3>
													</div>
 */ ?>
                                    </a>
                                </div>
                                <div class="it-right-zone col-md-4 col-sx-12 ">
                                    <div class="row ">
                                        <div class="it-socials col-md-12">
                                            <div class="row ">
                                                <div class="col-3">
                                                    <div class="row ">
                                                        <div class="col-md-auto d-none d-md-block d-lg-block d-xl-block"
                                                             style="font-size:18px; word-break: break-all">Seguici su
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php /** Blocco social home page area ricerca top pagina*/ ?>
                                                <div class="col-8" style="left:-20px;">
                                                    <div class="row d-none d-md-block d-lg-block d-xl-block">
                                                        <div class="col-md-12">
                                                            <a class="icofont-linkedin social" title="Apre sito esterno di Linkedin"></a>
                                                            <a class="icofont-instagram social" title="Apre sito esterno di Instagram"></a>
                                                            <a class="icofont-brand-youtube social" title="Apre sito esterno di Youtube"></a>
                                                            <a class="icofont-twitter social" title="Apre sito esterno di Twiter"></a>
                                                            <a class="icofont-facebook social" title="Apre sito esterno di Facebook"></a>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>


                                            <?php //wp_nav_menu( array( 'theme_location' => 'menu-social', 'container' => 'ul', 'menu_class' => 'nav')); ?>
                                        </div>
                                        <div class="it-search-wrapper col-md-12 pull-right">
                                            <?php get_search_form(); ?>
                                            <script>
                                                $("#s").attr("placeholder", "Cerca");
                                                $("#searchsubmit").attr("value", "Cerca");
                                            </script>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
            </div>

            <div class="it-header-navbar-wrapper">
                <nav class="menu-main" role="navigation">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-12">

                                <label for="show-menu-main" class="show-menu-main">Menu</label>
                                <input type="checkbox" id="show-menu-main" role="button">
                                <?php wp_nav_menu(array('theme_location' => 'menu-main', 'container' => 'ul', 'menu_class' => 'nav')); ?>
                            </div>

                        </div>
                    </div>
                </nav>
            </div>

        </div>
</div>
</header>

<div id="container">