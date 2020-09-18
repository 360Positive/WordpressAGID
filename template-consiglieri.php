<?php
	/*
		* Template Name: Consiglieri - template-consiglieri.php
		* Template Post Type:post,page
	*/
require_once '360Moduli/XML/localfunc.php';
require_once '360Moduli/php_utils/utils.php';
	
get_header(); ?>
<script type="text/javascript">
	$('<link/>', {
		rel: 'stylesheet',
		type: 'text/css',
		href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/templates/consiglieri.css'//css da includere
	}).appendTo('head');
	
	
</script> 
<!--<section class="entry-content thumbnail topimage" style="background: url(<?php echo the_field('big-image');?>);">
    <p class=""><?php the_post_thumbnail_caption() ?></p>
</section> -->

<?php pa360_breadcrumb(); ?>
<section id="content" role="main" class="container">
    <div class="row">
        <div class="col-sm-9 ">
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php the_content(); ?>			
			
            <?php
				/**
					* Legge il repeater presente nella pagina che gestisce i dati
				*/
				$sidemenu = get_field('menusidebar');
				$consiglieri = get_field('consiglieri');
				if (!empty($consiglieri)) {
					foreach ($consiglieri
					
					as $post) {
					?>
					<div class="row">
						<div class="col-md-3 text-left">
							<img class="text-center mx-auto" style="max-width:200px!important" src="<?= $post['foto'] ?>"
							alt="<?= $post['nome_cognome'] ?>" width="100%!important;">
						</div>
						<div class="col-md-9">
							<h5 class="text-left intestazione"><?= $post['nome_cognome'] ?><small>
								<?= !$post['candidato_sindaco'] ? '' : "Candidato sindaco"; ?>
							</small></h5>
							<p class="text-justify">
								<?= $post['data_nascita'] ?>
								<?= $post['luogo_nascita'] ?><br>
								
								<strong>Data elezione: </strong> <?= $post['data_elezione'] ?>
								<strong>Data nomina: </strong><?= $post['data_nomina'] ?><br>
								
								<?= !empty($post['partito']) ? "<strong>Partito: </strong>".$post['partito']."<br>" : ""?>
								<?= !empty($post['liste_civiche']) ? "<strong>Liste civiche: </strong>".$post['liste_civiche'] : ""?>
							</p>
						</div>
					</div>
					
					<?php }
				}
			?>
			
			<?php
				//Stampa data e informazioni di aggiornamento della pagina
//				echo _('<br>');
//				echo _('Ultima modifica il: ');
//				the_modified_time('d F Y');
			?>
		</div>
        <div class="col-md-3">
            <?php //Inclusione modulo per la gestione dei social
            include '360Moduli/sharesocial.php'; ?>
            <div class="widget-area w-100 mt-0 py-0">
                <?php

                $men = new MenuSide();
                $men->sidebarMenuStructure();
                $men->sidebarMenuTrasparenza();
                ?>
            </div>
        </div>
		
	</div>
</section>
<?php get_footer(); ?>
