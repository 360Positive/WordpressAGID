<div class="col-md-12 p-2 ">
    <div  class="w-100 h-100 mx-1 mb-1 text-left align-middle ">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
            
            <?php if (!is_search()) get_template_part('entry-footer'); ?>
        <?php if (!is_search()) get_template_part('entry', 'meta'); ?>
        
        
         
        <?php if (is_singular()) {
            echo '<h1 class="entry-title">';
        } else {
            echo '<h4 class="entry-title" style="font-size:1.1rem;">';
        } 
        
        echo '<i class="icofont-square-right"></i> ';
        
        ?>
        
        <?php the_title(); ?>
        
        <?php if (is_singular()) {
            echo '</h1>';
        } else {
            echo '</h4>';
        } 
        echo '<div style="font-size:0.9rem;line-height:1rem;">';
        the_excerpt();
        echo '</div>';
        
        ?>
        
        <!--<?php edit_post_link(); ?>-->

        <?php if (is_singular()) {
            wppa_breadcrumb();
        } ?>

<!--    <?php get_template_part('entry', (is_archive() || is_search() ? 'summary' : 'content')); ?>-->
</a>
</div>
</div>