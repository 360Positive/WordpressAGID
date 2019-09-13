<?php
/**
 * Single Event Meta (Venue) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/venue.php
 *
 * @package TribeEventsCalendar
 */

if ( ! tribe_get_venue_id() ) {
	return;
}

$phone   = tribe_get_phone();
$website = tribe_get_venue_website_link();

?>

<!--
File personalizzato cartella tema moudle/meta
-->
<style>
    .intestazione{
    font-weight:800;
    }
    .contenuto{
        
    }
    .tribe-events-single-section-title{
    background: lightgrey;
    padding: 4%;
}

    </style>

<div class="tribe-events-meta-group tribe-events-meta-group-venue">
	<h3 class="tribe-events-single-section-title"> <?php esc_html_e( tribe_get_venue_label_singular(), 'the-events-calendar' ) ?> </h3>
	
		<?php do_action( 'tribe_events_single_meta_venue_section_start' ) ?>
		
			<div class="row">
			    <div class="col-md-12 intestazione"><?php echo tribe_get_venue() ?></div>
		</div>

		<?php if ( tribe_address_exists() ) : ?>
		
			<div class="row">
			    <div class="col-md-12 intestazione"><?php echo tribe_get_full_address(); ?></div>
			    <div class="col-md-12 contenuto"><?php if ( tribe_show_google_map_link() ) : ?>
						<?php echo tribe_get_map_link_html(); ?>
					<?php endif; ?> </div>
			    
			</div>
			<?php endif; ?>

		<?php if ( ! empty( $phone ) ): ?>
			<div class="row">
			    <div class="col-md-6 intestazione"><?php esc_html_e( 'Phone:', 'the-events-calendar' ) ?></div>
			    <div class="col-md-6 contenuto"><?php echo $phone ?></div>
		</div>
		<?php endif ?>

		<?php if ( ! empty( $website ) ): ?>
		<div class="row">
			    <div class="col-md-6 intestazione"><?php esc_html_e( 'Website:', 'the-events-calendar' ) ?> </div>
			    <div class="col-md-6 contenuto"><?php echo $website ?></div>
		</div>
			
		<?php endif ?>

		<?php do_action( 'tribe_events_single_meta_venue_section_end' ) ?>

</div>
