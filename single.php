<?php get_header(); ?>
 <style>
		section.topimage{
		background:url(<?php echo the_field('big-image');?>);
		min-height:350px;
		background-position: center;
		background-size: cover;
		padding-bottom:0%!important;
		margin-top: -25px;
		margin-bottom:0px;
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
		.breadcrumb{
		    margin-top:0px;
		}
		
	</style>
	<section class="entry-content thumbnail topimage">
		<p class="dida"><?php the_post_thumbnail_caption() ?></p>
		
	</section>
	<?php wppa_breadcrumb(); ?>
   <div class="container">
      <div class="row">
          
<section id="content" role="main" class="container">
   

      <div class="col-md-12">
           
		   <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		   <?php //get_template_part( 'entry' ); ?>
		   <?php the_content(); ?>
		   <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
		   <?php endwhile; endif; ?>
	   </div>
	   <!--
      <div class="col-md-4 offset-md-1">
         <?php get_sidebar(); ?>
      </div>
      -->
      
      </div>
   </div>

   <!-- <footer class="footer">
      <?php get_template_part( 'nav', 'below-single' ); ?>
   </footer> -->

</section>
</div>
<?php get_footer(); ?>