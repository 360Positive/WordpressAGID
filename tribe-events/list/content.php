<style>
    img.attachment-full.size-full.wp-post-image{
        height: 100%!important;
        width: 100%!important;

    }

    .tribe-events-event-image {
        width: 100% !important;
        max-height:200px!important;
        overflow: hidden;!important}

    .event-data{
        position: absolute;
        top:0px;
        left:0px;
        width:25%;


    }
    .event-data-mese{
        position: relative;
        top:0px;
        background: #769a98;
        padding-bottom:1%;
        font-size:1.2em;
        font-weight:300;
        color:white!important;
        text-align:center;


    }
    .event-data-giorno{
        position: relative;
        top:0px;
        background: #74d8d1;
        font-weight:400;
        font-size:1.5em;
        font-weight:400;
        text-align:center;

    }
    .tribe-events-read-more{
        background: #74d8d1;
        padding:1%;
        font-weight:400;
        font-size:1.5em;
        font-weight:400;
        text-align:center;
        font-size:1em;
        color:white;
    }

    .row.event-entry{
        background: #e6f7ff;
        padding:2%;
        margin-right:1%;


    }

    .tribe-event-schedule-details{
        font-size:1.3em;
    }
    .event-category {
        /*background: #74d8d1;*/
        font-weight:600;
    }

    .event-organiz{
        text-align:center;
        font-weight:700!important;
        padding:3%;
        background:rgba(242, 242, 242,1);
        position:relative;


    }
    .description{
        text-align: justify;
        font-size:0.9em;
    }
</style>
<?php
/**
 * List View Content Template
 * The content template for the list view. This template is also used for
 * the response that is returned on list view ajax requests.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/content.php
 *
 * @package TribeEventsCalendar
 * @version  4.3
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
} ?>
<div id="tribe-events-content" class="tribe-events-list">


    <?php
    /**
     * Fires before any content is printed inside the list view.
     */
    do_action( 'tribe_events_list_before_the_content' );
    ?>

    <!-- List Title 
    <?php do_action( 'tribe_events_before_the_title' ); ?>
    <h2 class="tribe-events-page-title"><?php echo tribe_get_events_title() ?></h2>-->
    <?php do_action( 'tribe_events_after_the_title' ); ?>
    <p><strong>N.B.</strong> 
    <?php echo _("Gli eventi ricorrenti sono visualizzati come eventi singoli nell'attuale vista a lista, per attivare il raggruppamento è necessario cliccare il pulsante di spunta."); ?> </p>
    <?php echo _("Gli eventi passati e non ancora terminati, sono presentati nella lista con la data di inizio pubblicazione."); ?> </p>
   
    <!-- Notices -->
    <?php tribe_the_notices() ?>

    <!-- List Header -->
    <?php do_action( 'tribe_events_before_header' ); ?>
    <div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>

        <!-- Header Navigation -->
        <?php do_action( 'tribe_events_before_header_nav' ); ?>
        <?php tribe_get_template_part( 'list/nav', 'header' ); ?>
        <?php do_action( 'tribe_events_after_header_nav' ); ?>

    </div>

    <!-- #tribe-events-header -->
    <?php do_action( 'tribe_events_after_header' ); ?>


    <!-- Events Loop -->
    <?php if ( have_posts() ) : ?>
        <?php do_action( 'tribe_events_before_loop' ); ?>
        <?php tribe_get_template_part( 'list/loop' ) ?>
        <?php do_action( 'tribe_events_after_loop' ); ?>
    <?php endif; ?>

    <!-- List Footer -->
    <?php do_action( 'tribe_events_before_footer' ); ?>
    <div id="tribe-events-footer">

        <!-- Footer Navigation -->
        <?php do_action( 'tribe_events_before_footer_nav' ); ?>
        <?php tribe_get_template_part( 'list/nav', 'footer' ); ?>
        <?php do_action( 'tribe_events_after_footer_nav' ); ?>

    </div>
    <!-- #tribe-events-footer -->
    <?php do_action( 'tribe_events_after_footer' ) ?>

</div><!-- #tribe-events-content -->
