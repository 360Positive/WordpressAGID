<header id="header-top" class="d-none" role="banner">
    <style>
        #header-top{
            position: fixed;
            top:0px;
            z-index: 9999;
            width: 100%;
        }
    </style>
    <div class="it-header-wrapper">
        <div class="it-header-slim-wrapper">
            <div class="container-fluid" style="margin:0px">
                <?php
                /*---   Menu navigazione Top pagina   ----
                Menu a scomparsa con i collegamenti ai siti istituzionali, animazione su apertura
                e chiusura a scomparsa.
                */ ?>
                <div class="row">
                    <div class="dropdown col-12 my-0" style="padding:10px">
                        <a href="#droptop_btn-fix" id="droptop_btn-fix" class="button_dropdown"
                           title="Turismo, Acquistoria, Acquiambiente">
                            Turismo, Acquistoria, Acquiambiente <i id="freccia"
                                                                   class="icofont-rounded-down"></i></a>
                        <div id="message_drop_top-fix" class="row" style="display:none">
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
                        L'evento click sul collegamento associato all'id 'droptop_btn-fix, invoca la funzione slideToggle di JQuery
                        con un tempo di esecuzione dell'animazione di 800ms.
                        Lo stato del bottone è gestito dalla variabile state che è un booleano numerico (0,1), la quale va a sostituire
                        la calsse dell'icona del menu a scomparsa (freccia su e freccia giù)
                        */?>
                        var state = 0;
                        $(document).ready(function () {
                            $("#droptop_btn-fix").click(function () {
                                $("#message_drop_top-fix").slideToggle(800, function () {

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
            </div>
        </div>
    </div>
    <div class="it-nav-wrapper">
        <div class="it-header-wrapper" style="min-height:auto;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="it-header-center-content-wrapper row">
                            <div class="it-brand-wrapper col-md-8 col-sx-12 my-2">
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
                            <div class="it-right-zone col-md-4 col-sx-12 my-2 ">
                                <div class="row ">
                                   
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

<script type="text/javascript">

    $(window).scroll(function () {
        jQuery.extend(jQuery.expr[':'], {
            inview: function (elem) {
                var t = $(elem);
                var offset = t.offset();
                var win = $(window);
                var winST = win.scrollTop();
                var elHeight = t.outerHeight(true);

                if ( offset.top > winST - elHeight && offset.top < winST + elHeight + win.height()) {
                    return true;
                }
                return false;
            }
        });
        if(!$("#header").is(":inview")){
            $("#header-top").removeClass('d-none');
            $("#header-top").addClass('show');
            // console.log('Menu base' );
        }
        else{
            $("#header-top").removeClass('show');
            $("#header-top").addClass('d-none');
            // console.log('Menu top' );
        }

    })

</script>
