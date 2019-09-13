<?php
	/**
		* Sistema di visualizzazione delle ultime notizie
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
    
    .container-fluid.lastnews{
        background:white!important;
    }
    
    h4.card-title.lastnews > a{
        font-size: 13px!important;
        font-weight: bold;
		color: #420101
    }
    p.card-text.lastnews{
		    margin-top:15px;
            color: #000000!important;

    }
    div.head-card{
        border-radius: 5px 5px 0px 0px;
        background:#ffb300!important;
        min-height:50px;
        padding:5%;
    }
    h1.lastnews{
        font-size: 2.5rem!important;
        color: black;
        padding: 15px;
        font-weight: 700!important;
    }
    
    a>h2.lastnews{
        font-size: 1.2rem!important;
        color: black;
        padding: 17px;
        font-weight: 800!important;

    }
	

	
	
	
	
</style>

<div class="container lastnews">

        <h1 class="lastnews"><?=_('Ultime notizie')?></h1>
	<div class="col-md-12">
		<div class="row">
            <?php
                
				global $post;
				$cat=86;
				
				$args = array( 'category' => $cat );
				$myposts = get_posts( $args );
				foreach ( $myposts as $post ) : setup_postdata( $post ); 
				
			?>
			
			<div class="col-md">
			    <div class="row">
			        
			        <div class="col-md-12">
			              <div class="card1">
                          <img class="card-img-top" src="<?= get_the_post_thumbnail_url()?>" alt="<?php the_title(); ?>" style="max-height:400px;min-height:250px;">
                            <div class="card-body">
                                <h2 class="card-title lastnews"><a href="<?= get_category_link($cat)?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                                <?= get_the_date();?>
                                <p class="card-text lastnews"><a href="<?= get_permalink()?>"><?echo substr(get_the_excerpt(), 0, 100). '...';?></a></p>
                            </div>
                        </div>
			        </div>
			    </div>
			</div>
			<?php endforeach; 
			wp_reset_postdata();?>
		</div>
	</div>
        <a href="<?= get_category_link($cat)?>" title="Tutte le notizie"><h2 class="lastnews" style="text-align: right;">Tutte le notizie</h2></a>
	</div>
