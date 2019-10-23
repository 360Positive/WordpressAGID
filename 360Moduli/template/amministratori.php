<?php
/*
 * Template per la gestione della grafica degli amministratori
 * 360Moduli/template/amministratori.php
*/
?>
<?php
$cognome=get_field('cognome');
$nome =get_field('nome');
?>

    <div class="container">
    <div class="row">

        <section id="content" role="main" class="container">


            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h1 class="display-4"><?= $cognome ?>  <?= $nome ?></h1>
                        <h2>
                           <?php if (get_field('deleghe')){
                               echo __('Deleghe: ');
                               foreach (get_field('deleghe') as $delega){
//                                   print_r($delega);
                                   echo $delega['delega'];
                               }
                           } ?>
                        </h2>

                        <h2>
                            <?php if (get_field('tipologia')){
                                echo get_field('giunta');
                                echo get_field('consiglieri');
                            } ?>
                        </h2>

                        <p class="lead">
                            <?php if(get_field('in_carica')==1) {
                                echo __('Nominato il: ').get_field('data_nomina');
                            }
                            else{
                                echo __('Dimissionario dal: ').get_field('data_dimissioni');
                            }?>
                        </p>
                        <hr class="my-4">

                        <h3>Documentazione</h3>
                        <?php
                        $curruculum=get_field('curriculum');
                         if (get_field('deleghe')){
                            echo __('Deleghe: ');
                            foreach (get_field('deleghe') as $delega){
//                                   print_r($delega);
                                echo $delega['delega'];
                            }
                        } ?>
                        <a href="<?=$curruculum?>" title="Apre curriculum di <?= $cognome ?>  <?= $nome ?>">Curriculum</a>
                    </div>


                    <?= get_field('nome'); ?>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                        <?php the_content(); ?>
                        <?php //if ( ! post_password_required() ) comments_template( '', true ); ?>
                    <?php endwhile; endif; ?>
                    <hr>


                <div class="col-md-3 offset-md-1">
                    <?php //get_sidebar(); ?>
                </div>
             </div>
    </section>

        <script type="text/javascript">
            /**
             * Script per l'inserimento delle icone dei collegamenti ai file esterni ed interni della pagina
             * @type {jQuery|HTMLElement}
             */
            $(window).on('load', function(){
                var content = $('#content');
                $('a', content).each(function (key, value) {
                    var file = $(this).attr('href');
                    // console.log(file)
                    var ext = file.split('.').pop();
                    switch (ext) {
                        case 'jpg':
                            typefile = 'icofont-file-image';
                            title = "Apre un file immagine"
                            break;
                        case 'png':
                            typefile = 'icofont-file-image';
                            title = "Apre un file immagine"
                            break;
                        case 'gif':
                            typefile = 'icofont-file-image';
                            title = "Apre un file immagine";
                            break;
                        case 'doc':
                            typefile = 'icofont-file-document';
                            title = "Apre un file documneto";
                            break;
                        case 'docx':
                            typefile = 'icofont-file-document';
                            title = "Apre un file documneto";
                            break;
                        case 'xls':
                            typefile = 'icofont-file-excel';
                            title = "Apre un file foglio di calcolo";
                            break;
                        case 'pdf':
                            typefile = 'icofont-file-pdf';
                            title = "Apre un file pdf";
                            break;
                        default:
                            typefile = 'icofont-link';
                            title = "Apre un link";
                            break;
                    }

                    $(this).before('<i class="' + typefile + '"></i>')
                    var hastitle = $(this).attr('title');
                    console.log(hastitle);

                    if (!hastitle) {
                        $(this).attr({'title': title});
                    }
                })
            })
        </script>

    </div>
<?php get_footer(); ?>