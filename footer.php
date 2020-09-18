</div>
<?php /*
 Personalizzazione del footer
 */
//['nomelink','link',1 interno -0 esterno]

$menu2 = [
    ['Accesso civico', "/amm-trasparente/accesso-civico/", 1],
    ['Amministrazione trasparente', '/amministrazione-trasparente/', 1],
    ['Albo Pretorio', 'http://93.62.191.250/cmsacquiterme/portale/albopretorio/albopretorioconsultazione.aspx?IDNODE=2112', 0],
    ['Whistleblowing', '/amm-trasparente/whistleblowing', 1],
	['Privacy','https://privacy.nelcomune.it/comune.acquiterme.al.it']
];

$menu3 = [
    ['Sportello unico attività produttive', "http://www.impresainungiorno.gov.it/web/guest/comune?codCatastale=A052", 0],
    ['Centrale unica di committenza', '/cuc/', 1],
    ['Ufficio relazioni pubblico', '/ufficio-relazioni-con-il-pubblico-urp', 1]
];
$list_point="icofont-arrow-right"
?>


<footer id="footer" class="it-footer mt-5">
    <div class="it-footer-main mb-4 pb-4">
        <div class="container py-2">
            <div class="row">
                <div class="col-sm-3">
                    <div class="mt-4 mb-3">
                        <?php
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                        $logo_alt = "logo-" . esc_html(get_bloginfo('name'));

                        if (has_custom_logo()) {
                            /*---   Impostazione del logo FISSO - Problema di cropping bassa risoluzione   ----*/
                            $path = "http://comune.acquiterme.al.it/wp-content/uploads/2019/09/logo_acqui_terme_-2.png";
                        } else {
                            $path = get_template_directory_uri() . '/img/custom-logo.png';
                        }
                        ?>
                        <img class="icon" style="width:100%; height:auto; min-width:300px;" src="<?= $path ?>" alt="<?= $logo_alt ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <h2 class="footer"><?= __("Contatti"); ?></h2>

                    <i class="icofont-bank-alt"></i> Piazza Levi, 12 - 15011 - Acqui Terme - AL - Italia<br>
                    <i class="icofont-ui-dial-phone"></i> Centralino <a href="tel:+3901447701">+39 01447701</a><br>
                    <i class="icofont-ui-contact-list"></i> <a href="/rubrica/">Tutti i contatti</a><br>
                </div>
                <div class="col-sm-4">
                    <h2 class="footer"><?= __("Trasparenza")?></h2>

                    <?php foreach ($menu2 as $entry_menu2) {
                        ?>
                        <i class="<?= $list_point ?>"></i>
                        <a target="_blank"
                           title="<?= _('Apre la pagina' . $entry_menu2[0]) ?>"
                           href="<?= $entry_menu2[2] == 1 ? get_site_url() . $entry_menu2[1] : $entry_menu2[1] ?>"> <?= _($entry_menu2[0]) ?> </a>
                        <br>
                        <?php
                    } ?>

                </div>
                <div class="col-sm-4">
                    <h2 class="footer"><?= __("Sportelli");?></h2>

                    <?php foreach ($menu3 as $entry_menu3) {
                        ?>
                        <i class="<?= $list_point ?>"></i>
                        <a target="_blank"
                           title="<?= _('Apre la pagina' . $entry_menu3[0]) ?>"
                           href="<?= $entry_menu3[2] == 1 ? get_site_url() . $entry_menu3[1] : $entry_menu3[1] ?>"> <?= _($entry_menu3[0]) ?> </a>
                        <br>
                        <?php
                    } ?>
                </div>
                <!--<div class="col-sm-2">-->
                <!--                        <h2 class="footer">Seguici su</h2>-->
                <!--                        <hr>-->
                <!--                        <i class="icofont-linkedin social"></i>-->
                <!--                        <i class="icofont-instagram social"></i>-->
                <!--                        <i class="icofont-brand-youtube social"></i>-->
                <!--                        <i class="icofont-twitter social"></i>-->
                <!--                        <i class="icofont-facebook social"></i>-->
                <!--</div>-->

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
                    <strong><i class="icofont-mail"></i> PEC:</strong>
                    <a title="<?= _('Apre indrizzo di posta certificata') ?>"
                       href="mailto:acqui.terme@cert.ruparpiemonte.it">acqui.terme@cert.ruparpiemonte.it</a><br>
                    <a title="<?= _('Apre la pagina interna Mappa del sito') ?>"
                       href="<?= get_site_url() ?>/sitemap"> <?= _('Mappa del sito') ?> </a>-
                    <a title="<?= _('Apre la pagina interna Accessibilità') ?>"
                       href="<?= get_site_url() ?>/accessibilita"> <?= _('Accessibilità') ?> </a>-
                    <a title=" <?= _('Apre la pagina sul sito esterno della Privacy e dei cookie') ?>" target="_blank"
                       href="https://privacy.nelcomune.it/comune.acquiterme.al.it">  <?= _('Privacy e cookie') ?> </a>-
                    <?php
                    // _('Note Legali')
                    ?>
                    <a title="<?= _('Apre la pagina interna Social media policy') ?>"
                       href="<?= get_site_url() ?>/social-media-policy"> <?= _('Social media policy') ?> </a>-

                    <span>P.IVA 00430560060 - Fatturazione Elettronica: UFBD6F</span>
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