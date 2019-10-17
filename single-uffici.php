<?php
/*
    * Template Name: Articolo Uffici - single-uffici.php
    * Template Post Type: post, product
*/
require_once '360Moduli/XML/localfunc.php';

get_header(); ?>
    <!--single.php -->
    <style>
        section.topimage {
            background: url(<?php echo the_field('big-image');?>);
            min-height: 350px;
            background-position: center;
            background-size: cover;
            padding-bottom: 0% !important;
            margin-top: -25px;
            margin-bottom: 0px;
        }

        .over {
            padding: 2%;
        }

        #sidebar:after {
            display: none;
        }

        .moreact {
            background: yellow;
            padding: 1%;
        }

        .breadcrumb {
            margin-top: 0px;
        }

        .icofont- * {
            font-size: 2em !important;
        }

        .alert-primary {
            color: #3e4145;
            background-color: #ffb402;
            border-color: #ffb402;
        }

    </style>
    <section class="entry-content thumbnail topimage">
        <p class="dida"><?php the_post_thumbnail_caption() ?></p>
    </section>

<?php wppa_breadcrumb(); ?>
    <div class="container">
    <div class="row">
        <section id="content" role="main" class="container">
            <div class="row">
                <div class="col-md-9">

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php //get_template_part( 'entry' ); ?>
                        <h1><?php the_title(); ?></h1>
                        <hr>
                        <?php the_field('introduzione'); ?>
                        <strong>Assessore</strong><br>
                        <?php
                        $iconuser="icofont-hand-right";
                        $assessori=get_field('assessore').'<br>';
                        $funz_el=explode(',',$assessori);
                        foreach ( $funz_el as $el){
                            echo '<i class="'.$iconuser.'"></i>'.$el.'<br>';
                        }
                        ?>
                        <strong>Funzionari</strong><br>
                        <?php
                        $iconuser="icofont-user-alt-4";
                        $funzionari=get_field('funzionari');
                        $funz_el=explode(',',$funzionari);
                        foreach ( $funz_el as $el){
                            echo '<i class="'.$iconuser.'"></i>'.$el.'<br>';
                        }
                        ?>
                        <?php the_content(); ?>
                        <?php //if ( ! post_password_required() ) comments_template( '', true ); ?>
                    <?php endwhile; endif; ?>
                    <hr>
                    <div class="row">

                        <?php
                        /*Campi dati*/
                        $telefono = "";
                        $mail = "";
                        $orari = "";
                        $manuale = get_field('manuale');
                        if ($manuale) {
                            $telefono = $manuale['telefono'];
                            $mail = $manuale['mail'];
                            $orari = $manuale['orari'];
                            ?>
                            <div class="col-md-6">
                                <i class="icofont-telephone"></i> <?= $telefono ?><br>
                                <i class="icofont-email"></i> <?= $mail ?>
                            </div>
                            <div class="col-md-6">
                                <i class="icofont-wall-clock"> </i> <?= $orari ?>
                            </div>
                            <?php
                        } else {
                            $xmi = new XMLINTERPRETER();
                            $xmi->init(get_field('xml'));
                            echo "<div class='col-md-4'>";
                            echo "<h2  class='alert alert-primary'>" . _("Sede") . '</h2>';
                            $xmi->luogoList();
                            echo "</div>";
                            echo "<div class='col-md-4'>";
                            echo "<h2  class='alert alert-primary'>" . _("Dirigente") . '</h2>';
                            $xmi->dirigenteList();
                            echo "</div>";
                            echo "<div class='col-md-4'>";
                            echo "<h2  class='alert alert-primary'>" . _("Contatti") . ":</h2>";
                            $xmi->contattiList();
                            echo "</div>";
                            echo "<div class='col-md-12'>";
                            echo "<h2  class='alert alert-primary'>" . _("Orario di attenzione al pubblico") . '</h2>';
                            $xmi->orariList();
                            echo "</div>";
                            echo "<div class='col-md-12'>";
                            echo "<h2  class='alert alert-primary'>" . _("Scadenze") . '<br><small>Elenco delle prossime scadenze per gli utenti e i cittadini.</small></h2>';
                            $xmi->scadenzeList();
                            echo "</div>";
                        }
                        ?>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="container-fluid widget-area page-widget-area">
                        <?php //Inclusione modulo per la gestione dei social
                        include '360Moduli/sharesocial.php'; ?>
                        <?php
                        $val = get_field('menusidebar');
                        if ($val) {
                            wp_nav_menu(array('menu' => '"' . $val . '""'));
                        } ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <style>
        .header-accordion {
            background: red;
            padding: 3%;
        }

        .small, small {
            font-size: 80% !important;
            font-weight: 800;
        }
    </style>

    <script type="text/javascript">

        /*Aggiunta classe struttura per i titoli*/
        $.each($('div.accordion-local > div'), function (index, el) {
            title = $('div > p:nth-child(1)', el).text()
            $('div > p:nth-child(1)', el).hide()
            $('div > p:nth-child(1)', el).append('<hr>')

            var button = "<a class=\"text-left btn angle btn-lg btn-block text-wrap\" style=\"padding-right: 0px; border-radius: 0; \"" +
                "data-toggle=\"collapse\" " +
                "href=\"#sec" + index + "\" " +
                "role=\"button\" " +
                "aria-expanded=\"false\" " +
                "aria-controls=\"collapseExample\"" +
                ">"+ title +
                "        <span class=\"icofont-rounded-down pull-right\" style=\"padding:1%; background: darkgrey; margin-top: -1%; \">" +
                "        </span>" +
                "</div>"+
                "<\/a> ";

            $(el).before(button)

            var links = $('p > a', el)
            $.each(links, function (index, link) {
                var link_icon = "icofont-external-link"
                var testo = $(link).text()
                var testo_base=testo
                var lin = $(link).attr('href')

                //isa innerlink
                var local=document.location.host
                var n = lin.indexOf(local);
                if (n>0){
                    if(lin.indexOf('.pdf')>0){
                        testo='Apre il documento pdf '+testo
                    }
                    else if(lin.indexOf('.doc')>0){
                        testo='Apre il documento testo '+testo
                    }
                    else {
                        testo='Apre la pagina interna'+testo
                    }

                }
                else{
                    testo='Apre la pagina esterna del sito'+testo
                }
                testo=testo+" in una pagina nuova"


                    //inserimento automatico del title per i link

                link.setAttribute("title", testo)

                $(link).html('' +
                    '<i class=\"' + link_icon + '"></i> ' +
                    testo_base +
                    '<strong><small> (Clicca per aprire)</small>' +
                    '</strong>')
            });

        });

        /*Aggiunta classe struttura per i titoli*/
        $.each($('div.accordion-local > div > div > p:nth-child(1)'), function (index, el) {
            $(el).addClass('header-accordion')
        });

        /*Aggiunta classe collapse per toggle*/
        $.each($('div.accordion-local > div > div'), function (index, el) {
            $(el).addClass('collapse')
            el.setAttribute("id", 'sec' + index);
            el.setAttribute("target", '_blank');

        });


    </script>
<?php get_footer(); ?>