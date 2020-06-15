<?php

$exlude_voice=["strutturesanitarieprivateaccreditate"];

extract(shortcode_atts(array('col' => '1', 'bar' => '0', 'con' => '0'), $atts));
$atts=0;
$bar=1;

switch ($atts) {
    case 0:
        $atscss= "amministrazione.css";
        break;
    case 1:
        $atscss= "amministrazione.css";
        break;
    case 2:
        $atscss= "amministrazione1.css";
       
        break;
    case 3:
        $atscss= "amministrazione2.css";
     
        break;
}
?>

<!-- Caricamento dinamico classi di stile -->
<script type="text/javascript"
        src="<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/js/utils.js"></script>

<script>
    $local = '<?= get_site_url() ?>';
    $path_share = $local + "/wp-content/themes/design-italia-child/360Moduli/css/plugins/<?= $atscss?>";
    addHeader($path_share);
</script>


<?php
if ($bar) {
    echo '<div style="border: 1px solid #eee; padding: 8px 10px; background: #FBFBFB;">';
    if ($bar > 2) {
        echo do_shortcode( '[at-desc]' );
    }
    if ($bar > 1) {
        echo '<span style="float:right;"><a href="'.get_post_type_archive_link( 'amm-trasparente' ).'"><small>Ultimi inseriti</small></a></span>';
    }
//    echo do_shortcode( '[at-search]' ).'</div>';
    echo '</div>';
}

$atcontatore = $atct = 0;
foreach (amministrazionetrasparente_getarray() as $inner) {
    $atcontatore++;
//    print_r($inner[1]);

    $atcounter = 0;
    $atreturn ="";

    foreach ($inner[1] as $value) {
        $args = array( 'taxonomy' => 'tipologie', 'term' => $value );
        $query = new WP_Query( $args );
        $fount_posts = $query->found_posts;
//        printf('%s <br>' , $fount_posts);
        $atcounter += $fount_posts;

        if ( !$fount_posts && at_option('opacity') ) {
            $opty = 'style="opacity: 0.5;"';
            // $link = null;
             } else {
            $opty = '';
            
        }
        $link=get_term_link( get_term_by('name', $value, 'tipologie'), 'tipologie' );
        
        $atreturn .= '<div '.$opty.'>';
        $atreturn .=  $link!=null ? '<a href="' . $link . '" title="' . $value . '">' :'';
        $atreturn .= '<i class="icofont-simple-right"></i> '.$value;
        $atreturn .=  $link!=null ? '</a>' :'';
        $atreturn .= '</div>';

    }

    echo '<div class="at-tableclass" id="at-s-'.++$atct.'"> ';

    //Percorso per url
    $sez_l .= strtolower(preg_replace('/[^a-zA-Z]+/', '', $inner[0]));

    echo '<h3>';
   
    if ($con and !in_array($sez_l, $exlude_voice)) { echo '<small class="at-number">'.$atcounter.' '._('Articoli presenti').'</small>'; }
        echo '<a id="'.$sez_l.'" href="#'.$sez_l.'">';
        echo '<strong><i class="icofont-circled-down"></i> '.$inner[0].'</strong>';
        echo '</a>';
        
    echo '</h3>';
    echo $atreturn;

    echo '</div>';

    if ($col && $atcontatore == $col) {
        echo '<div class="clear"></div>';
        $atcontatore=0;
    }
}

if ( at_option('show_love') ) {
    echo '<span style="width:98%;border: 1px solid #eee;padding: 8px 10px;background: #FBFBFB;float: left;font-size: 0.7em;">
        <span style="float:right;">
            <a href="http://www.wpgov.it" target="_blank" alt="Software WPGov" title="Software WPGov">wpgov.it</a>
        </span>
        Powered by <a href="http://wordpress.org/plugins/amministrazione-trasparente/" rel="nofollow" title="Plugin Amministrazione Trasparente per Wordpress">Amministrazione Trasparente</a>
        </span>';
}
 echo '<div class="clear"></div>';

?>
