<?php
	/**
		* Sistema di visualizzazione degli eventi
		* Deve essere impostato nel file l'id della categoria al quale associare i post
	*/
?>
<style>
    div.rosso{
	background:#ff704d;
	padding:1%;
	margin-bottom:0px;
	margin-top:10px;
    }
    div.arancio{
	background:#ff8533;
	padding:1%;
	margin-bottom:0px;
	margin-top:10px;
    }
    div.giallo{
	background:#ffdb4d;
	padding:1%;
	margin-bottom:0px;
	margin-top:10px;
    }
    h1.alert-heading, h1.alert-heading>i{
	    font-size:1.5rem!important;
    }
    .fullpge{
	    width:100%!important;   
    }
    
    .container.featuredevent{
        background:#30373d!important;
    }
    h4.card-title.featuredevent > a{
        font-size: 1.17em!important;
        font-weight: bold;
    }
    p.card-text.featuredevent{
            color: #5a6772!important;
    }
    div.head-card{
        border-radius: 5px 5px 0px 0px;
        background:#ffb300!important;
        min-height:50px;
        padding:5%;
		margin-top: 5%;
    }
    h1.featuredevent{
        font-size: 40px!important;
        color: white;
        padding: 15px;
        font-weight: 700!important;
    }
    
    a>h2.featuredevent{
        font-size: 1.2rem!important;
        color: white;
        padding: 17px;
        font-weight: 800!important;
    }
	
	
	.card .card-body {
    margin-bottom: -55px;
}
	
</style>
<div  class="dark">
<div class="container featuredevent">
    
        <h1 class="featuredevent">Eventi</h1>
	<div class="col-md-12">
		<div class="row">
            <?php
                
				global $post;
				$args = array( 'category' => 85 );
				
				$myposts = get_posts( $args );
			foreach ( $myposts as $post ) : setup_postdata( $post ); 
				
			?>
			<div class="col-md">
			    <div class="row">
			        
			        <div class="col-md-12">
			            <div class="col-md-12 head-card"><strong><?=get_field('categoria')?></strong><br> Da <?=get_field('da')?> a <?=get_field('a')?></div>
			            <div class="card">
                          <img class="card-img-top" src="<?= get_the_post_thumbnail_url()?>" alt="<?php the_title(); ?>" style="max-height:400px;min-height:180px;">
                            <div class="card-body">
                                <h4 class="card-title featuredevent"><a href="<?= get_permalink()?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
                                <p class="card-text featuredevent"><?echo substr(get_the_excerpt(), 0, 100). '...';?></p>
                            </div>
                        </div>
			        </div>
			    </div>
			</div>
			<?php endforeach; 
			wp_reset_postdata();?>
		</div>
	</div>
          <a href="https://turismo.comuneacqui.it/"><h2 class="featuredevent" style="text-align: right;">Tutti gli eventi</h2></a>
	</div>

</div>



