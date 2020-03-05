<?php
/**
 *Modifiche Riccardo Testa
 *
 */
if (! defined('ABSPATH')) {
    die('-1');
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();

// Setup an array of venue details for use later in the template
$venue_details = tribe_get_venue_details();

// The address string via tribe_get_venue_details will often be populated even when there's
// no address, so let's get the address string on its own for a couple of checks below.
$venue_address = tribe_get_address();

// Venue
$has_venue_address = (! empty($venue_details['address'])) ? ' location' : '';

// Organizer
$organizer = tribe_get_organizer();

?>
<style>
.sfondo {
	background-image:
		url("https://turismo.comuneacqui.it/wp-content/uploads/2019/04/acquieventibanner.jpg");
	min-height: 400px;
	position: relative;
	width: 140%;
	margin-top: -15%;
	margin-bottom: 2%;
	margin-left: -20%;
	margin-right: -20%;
	background-position-x: center;
	background-size: cover;
	background-position: center;
}

.gradient {
	/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#000000+0,000000+100&0+0,0.65+100 */
	background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 0%,
		rgba(0, 0, 0, 0.65) 100%); /* FF3.6-15 */
	background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 0%,
		rgba(0, 0, 0, 0.65) 100%); /* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%,
		rgba(0, 0, 0, 0.65) 100%);
	/* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000',
		endColorstr='#a6000000', GradientType=0); /* IE6-9 */
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
	font-size: 3em;
	font-weight: 500;
}

.subtitle {
	font-size: 1em;
	font-weight: 300;
}

.navigation {
	position: relative;
	padding: 2%;
	background: rgb(242, 242, 242);
}

.dati-evento-footer {
	font-size: 1.2em;
	font-weight: 500 !important;
	margin-right: 10px;
	padding-top: 2%;
	text-align: center;
	background: rgb(242, 242, 242);
}

.dati-evento-top {
	font-size: 1.2em;
	font-weight: 500 !important;
	margin-right: 10px;
	padding-bottom: 2%;
	text-align: center;
	background: rgb(242, 242, 242);
}

.dati-evento-left {
	font-size: 1.2em;
	font-weight: 500 !important;
	margin-right: 5px;
	text-align: center;
	background: rgb(242, 242, 242);
}

.dati-evento-left>div {
	font-size: 1.2em;
	font-weight: 500 !important;
	margin-right: 5px;
	text-align: center;
	background: rgb(242, 242, 242);
	padding: 3%;
}

span.dati-evento-top {
	vertical-align: middle
}

.icofont {
	font-size: 2em !important;
}

.icofont:hover {
	font-size: 2em !important;
	color: blue;
}

.titolo {
	text-transform: uppercase;
	text-align: center;
	font-weight: 300 !important;
	/*padding:3%;*/
	background: rgb(242, 242, 242);
}

.event-organiz {
	text-align: center;
	font-weight: 700 !important;
	padding: 2%;
	background: #e6f2ff;
	margin-bottom: 15px;
}

.tribe-events-event-image {
	margin-bottom: 0.2em;
	text-align: center;
}

.immagine>div>img {
	max-width: 100%;
}

.row {
	padding: 1% !important;
	margin-left: 0px;
	margin-right: 0px;
}

.container-fluid {
	width: 108%;
	/*margin-left:-3%;
        margin-right:-3%;*/
}

.data-from-to {
	font-size: 0.9em;
}

.tribe-events-single-event-description {
	text-align: left;
}

#evidence {
	display: none;
}

.locandina {
	float: left;
	max-width: 250px !important;
	margin-right: 15px !important;
}

.content-block {
	/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#fceabb+0,fccd4d+40,fbdf93+89&1+0,0+100 */
	background: -moz-linear-gradient(-45deg, rgba(252, 234, 187, 1) 0%,
		rgba(252, 205, 77, 0.6) 40%, rgba(251, 223, 147, 0.11) 89%,
		rgba(251, 223, 147, 0) 100%); /* FF3.6-15 */
	background: -webkit-linear-gradient(-45deg, rgba(252, 234, 187, 1) 0%,
		rgba(252, 205, 77, 0.6) 40%, rgba(251, 223, 147, 0.11) 89%,
		rgba(251, 223, 147, 0) 100%); /* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(135deg, rgba(252, 234, 187, 1) 0%,
		rgba(252, 205, 77, 0.6) 40%, rgba(251, 223, 147, 0.11) 89%,
		rgba(251, 223, 147, 0) 100%);
	/* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fceabb',
		endColorstr='#00fbdf93', GradientType=1);
	/* IE6-9 fallback on horizontal gradient */
}
</style>

<div class="sfondo" id="banner">
	<div class="gradient"></div>
</div>

<div id="evidence">
	<!-- Intestazione banner-->

    <?php echo tribe_event_featured_image($event_id, 'full', false); ?>

</div>
<script>
    var url=$("#evidence > .tribe-events-event-image > img ").attr('src');
    console.log(url);
    $("#banner").css("background-image", "url(" + url + ")");
</script>

<!-- Menu di navigazione -->

<a href="<?php echo esc_url(tribe_get_events_link()); ?>"> Visualizza la lista degli eventi -
    <?php printf('&laquo; ' . esc_html_x('All %s', '%s Events plural label', 'the-events-calendar'), $events_label_plural); ?></a>

<!-- #Layout EVENTO -->

<?php

while (have_posts()) :
    the_post();
    ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class=" row">

		<div class="col-md-12" style="padding: 0px !important;">

			<!-- Categoria-->

			<div class="row dati-evento-top">
				<div class="col-md-12 event-category">
                         <?php echo Tribe_Register_Meta::event_category('tribe_event_category') ?>
                         <?php echo the_field('category-img','tribe_events_cat_144') ?>
                    </div>
			</div>

			<div class="row dati-evento-top">
				<!-- Blocco Titolo & Immagine  -->
				<div class="col-md-12 titolo">

					<!-- Event Title -->
                        <?php do_action('tribe_events_before_the_event_title') ?>
                        <h1 class="tribe-events-list-event-title">
						<a class="tribe-event-url"
							href="<?php echo esc_url(tribe_get_event_link()); ?>"
							title="<?php the_title_attribute() ?>" rel="bookmark">
                                <?php the_title() ?>
                            </a>
					</h1>
                        <?php do_action('tribe_events_after_the_event_title') ?>

                    </div>
			</div>
			<div class="row content-block ">
				<div class="col-md-12 content-event">

					<!-- Organizer PATROCINIO -->
                        <?php

$type = get_field('comune');
    if ($type == "patrocinato") {
        echo "<div class='event-organiz'>Patrocinio del Comune di Acqui Terme</div>";
    }
    if ($type == "organizzato") {
        echo "<div class='event-organiz'>Organizzato dal Comune di Acqui Terme</div>";
    }

    ?>
                        
                        <!-- Organizer -->
                        <?php

if (tribe_has_organizer()) {
        ?>
                            <div class="event-organiz"
						style="display: none">
						<div>
							<h5>Organizzato da: <?php echo tribe_get_organizer(); ?>
						
						</div>
						</h5>
						<hr>
                                <?php
        $mail = tribe_get_organizer_email();
        $web = tribe_get_organizer_website_url();
        $phone = tribe_get_organizer_phone();
        ?>
                                <?php if ($mail != "") { ?>
                                    <div>
							<i class="icofont icofont-ui-email"></i> <a
								href="mailto:<?php echo $mail; ?>"><?php echo $mail; ?></a>
						</div>
                                <?php

}
        if ($web != "") {
            ?>
                                    <div>
							<i class="icofont icofont-web"></i> <a href="<?php echo $web; ?>"><?php echo $web; ?></a>
						</div>
                                <?php

}
        if ($phone != "") {
            ?>
                                    <div>
							<i class="icofont icofont-phone"></i> <?php echo $phone; ?></div>
                                <?php } ?>
                            </div>
                            <?php
    }
    ?>
                        <?php do_action('tribe_events_after_the_meta') ?>
                   
                        <!-- Event content -->
                        <?php do_action('tribe_events_single_event_before_the_content') ?>
                        <div
						class="tribe-events-single-event-description tribe-events-content">
						<!-- Immagine LOCANDINA -->
                             <?php
    if (get_field('locandina')) {
        $locandina = get_field('locandina');
    } else {
        $thumb_id = get_post_thumbnail_id();
        $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
        $locandina = $thumb_url_array[0];
        // $locandina=tribe_event_featured_image(null, 'full');
        // echo $locandina;
    }
    ?>
                            <a href="<?php echo $locandina; ?>"
							target="_blank"><img class="locandina"
							src="<?php echo $locandina; ?>"></a>
                            
                            <?php the_content();?>
                        </div>

				</div>
			</div>

			<!-- Dove Come Quando -->
			<div class="row" style="text-align: center; background: #e6f2ff;">
				<!-- Blocco Dati anteprima -->

				<div class="col-md-4">

					<!-- Data-->
					<div class="tribe-event-schedule-details">
						<i class="icofont icofont-ui-calendar"></i>
                            <?php
    $from = tribe_get_start_date(null, false, 'l d F Y');
    $to = tribe_get_end_date(null, false, 'l d F Y');
    if ($from == $to) {
        ?>
                                <p class="data-from-to">
							<strong><?php echo $from; ?></strong>
						</p>
                                <?php
    } else {
        ?><p class="data-from-to">
							<strong><?php echo $from; ?></strong> <br>fino a<br>
							<strong><?php echo $to; ?></strong>
						</p>
                                <?php
    }
    ?>

                        </div>

				</div>
				<div class="col-md-4">
					<!-- Luogo -->
					<div class="event-luogo">
                            <?php if ($venue_details) : ?>
                                <!--Venue -->
						<div class="tribe-events-venue-details">
                                    <?php
        $address_delimiter = empty($venue_address) ? ' ' : ', ';

        // These details are already escaped in various ways earlier in the process. ?>
                                    <i
								class="icofont icofont-location-pin"></i><br>
                                    <?php

        $i = 0;
        echo $venue_details[1];
        foreach ($venue_details as $el) {

            if ($i < 1) {
                echo $el;
            } else {
                break;
            }
            $i ++;
        }

        if (tribe_show_google_map_link()) {
            // echo tribe_get_map_link_html();
        }
        ?>
                                </div>
						<!-- .tribe-events-venue-details -->
                            <?php endif; ?>
                        </div>
				</div>

				<div class="col-md-4">
					<!-- Orario-->
					<div class="tribe-event-schedule-details">
						<i class="icofont icofont-clock-time"></i><br>
                            <?php
    $starttime = tribe_get_start_time(null, false, 'g:i');
    $stoptime = tribe_get_end_time(null, false, 'g:i');
    if (tribe_event_is_all_day()) {
        echo "24h";
    } else {
        if ($starttime != null) {
            echo $starttime;
        }
        if ($stopttime != null) {
            echo $stoptime;
        }
    }
    ?>
                        </div>
				</div>

				<div class="col-md-4">
					<!-- Costo-->
					<div class="tribe-event-schedule-details">

						<!-- Event Cost -->
                            <?php if (tribe_get_cost()) : ?>
                                <i class="icofont icofont-cur-euro"></i><br>
                                <?php echo tribe_get_cost(null, false); ?>
                                <?php
        /**
         * Runs after cost is displayed in list style views
         *
         * @since 4.5
         */
        do_action('tribe_events_inside_cost')?>

                            <?php endif; ?>

                        </div>
				</div>


			</div>


			<!-- Scarica l'evento -->
			<div class="row" id="maps">
				<div class="col-md-12 condivide">
                        <?php do_action('tribe_events_single_event_after_the_content') ?></div>
			</div>

			<!-- Mappa -->
			<div class="row" id="maps">
				<div class="col-md-12">
                        <?php

if (tribe_show_google_map_link()) {
        echo tribe_get_map_link_html();
        echo tribe_get_embedded_map();
    }

    ?>

                    </div>
			</div>
		</div>

	</div>

</div>

<!-- #post-x -->


<?php endwhile; ?>


<div class="row dati-evento-footer">
	<div class="col-md-12">



		<div class="row">
			<div class="col-md-12">
				<p>
					Per informazioni: </span><span style="font-weight: bold;">Comune di
						Acqui Terme</span>
				</p>
			</div>
            <?php

$type = get_field('ufficio');
            if ($type == "Turismo") {
                ?>
            <div class="col-md-12">
				<p>
					Ufficio Turismo e Sport</span>
				</p>
				<p>Tel. 0144 770274 / 298</p>
                <?php }?>
            </div>
             <?php if ($type == "Cultura") { ?>
            <div class="col-md-12">
				<p>
					Ufficio Cultura e Pubblica Istruzione</span>
				</p>
				<p>Tel. 0144 770272</p>
			</div>
            <?php }?>
            <div class="col-md-12">
				<small>Non si assumono responsabilità per eventuali modifiche ai
					programmi o per variazioni di data.</small>
			</div>


		</div>
	</div>

	<div class="col-md-12">
		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php printf(esc_html__('%s Navigation', 'the-events-calendar'), $events_label_singular); ?></h3>
        <?php tribe_the_prev_event_link('<i class="icofont-arrow-left"></i> Precedente') ?> |
        <?php tribe_the_next_event_link('Successivo <i class="icofont-arrow-right"></i> ') ?>

        </div>

</div>
<p style="visibility: hidden; display: none" lan="en">Events, Piedmont,
	Music, Festivals, Italy, Culture, Food, Wine, Bike, Nature</p>
<p style="visibility: hidden; display: none" lan="fr">Événements,
	Piémont, Musique, Festivals, Italie, Culture, Nourriture, Vin, Vélo,
	Nature</p>
<p style="visibility: hidden; display: none" lan="nl">Evenementen,
	Piemonte, Muziek, Festivals, Italië, Cultuur, Eten, Wijn, Fiets,
	Natuur</p>
<!-- #tribe-events-footer -->

</div>
<!-- #tribe-events-content -->
