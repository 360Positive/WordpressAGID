<?php get_header();
include "360Moduli/Trasparenza/normativa.php";

$normativa = new Normativa('http://comune.acquiterme.al.it/sviluppo/wp-content/themes/design-italia-child/360Moduli/Trasparenza/servizi.xml');

?>
    <section id="content" role="main" class="container">
        <div class="container">

            <div class="row">
                <div class="col-sm-8">

                    <header class="header">
                        <h1 class="entry-title"><?php
                            if (is_day()) {
                                printf(__('Archivi giornalieri: %s', 'wppa'), get_the_time(get_option('date_format')));
                            } elseif (is_month()) {
                                printf(__('Archivi mensili: %s', 'wppa'), get_the_time('F Y'));
                            } elseif (is_year()) {
                                printf(__('Archivi annuali: %s', 'wppa'), get_the_time('Y'));
                            } else {
                                _e('Archivi', 'wppa');
                            }
                            ?></h1>
                    </header>
                    <?php
                    //Estrazione della normativa corrispondente.
                    $norme = $normativa->searchin($text = substr(get_the_archive_title(), 9), "title")[0]->norma;
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
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#elencoList').DataTable({
                                "iDisplayLength": 100,

                            });
                        });
                    </script>


                </div>
            </div>
            <div class="col-sm-3 offset-sm-1">
                <!--Da decidere cosa mettere-->
                <!--         --><?php //get_sidebar(); ?>
            </div>

        </div>


    </section>

<?php get_footer(); ?>