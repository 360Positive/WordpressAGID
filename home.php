<?php
/**
 * Template name: Pagina home
 *
 **/
get_header(); ?>

    <div class="container">
<?php //Inclusione modulo per la gestione dei bandi
include '360Moduli/main.php';
?>
<?php
//Inclusione modulo per la gestione degli alert
include '360Moduli/alertsystem.php';
?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="header">
                        <?php // if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                        <?php if (!is_search()) get_template_part('entry-footer'); ?>
                        <?php if (!is_search()) get_template_part('entry', 'meta'); ?>
                        <h4 class="entry-title"><a href="<?php the_permalink(); ?>"
                                                   title="<?php the_title_attribute(); ?>"
                                                   rel="bookmark"><?php the_title(); ?></a></h4>
                    </header>
                    <section class="entry-content">
                        <?php edit_post_link(); ?>
                        <?php the_content(); ?>


                        <div class="entry-links"><?php wp_link_pages(); ?></div>
                    </section>
                </article>

                <?php // if ( ! post_password_required() ) comments_template( '', true ); ?>
            <?php endwhile; endif; ?>

        </div>


<?php //Inclusione modulo per la gestione dei slider
include '360Moduli/slider.php'; ?>
<?php //Inclusione modulo per la gestione ultime notizie
include '360Moduli/lastnews.php'; ?>
<?php //Inclusione modulo per la gestione dei servizi
include '360Moduli/servizi.php'; ?>
<?php //Inclusione modulo per la struttura del blocco ammisitrativo
include '360Moduli/amministrazione.php';
?>
<?php //Inclusione modulo per la gestione degli alert
include '360Moduli/featuredevents.php'; ?>
<?php //Inclusione modulo per la gestione dei bandi
include '360Moduli/bandi.php'; ?>

<?php get_footer(); ?>