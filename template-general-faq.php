<?php
	/*
		* Template Name: FAQ - template-general-faq.php
		* Template Post Type: post, page
	*/
	require_once '360Moduli/XML/localfuncfaq.php';
	
get_header(); ?>
<!--single.php -->
<script type="text/javascript">
	$('<link/>', {
		rel: 'stylesheet',
		type: 'text/css',
		href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/templates/faq.css'//css da includere
	}).appendTo('head');
	
</script>

<section class="entry-content thumbnail topimage" style=" background: url(<?php echo the_field('big-image');?>);">
	<p class="dida"><?php the_post_thumbnail_caption() ?></p>
	
</section>
<?php pa360_breadcrumb(); ?>
<div class="container">
    <div class="row">		
        <section id="content" role="main" class="container">			
            <div class="row">
                <div class="col-md-9">					
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php //get_template_part( 'entry' ); ?>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<hr>
					<?php the_content(); ?>
					<?php //if ( ! post_password_required() ) comments_template( '', true ); ?>
                    <?php endwhile; endif; ?>
                    <?php
						//Invocazione classe per la creazione della tabella
						$xmi = new XMLINTERPRETERFAQ();
					$xmi->init(); ?>
				</div>
				
                <div class="col-md-3 ">
                    <?php //Inclusione modulo per la gestione dei social
					include '360Moduli/sharesocial.php'; ?>
                    <div class="container-fluid widget-area page-widget-area">
                        <?php
							$val = get_field('menusidebar');
							if ($val) {
								wp_nav_menu(array('menu' => '"' . $val . '""'));
							} ?>
					</div>
				</div>
				
				
			</div>
			
			
		</section>
	</div>
    <script>
		<?php /*---  Script datatable per il raggruppamnento dei dati   ----*/?>
		
        $(document).ready(function () {
            $.noConflict();
            var groupColumn = 0;
			
            var table = $('#faqtable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Italian.json"
				},
				
                "columnDefs": [
				{"visible": false, "targets": groupColumn}
                ],
                "order": [[groupColumn, 'asc']],
                "displayLength": 25,
                "drawCallback": function (settings) {
                    var api = this.api();
                    var rows = api.rows({page: 'current'}).nodes();
                    var last = null;
					
                    api.column(groupColumn, {page: 'current'}).data().each(function (group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
							'<tr class="group"><td colspan="2">' + group + '</td></tr>'
                            );
							
                            last = group;
						}
					});
					},/**/
				});
				
				
				// Order by the grouping
				$('#faqtable tbody').on('click', 'tr.group', function () {
					var currentOrder = table.order()[0];
					if (currentOrder[0] === groupColumn && currentOrder[1] === 'asc') {
						table.order([groupColumn, 'desc']).draw();
						} else {
						table.order([groupColumn, 'asc']).draw();
					}
				});
			});
		</script>
	</div>
<?php get_footer(); ?>	