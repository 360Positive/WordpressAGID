<?php
/**
 * Visualizzazione a lista degli eventi |Modificato 2019
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list.php
 *
 * @package TribeEventsCalendar
 *
 */

?>
 <style>
		section.topimage{
		background:url("https://turismo.comuneacqui.it/wp-content/uploads/2019/04/acquieventibanner.jpg");
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
		.events-archive .entry-content, .events-archive .entry-header {
    width: 100%!important;
}
.entry-title {

    display: none!important;

}
#post-0 {

    padding-top: 0px !important;
    margin-top: -4.1% !important;

}

#content {

    background-color: #fff;
    padding-top: 0px!important;
    padding-bottom: 0px!important;

}
		
	</style>
	<section class="entry-content thumbnail topimage">
	</section>
	
<?php    
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
