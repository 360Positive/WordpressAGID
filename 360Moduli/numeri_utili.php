<?php
/**
 * Sistema di visualizzazione dei siti tematici caricati nella pagina
 */
$cartella = 'numeri/';
$path = get_site_url() . '/wp-content/themes/design-italia-child/360Moduli/images/' . $cartella;
$numeri = [
    ['numeri 1.png', '/numeri-supporto-psicologico', 'Supporto psicologico', 1],
    ['numeri 2.png', '/numero-di-pubblica-utilita', 'Numero Emergenza' ,1],
    ['numeri 3.png', '/numeri-utili-covid', 'Numeri Regionali' ,1],

];


?>
<script>
    $('<link/>', {
        rel: 'stylesheet',
        type: 'text/css',
        href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/numeri_utili.css'//css da includere
    }).appendTo('head');

</script>

<div class="light">
    <div class="container sititematici">
        <div class="row py-3">
            <div class="col-md-12">
                <div class="card-deck">
                    <div class="row row-eq-height w-100">
                        <?php

                        foreach ($numeri as $voce){
                        $immagine = $voce[0];
                        $url = urlencode($voce[1]);
                        $titolo = $voce[2];
                        $type = $voce[3];
                        ?>

                        <div class="align-center col-md-4 my-3 ">

                            <div class="card siti text-center h-100" width="90%">
                                <a href="<?= $type==1 ? get_site_url().$url : $url ?>"><img class="card-img-top " src="<?= urlencode($path.$immagine) ?>"
                                     alt="Immagine <?= addslashes($titolo) ?>" style="max-height:30rem"></a>

                            </div>

                        </div>

                        <?php           };
                        ?>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>