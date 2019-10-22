<?php get_header(); ?>
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
                    <table id="elenco" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Documentazione</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!--                                --><?php //get_template_part('entry'); ?>
                            <tr>
                                <td>
                                    <h3 class="big-heading">
                                        <a href="<?= get_post()->guid;?>" title="Apre pagina <?= get_the_title(); ?> ">
                                           <i class="icofont-link"></i> <?= get_the_title(); ?></a>
                                        <br><small class="text-muted"> Aggiornato:
                                            <?php
                                            $timestamp=strtotime(get_post()->post_modified);
                                            $modify=date('d/m/Y', $timestamp);
                                            ?>
                                            <?= $modify; ?></small>
                                    </h3>
                                    <?php
//                                    print_r(get_post());
//                                    foreach ( get_terms() as $record ){
//                                        print($record->description.'<br>');
//                                    } ?>

                                    <?php the_excerpt(); ?>
                                </td>
                        </tr>
                        <?php endwhile; endif; ?>
                       </tbody>
                    </table>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#elenco').DataTable();
                        } );
                    </script>


                    </div>
                    <?php get_template_part('nav', 'below'); ?>

                </div>
                <div class="col-sm-3 offset-sm-1">
                    <!--Da decidere cosa mettere-->
                    <!--         --><?php //get_sidebar(); ?>
                </div>

            </div>
        </div>
    </section>

<?php get_footer(); ?>