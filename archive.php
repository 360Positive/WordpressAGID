<?php get_header();

include "360Moduli/Trasparenza/normativa.php";

$normativa = new Normativa('http://comune.acquiterme.al.it/sviluppo/wp-content/themes/design-italia-child/360Moduli/Trasparenza/servizi.xml');

?>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>   
<script type="text/javascript">
	$('<link/>', {
		rel: 'stylesheet',
		type: 'text/css',
		href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/wp/archive.css'//css da includere
	}).appendTo('head');
	
</script> 

<!-- Archivio archivio.php -->
<?php pa360_breadcrumb(); ?>
    <section id="content" role="main" class="container">
        <div class="container">

            <div class="row">
                <div class="col-sm-9 pr-4">

                    <header class="header">
<!--                        <h1>--><?php
//                            if (is_day()) {
//                                printf(__('Archivi giornalieri: %s', 'wppa'), get_the_time(get_option('date_format')));
//                            } elseif (is_month()) {
//                                printf(__('Archivi mensili: %s', 'wppa'), get_the_time('F Y'));
//                            } elseif (is_year()) {
//                                printf(__('Archivi annuali: %s', 'wppa'), get_the_time('Y'));
//                            } else {
//                                _e('Archivi', 'wppa');
//                            }
//                            ?><!--</h1>-->
                    </header>
                    <h1 class="entry-title"><?= substr(get_the_archive_title(), 9);?></h1>
                    <?php

                    //Estrazione della normativa corrispondente.
                    $text = str_replace("'", ' ', substr(get_the_archive_title(), 9));
                    $subsect = $normativa->searchin($text, "title")[0];
                    if(!empty($subsect->subsect)){$subsect=$subsect->subsect;}

                    $norme = $subsect->norma;
                    $links = $subsect->links->link;

                    ?>
                    <script> console.log("<?= print_r($normativa);?>");</script>
                    <?php
                    echo '<br>';
                    echo '<h3 style="font-variant: small-caps;letter-spacing: 1px; font-size: 1.5rem">Riferimenti normativi</h3><hr>';
                    foreach ($norme as $norma) {
                        echo $norma[0];
                        echo '<br>';
                    }
                    echo '<br>';
                    echo '<h3 style="font-variant: small-caps;letter-spacing: 1px; font-size: 1.5rem">Documenti</h3><hr>';
                    echo '<p class="text-justify">Nella tabella sottostante potrete trovare la documentazione suddivisa per pagine. 
Oltre che la ricerca nel sito è possibile effettaure la ricerca localmente utilizzando lo spazio <strong>"Cerca"</strong> sottostante, il quale effettuerà un filtro sui contenuti della sezioen aperta.</p>';

                    ?>

                    <div class="row pt-3">
                        <p><?= !empty($links) ? __("Nella sezione seguente potrete trovare i collegamenti ai portali istituzionali di riferimento.",'360positive') :'';?></p>
                        <?php foreach ($links as $voci) {
                            echo '<div class="col-md-6 alert alert-link" role="alert"><a href="' . $voci->dest . '">';
                            echo strtoupper($voci->title);
                            echo ' </a></div> ';


                        }
                        ?>
                    </div>

                    <table id="elencoList" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th calss="text-center">Documenti e pagine allegate</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <tr>
                                <td>
                                    <h3 class="big-heading">
                                        <a href="<?= get_post()->guid; ?>" title="Apre pagina <?= get_the_title(); ?> " target="_blank">
                                            <i class="icofont-link"></i> <?= get_the_title(); ?></a>
											
                                        </h3>
                                    <?php the_excerpt(); ?>
                                </td>
                            </tr>
                        <?php endwhile; endif; ?>
                        </tbody>
                    </table>
<br><br>
<p class="text-justify">I dati personali pubblicati sono riutilizzabili solo alle condizioni previste dalla normativa vigente sul riuso dei dati pubblici (direttiva comunitaria 2003/98/CE e d. lgs. 36/2006 di recepimento della stessa), in termini compatibili con gli scopi per i quali sono stati raccolti e registrati, e nel rispetto della normativa in materia di protezione dei dati personali. Per ulteriori informazioni consulta il sito del <strong><a href="http://www.garanteprivacy.it/web/guest/home/docweb/-/docweb-display/docweb/3134436" target="_blank">Garante per la protezione dei dati personali.</a></strong>
     </p>

                </div>
            
            <div class="col-sm-3 ">
                <?php echo do_shortcode('[at-head-collapse]') ?>
      </div>
</div>
        </div>


    </section>
    <script type="text/javascript">

       
            $.noConflict();
			jQuery.noConflict();
			
            $("#elencoList").DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Italian.json"
                },
                "pageLength": -1
            });
       
    </script>
<?php get_footer(); ?>