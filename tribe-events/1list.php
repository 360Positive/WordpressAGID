<?php
/**
 * Visualizzazione a lista degli eventi
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list.php
 *
 * @package TribeEventsCalendar
 *
 */



    <style>
        .entry-content {
            margin:0px;
        }
        .sfondo{
            background-image: url("https://turismo.comuneacqui.it/wp-content/uploads/2019/04/acquieventibanner.jpg");
            background-size: cover;
            min-height: 400px;
            position: relative;
            width: 110%;
            margin-top: -3.5%;
            margin-bottom: 2%;
            background-position: top;
            background-position-x: center;
            left: -5%;
        }
        .gradient {
            /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#000000+0,000000+100&0+0,0.65+100 */
            background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.65) 100%); /* FF3.6-15 */
            background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.65) 100%); /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.65) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#a6000000', GradientType=0); /* IE6-9 */

            background-size: cover;
            min-height: 400px;
        }
        .titolo-over {
            position: relative;
            top: 200px;
            left: 20%;
            color: white !important;
        }

        .title {
            font-size: 5em;
            font-weight: 500;

        }

        .subtitle {

            font-size: 1em;
            font-weight: 300;

        }

    </style>


    <div class="sfondo">
        <div class="gradient">
            <div class="titolo-over">
                <p class="title"><?php _("Prossimi Eventi");?></p>
            </div>
        </div>

    </div>
    
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

do_action( 'tribe_events_before_template' );
?>

    <div class="row">

        <div class="col-sm-12">
            <!-- Tribe Bar -->
            <?php
            tribe_get_template_part( 'modules/bar' ); ?>

            <!-- Blocco del contenuto della lista -->
            <?php tribe_get_template_part( 'list/content' ); ?>

            <div class="tribe-clear"></div>
        </div>
        <?php get_sidebar()?>
    </div>



<?php
do_action( 'tribe_events_after_template' );
