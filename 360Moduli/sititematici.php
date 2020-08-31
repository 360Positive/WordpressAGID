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
<style>
     h1.sititematici {
    font-size: 2rem!important;
    padding: 15px;
    font-weight: 700!important;
    color:black;
    }
    
	
	
a > h2.sititematici {
        font-size: 1.2rem !important;
      
        padding: 17px;
        font-weight: 800 !important;
    }
    
    div.sito{
        background:white!important;
    }
    .card.siti {
        box-shadow: 1px 1px 5px 0px rgba(156, 156, 156, 1);
        display: block!important;
        width: auto!important;
        height: fit-content;
    }
</style>
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
							$immagine=urlencode($voce['immagine']);
							$titolo=addslashes($voce['titolo']);
							$url=urlencode($voce['url']);
						?>
						
                        <div class="align-center col-md-2 col-lg-2 my-3 ">
                            
                            <div class="card siti text-center h-100" width="90%">
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


