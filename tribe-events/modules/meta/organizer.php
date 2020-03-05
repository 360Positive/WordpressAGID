<?php
/**
 * Single Event Meta (Organizer) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/organizer.php
 *
 * @package TribeEventsCalendar
 * @version 4.4
 */
$organizer_ids = tribe_get_organizer_ids();
$multiple = count($organizer_ids) > 1;

$phone = tribe_get_organizer_phone();
$email = tribe_get_organizer_email();
$website = tribe_get_organizer_website_link();
?>
<!--
File personalizzato cartella tema moudle/meta
-->
<style>
.intestazione {
	font-weight: 800;
}

.contenuto {
	
}
</style>
<div class="tribe-events-meta-group tribe-events-meta-group-organizer">
	<h3 class="tribe-events-single-section-title"><?php echo tribe_get_organizer_label( ! $multiple ); ?></h3>
	<dl>
		<?php
do_action('tribe_events_single_meta_organizer_section_start');

foreach ($organizer_ids as $organizer) {
    if (! $organizer) {
        continue;
    }

    ?>
			<div class="row">
			<div class="col-md-12 intestazione"><?php echo tribe_get_organizer_link( $organizer ) ?></div>

		</div>
			<?php
}

if (! $multiple) { // only show organizer details if there is one
    if (! empty($phone)) {
        ?>
				<div class="row">
			<div class="col-md-6 intestazione"><?php esc_html_e( 'Phone:', 'the-events-calendar' ) ?></div>
			<div class="col-md-6 contenuto"><?php echo esc_html( $phone ); ?></div>
		</div>
				
								<?php
    } // end if

    if (! empty($email)) {
        ?>
				<div class="row">
			<div class="col-md-6 intestazione"><?php esc_html_e( 'Email:', 'the-events-calendar' ) ?></div>
			<div class="col-md-6 contenuto"><?php echo esc_html( $email ); ?></div>
		</div>
								<?php
    } // end if

    if (! empty($website)) {
        ?>
				<div class="row">
			<div class="col-md-6 intestazione"><?php esc_html_e( 'Website:', 'the-events-calendar' ) ?></div>
			<div class="col-md-6 contenuto"><?php echo $website; ?></div>
		</div>
				
				<?php
    } // end if
} // end if

do_action('tribe_events_single_meta_organizer_section_end');
?>
	</dl>
</div>
