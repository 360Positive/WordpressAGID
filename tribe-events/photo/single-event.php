<?php
/**
 * Photo View Single Event
 * This file contains one event in the photo view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/pro/photo/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.4.8
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php

global $post;

?>
<style>

.tribe-events-photo .tribe-events-loop .type-tribe_events .tribe-events-event-meta {
    font-size: 100%;
    text-align: center;
}
.tribe-events-list .tribe-events-loop .tribe-events-event-image, .tribe-events-list .tribe-events-event-image    {
    float: none!important;
    width: 100%;
    height:250px;
    overflow:hidden;
}
.tribe-events-photo .tribe-events-event-image img {
    height: auto;
    width: 100%;
    max-height: 400px; 
    max-width: 500px; 
    min-height:300px;
    
#tribe-events-content a {
    background-color: ;
    border-left: 5px solid;
    border-right: 5px solid transparent;
    color: ;
    line-height: 1em;
    padding:2%;
    text-align:center;
    font-size:100%;
}

.tribe-events-list #tribe-events-photo-events .tribe-events-event-details h2 {
    font-size: 150%;
    line-height: 200%;
    margin-bottom: 2%;
}

#tribe-events .tribe-events-content p, .tribe-events-after-html p, .tribe-events-before-html p {
    line-height: 1.7;
    margin: 0 0 10px;
    text-align: justify!important;
    font-size: 0.85em !important;
}



img.attachment-large.size-large.wp-post-image {
    max-height: 300px;
}

a.tribe-event-url {
    font-size: 0.9em;
    text-align: center;
    padding-top: 3% !important;
    padding-bottom: 3%!important;}
    
h2.tribe-events-list-event-title{
    text-align:center!important;
}
 
 span.tribe-event-date-start {
    text-transform: uppercase!important;
}

p.event-message{
    padding:2%;
    background:rgb(255, 128, 128);
}
</style>

<div class="tribe-events-photo-event-wrap">
    
	<?php echo tribe_event_featured_image( null, 'large' ); ?>
  
	<div class="tribe-events-event-details tribe-clearfix">

		<!-- Event Title -->
		<?php do_action( 'tribe_events_before_the_event_title' ); ?>
		<h2 class="tribe-events-list-event-title" >
			<a class="tribe-event-url" style="text-align:center" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title() ?>" rel="bookmark">
				<?php the_title(); ?>
			</a>
		</h2>
		<?php do_action( 'tribe_events_after_the_event_title' ); ?>

		<!-- Event Meta -->
		<?php do_action( 'tribe_events_before_the_meta' ); ?>
		<div class="tribe-events-event-meta">
			<div class="tribe-event-schedule-details">
				<?php if ( ! empty( $post->distance ) ) : ?>
					<strong>[<?php echo tribe_get_distance_with_unit( $post->distance ); ?>]</strong>
				<?php endif; ?>
				<?php echo tribe_events_event_schedule_details(); ?>
			</div>
		</div><!-- .tribe-events-event-meta -->
		<?php do_action( 'tribe_events_after_the_meta' ); ?>

		<!-- Event Content -->
		<?php do_action( 'tribe_events_before_the_content' ); ?>
		<div class="tribe-events-list-photo-description tribe-events-content">
			<?php echo tribe_events_get_the_excerpt() ?>
		</div>
		<?php do_action( 'tribe_events_after_the_content' ) ?>
		
		<!-- Messaggio annullamento evento  deve essere presente un campo ACF che sia "messaggio"-->
                		<?php
                $additional_fields = tribe_get_custom_fields();
                $message=$additional_fields['messaggio'];
                if($message)
                {
                	echo '<p class="event-message">' . $message . '</p>';
                }
                
                ?>

	</div><!-- /.tribe-events-event-details -->

</div><!-- /.tribe-events-photo-event-wrap -->
