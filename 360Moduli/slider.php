<?php
	/**
		* Sistema di visualizzazione slider
		* Deve essere impostato nel file l'id della categoria al quale associare i post
	*/
?>

<script>
	$('<link/>', {
		rel: 'stylesheet',
		type: 'text/css',
		href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/slider.css'//css da includere
	}).appendTo('head');
	
	
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>-->

<?php
	/*estrazione dei post associati alla categoria*/
	
	global $post;
	$cat = 87; /*Id categoria da visualizzare*/
	$i = 0;
	
	
	$args = array('category' => $cat,
				 'orderby'=> 'date',
                 'order' => 'ASC');
	$myposts = get_posts($args);
	$elements = count($myposts); /*numero di elementi presenti*/
	
?>

<div class="container" style="margin-bottom:20px">
	<div id="sliderInd" class="carousel slide" data-ride="carousel">
        
		<div class="carousel-inner">
			
            <?php
				foreach ($myposts as $post) : setup_postdata($post);
				
			?>
			<div class="carousel-item <?= $i == 0 ? 'active' : ''; ?>">
				<div class="row rowBack h-100 align-middle">
					<div class="col-12 col-lg-6 leftSlide d-block w-50 h-100">
						<h1 class="titleslider py-2 px-2 my-1 mx-1 "
						style="background:#ffb401!important"> <?= get_the_title(); ?></h1>
						<hr>
						<p class="slidecontent text-justify py-2 px-2 my-1 mx-1"
						>
							<?php get_the_category(); ?>
							<?
							echo substr(strip_tags(html_entity_decode(get_the_content(), ENT_QUOTES, "UTF-8")), 0, 100) . ' ...' ?>
						</p>
						<hr>
						<a class="btn btn-block btn-outline" style="color:black;" href="<?= $post->guid; ?>" title="<?= get_the_title(); ?>">
							<strong class="leggi" style="font-size:1.5rem"><?= __('Leggi'); ?></strong>
						</a><br>
						<!-- <strong> <?= _('Aggiornamento: '); ?></strong>
							<?= the_modified_time('d F Y'); ?>
						-->
						
					</div>
					<div class="col-12 col-md-6 rightSlide d-block w-50 h-100 ">
						<img alt="Immagine - <?= get_the_title(); ?>" class="d-block immagine w-100 my-auto"
						src="<?= get_the_post_thumbnail_url() ?>">
					</div>
				</div>
			</div>
			
			<?php
                $i += 1;
				wp_reset_postdata(); 
				endforeach;
			?>
		</div>
		<a class="carousel-control-prev" href="#sliderInd" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only"><?= _('Previous') ?></span>
		</a>
		<a class="carousel-control-next" href="#sliderInd" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only"><?= _('Next') ?></span>
		</a>
		
		<div class="row">
			<div class="col-md-6">
				<div class="carousel-indicators text-center">
					
					<a data-target="#sliderInd" data-slide-to="0" class="active"></a>
					<?php for ($e = 1; $e < $elements; $e++) { ?>
						<a data-target="#sliderInd" data-slide-to="<?= $e ?>"></a>
					<?php } ?>
					
					<div id="carouselButtons">
						<button id="playButton" type="button" class="btn btn-default btn-xs" value="play" title="play">
							<i class="icofont-ui-play"> </i>
							<span class="d-none">Play</span>
						</button>
						<button id="pauseButton" type="button" class="btn btn-default btn-xs" value="pause" title="pause">
							<i class="icofont-ui-pause"> </i>
							<span class="d-none">Pause</span>
						</button>
					</div>
				</div>
			</div>
			<div class="col-md-6">
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
	$.fn.carousel.Constructor.TRANSITION_DURATION = 10000  // 10 seconds
	});
	
	$('#playButton').click(function () {
$('#sliderInd').carousel('cycle');
});
$('#pauseButton').click(function () {
	$('#sliderInd').carousel('pause');
});
</script>