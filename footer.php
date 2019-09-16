<?php /*FOOTER FILE*/
?>
<div class="clear"></div>
</div>


<footer id="footer" class="it-footer" role="contentinfo">
    <div class="it-footer-main">
        <div class="container">
            <section>
                <div class="row clearfix">
                    <div class="col-sm-3">
                        <style>
                            .it-footer-main .it-brand-wrapper {padding-top:30px;}
                        </style>
                        <div class="it-brand-wrapper">
                            <a href="<?php echo esc_url(home_url('/')); ?>"
                               title="<?php echo esc_html(get_bloginfo('name')); ?>" rel="home">
                                <?php
                                $custom_logo_id = get_theme_mod('custom_logo');
                                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                                if (has_custom_logo()) {
                                    echo '<img class="icon" src="' . esc_url($logo[0]) . '" alt="' . esc_html(get_bloginfo('name')) . '">';
                                } else {
                                    echo '<img class="icon" src="' . get_template_directory_uri() . '/img/custom-logo.png' . '" alt="' . esc_html(get_bloginfo('name')) . '">';
                                } ?>
                                <div class="it-brand-text">
                                    <h2 class="no_toc"><?php echo esc_html(get_bloginfo('name')); ?></h2>
                                    <h3 class="no_toc d-none d-md-block"><?php bloginfo('description'); ?></h3>
                                    
                                </div>
                                </a>
                                <hr>
                        <button type="button" class="btn btn-outline-info  btn-block" sytle="text-aling:center!important; font-size:medium!important;"><a href="https://turismo.comuneacqui.it/contatti/"> <?php echo _('Contatti - Info');?></a></button>
                        <button type="button" class="btn btn-outline-warning  btn-block" sytle="text-aling:center!important; font-size:medium!important;"><a href="http://comune.acquiterme.al.it/index/noticia/imposta-di-soggiorno"> <?php echo _('Tassa di soggiorno');?></a></button>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <?php if (is_active_sidebar('footer-widget-area')) : ?>
                        <div class="row">
                            <div class="container-fluid widget-area">
                                <div class="row xoxo">
                                    <?php dynamic_sidebar('footer-widget-area'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </section>
            <?php endif; ?>
            <?php if (is_active_sidebar('footer-sub-widget-area')) : ?>
                <section class="py-4 border-white border-top">
                    <div class="row">
                        <div class="container-fluid widget-area">
                            <div class="row xoxo">
                                <?php dynamic_sidebar('footer-sub-widget-area'); ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

        </div>
    </div>
    <div class="it-footer-small-prints clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md copyright">
                    <!--<?php wp_nav_menu(array('theme_location' => 'menu-footer', 'container' => 'ul', 'menu_class' => 'nav')); ?> -->
                 <small>Comune di Acqui Terme - Piazza Levi, 12 - 15011 - Acqui Terme - AL - Italia.<br> P.IVA Comune 00430560060</small></div>
                <div class="col-md text-right copyright">
                    <small><?php echo sprintf(__('%1$s %2$s %3$s', 'wppa'), '&copy;', date('Y'), esc_html(get_bloginfo('name'))); ?></small>
                </div>

            </div>
        </div>
    </div>
</footer>


</div>
<?php wp_footer(); ?>


</body>
</html>