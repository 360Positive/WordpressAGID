<?php
/**
 * Modulo per la condivisione dei social sviluppato utilizzando la libreria
 * jsSocial che deve essere inclusa nell'header del tema
 */
$links=get_post_permalink();
?>
<style>
    .share-menu > div, .share-menu > div >i{
        font-size: 1.5rem!important;
        padding:2%;
        cursor: pointer;
    }
    .icon-share{
        background:red;
        color: #fff!important;
        background-color: #8e001c!important;
        vertical-align: middle;
        text-align:center;
    }
    .testo-share{
        background:lightgrey;
        color: #8e001c!important;
        padding-left: 1em;
        padding-right: 1em;
        font-weight: 400!important;
        font-size: 2rem!important;
    }

    div.jssocials-share > a {
        background: #420301 !important;
        font-size: 25.5px!important;
    }

    .jssocials-share {
        display: inline-block;
        vertical-align: top;
        margin: 0.1em 0.2em 0.1em 0;
    }

    .share-menu > div, .share-menu > div >i {
        font-size: 1.5rem!important;
        padding: 2%;
        width: 100%;
        cursor: pointer;}


</style>

<div id="front" class="row share-menu">
    <div class="col-md-2 icon-share">
        <i class="icofont-share align-middle icon-share"></i>
    </div>
    <div class="col-md-6 testo-share">
        <?= _('Condividi');?>
    </div>
</div>


<div id="links" class="row share-menu">
    <div id="links-social" class="col-md-12">

    </div>

</div>
<script>

    $('#links').hide();

    $(document).ready(function () {
        $('#front').on('click', function () {
            $('#links').show();
            $('#front').hide();
        });
        $('#exit').on('click', function () {
            $('#links').hide();
            $('#front').show();
        });

    });

    jsSocials.shares.email.logo="icofont-mail";
    jsSocials.shares.email.label="";
    jsSocials.shares.twitter.logo="icofont-twitter";
    jsSocials.shares.twitter.label="";
    jsSocials.shares.facebook.logo="icofont-facebook";
    jsSocials.shares.facebook.label="";
    jsSocials.shares.whatsapp.logo="icofont-whatsapp";
    jsSocials.shares.whatsapp.label="";




    $("#links-social").jsSocials({
        shares: ["email", "twitter", "facebook", "whatsapp"],
        url: "<?= $links ?>",
        showLabel: true,
        showCount: true,
        shareIn: "popup"
    });

    $('.jssocials-shares').append(
        "<div id=\"exit\"class=\"icon-share jssocials-share \">\n" +
        "        <a class=\"jssocials-share-link\"><i class=\"icofont-ui-close\"></i></a>\n" +
        "    </div>"
    )

</script>
    