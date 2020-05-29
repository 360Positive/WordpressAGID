<?php
/*Gestione lettura elenco bandi da portale dedicato del comune
    Scraping delle informazioni dal codice HTML della pagina
*/
?>
<script>
    $('<link/>', {
        rel: 'stylesheet',
        type: 'text/css',
        href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/bandi.css'//css da includere
    }).appendTo('head');
</script>

<?php
/**
 * Sezione
 */


function sortByParam($a, $b, $termine)
{ /*Funzione per l'ordinamento in base a un termine dell'array*/
    $a = $a[$termine];
    $b = $b[$termine];
    if (empty($a) or empty($b)) {
        return 0;
    }
    if ($a == $b) return 0;
    return ($a < $b) ? -1 : 1;
}

function getBandi(){
    global $post;
    $args = array(  'category' => 88,
        'posts_per_page' => -1); //Recupera tutti i post che soddisfano i parametri
    $entries = [];

//Estrazione dei post in base ai parametri che identificano i bandi (category=88)
    $myposts = get_posts($args);

//Verifica che il post non sia in bozza o eliminato
    if ($myposts->post_status != 'pending') {

        foreach ($myposts as $post) {
            setup_postdata($post);

            $a = ['title' => get_the_title(),
                'rif' => get_field('riferimento'),
                'tipo' => get_field('tipologia'),
                'termin' => get_field('termine'),
                'inizio' => get_field('inizio'),
                'excerpt' => substr(get_the_content(), 0, 200),
                'link' => get_post_permalink(),
                'exlink' => get_field('link_diretto')];

            //Aggiunta nell'array delle voci presenti
            array_push($entries, $a);
            //Scorrimento dei post per il caricamento
            wp_reset_postdata();
        }
        //Ordinamento bandi in base alla data di scadenza
        usort($entries, 'sortByParam', 'termin');
    }
    return $entries;
}

function getTable($entries,$titles){
    /**
     * Array titles deve avere il numero corretto delle voci
     */
    //PARAMETRI LOCALI
    $id_table='tab_id_001';
    $date_now = strtotime('now');
    //-------------

    echo '<table id="'.$id_table.'" class="table table-striped">';
    echo '<thead><tr>';
    foreach ($titles as $title){
        echo '<th>'.$title.'</th>';
    }
    echo '</tr></thead>';

    //Body del blocco della tabella

    echo '<tbody>';
    foreach ($entries as $entry) {
        $term = explode('/', $entry['termin']);
        array_reverse($term);
        $term = implode('-', $term);

        //Verifica remine della data
        if (empty($entry['termin']) or strtotime($term) > $date_now) {
            $l = str_replace(' ', '-', str_replace('\'', '', $entry['tipo']));
            echo '<tr>';
            echo '<td> <span class="tipo"><a href="'.site_url() . '/' . $l.'">';
            echo  $entry['tipo'];
            echo '</a></span></td>';

            echo '<td> <span class="tipo">';
            echo  $entry['termin'];
            echo '</span></td>';

            $link=!empty($entry['exlink']) ? $entry['exlink'] : $entry['link'];
            echo '<td> <span class="tipo"><a href="'.$link .'">';
            echo  $entry['title'];
            echo '</a></span></td>';
            echo '</tr>';
        }

    }

    echo '</tbody></table>';

    return $id_table;

}
function getBootTable($entries,$titles){
    /**
     * Array titles deve avere il numero corretto delle voci
     */
    //PARAMETRI LOCALI
    $id_table='tab_id_001';
    $date_now = strtotime('now');
    //-------------



    //Body del blocco della tabella
    foreach ($entries as $entry) {
        $term = explode('/', $entry['termin']);
        array_reverse($term);
        $term = implode('-', $term);


        //Verifica remine della data
        if (empty($entry['termin']) or strtotime($term) > $date_now) {
            $class='warning';

            echo '<div class="shadow p-2 m-2 '.$class.'" >';
            echo '<div class="row" >';
            $l = str_replace(' ', '-', str_replace('\'', '', $entry['tipo']));

            echo '<div class="col-md-2 text-wrap">';
            echo '<span class="sezione"><a href="'.site_url() . '/' . $l.'">';
            echo  $entry['tipo'];
            echo '</span></div>';

            echo '<div class="col-md-2 text-wrap"><span class="tipo">';
            echo  $entry['termin'];
            echo '</span></div>';

            $link=!empty($entry['exlink']) ? $entry['exlink'] : $entry['link'];
            echo '<div class="col-md-8 text-wrap text-justify">';
            echo '<span class="titolo"><a href="'.$link .'">';
            echo  $entry['title'];
            echo '</a></span>';
            echo '</div>';

            echo '</div>';
            echo '</div>';
        }

    }



    return $id_table;

}
?>

<?php $titles=['Tipologia','Termine','Descrizione'];?>


<div class="container bandi">

    <h1 class="bandi">Ultimi bandi, avvisi, concorsi</h1>
    <p class="px-3">Clicca sulla voce per visualizzare il contenuto.</p>
    <?php
    //Genera la tabella e restituisce l'id della medesima
//    $tba=getTable(getBandi(),$titles);
    $tba=getBootTable(getBandi(),$titles);
    ?>

    <a href="<?= get_site_url(); ?>/bandi-avvisi-concorsi/" title="Bandi, avvisi e concorsi"><h2 class="bandi"
                                                                                                 style="text-align: right;">
            Tutti i bandi, avvisi e concorsi</h2></a>

</div>
<script>
    // $.noConflict();
    // $(document).load(function () {
        //$('#<?//= $tba; ?>//').DataTable();
    // });
</script>