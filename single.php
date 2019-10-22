<?php
/*
    * Template Name: Articolo Base mod - single.php
    * Template Post Type: post, product
*/

get_header(); ?>
    <!--single.php -->
    <style>
        section.topimage {
            background: url(<?php echo the_field('big-image');?>);
            min-height: 350px;
            background-position: center;
            background-size: cover;
            padding-bottom: 0% !important;
            margin-top: -25px;
            margin-bottom: 0px;
        }

        .over {
            padding: 2%;
        }

        #sidebar:after {
            display: none;
        }

        .moreact {
            background: yellow;
            padding: 1%;
        }

        .breadcrumb {
            margin-top: 0px;
        }

        .icofont- * {
            font-size: 2em !important;
        }

    </style>
<?php if (the_field('trasparenza')) { ?>
    <section class="entry-content thumbnail topimage">
        <p class="dida"><?php the_post_thumbnail_caption() ?></p>
    </section>
<?php } ?>

<?php wppa_breadcrumb(); ?>
    <div class="container">
    <div class="row">

        <section id="content" role="main" class="container">

            <div class="row">
                <div class="col-md-12">

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php //get_template_part( 'entry' ); ?>
                        <h2><?php the_title(); ?></h2>
                        <hr>
                        <?php the_content(); ?>
                        <?php //if ( ! post_password_required() ) comments_template( '', true ); ?>
                    <?php endwhile; endif; ?>
                    <hr>

                    <?php if (the_field('trasparenza')) { ?>
                    <div class="row">
                        <div class="col-md-6">
                            <i class="icofont-telephone"></i><?php if (get_field('telefono')) {
                                echo the_field('telefono');
                            } ?><br>
                            <i class="icofont-email"></i><?php if (get_field('mail')) {
                                echo the_field('mail');
                            } ?>
                        </div>
                        <div class="col-md-6">
                            <i class="icofont-wall-clock"></i> <?php if (get_field('orari')) {
                                echo the_field('orari');
                            } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>

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
            var content=$('#content');
            $('a',content).each(function(key, value){
                var file=$(this).attr('href');
                // console.log(file)
                var ext = file.split('.').pop();
                switch(ext) {
                    case 'jpg':
                        typefile='icofont-file-image';
                        title="Apre un file immagine"
                        break;
                    case 'png':
                        typefile='icofont-file-image';
                        title="Apre un file immagine"
                        break;
                    case 'gif':
                        typefile='icofont-file-image';
                        title="Apre un file immagine";
                        break;
                    case 'doc':
                        typefile='icofont-file-document';
                        title="Apre un file documneto";
                        break;
                    case 'docx':
                        typefile='icofont-file-document';
                        title="Apre un file documneto";
                        break;
                    case 'xls':
                        typefile='icofont-file-excel';
                        title="Apre un file foglio di calcolo";
                        break;
                    case 'pdf':
                        typefile='icofont-file-pdf';
                        title="Apre un file pdf";
                        break;
                    default:
                        typefile='icofont-link';
                        title="Apre un link";
                        break;
                }
                $(this).before('<i class="'+typefile+'"></i>')
                $(this).attr({'title':title})
            })
        </script>

    </div>
<?php get_footer(); ?>