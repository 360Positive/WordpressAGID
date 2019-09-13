<?php
	/**
		* Sistema di visualizzazione slider
		* Deve essere impostato nel file l'id della categoria al quale associare i post
	*/
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<style>
    .row.rowBack{
	background:#eeeeee;  
    }
    
    .col-12.leftSlide , .col-12.rightSlide{
    	min-height:400px!important;
        }
    .immagine{
        min-height:500px!important;
    }
    
    .leftSlide {
	min-height:fit-content;
	padding:50px;
	
    }
	
    p.slidecontent{
	padding-right:5%;
	padding-left:5%;
    }
    
    .leftSlide{
	background:#eeeeee;
	
    }
    .rightSlide > img{
	background-position:center!important;
	background-size:cover!important;
	background-repeat:no-repeat!important;
        
    }
    
    .rightSlide {
	background:whites; 
        
    }
	
	
	@media only screen and (max-width: 800px) {
    	.col-12.leftSlide , .col-12.rightSlide{
    	min-height:300px;
        }
        .immagine{
            min-height: auto!important;
    }
	}
	
	.carousel-indicators a{
    border: 3px solid #8e001c;
    border-radius: 100%;
    
    height: 1em;
    margin: .4em;
    width: 1em;
	}
	
    .carousel-indicators  a.active{
    border: 3px solid #8e001c;
    border-radius: 100%;
    background:#8e001c;
    height: 1em;
    margin: .4em;
    width: 1em;
}

span[class^="icofont-"]{
    color:#8e001c;
    height: 1em;
    margin: .4em;
    width: 1em;
}
.vl {
  border-left: 2px solid grey;
}

.carousel-indicators {
    justify-content: right;
    padding-left: 3%!important;
    
</style>
<?php
	/*estrazione dei post associati alla categoria*/
	
	global $post;
	$cat=87; /*Id categoria da visualizzare*/
	$i=0;
	
	
	$args = array( 'category' => $cat );
	$myposts = get_posts( $args );
	
	$elements=count($myposts); /*numero di elementi presenti*/
	
?>

<div class="container" style="margin-bottom:20px">

		<div id="sliderInd" class="carousel slide" data-ride="carousel">
			<div class="carousel-indicators">
				<a data-target="#sliderInd" data-slide-to="0" class="active"></a>
				<?php for($e=1; $e<$elements; $e++){?>
					<a data-target="#sliderInd" data-slide-to="<?= $e?>"></a>
				<?php } ?>
				<div class="vl"></div>
			    <div id="carouselButtons">
                    <button id="playButton" type="button" class="btn btn-default btn-xs">
                        <span class="icofont-ui-play"></span>
                     </button>
                    <button id="pauseButton" type="button" class="btn btn-default btn-xs">
                        <span class="icofont-ui-pause"></span>
                    </button>
                </div>
			</div>
		
    		<div class="carousel-inner">
    			
    			<?php
                    foreach ( $myposts as $post ) : setup_postdata( $post ); 
    				
    			?> 
    			<div class="carousel-item <?= $i==0 ?'active':''; ?>">
                    <div class="row rowBack h-100">
                        <div class="col-12 col-lg-6 leftSlide d-block w-50 h-100">
    						<p class="slidecontent"> <?php get_the_category(); ?><hr><?php the_title(); ?><br>
    							<a href="<?= get_permalink()?>" title="<?php the_title(); ?>"><?echo substr(get_the_content(), 0, 400).'...'?> </a>
    						</p>
    					</div>
                        <div class="col-12 col-lg-6 rightSlide d-block w-50 h-100" >
                            <img class="d-block w-100 immagine" src="<?= get_the_post_thumbnail_url()?>" >
    					</div>
    				</div>
    			</div>
                
                <?php
    				$i+=1;
    				endforeach; 
    			wp_reset_postdata();?>
    		</div>
    		
    		<a class="carousel-control-prev" href="#sliderInd" role="button" data-slide="prev">
    			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    			<span class="sr-only"><?= _('Previous')?></span>
    		</a>
    		<a class="carousel-control-next" href="#sliderInd" role="button" data-slide="next">
    			<span class="carousel-control-next-icon" aria-hidden="true"></span>
    			<span class="sr-only"><?= _('Next')?></span>
    		</a>
    	
    </div>
</div>
<script>
    $('#playButton').click(function () {
    $('#sliderInd').carousel('cycle');
});
$('#pauseButton').click(function () {
    $('#sliderInd').carousel('pause');
});
</script>