<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
  <div class="row">
      <div class="col-6 my-3">
    <input class="m-0" type="text" name="s" placeholder="Termini per la ricerca..." /></div>
    <div class="col-3 my-3">

<?php
function get_terms_dropdown($taxonomies, $args){
    $myterms = get_terms($taxonomies, $args);
    $optionname = "tipologie";
    $output ="<select class=\"m-0\" style='width:100%' name='".$optionname."'><option value=''>Filtra</option>'";

    foreach($myterms as $term){
        $term_taxonomy=$term->YOURTAXONOMY; //CHANGE ME
        $term_slug=$term->slug;
        $term_name =$term->name;
        $link = $term_slug;
        $output .="<option name='".$link."' value='".$link."'>".$term_name."</option>";
    }
    $output .="</select>";
return $output;
}

$taxonomies = array('tipologie'); // CHANGE ME
$args = array('order'=>'ASC','hide_empty'=>true);
echo get_terms_dropdown($taxonomies, $args);

?></div>
<div class="col-3 my-3">
    <input type="hidden" name="post_type" value="amm-trasparente" />
    <input class="m-0" style="width:100%" type="submit" id="searchsubmit" value="Cerca" /></div>
</div>
</form>
