<?php
	/**
		* Sistema di visualizzazione degli eventi
		* Deve essere impostato nel file l'id della categoria al quale associare i post
	*/
?>
<script>
	$('<link/>', {
		rel: 'stylesheet',
		type: 'text/css',
		href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/featuredevents.css'//css da includere
	}).appendTo('head');
	
	
</script> 
<div class="dark">
    <div class="container events">
        <div class="row">
            <div class="col-md-12">
                <h1 class="events"><?= _("Eventi in evidenza")?></h1>
                <div class="card-deck">
					<div class="row row-eq-height w-100">
						<?php
							
							global $post;
							$cat=85;
							$args = array('category' => $cat,
							'numberposts' => 4);
							
							$myposts = get_posts($args);
							foreach ($myposts as $post) : setup_postdata($post);
							
						?>
						
                        <div class="col-sm-12 col-md-3 col-lg-3 mb-3"><!-- wrap every 2 on sm-->
							<div class="card mb-4 h-100">
								<div class="events card-header p-3 text-left">
									<h3 class="my-0 py-0"><?= get_field('categoria') ?></h3>
									<span class="my-0 py-0"> <?= str_ireplace('/','.',get_field('da')) ?>-<?= str_ireplace('/','.',get_field('a')) ?></span>
								</div>
								
								<div class="card-img-top " style="min-height:250px;background:url(<?= get_the_post_thumbnail_url() ?>); background-position:center; background-size:cover;"></div>
								
								<div class="events card-title pt-3 px-3 pb-0 mb-0 text-left">
									<h3>
										<a href="<?= get_permalink()?>" title="<?php the_title(); ?>">
											<?php the_title(); ?>
										</a>
									</h3>
								</div>
								
								<div class="events card-body p-3"> 
									<p><?= get_field('introduzione') ?></p>							
								</div>
								
							</div>
						</div>
						<?php endforeach;
						wp_reset_postdata(); ?>
					</div>
				</div>
				
				<a class="pull-right text-right" href="https://turismo.comuneacqui.it/events/" title="Apre sito esterno Turismo Comune di Acqui Terme"><h2 class="events">Tutti gli eventi</h2></a>
			</div>
		</div>
		
	</div>
</div>


