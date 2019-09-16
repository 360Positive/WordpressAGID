<?php
	/*
		* Template Name: Articolo Cycle
		* Template Post Type: post, product
	*/
	
get_header(); ?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php $mainimage="https://turismo.comuneacqui.it/wp-content/uploads/2019/06/cycle.jpg";?>
	<section id="articolo-dettaglio-testo">
		<style>
			section.topimage{
			background:url(<?php echo $mainimage;?>);
			min-height:350px;
			background-position: center;
			background-size: cover;
			padding-bottom:2%!important;
			margin-top:0px;
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
			
			.titoli{
			/* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#e6f0a3+0,d2e638+50,c3d825+51,dbf043+100&1+0,0+100;Green+Gloss+%232 */
			background: -moz-linear-gradient(left,  rgba(230,240,163,1) 0%, rgba(210,230,56,0.5) 50%, rgba(195,216,37,0.49) 51%, rgba(219,240,67,0) 100%); /* FF3.6-15 */
			background: -webkit-linear-gradient(left,  rgba(230,240,163,1) 0%,rgba(210,230,56,0.5) 50%,rgba(195,216,37,0.49) 51%,rgba(219,240,67,0) 100%); /* Chrome10-25,Safari5.1-6 */
			background: linear-gradient(to right,  rgba(230,240,163,1) 0%,rgba(210,230,56,0.5) 50%,rgba(195,216,37,0.49) 51%,rgba(219,240,67,0) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e6f0a3', endColorstr='#00dbf043',GradientType=1 ); /* IE6-9 */
			
			padding:2%;
			}
			
		</style>
		<?php $depli = get_field('brochure');?>
		<section class="entry-content thumbnail topimage">
			<img class="alignfull wp-post-image" alt="">
		</section>
		<br><br>
		<div class="container">
			<div class="row"> 
				<div class="col-md-12">
				    <div class="row">
						
						<div class="col-md-12">
						    
						   	<?php echo do_shortcode('[osm_map_v3 map_center="44.674269, 8.466723" 
								zoom="11" 
								width="100%"
								height="400px"
								file_list="'.get_field('gpx').'" 
							file_color_list="blue"]');?><br>
						
						</div>
					</div>
					<hr>
					<div class="row row-eq-height">
						<div class="col-md-6">
						    <div class="" style="background:#DCDCDC; padding:30px;">
								<h3 class="display-6"><?php the_field('titolo');?></h3>
								<h4><?php the_field('distanza');?> Km - 
									<a href="<?php echo the_field('gpx') ?>" target="_blank" ><img src="/wp-content/uploads/2019/06/gpx.png" width="40px"></a>
									<a href="<?php echo the_field('link_maps') ?>" target="_blank" ><img src="/wp-content/uploads/2019/06/myride.png" width="40px"></a>
								</h4> 
								<?php echo _('Naviga sulla mappa per visualizzare nel dettaglio il tracciato');?><br>
								<p class="lead"><?php the_field('cosa_vedere');?></p>
								<hr class="my-4"> 
								<div class="row align-items-center row-eq-height" style="text-align:center">
									<div class="col-md-4">
										
										<div class="alert alert-primary" role="alert">
											<strong><? echo _('Partenza');?></strong><hr><?php the_field('altitudine_partenza');?> m
										</div>
									</div>
									<div class="col-md-4">
										
										
										<div class="alert alert-primary" role="alert">
											<strong><? echo _('Altitudine');?></strong><hr><?php the_field('massima_altezza');?> m
										</div>
									</div>
									<div class="col-md-4">
										<div class="alert alert-primary" role="alert">
											<strong><? echo _('Dislivello');?></strong><hr><?php the_field('dislivello');?> m
										</div>
									</div>
									
									<?php 
										$sal=get_field('salite');
										$sal=explode(",",$sal);
										//$count=sizeof($sal); //numero di oggetti
										$html="";
										
										foreach($sal as $salita){
											$html.='<div class="col">
										
										<div style="background:#bee5eb" >
											<p><strong>'._('Salita').'</strong><br> '._('Livello').' '. $salita.'</p></div></div>';
										}
										
										echo $html;
									?>
								</div>
							</div>
							
						</div>
						<div class="col-md-6" >
							<?php if(get_field('immagine_tracciato')){?>
								<div class="row">
									
									<div class="col">
										<a href="<?php the_field('immagine_tracciato');?>" target="_blank">
											<img src="<?php the_field('immagine_tracciato');?>" width="100%">
										</a>
									</div>
									
								</div>
							<?php };?>
						</div>
						
					</div>
				<section class="entry-content contenuto">
						<?php //the_content(); ?>
						<div class="entry-links"><?php wp_link_pages(); ?></div>
					</section>
				</div>
				
			</div>
		</div>
	</section>
	
	<?php endwhile; endif; ?>
	
	
</article>


<?php get_footer(); ?>
