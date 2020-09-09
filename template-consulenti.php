<?php
/*
    * Template Name: Consulenti - template-consulenti.php
    * Template Post Type: post, page
*/

use function Composer\Autoload\includeFile;

get_header();
/***
 * Estrazione dei consulenti per la struttura dei consulenti
 */
$urls = ['curriculum_vitae', 'attestazione'];

//Indicazione dell'ufficio
$uffici = [];
array_push($uffici, get_field('ufficio'));
//print_r($uffici); //Debug

$pubblicazioni = get_field('periodi_pubblicazione');
//echo'<br>PERIODO PUBBLICAZIONI<br>';
//echo print_r($pubblicazioni)."<br>";


?>
    <!--template-consulenti.php -->
<?php /* Caricamento libreria utilità*/ ?>
    <script type="text/javascript"
            src="<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/js/utils.js"></script>
    <script type="text/javascript">
        <?php  /* Aggiunge header file di stile */?>
        $path = "<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/templates/single-csv.css";
        addHeader($path);
    </script>
<?php
/*Breadcrumb modificato per PA*/
pa360_breadcrumb(); ?>

<?php /*Template base*/ ?>
    <div id="content" class="container">
        <div class="row">

            <div class="col-md-12">
                <h1 class="intestazione"><?php the_title(); ?></h1>
                <?= the_content() ?>

                <? foreach ($pubblicazioni as $pubblicazione):
//                    echo '<br> VOCI <br>';
//                    echo "<br>".print_r($pubblicazione)."<br>";
                    $periodo = $pubblicazione['periodo'];
                    echo '<h2>'.$periodo.'</h2>';
                    $voci =$pubblicazione['voci'];
                    $keys = array_keys($voci[0]);
                    ?>

                    <table id="consult_tab" class="table wrap w-100 mt-1">

                        <thead>
                        <tr>
                            <? foreach ($keys as $key): ?>
                                <th><?= ucfirst(str_replace('_', ' ', $key)) ?></th>
                            <? endforeach; ?>
                        </tr>
                        </thead>

                        <tbody>

                        <? foreach ($voci as $voce): ?>
                            <tr>
                                <? foreach ($keys as $key): ?>
                                    <? if (!empty($urls)): ?>
                                    <? if (!in_array($key,$urls)): ?>
                                        <td><?= $voce[$key] ?></td>
                                    <? else: ?>
                                        <td>
                                            <a href="<?= $voce[$key] ?>" target="_blank" title="Scarica <?= $key ?>">
                                                <i class="icofont-attachment"></i><br> <small>Scarica il file</small>
                                            </a>
                                        </td>
                                    <? endif ?>
                                    <? else: ?>

                                    <? endif ?>
                                <? endforeach; ?>
                            </tr>
                        <? endforeach; ?>
                        </tbody>
                    </table>
                <hr>
                <?endforeach; ?>
            </div>

            <div class="col-md-3">
                <?php //Inclusione modulo per la gestione dei social
                include '360Moduli/sharesocial.php'; ?>
                <div class="my-0 widget-area w-100">

                    <?php
                    $val = get_field('menusidebar');
                    if ($val) {
                        wp_nav_menu(array('menu' => '"' . $val . '""'));
                    } ?>
                </div>

            </div>


            <script>

                $('#consult_tab').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Italian.json"
                    },
                    "paging": false,
                    responsive: true,
                    columnDefs: [{ responsivePriority: 1, targets: 0 }],
                });

            </script>
            <script>linkIcon(); //Load function to add icon to links</script>
        </div>
    </div>
<?php get_footer(); ?>