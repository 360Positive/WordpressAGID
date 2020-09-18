<?php
	/**
		* Sistema di blocchi amministrativi
		* Deve essere impostato nel file l'id della categoria al quale associare i post
	*/
?>
<script>
	$('<link/>', {
		rel: 'stylesheet',
		type: 'text/css',
		href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/amministrazione.css'//css da includere
	}).appendTo('head');
	
	
</script> 
<div class="light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
				<h1 class="amministrazione"><?= _('Dall\'amministrazione') ?></h1>
				<div class="card-deck ">
					<div class="row row-eq-height w-100">
						<?php
							/**
								* Estrazione degli articoli associati alle nuove notizie
							*/
							$pages=[];
							$ids= array(523, 538, 2762, 2494);
							
							//Carciamento delle pagine da visualizzare
							foreach ($ids as $page_id){
								array_push($pages,get_page( $page_id ));
							}
							
							foreach ($pages as $post) : setup_postdata($post);
						?>
						<div class="col-sm-12 col-md-3 col-lg-3 mb-3"><!-- wrap every 2 on sm-->
							<div class="card amministrazione text-center h-100">
								<img class="card-img-top " src="<?= get_the_post_thumbnail_url() ?>"
								alt="<?php the_title(); ?>" style="max-height:30rem" >
								<div class="card-body my-3">
									
									<h5 class="card-title ">
										<a href="<?= $post->guid; ?>"
										title="<?php the_title(); ?>">
											<?php the_title(); ?>
										</a>
									</h5>
								</div>
							</div>
						</div>
						<?php endforeach;
						?>
						<?php wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>
