<?php
	/*
		* Template Name: Articolo Bike
		* Template Post Type: post, product
	*/
	
get_header(); ?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<section id="articolo-dettaglio-testo">
		<style>
			section.topimage{
			background:url(<?php echo the_field('big-image');?>);
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
			
			<p class="dida"></p>
		</section>
		<div class="container">
			<div class="row"> 
				<div class="col-md-12">
					
					
					
					
					<div class="row">
						
						<div class="col-md-6">
							<a href="<?php the_field('immagine_tracciato');?>" target="_blank"><img src="<?php the_field('immagine_tracciato');?>" width="100%"></a>
							<div class="row">
							    <?php if(get_field('kml')){?>
						    <div class="col-md-6"><a href="<?php the_field('kml');?>" target="_blank"><img src="/wp-content/uploads/2019/07/kml.png" width="60px"></a></div>
						    <?php }
						    if(get_field('gpx')){?>
						    <div class="col-md-6"><a href="<?php the_field('gpx');?>" target="_blank"><img src="/wp-content/uploads/2019/06/gpx.png" width="60px"></a></div>
						    <?php }?>
						    </div>
						</div>
						<div class="col-md-6">
						    <div class="jumbotron">
								<h3 class="display-6"><?php the_field('titolo');?></h3>
								<h4><?php the_field('distanza');?> Km</h4>
								<p class="lead"><?php the_field('cosa_vedere');?></p>
								<a href="<?php echo $depli['pdf_ita'];?>" target="_blank"><img src="https://turismo.comuneacqui.it/wp-content/uploads/2019/06/pdf-icon-e1560948254969.png"> Opuscolo ITALIANO</a><br>
								<a href="<?php echo $depli['pdf_en'];?>" target="_blank"><img src="https://turismo.comuneacqui.it/wp-content/uploads/2019/06/pdf-icon-e1560948254969.png"> Opuscolo INGLESE</a>
								<hr class="my-4">
								
							</div>
							
						</div>
						<div class="col-md-12" style="margin-top:30px;">
						    <div class="row align-items-center row-eq-height" style="text-align:center">
							<div class="col-md-4 row-eq-height">
								
								<div class="alert alert-primary" role="alert">
									<strong><? echo _('Partenza');?></strong><hr><?php the_field('altitudine_partenza');?> m
								</div>
							</div>
							<div class="col-md-4 row-eq-height">
								
								
								<div class="alert alert-primary" role="alert">
									<strong><? echo _('Altitudine');?></strong><hr><?php the_field('massima_altezza');?> m
								</div>
							</div>
							<div class="col-md-4 row-eq-height">
								
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
										$html.='<div class="col-md alert alert-info" role="alert" ><p style="margin-left:50px"><strong>'._('Salita').'</strong> '._('Livello').' '. $salita.'</p></div>';
									}
									
									echo $html;
								?>
							</div>
						</div>
						
						<div class="col-md">
						    <h4 class="titoli"><?php echo _("Partner");?></h4><hr>
						    <?php the_field('ristori');?>
						</div>
						<div class="col-md">
						    <h4 class="titoli"><?php echo _("Degustare");?></h4><hr>
						    <?php the_field('degustare');?>
						</div>
						<div class="col-md-12" role="alert">
						    <div class="row" style="text-align:center">
						        
						        <div class="col-md-6">
						            <h4 class="titoli"><?php echo _("Brochure ITALIANO");?></h4><hr>
						            <a href="<?php echo $depli['ita-lato1'];?>" target="_blank"><img src="<?php echo $depli['ita-lato1'];?>" width="100%"></a>
								    <a href="<?php echo $depli['ita-lato2'];?>" target="_blank"><img src="<?php echo $depli['ita-lato2'];?>" width="100%"></a>
								</div>
						        <div class="col-md-6">
						            <h4 class="titoli"><?php echo _("Brochure INGLESE");?></h4><hr>
						            <a href="<?php echo $depli['en-lato1'];?>" target="_blank"><img src="<?php echo $depli['en-lato1'];?>" width="100%"></a>
								<a href="<?php echo $depli['en-lato2'];?>" target="_blank"><img src="<?php echo $depli['en-lato2'];?>" width="100%"></a></div>
							</div>
						    
							
							
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
