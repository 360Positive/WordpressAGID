<?php
/*
    * Template Name: FAQ - template-general-faq.php
    * Template Post Type: post, page
*/
require_once '360Moduli/XML/localfuncfaq.php';

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
                <div class="col-md-8">

                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <?php //get_template_part( 'entry' ); ?>
                        <h2><?php the_title(); ?></h2>
                        <hr>
                        <?php the_content(); ?>
                        <?php //if ( ! post_password_required() ) comments_template( '', true ); ?>
                    <?php endwhile; endif; ?>


                            <?php
                            $xmi=new XMLINTERPRETERFAQ();
                            //get_field('xml')
                            $xmi->init();?>



                </div>

                <div class="col-md-3 offset-md-1">
                    <div class="container-fluid widget-area page-widget-area">
                        <?php //Inclusione modulo per la gestione dei social
                        include '360Moduli/sharesocial.php';?>

                        <?php
                        $val=get_field('menusidebar');
                        if($val){
                            wp_nav_menu(array('menu'=>'"'.$val.'""'));
                        } ?>
                    </div>
                </div>


            </div>


        </section>
    </div>
    <script>
        <?php /*---  Script datatable per il raggruppamnento dei dati   ----*/?>
        $(document).ready( function () {
            var groupColumn = 0;

            var table = $('#faqtable').DataTable({

                "columnDefs": [
                    { "visible": false, "targets": groupColumn }
                ],
                "order": [[ groupColumn, 'asc' ]],
                "displayLength": 25,
                "drawCallback": function ( settings ) {
                    var api = this.api();
                    var rows = api.rows( {page:'current'} ).nodes();
                    var last=null;

                    api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                        if ( last !== group ) {
                            $(rows).eq( i ).before(
                                '<tr class="group"><td colspan="2">'+group+'</td></tr>'
                            );

                            last = group;
                        }
                    } );
                },/**/
              } );


        // Order by the grouping
        $('#faqtable tbody').on( 'click', 'tr.group', function () {
            var currentOrder = table.order()[0];
            if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
                table.order( [ groupColumn, 'desc' ] ).draw();
            }
            else {
                table.order( [ groupColumn, 'asc' ] ).draw();
            }
        } );
        } );
    </script>'


<?php get_footer(); ?>