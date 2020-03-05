<?php get_header();

include "360Moduli/Trasparenza/normativa.php";

$normativa = new Normativa('http://comune.acquiterme.al.it/sviluppo/wp-content/themes/design-italia-child/360Moduli/Trasparenza/servizi.xml');

?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.js"></script>
<style>
    h2.entry-title {
        background: lightgray;
        padding:1%;
        display:block!important;
        font-size:1.5rem!important;
    }
</style>
<!-- Archivio archivio.php -->
    <section id="content" role="main" class="container">
        <div class="container">

            <div class="row">
                <div class="col-sm-9">

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
                    <h2 class="entry-title"><?= substr(get_the_archive_title(), 9);?></h2>
                    <?php

                    //Estrazione della normativa corrispondente.
//                    print_r($normativa);
                    $norme = $normativa->searchin($text = str_replace("'",' ',substr(get_the_archive_title(), 9)), "title")[0]->norma;
                    foreach ($norme as $norma) {
                        echo '<div class="alert alert-primary" role="alert">';
                        echo $norma[0];
                        echo '</div>';

                    }
                    //                    echo ($normativa->searchin($text=substr(get_the_archive_title(),9),"title")[0]->norma[0]);

                    ?>
                    <table id="elencoList" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Documentazione</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <tr>
                                <td>
                                    <h3 class="big-heading">
                                        <a href="<?= get_post()->guid; ?>" title="Apre pagina <?= get_the_title(); ?> ">
                                            <i class="icofont-link"></i> <?= get_the_title(); ?></a>
                                        <br><small class="text-muted"> Aggiornato:
                                            <?php
                                            $timestamp = strtotime(get_post()->post_modified);
                                            $modify = date('d/m/Y', $timestamp);
                                            ?>
                                            <?= $modify; ?></small>
                                    </h3>
                                    <?php the_excerpt(); ?>
                                </td>
                            </tr>
                        <?php endwhile; endif; ?>
                        </tbody>
                    </table>



                </div>
            </div>
            <div class="col-sm-3 ">

            </div>

        </div>


    </section>
    <script type="text/javascript">

        jQuery.noConflict();
        $(document).ready(function () {
            $.noConflict();
            $("#elencoList").DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Italian.json"
                },
                "pageLength": -1
            });
        });
    </script>
<?php get_footer(); ?>