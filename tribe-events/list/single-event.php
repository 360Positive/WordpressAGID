<?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @version 4.6.3
 *
 */
if (!defined('ABSPATH')) {
    die('-1');
}

// Setup an array of venue details for use later in the template
$venue_details = tribe_get_venue_details();

// The address string via tribe_get_venue_details will often be populated even when there's
// no address, so let's get the address string on its own for a couple of checks below.
$venue_address = tribe_get_address();

// Venue
$has_venue_address = (!empty($venue_details['address'])) ? ' location' : '';

// Organizer
$organizer = tribe_get_organizer();

?>


    <div class="row event-entry">
        <div class="col-md-3">
            <div class="row ">
                <div class="col-md-12"><!-- Organizer PATROCINIO -->
                    <?php  $type=get_field('comune');
                    if($type=="patrocinato"){
                        echo "<p class='event-organiz'>Patrocinio del Comune di Acqui Terme</p>";
                    }
                    if($type=="organizzato"){
                        echo "<p class='event-organiz'>Organizzato dal Comune di Acqui Terme</p>";
                    }
                    ?>
                </div>
            </div>
            <div class="row ">
               
                <div class="col-md-12">
                    <!-- Event Image -->
                    <?php 
                    $nophoto = "https://turismo.comuneacqui.it/wp-content/uploads/2019/04/no-foto-turismo-acqui-terme.jpg";
                                                
                    if( tribe_event_featured_image(null, 'full')){
                    echo tribe_event_featured_image(null, 'full'); 
                    }
                    else{
                         echo '<img src="'.$nophoto.'">';
                    }
                   
                    ?>
                    <div class="event-data">
                        <div class="event-data-giorno"><?php echo tribe_get_start_date( null, false, 'd' );?></div>
                        <div class="event-data-mese"><?php echo tribe_get_start_date( null, false, 'M' );?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <!-- Event Title -->
            <?php do_action('tribe_events_before_the_event_title') ?>
            <h2 class="tribe-events-list-event-title">
                <a class="tribe-event-url" href="<?php echo esc_url(tribe_get_event_link()); ?>"
                   title="<?php the_title_attribute() ?>" rel="bookmark">
                    <?php the_title() ?>
                </a>
            </h2>
            <?php do_action('tribe_events_after_the_event_title') ?>

            <!-- Categoria-->
            <div class="event-category">
                <?php echo Tribe_Register_Meta::event_category( 'tribe_event_category' ) ?>
            </div>
            <!-- Luogo -->
            <div class="event-luogo">
                <?php if ($venue_details) : ?>
                    <!-- Venue Display Info -->
                    <div class="tribe-events-venue-details">
                        <?php
                        $address_delimiter = empty($venue_address) ? ' ' : ', ';

                        // These details are already escaped in various ways earlier in the process.?>
                        <i class="icofont icofont-location-pin"></i>
                        <?php
                        echo implode($address_delimiter, $venue_details);

                        if (tribe_show_google_map_link()) {
                            //echo tribe_get_map_link_html();
                        }
                        ?>
                    </div> <!-- .tribe-events-venue-details -->
                <?php endif; ?>
            </div>


            <!-- Dati eventi -->
            <?php do_action('tribe_events_before_the_meta') ?>
            <div class="tribe-events-event-meta">
                <div class="author <?php echo esc_attr($has_venue_address); ?>">
                    <div class="row tribe-event-schedule-details">
                        <!-- Schedule & Recurrence Details -->
                        
                            <div class="col-md-6">
                                <i class="icofont icofont-ui-calendar"></i>
                                <?php
                                $startdate=tribe_get_start_date( null, false, 'l d F' );
                                $stopdate=tribe_get_display_end_date( null, false, 'l d F' );
                                $startdate_s=tribe_get_start_date( null, false, 'l d' );
                                $stopdate_s=tribe_get_display_end_date( null, false, 'l d');

                                $sta_d=tribe_get_start_date( null, false, 'z' );
                                $sto_d=tribe_get_display_end_date( null, false, 'z' );
                                $year=tribe_get_start_date( null, false, 'Y' );

                                $sta_d=$sta_d+$year*365;
                                $sto_d=$sto_d+$year*365;

                                if($sta_d!=$sto_d){
                                    echo $startdate_s." - ".$stopdate;
                                }
                                else{
                                    echo $startdate;
                                }
                                ?>
                            </div>
                            <div class="col-md-6">
                                <i class="icofont icofont-clock-time"></i>
                                <?php
                                $starttime=tribe_get_start_time(null, false, 'g:i');
                                $stoptime=tribe_get_end_time(null, false, 'g:i');
                                if(tribe_event_is_all_day()){
                                    echo "24h - Tutto il giorno";
                                }
                                else{
                                    if($starttime!=null){
                                        echo $starttime;
                                    }
                                    if($stopttime!=null){
                                        echo $stoptime;
                                    }
                                }
                                ?>
                            </div>

                    </div>
                </div>
            </div><!-- .tribe-events-event-meta -->

            <!-- Event Cost -->
            <?php if (tribe_get_cost()) : ?>
                <div class="tribe-events-event-cost">
                    <span class="ticket-cost">
                        <?php echo tribe_get_cost(null, true); ?>
                        </span>
                    <?php
                    /**
                     * Runs after cost is displayed in list style views
                     *
                     * @since 4.5
                     */
                    do_action('tribe_events_inside_cost');
                    ?>
                </div>
            <?php endif; ?>

            <?php do_action('tribe_events_after_the_meta'); ?>

            <!-- Event Content -->
            <?php do_action('tribe_events_before_the_content'); ?>

            <div class="tribe-events-list-event-description tribe-events-content description entry-summary">
                <?php echo tribe_events_get_the_excerpt(null, wp_kses_allowed_html('post')); ?>
               

                <!-- PULSANTE SAPERE DI PIU' -->
                <a href="<?php echo esc_url(tribe_get_event_link()); ?>" class="tribe-events-read-more"
                   rel="bookmark"><?php esc_html_e('Find out more', 'the-events-calendar') ?> <i class="icofont icofont-circled-right"></i></a>
            </div><!-- .tribe-events-list-event-description -->

        </div>

    </div>


<?php
do_action('tribe_events_after_the_content');