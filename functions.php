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


?>