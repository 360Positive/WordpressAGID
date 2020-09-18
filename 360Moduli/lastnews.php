<?php
	/**
		* Sistema di visualizzazione delle ultime notizie
		* Deve essere impostato nel file l'id della categoria al quale associare i post
	*/
?>
<script>
	$('<link/>', {
		rel: 'stylesheet',
		type: 'text/css',
		href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/lastnews.css'//css da includere
	}).appendTo('head');
	
	
</script> 

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="lastnews"><?= _('Ultime notizie') ?></h1>
            <div class="card-deck">
				<div class="row row-eq-height w-100">
					<?php
						/**
							* Estrazione degli articoli associati alle nuove notizie
						*/
						global $post;
						$cat = 86;
						$args = array('category' => $cat,
						'numberposts' => 4,
						);
						$myposts = get_posts($args);
						foreach ($myposts as $post) : setup_postdata($post);
					?>
                    <div class="col-sm-12 col-md-3 col-lg-3 mb-3"><!-- wrap every 2 on sm-->
						<div class="card lastnews text-center h-100">
						    <!-- style=" width:364px; height:250px; min-height:250px;background:url(<?= get_the_post_thumbnail_url() ?>); background-position:center; background-size:cover;"	-->
							<div class="card-img-top " >
							    <img src="<?= get_the_post_thumbnail_url() ?>" width="100%" height="auto">
							</div>
							<div class="card-body ">
								<br><span class="categroy-card"><?php echo get_the_category_list( ', '); ?></span>
								<br><span class="text-muted date-card"><?= get_the_date(); ?></span>
								<h5 class="card-title align-middle my-3 ">
									<a href="<?= get_post_permalink() ?>"
									title="<?= get_the_title(); ?>" target="_blank">
										<?= get_the_title(); ?>
									</a>
								</h5>
							</div>
						</div>
					</div>
					<?php wp_reset_postdata(); ?>
					<?php endforeach; ?>
					
				</div>
			</div>
			
			<a href="<?= get_category_link($cat) ?>" class="pull-right" title="Apre sezione interna del sito con tutte le notizie">
				<h2 class="lastnews" style="text-align: right;">
				Tutte le notizie</h2></a>
		</div>
	</div>
</div>

