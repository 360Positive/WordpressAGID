<?php
/*
    * Template Name: Articolo Uffici - single-uffici.php
    * Template Post Type: post, product
*/
require_once '360Moduli/XML/localfunc.php';

get_header(); ?>
    <!--single.php -->
    <style>
        section.topimage{
            background:url(<?php echo the_field('big-image');?>);
            min-height:350px;
            background-position: center;
            background-size: cover;
            padding-bottom:0%!important;
            margin-top: -25px;
            margin-bottom:0px;
        }
        .over{
            padding:2%;
        }
        #sidebar:after{
            display:none;
        }
        .moreact{
            background:yellow;
            padding:1%;
        }
        .breadcrumb{
            margin-top:0px;
        }
        .icofont-*{
            font-size:2em!important;
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

                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <?php //get_template_part( 'entry' ); ?>
                        <h2><?php the_title(); ?></h2>
                        <hr>
                        <?php the_content(); ?>
                        <?php //if ( ! post_password_required() ) comments_template( '', true ); ?>
                    <?php endwhile; endif; ?>
                    <hr>
                    <div class="row">

                        <?php
                        /*Campi dati*/
                        $telefono="";
                        $mail="";
                        $orari="";
                        $manuale=get_field('manuale');
                        if($manuale){
                            $telefono=$manuale['telefono'];
                            $mail=$manuale['mail'];
                            $orari=$manuale['orari'];
                            ?><div class="col-md-6">
                            <i class="icofont-telephone"></i> <?=$telefono?><br>
                            <i class="icofont-email"></i> <?=$mail?>
                            </div>
                            <div class="col-md-6">
                                <i class="icofont-wall-clock"> </i> <?=$orari?>
                            </div>
                            <?php
                        }
                        else{
                            $xmi=new XMLINTERPRETER();
                            $xmi->init(get_field('xml'));
                            echo "<div class='col-md-4'>";
                            echo "<h2  class='alert alert-primary'>"._("Sede") . '</h2>';
                            $xmi->luogoList();
                            echo "</div>";
                            echo "<div class='col-md-4'>";
                            echo "<h2  class='alert alert-primary'>"._("Dirigente") . '</h2>';
                            $xmi->dirigenteList();
                            echo "</div>";
                            echo "<div class='col-md-4'>";
                            echo "<h2  class='alert alert-primary'>"._("Contatti").":</h2>";
                            $xmi->contattiList();
                            echo "</div>";

                            echo "<div class='col-md-12'>";
                            echo "<h2  class='alert alert-primary'>" . _("Orario di attenzione al pubblico") . '</h2>';
                            $xmi->orariList();
                            echo "</div>";

                            echo "<div class='col-md-12'>";
                            echo "<h2  class='alert alert-primary'>"._("Scadenze") . '<br><small>Elenco delle prossime scadenze per gli utenti e i cittadini.</small></h2>';
                            $xmi->scadenzeList();

                            echo "</div>";
                        }
                        ?>




                    </div>


                </div>

                <div class="col-md-2 offset-md-1">
                    <?php //Inclusione modulo per la gestione dei social
                    include '360Moduli/sharesocial.php';?>
                    <?php wp_nav_menu(array('menu'=>'"'.get_field('menusidebar').'""')); ?>
                </div>


            </div>


        </section>
    </div>
<?php get_footer(); ?>