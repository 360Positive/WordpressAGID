<?php
/*Gestione lettura elenco bandi da portale dedicato del comune 
Scraping delle informazioni dal codice HTML della pagina
*/
?>
<style>
    div.container-fluid.bandi{
        background:#eeeeee;
        padding-bottom:2%;
        padding-top:2%;
    }
    
    h1.bandi{
        font-size: 2.5rem!important;
        color: black;
        padding: 15px;
        font-weight: 700!important;
    }
    
   div.col-md-3>div.servizi{
        border-radius:3px;
        background:white;
        padding:3%;
        margin:10px;
        -webkit-box-shadow: 1px 1px 5px 0px rgba(156,156,156,1);
        -moz-box-shadow: 1px 1px 5px 0px rgba(156,156,156,1);
        box-shadow: 1px 1px 5px 0px rgba(156,156,156,1);
        }
        
    a > h2.bandi{
        color:black!important;
		font-size: 1.2rem!important;
        padding: 17px;
        font-weight: 800!important;
    }
    
    tipo{
        color:red;
        text-transform: capitalize;
    }
    label{
        font-weight:700;
    }
    titolo{
        font-size:1.2rem!important;
    }
   
</style>

<div class="container bandi">

        <h1 class="bandi">Ultimi bandi, avvisi e concorsi</h1>
	<div class="col-md-12">
		<div class="row">
       
                
				<?php
            
                function sortByParam($a, $b)
                    {
//   print_r($a);
                        $termine='termin';
                        $a = $a[$termine];
                        $b = $b[$termine];
                    
                        if ($a == $b) return 0;
                        return ($a < $b) ? -1 : 1;
                    }
            
                
				global $post;
				$args = array( 'category' => 88 ); /*Categroria associata ai bandi*/
				$entries=[];
				
				$myposts = get_posts( $args );
				
				foreach ( $myposts as $post ) {
				    
				setup_postdata( $post ); 
				
				    $a=['title'=>get_the_title(),
                        'rif'=>get_field('riferimento'),
                        'tipo'=>get_field('tipologia'),
                        'termin'=>get_field('termine'),
                        'inizio'=>get_field('inizio'),
                        'excerpt'=>substr(get_the_content(), 0, 200),
                        'link'=> get_post_permalink()];
				    array_push($entries,$a);
				    
				    /*
				    echo the_title();
				    echo get_field('riferimento');
				    echo get_field('tipologia');
				    echo get_field('termine');
				    echo get_field('inizio');*/
				    
				wp_reset_postdata();    
				} 
		    	
		    	
			    usort($entries, 'sortByParam'); //Ordinamento bandi in base alla data di scadenza
			    
			    echo '<br>';
			    foreach($entries as $entry){
			?>
	
			<?php /*Struttura grafica dei record*/?>
			<div class="col-md-12">
			    
			        <p>
			        <label>rif:</label> <tipo><?=$entry['rif']?></tipo> 
			        <label>Tipologia:</label> <tipo><?=$entry['tipo']?></tipo> - <?=$entry['termin']?> - 
			        <a href="<?=$entry['link']?>" target="_blank"> <titolo> <?=$entry['title']?> </titolo></a><br>
<!--			        --><?//=$entry['excerpt']?>
			        </p><hr>
			    
			</div>
			<?php }?>
		
		</div>
	</div>
          <a href="<?= get_site_url();?>/bandi-avvisi-concorsi/" title="Bandi, avvisi e concorsi"><h2 class="bandi" style="text-align: right;">Tutti i bandi, avvisi e concorsi</h2></a>

</div>