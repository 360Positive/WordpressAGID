<?php
	/**
		* Sistema di visualizzazione dei siti tematici caricati nella pagina
	*/
	
	$voci_siti=get_field('voci_siti_tematici');
?>
<script>
	$('<link/>', {
		rel: 'stylesheet',
		type: 'text/css',
		href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/sititematici.css'//css da includere
	}).appendTo('head');
	
	
</script> 

<div class="light">
    <div class="container sititematici">
        <div class="row py-3">
            <div class="col-md-12">
                <h1 class="sititematici"><?= _("Siti Tematici")?></h1>
               <div class="card-deck">
					<div class="row row-eq-height w-100">
						<?php
							
							foreach ($voci_siti as $voce){
							    if(!$voce['nascondi']){
							$immagine=$voce['immagine'];
							$titolo=addslashes(str_replace('\"','',$voce['titolo']));
							$url=urlencode($voce['url']);
						?>
						
                        <div class="align-center col-md-2 col-lg-2 my-3 ">
                            
                            <div class="card siti text-center h-100 w-90">
								<img class="card-img-top " src="<?= $immagine?>"
								alt="Immagine <?= $titolo ?>" style="max-height:30rem" >
								<div class="card-body py-3 " style="padding-bottom: 2%!important;">
									
									<h5 class="card-title ">
										<a href="<?= $url ?>"
										title="Apre sito <?= $titolo?>">
											<?= $titolo ?>
										</a>
									</h5>
								</div>
						
							</div>
                            
                            
       <!--                     <div class="card sito p-2 ">-->
						 <!--<a href="<?= $url ?>">-->
						 <!--    <img class="card-top w-100 h-auto" src="<?= $immagine ?>">-->
						 <!--<div class="card-body"><h2 class="text-center py-2"></h2></a>-->
						 <!--</div>-->
						 <!--</div>-->
						</div>
						<?php }
						};
						?>
					
				</div>
				</div>
				
				
			</div>
		</div>
		
	</div>
</div>


