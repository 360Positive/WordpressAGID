<style>
    button.btn.btn-link.w-100.text-left:hover {
        text-decoration: none;
    }
</style>
<?php

extract(shortcode_atts(array('col' => '1', 'bar' => '0', 'con' => '0'), $atts));

//Letrtura parametro per apertura menu di navigazione nella sezione corrente
if (isset($_GET['sect'])) {
    $mensec = $_GET['sect'];
} else {
    $mensec = "";
}
switch ($col) {
    case 0:
        $atscss = "";
        break;
    case 1:
        $atscss = "";
        break;
    case 2:
        $atscss = "width:49%;float:left;";
        $atw2 = "width:98%;float:left;";
        break;
    case 3:
        $atscss = "width:31%;float:left;";
        $atw2 = "width:62%;float:left;";
        break;
}

if ($bar) {
    echo '<div style="border: 1px solid #eee; padding: 8px 10px; background: #FBFBFB;">';
    if ($bar > 2) {
        echo do_shortcode('[at-desc]');
    }
    if ($bar > 1) {
        echo '<span style="float:right;"><a href="' . get_post_type_archive_link('amm-trasparente') . '"><small>Ultimi inseriti</small></a></span>';
    }
    echo do_shortcode('[at-search]') . '</div>';
}

$atcontatore = $atct = 0;
$sec = 0;
echo '<h1 class="entry-title" style="text-center">Sezioni amministrazione trasparente</h1>';
echo '<div id="accordion">';

$voc = 0;
foreach (amministrazionetrasparente_getarray() as $inner) {
    $atcontatore++;
    $atcounter = 0;
    $atreturn = "";
    $sezione = $inner[0];

    //Estrazione sezioni
    foreach ($inner[1] as $value) {
        $args = array('taxonomy' => 'tipologie', 'term' => $value);
        $query = new WP_Query($args);
        $fount_posts = $query->found_posts;
        $atcounter = $atcounter + $fount_posts;

        if (!$fount_posts && at_option('opacity')) {
            $opty = 'style="opacity: 0.5;"';
        } else {
            $opty = '';
        }
        /**
         * Al link della sezione sono passati 2 parametri con get
         *
         * sect: indica la sezione aperta
         * voc: indica la voce in consultazione
         * */
        $atreturn .= '<span ' . $opty . ' id="voc' . $voc . '">';
        $atreturn .= '<div class="row mb-1" style="border-bottom: 1px solid lightgrey;">';
        $atreturn .= '<div class="col-1"> <i class="icofont-rounded-right"></i>
 </div>
 <div class="col-11"><a  style="font-size:1rem; text-decoration:none!important;" href="' . get_term_link(get_term_by('name', $value, 'tipologie'), 'tipologie') . '?sect=' . $sezione . '&voc=voc' . $voc . '" title="' . $value . '">' . $value . '</a>';
        $atreturn .= '</div></div>';
        $atreturn .= '</span>';
        $voc++;
    }


//    echo '<div class="at-tableclass" id="at-s-' . ++$atct . '">';

    $sez_l = strtolower(preg_replace('/[^a-zA-Z]+/', '', $sezione));

    $idhead = 'heading' . $sec;
    $idbody = 'collapse' . $sec;
    $isshow = "";

    if ($mensec == $sezione) {
        $isshow = "show";
    }

    echo '
    <div class="voce">
    <div class="header" id="' . $idhead . '">
      <h5 class="mb-0">
        <button class="btn btn-link w-100 text-left" data-toggle="collapse" data-target="#' . $idbody . '" aria-expanded="true" aria-controls="' . $idbody . '">
        ';
    echo '<div class="row" style="text-transform: uppercase; letter-spacing: 2px; text-decoration:none!important; font-size:1.25rem">';
    echo '<div class="col-1">';
    echo '<i class="icofont-rounded-down"></i> ';
    echo '</div>';
    echo '<div class="col-11">';
    echo $sezione;
    echo '
</div>
</div>
    </button>
      </h5>
    </div>

    <div id="' . $idbody . '" class="collapse ' . $isshow . ' " aria-labelledby="' . $idhead . '" data-parent="#accordion">
      <div class="body my-3"> 
      ';
    echo $atreturn;
    echo '
      </div>
    </div>
  </div>';
    $sec += 1;
}

echo '</div>';

?>
<?php
//Lettura parametro per rendere bold sezione in navigazione dal menu
if (isset($_GET['voc'])) {
    $post_voc = $_GET['voc']; ?>
    <script>
        $('#<?= $post_voc?>').addClass('font-weight-bold');
    </script>
    <?php
}
?>

