
<?php
	/**
		* Sistema di allertamento per la gestione della messaggistica
		* Deve essere impostato nel file l'id della categoria al quale associare i post
	*/
?>
<script>
	$('<link/>', {
		rel:'stylesheet',
		type: 'text/css',
		href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/alertsystem.css'//css da includere
	}).appendTo('head');
	
</script> 

<div class="row w-100 fullpage mt-3 py-0 mx-0 px-0">
	<div class="col-md-12 mx-0 px-0">
		<?php
			
			global $post;
			$args = array( 'category' => 84 );
			
			$myposts = get_posts( $args );
			foreach ( $myposts as $post ) : setup_postdata( $post ); 
// 			echo '<!-- TEST POST';
// // 			print_r($post);
// 			echo '-->';
			
			$now=time();
			$data_da= date(strtotime(get_field('da')));
			$data_a= date(strtotime(get_field('a')));
			$show='block';
			
			// if ($now>$data_da && $now<$data_a){$show='block';}else{$show='none';}
			
			/*
				echo $data_da."<br>";
				echo $now."<br>";
				echo $data_a."<br>";
				echo $show."<br>";
			*/
			
		?>
		
		<div class="p-2 <?php the_field('livello')[0];?>" role="alert" style="display:<?= $show;?>">
			<div class="row py-1" style="padding-left:20%; padding-right:20%">
				
				<div class="col-md-12 p-1">
				<a href="<?= get_permalink();?>" title="Apre avviso allerta">
					<h1 class="alert-heading">
						<i class="icofont-warning"></i> <?php the_title(); ?>
					</h1></a>
					<?=_('Pubblicato da')?> : <?= ucwords(get_field('tipologia_ente'));?>
				</div>
				<div class="col-md-12 p-1">
				    <?php
				// 	echo substr(get_the_content(),0,100);
					?>
					<a href="<?= get_permalink();?>" title="Apre avviso allerta">
					<?php  
					    $abstract=get_field('abstract');
						if($abstract){
						$html=get_the_content();
						$start = 0;
						$end = strpos($html,'.',$start);
						$paragraph = substr($html, $start, $end-$start+1);
						echo $paragraph;
						}
						else{
						    $testo_abstract=get_field('testo_abstract');
						    if(!empty($testo_abstract)){
						        echo $testo_abstract;
						    }
						    else{
						    echo 'Consulta la pagina per maggiori informazioni.';
						    }
						}
				// 		echo '<!-- TEST POST';
				// 		print_r($html);
				// 		echo '-->';
						
						
					?>
				</a>
				</div>
			</div>
		</div>
		
		<?php endforeach; 
		wp_reset_postdata();?>
		
		
	</div>
</div>
