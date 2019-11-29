
<?php
/**
 * Sistema di allertamento per la gestione della messaggistica
 * Deve essere impostato nel file l'id della categoria al quale associare i post
 */
?>
<style>
    div.rosso{
        background:#ff704d;
        padding:1%;
        margin-bottom:0px;
        margin-top:40px;
    }
    div.arancio{
        background:#ff8533;
        padding:1%;
        margin-bottom:0px;
        margin-top:25px;
    }
    div.giallo{
        background:#ffdb4d;
        padding:1%;
        margin-bottom:0px;
        margin-top:40px;
    }
    h1.alert-heading, h1.alert-heading>i{
        font-size:1.5rem!important;

    }
    .fullpge{
     width:100%!important;   
    }
    .alert{
        padding:3%!important;
        /*text-align:justify;*/
    }
</style>

 <div class="row fullpage">
       <div class="col-md-12">
            <?php
                
                    global $post;
                    $args = array( 'category' => 84 );
                    
                    $myposts = get_posts( $args );
                    foreach ( $myposts as $post ) : setup_postdata( $post ); 
                    
                    $now=time();
                    $data_da= date(strtotime(get_field('da')));
                    $data_a= date(strtotime(get_field('a')));
                    $show='none';
                    
                    if ($now>$data_da && $now<$data_a){$show='block';}else{$show='none';}
                    
                   /*
                    echo $data_da."<br>";
                    echo $now."<br>";
                    echo $data_a."<br>";
                    echo $show."<br>";
                     */
                    
                    ?>
                    	
                    	<div class="alert <?php the_field('livello')[0];?>" role="alert" style="display:<?= $show;?>">
                    	    <div class="row">
                    	        <div class="col-md-2"></div>
                    	        <div class="col-md-3">
                                    <h1 class="alert-heading">
                                    <i class="icofont-warning"></i> <?php the_title(); ?>
                                    </h1>
                                    <?=_('Pubblicato da')?> : <?= ucwords(get_field('tipologia'));?>
                    	        </div>
                    	        <div class="col-md-7">
                    	            <?php the_content('a');?>
                                </div>
                    	    </div>
                        </div>
                    <?php endforeach; 
                    wp_reset_postdata();?>
                
       </div>
   </div>
