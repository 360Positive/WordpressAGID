<?php
/**
 * Template name: Guide
 * Template Post Type: post, page
 **/
get_header(); ?>
<style>
    .label.label-orange{
        text-align: center;
    background: #ffcc99!important;
    padding: 5px;
    padding-right: 50px;
    padding-left: 50px;
    font-weight: 700;
    vertical-align: middle;
    }
    
    #container{
        /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#fff4e5+0,fff4e5+100&1+0,0+100 */
background: -moz-linear-gradient(top, rgba(255,244,229,1) 0%, rgba(255,244,229,0) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, rgba(255,244,229,1) 0%,rgba(255,244,229,0) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, rgba(255,244,229,1) 0%,rgba(255,244,229,0) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fff4e5', endColorstr='#00fff4e5',GradientType=0 ); /* IE6-9 */
    }
</style>

    
    <section id="content" role="main" class="container home-content">

        <div class="container template">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="header"></header>
                    <section class="entry-content">
                        <?php // if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                        <?php //if (!is_search()) get_template_part('entry-footer'); ?>
                        <?php //if (!is_search()) get_template_part('entry', 'meta'); ?>
                        <h4 class="entry-title"><a href="<?php the_permalink(); ?>"
                                                   title="<?php the_title_attribute(); ?>" rel="bookmark">

                                <?php the_title(); ?></a></h4>


                        <!-- contenuto template ristorazione -->


                        <div class="row">
                            <div class="col-md-4">
                                <div id="gallery">
                                    

                                           
                                                <?php
                                                $nophoto = "https://turismo.comuneacqui.it/wp-content/uploads/2019/04/no-foto-turismo-acqui-terme.jpg";
                                                
                                                if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	                                            
	                                            $hasimage=get_the_post_thumbnail_url(get_the_ID(),'full'); 
	                                            
                                                //echo $hasimage;
                                                
                                                echo '<a href="';
                                                echo $hasimage;
                                                echo '" class="gal_link">';
                                                
                                                echo '<img src="';
                                                echo $hasimage;
                                                echo '"/>';
                                                echo '</a>';
                                                
                                                
                                                }
                                                
                                                else{
                                                    echo '<a href="'. $nophoto .'" class="gal_link">';
                                                       echo '<img src="' . $nophoto . '">';
                                                       echo '</a>';
                                                    
                                                }
                                               
                                                
                                                ?>
                                           

                                   
                                </div>

                            </div>
                            <div class="col-md-8">
                                <?php if (get_field('presentazione')) {

                                    echo '<i class="icofont icofont-book-mark" ></i>' . get_field('presentazione');

                                } ?>
                                
                            </div>
                            <div class="col-md-8" >
                                <?php
                                if (get_field('lingue')) {
                                   
                                    echo "<span class='label label-orange'>"._("Lingue parlate:")."</span>";
                                    echo "<span style='margin-left:20px'>";
                                    foreach (get_field('lingue') as $lang) {
                                        echo '<i class="flag-icon flag-icon-'.$lang.' flag-icon-squared" style="width: 30px; height:30px; vertical-align: middle;"></i>  ';
                                    }
                                     echo "</span>";
                                }
                                ?>
                               
                            </div>
                        </div>
                        <div class="row row-eq-heigh">

                            <!-- Prima colonna -->
                            <div class="col-md-4">
                                <hr>
                                <div class="row ">
                                    <!-- Primo blocco-->
                                    
                                    <div class="col-md-12">
                                        
                                        <?php if (get_field('mail')) {


                                            echo '<a href="mailto:' . get_field('mail') . '">';
                                            echo '<i class="fas fa-at"></i> ' . get_field('mail');
                                            echo '</a>';

                                        } ?>
                                    </div>
                                    <div class="col-md-12">
                                        <?php if (get_field('web')) {


                                            echo '<a href="' . get_field('web') . '">';
                                            echo '<i class="fas fa-globe-europe"></i>  ' . get_field('web');
                                            echo '</a>';

                                        } ?>
                                        
                                    </div>

                                    <!-- Colonna recapiti -->


                                    <div class="col-md-12">

                                        <?php if (get_field('telefono')) {

                                            echo '<a href="tel:' . get_field('telefono') . '">';
                                            echo '<i class="fas fa-phone"></i> ' . get_field('telefono');
                                            echo ' <small>' . _('Chiama') . '</small></a>';

                                        } ?>
                                    </div>
                                    <div class="col-md-12">
                                        <?php if (get_field('cellulare')) {


                                            echo '<a href="tel:' . get_field('cellulare') . '">';
                                            echo '<i class="fas fa-mobile-alt"></i> ' . get_field('cellulare');
                                            echo ' <small>' . _('Chiama') . '</small></a>';
                                        } ?>
                                    </div>
                                    <div class="col-md-12">
                                        <?php if (get_field('whatsapp')) {

                                            echo '<a href="https://api.whatsapp.com/send?phone=' . get_field('whatsapp') . '">';
                                            echo '<i class="fab fa-whatsapp"></i> ' . get_field('whatsapp');
                                            echo ' <small>' . _('Messaggia') . '</small></a>';

                                        } ?>
                                    </div>
                                    <div class="col-md-12">
                                        <?php if (get_field('fax')) {

                                            echo '<i class="fas fa-fax"></i> ' . get_field('fax');

                                        } ?></div>


                                    <!-- Colonna fisco -->

                                    


                                </div>
                                
                            </div><div class="col-md-8">
                                        <?php if (get_field('specializzazione')) {

                                            echo '<h3><i class="icofont-institution"></i> '.__("Specializzazione: ").'</h3>'. get_field('specializzazione');

                                        } ?></div>
                            
                        </div>


                        <!-- end contenuto template ospitalità -->


                        <?php the_content(); ?>
                        <div class="entry-links"><?php wp_link_pages(); ?></div>
                    </section>
                </article>
                <?php // if ( ! post_password_required() ) comments_template( '', true ); ?>
            <?php endwhile; endif; ?>

        </div>
        <script>
            (function ($) {

                $(document).ready(function () {

                    var galLink = $("a.gal_link");

                    galLink.lightbox();

                });

            })(jQuery);
        </script>
    </section>

    <section class="home-widget">
        <div class="container">

            <?php if (is_active_sidebar('home-widget-area')) : ?>
                <div class="widget-area">
                    <div class="row xoxo">
                        <?php dynamic_sidebar('home-widget-area'); ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </section>



   


<?php //get_sidebar(); ?>
<?php get_footer(); ?>