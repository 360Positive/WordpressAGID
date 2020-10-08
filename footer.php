</div>
<?php /*Richiamato parametri di configurazione generali del portale e le variabili di ambiente	*/
include 'configuration/layout.php';
?>
<footer id="footer" class="it-footer mt-5">
    <div class="it-footer-main mb-4 pb-4">
        <div class="container py-2">
            <div class="row">
                <div class="col-sm-3">
                    <div class="mt-4 mb-3">
                        <?php

                        //Definizione del logo
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                        $logo_alt = "logo-" . esc_html(get_bloginfo('name'));

                        if (has_custom_logo()) {
                            //Impostazione del logo FISSO - Problema di cropping bassa risoluzione
                            $path = $logo;
                        } else {
                            //Il logo specificato deve essere indicato con il percorso della cartella wp-content
                            $path = $footer_logo;
                        }
                        ?>
                        <img class="icon" style="width:100%; height:auto; min-width:300px;" src="<?= $path ?>"
                             alt="<?= $logo_alt ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <?php //I dati sono presi dal file di configurazione?>
                    <h2 class="footer"><?= __("Contatti"); ?></h2>
                    <?php if (!empty($layout[indirizzo])): ?>
                        <i class="icofont-bank-alt"></i> <?= $layout[indirizzo] ?><br>
                    <?php endif ?>
                    <?php if (!empty($layout[telprincipale])): ?>
                        <i class="icofont-ui-dial-phone"></i> Centralino <a
                                href="tel:<?= $layout[telprincipale] ?>"><?= $layout[telprincipale] ?></a><br>
                    <?php endif ?>
                    <?php if (!empty($footer_rubrica)): ?>
                        <i class="icofont-ui-contact-list"></i> <a href="<?php $footer_rubrica ?>">Tutti i contatti</a>
                        <br>
                    <?php endif ?>

                </div>


                <div class="col-sm-4">
                    <h2 class="footer"><?= __("Trasparenza") ?></h2>
                    <?php foreach ($footer_menu2 as $entry_menu2) {
                        ?>
                        <i class="<?= $footer_list_point ?>"></i>
                        <a target="_blank"
                           title="<?= _('Apre la pagina' . $entry_menu2[0]) ?>"
                           href="<?= $entry_menu2[2] == 1 ? get_site_url() . $entry_menu2[1] : $entry_menu2[1] ?>"> <?= _($entry_menu2[0]) ?> </a>
                        <br>
                        <?php
                    } ?>

                </div>
                <div class="col-sm-4">
                    <h2 class="footer"><?= __("Sportelli"); ?></h2>

                    <?php foreach ($footer_menu3 as $entry_menu3) {
                        ?>
                        <i class="<?= $footer_list_point ?>"></i>
                        <a target="_blank"
                           title="<?= _('Apre la pagina' . $entry_menu3[0]) ?>"
                           href="<?= $entry_menu3[2] == 1 ? get_site_url() . $entry_menu3[1] : $entry_menu3[1] ?>"> <?= _($entry_menu3[0]) ?> </a>
                        <br>
                        <?php
                    } ?>
                </div>
                <?php if ($footer_social[active]): ?>
                    <div class="col-sm-2">
                        <h2 class="footer">Seguici su</h2>

                        <?php
                        foreach ($footer_social as $sx=>$social):
                            if ($social[active]): ?>
                                <em class="icofont-<?= $social[name] ?> social text-capitalize">
                                    <a href="<?= $social[link] ?>"><?= $social[name] ?></a>
                                </em>
                            <?php
                            endif;
                        endforeach;
                        ?>

                    </div>
                <?php endif ?>

                <div class="col-sm-7">
                    <?php if (is_active_sidebar('footer-widget-area')) : ?>
                        <div class="row">
                            <div class="container-fluid widget-area">
                                <div class="row">
                                    <?php dynamic_sidebar('footer-widget-area'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>


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
    <div class="w-100">

        <div class="container-fluid pt-2">

            <div class="row" style="padding-bottom:1rem;!important; word-wrap: break-word;">
                <div class="col-md-12 text-center">

                    <?php if (!empty($layout[pec])): ?>
                        <strong><i class="icofont-mail"></i> PEC:</strong>
                        <a title="<?= _('Apre indrizzo di posta certificata') ?>"
                           href="mailto:<?= $layout[pec] ?>"><?= $layout[pec] ?></a><br>
                    <?php endif ?>

                    <a title="<?= _('Apre la pagina interna Mappa del sito') ?>"
                       href="<?= get_site_url() ?>/sitemap"> <?= _('Mappa del sito') ?> </a>

                    <?php if (!empty($footer_accessibilita)): ?>
                        <a title="<?= _('Apre la pagina interna Accessibilità') ?>"
                           href="<?= get_site_url().$footer_accessibilita ?>"><?= _('Accessibilità') ?> </a>
                    <?php endif ?>

                    <?php if (!empty($footer_privacy)): ?>
                        <a title=" <?= _('Apre la pagina sul sito esterno della Privacy e dei cookie') ?>" target="_blank"
                           href="<?= get_site_url().$footer_privacy ?>"><?= _('Privacy e cookie') ?> </a>
                    <?php endif ?>

                    <?php
                    // _('Note Legali')
                    ?>

                    <?php if (!empty($footer_socialmedia)): ?>
                        <a title=" <?= _('Apre la pagina interna Social media policy') ?>" target="_blank"
                           href="<?= get_site_url().$footer_socialmedia ?>"><?= _('Social media policy') ?> </a>
                    <?php endif ?>

                    <span><?=$footer_partitaiva?></span>
                    <br>
                    <?php echo sprintf(__('%1$s %2$s %3$s', 'wppa'), '&copy;', date('Y'), esc_html(get_bloginfo('name'))); ?>
                    - Sviluppato da <a href="https://360positive.it"><strong>360 Positive</strong></a>
                </div>
            </div>
        </div>
    </div>
</footer>


<?php wp_footer(); ?>

<?php /*Scroll pulsante per la naviagazione in top*/ ?>
<script>
    $('<link/>', {
        rel: 'stylesheet',
        type: 'text/css',
        href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/footer.css'//css da includere
    }).appendTo('head');


</script>


<div id="back-to-top" title="Torna all'inizio del contenuto.">
    <i class="icofont-rounded-up" title="up"></i></div>

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

<script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<script>
    /*Ottimizzazioni caricamento
    var testo=$('.breadcrumb-item > a:text').each(
    function(e){
    })
    */

    let mainstyle = $('style#mainstyle');
    $('style').not('#mainstyle').each(function (index) {
        //console.log(this);
        mainstyle.append(this.innerHTML);
        this.remove();
    });


</script>

</body>

</html>