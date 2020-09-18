<?php
/**
 * Modulo per la condivisione dei social sviluppato utilizzando la libreria
 * jsSocial che deve essere inclusa nell'header del tema
 */
$links = get_post_permalink();
?>
<script type="text/javascript"
        src="<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/js/utils.js"></script>

<script>
    $local = '<?= get_site_url() ?>';
    $path_share = $local + "/wp-content/themes/design-italia-child/360Moduli/css/sharesocial.css";
    addHeader($path_share);
    $path_jsocial = $local + "/wp-content/themes/design-italia-child/360Moduli/jssocial/jssocials.css";
    addHeader($path_jsocial);
    $path_flat = $local + "/wp-content/themes/design-italia-child/360Moduli/jssocial/jssocials-theme-minima.css";
    addHeader($path_flat);
</script>

<?php /*---   Libreria pulsanti social   ----*/ ?>
<script src="<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/jssocial/jssocials.min.js"></script>
<?php /*---  END --- Libreria pulsanti social   ----*/ ?>


<div class="mb-3">
    <div  id="front" class="d-flex flex-row align-items-center ">
        <div class="icon-share p-2"><i class="icofont-share"></i></div>
        <div class="text-share p-2 w-100 text-center"><?= _('Condividi'); ?></div>
    </div>
    <div id="links" class="d-none flex-fill justify-content-start align-items-center ">
    </div>
</div>
<script>

    $('#links').hide();

    $(document).ready(function () {
        $('div#front').on('click', function () {

            $('#links').addClass('d-flex');
            $('#links').removeClass('d-none');

            $('#front').addClass('d-none');
            $('#front').removeClass('d-flex');
        });

        $('#exit').on('click', function () {

            $('#links').addClass('d-none');
            $('#links').removeClass('d-flex');

            $('#front').addClass('d-flex');
            $('#front').removeClass('d-none');
        });

    });

    jsSocials.shares.email.logo = "icofont-mail";
    jsSocials.shares.email.label = "";
    jsSocials.shares.twitter.logo = "icofont-twitter";
    jsSocials.shares.twitter.label = "";
    jsSocials.shares.facebook.logo = "icofont-facebook";
    jsSocials.shares.facebook.label = "";
    jsSocials.shares.whatsapp.logo = "icofont-whatsapp";
    jsSocials.shares.whatsapp.label = "";


    $("#links").jsSocials({
        shares: ["email", "twitter", "facebook", "whatsapp"],
        url: "<?= $links ?>",
        showLabel: false,
        showCount: false,
        shareIn: "popup"
    });

    $('.jssocials-shares').append(
        "<div id=\"exit\"class=\"icon-share jssocials-share \">" +
        "        <a class=\"jssocials-share-link\"><i class=\"icofont-ui-close\"></i></a>" +
        "    </div>"
    )

</script>
