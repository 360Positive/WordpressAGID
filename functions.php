<?php

function acf_load_service_field_choice( $field ) {

    //Configuration file
    $xmlconfigfile=get_template_directory()."-child/360Moduli/servizi.xml";
    $xml=simplexml_load_file($xmlconfigfile);
    $sezioni=$xml->sezione;

    // reset choices
    $field['choices'] = array();
    $choices=[];
    // get the textarea value from options page without any formatting
    $choices = get_field('servizi', 'option', true);
    // explode the value so that each line is a new array piece
    $choices = explode("\n", $choices);

    foreach ($sezioni as $sezione){
        $voci=$sezione->voce;
        foreach ($voci as $voce){
            $value=$sezione['nome'].' - '. trim(preg_replace('/\s\s+/', ' ', $voce[0]));
            array_push($choices,$value);

        }
    }
    // remove any unwanted white space
     $choices = array_map('trim', $choices);
    // loop through array and add to field 'choices'
    if( is_array($choices) ) {
        foreach( $choices as $choice ) {

            $field['choices'][ $choice] =$choice;
        }
    }

    // return the field
    return $field;

}

add_filter('acf/load_field/name=servizi', 'acf_load_service_field_choice');

// add_action( 'pre_get_posts', 'my_change_sort_order'); 

//     function my_change_sort_order($query){
//         if(is_archive()):
//          //If you wanted it for the archive of a custom post type use: is_post_type_archive( $post_type )
//           $query->set('meta_key', 'post_views_count');
//             $query->set('orderby', 'meta_value_num');
//             $query->set('order', 'DESC');
//         endif;    
//     };

// Disable REST API link tag
remove_action('wp_head', 'rest_output_link_wp_head', 10);

// Disable oEmbed Discovery Links
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

// Disable REST API link in HTTP headers
remove_action('template_redirect', 'rest_output_link_header', 11, 0);

add_filter('deprecated_constructor_trigger_error', '__return_false');


function pa360_breadcrumb() {
    echo '<!-- Funzione specifica del child theme pa360_breadcrumb-->';
    
	echo '<ul class="breadcrumb">';
  echo '<li class="breadcrumb-item"><a href="'.home_url().'" rel="nofollow">Home</a></li>';
  
  if (is_category() || is_single()) {
    $category=get_the_category();
    // print_r($category[0]->name);
    
    if ( $category[0]->name=="Uncategorized" or $category[0]->name="Senza Categoria"){
       echo '<li class="breadcrumb-item">';
            the_title();
    	    echo '</li>';
    }
    else{
        echo '<li class="breadcrumb-item">';
        the_category('<li class="breadcrumb-item">');
          if (is_single()) {
            echo '<li class="breadcrumb-item">';
            the_title();
    	    echo '</li>';
          }
        echo '</li>';
    }
    
  } elseif (is_page()) {
    echo '<li class="breadcrumb-item">';
    echo the_title();
    echo '</li>';
    
  } elseif (is_search()) {
    echo '&nbsp;&nbsp;&#187;&nbsp;&nbsp;Cerca risultati per... ';
    echo '"<em>';
    echo the_search_query();
    echo '</em>"';
  }
  echo '</ul>';
}
?>