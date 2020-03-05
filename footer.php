<div class="clear"></div>
</div>

<footer id="footer" class="it-footer" role="contentinfo">
    <div class="it-footer-main">
        <div class="container">
            <section>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="it-brand-wrapper">
                            <a href="<?php echo esc_url(home_url('/')); ?>"
                               title="<?php echo esc_html(get_bloginfo('name')); ?>" rel="home">
                                <?php
                                $custom_logo_id = get_theme_mod('custom_logo');
                                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

                                if (has_custom_logo()) {
                                    /*---   Impostazione del logo FISSO - Problema di cropping bassa risoluzione   ----*/
                                    $path = "http://comune.acquiterme.al.it/sviluppo/wp-content/uploads/2019/09/logo_acqui_terme_-2.png";
                                    echo '<img src="' . $path . '" alt="logo-comune-acqui" >';
                                    // echo '<img src="' . esc_url($logo[0]) . '" alt="' . esc_html(get_bloginfo('name')) . '">';
                                } else {
                                    echo '<img class="icon" src="' . get_template_directory_uri() . '/img/custom-logo.png' . '" alt="logo-comune-acqui' . esc_html(get_bloginfo('name')) . '">';
                                } ?>

                                <?php /*<div class="it-brand-text">
                                        <h2 class="no_toc"><?php echo esc_html(get_bloginfo('name')); ?></h2>
                                        <h3 class="no_toc d-none d-md-block"><?php bloginfo('description'); ?></h3>
                                        
                                    </div>*/ ?>


                            </a>


                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <h2 class="footer">Contatti</h2>
                        <hr>
                        <i class="icofont-bank-alt"></i> Piazza Levi, 12 - 15011 - Acqui Terme - AL - Italia.<br>
                        <i class="icofont-ui-dial-phone"></i> Centralino 01447701<br>
                        <i class="icofont-ui-contact-list"></i> Tutti i contatti
                    </div>
                    <div class="col-sm-3">
                        <h2 class="footer">Trasparenza</h2>
                        <hr>
                        <ul>
                            <li>

                                <a title="<?= _('Apre la pagina interna Accesso civico') ?>"
                                   href="<?= get_site_url() ?>/amm-trasparente/accesso-civico/"> <?= _('Accesso civico') ?> </a>

                            </li>
                            <li>
                                <a title="<?= _('Apre la pagina interna Amministrazione trasparente') ?>"
                                   href="<?= get_site_url() ?>/amministrazione-trasparente"> <?= _('Amministrazione trasparente') ?> </a>

                            </li>
<!--                            <li>-->
<!--                                Whistleblowing-->
<!--                            </li>-->
                            <li>

                                <a title="<?= _('Apre la pagina interna Open data') ?>"
                                   href="<?= get_site_url() ?>/open-data"> <?= _('Open data') ?> </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <h2 class="footer">Sportelli</h2>
                        <hr>
                        <ul>
                            <li class="sportelli">
                                <a target="_blank"
                                   title="<?= _('Apre la pagina esterna Sportello unico attività produttive') ?>"
                                   href="http://www.impresainungiorno.gov.it/web/guest/comune?codCatastale=A052"> <?= _('Sportello unico attività produttive') ?> </a>
                            </li>
                            <li class="sportelli">Sportello unico edilizia</li>
                            <li class="sportelli">
                                <a target="_blank"
                                   title="<?= _('Apre la pagina esterna Centrale unica di committenza') ?>"
                                   href="https://appalti-acquese.maggiolicloud.it/PortaleAppalti/it/homepage.wp"> <?= _('Centrale unica di committenza') ?> </a>
                            </li>
                            <li class="sportelli">
                                <a target="_blank"
                                   title="<?= _('Apre la pagina interna Ufficio relazioni pubblico') ?>"
                                   href="<?= get_site_url() ?>/ufficio-relazioni-con-il-pubblico-urp"> <?= _('Ufficio relazioni pubblico') ?> </a>

                            </li>

                        </ul>
                    </div>
                    <div class="col-sm-3">
<!--                        <h2 class="footer">Seguici su</h2>-->
<!--                        <hr>-->
<!--                        <i class="icofont-linkedin social"></i>-->
<!--                        <i class="icofont-instagram social"></i>-->
<!--                        <i class="icofont-brand-youtube social"></i>-->
<!--                        <i class="icofont-twitter social"></i>-->
<!--                        <i class="icofont-facebook social"></i>-->
                    </div>

                    <div class="col-sm-7">
                        <?php if (is_active_sidebar('footer-widget-area')) : ?>
                        <div class="row">
                            <div class="container-fluid widget-area">
                                <div class="row">
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
                            <div class="row ">
                                <?php dynamic_sidebar('footer-sub-widget-area'); ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

        </div>
    </div>
    <div class="">
        <hr>
        <div class="container-fluid">

            <div class="row" style="padding-bottom:1rem;!important;">
                <div class=".col-md-4">
                    <a title="<?= _('Apre la pagina interna Mappa del sito') ?>"
                       href="<?= get_site_url() ?>/sitemap"> <?= _('Mappa del sito') ?> </a>-
                    <a title="<?= _('Apre la pagina interna Accessibilità') ?>"
                       href="<?= get_site_url() ?>/accessibilita"> <?= _('Accessibilità') ?> </a>-
                    <a title=" <?= _('Apre la pagina sul sito esterno della Privacy e dei cookie') ?>" target="_blank"
                       href="https://privacy.nelcomune.it/comune.acquiterme.al.it">  <?= _('Privacy e cookie') ?> </a>-
                    <?= _('Note Legali') ?> -
                    <a title="<?= _('Apre la pagina interna Social media policy') ?>"
                       href="<?= get_site_url() ?>/social-media-policy"> <?= _('Social media policy') ?> </a>-

                    <small>P.IVA 00430560060 </small>

                    <?php echo sprintf(__('%1$s %2$s %3$s', 'wppa'), '&copy;', date('Y'), esc_html(get_bloginfo('name'))); ?> </small>
                </div>
            </div>
        </div>
    </div>
</footer>


</div>
<?php wp_footer(); ?>
<style>
    <?php /*Stile pagina*/ ?>

    .it-footer-main {
        color: white !important;
        background: #30373d !important;
    }


    .haswithe {
    }

    .it-footer-main .it-brand-wrapper {
        padding-top: 30px;
    }

    h2.footer {
        font-size: 1.5rem !important;
        letter-spacing: .007em !important;
        padding-bottom: 0.8rem !important;
        padding-top: 20px;

    }


    li.sportelli > small.text-muted {
        display: none;
    }

    li.sportelli:hover > small.text-muted {
        display: block;
    }

    i[class^="icofont-"].social.footer {
        display: inline-block;
        border-radius: 60px;
        padding: 0.4em;
        background: white;
        color: #420101 !important;
        float: none;
        margin-right: 10px;
</style>

<?php /*Scroll pulsante per la naviagazione in top*/ ?>
<a href="#" id="back-to-top" title="Torna all'inizio del contenuto."><i
            class="icofont-rounded-up" title="up"></i></a>
<style>

    #back-to-top {
        position: fixed;
        bottom: 40px;
        right: 40px;
        z-index: 9999;
        width: 3em;
        height: 3em;
        text-align: center;
        line-height: 3em;

        background: #ffb401;
        color: #444;
        cursor: pointer;
        border: 0;
        border-radius: 2px;
        text-decoration: none;
        transition: opacity 0.2s ease-out;
        opacity: 0;

    }

    #back-to-top:hover {
        background: #e9ebec;
    }

    #back-to-top.show {
        opacity: 1;
    }

    #back-to-top > i {
        font-size: 1.25em !important;
    }
</style>
<script>
    if ($('#back-to-top').length) {
        var scrollTrigger = 100, // px
            backToTop = function () {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('#back-to-top').addClass('show');
                } else {
                    $('#back-to-top').removeClass('show');
                }
            };
        backToTop();
        $(window).on('scroll', function () {
            backToTop();
        });
        $('#back-to-top').on('click', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 700);
        });
    }
</script>
<script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>