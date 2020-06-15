<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

  include(plugin_dir_path(__FILE__) . 'settings-banner.php');

  echo '<form method="post" action="options.php">';
  settings_fields( 'wpgov_at_options');
  $options=get_option( 'wpgov_at');

  delete_option('at_option_id');
  delete_option('at_option_opacity');
  delete_option('at_option_tag');
  delete_option('at_categorization_enable');
  delete_option('at_ruoli_option_enable');
  delete_option('at_pasw_developer');

?>
<table class="form-table">
  <tr valign="top">
          <th scope="row">
            <label for="at_option_id">ID Pagina</label>
          </th>
          <td>
            <input id="at_option_id" type="number" min="0" name="wpgov_at[page_id]" value="<?php echo $options['page_id']; ?>" size="55" />
            <br>
            <small>ID della pagina di WordPress in cui è stato inserito lo shortcode del plugin).<br>
            Lista shortcode: <a href="https://wpgov.it/docs/amministrazione-trasparente/">link</a></small>
          </td>
        </tr>

        <tr valign="top">
  <th scope="row">
    <label for="at_option_opacity">Sfuma sezioni vuote</label>
  </th>
  <td>
    <input id="at_option_opacity" name="wpgov_at[opacity]" type="checkbox" value="1"
           <?php checked( '1', $options['opacity'] ); ?> />
    <br>
    <small>Aumenta la trasparenza visiva delle sezioni senza alcun contenuto<br>Consigliato: <b>ON</b></small>
  </td>
</tr>
<tr valign="top">
<th scope="row">
<label for="at_enable_tag">Abilita tag</label>
</th>
<td>
<input id="at_enable_tag" name="wpgov_at[enable_tag]" type="checkbox" value="1"
   <?php checked( '1', $options['enable_tag'] ); ?> />
<br>
<small>Consenti di associare dei tag ai post di Amministrazione Trasparente<br>Consigliato: <b>OFF</b></small>
</td>
</tr>
<tr valign="top">
<th scope="row">
<label for="at_show_love">Mostra credits</label>
</th>
<td>
<input id="at_show_love" name="wpgov_at[show_love]" type="checkbox" value="1"
   <?php checked( '1', $options['show_love'] ); ?> />
<br>
<small>Aiutaci a far conoscere il progetto e ottieni una via preferenziale per il supporto<br>Consigliato: <b>ON</b></small>
</td>
</tr>
<tr valign="top">
<th scope="row" colspan="2">
  <h2>Avanzate</h2>
  <tr valign="top">
  <th scope="row">
  <label for="at_enable_ucc">Abilita uffici e Centri di costo</label>
  </th>
  <td>
  <input id="at_enable_ucc" name="wpgov_at[enable_ucc]" type="checkbox" value="1"
     <?php checked( '1', $options['enable_ucc'] ); ?> />
  <br>
  <small>Consenti di associare i contenuti a una nuova tassonomia basata su divsione aggiuntiva per uffici e centri di costo</small>
  </td>
  </tr>
  <tr valign="top">
  <th scope="row">
  <label for="at_enable_cat">Abilita categorie</label>
  </th>
  <td>
  <input id="at_enable_cat" name="wpgov_at[enable_cat]" type="checkbox" value="1"
     <?php checked( '1', $options['enable_cat'] ); ?> />
  <br>
  <small>Consenti di associare le Categorie degli articoli ai post di Amministrazione Trasparente<br>[per utenti esperti] + [richiede temi compatibili]<br>Consigliato: <b>OFF</b></small>
  </td>
  </tr>
  <tr valign="top">
  <th scope="row">
  <label for="at_map_cap">Mappa capacità</label>
  </th>
  <td>
  <input id="at_map_cap" name="wpgov_at[map_cap]" type="checkbox" value="1"
     <?php checked( '1', $options['map_cap'] ); ?> />
  <br>
  <small>Mappa le meta capacità alle capacità primitive per personalizzare ruoli e permessi<br>[per utenti esperti] + [richiede componenti aggiuntivi]<br>Consigliato: <b>OFF</b></small>
  </td>
  </tr>
</th>
</tr>
<tr valign="top">
<th scope="row">
<label for="at_pasw_2013">Forza PASW2013</label>
</th>
<td>
<input id="at_pasw_2013" name="wpgov_at[pasw_2013]" type="checkbox" value="1"
   <?php checked( '1', $options['pasw_2013'] ); ?> />
<br>
<small>Spunta casella se vuoi attivare ottimizzazioni per il template PASW2013<br>[abilitare solo se il tema attivo è una versione precedente al 2013 o se è stato cambiato il nome della cartella di "pasw2013"]</small>
</td>
</tr>
</th>
</tr>
<tr valign="top" <?php if ( !$options['debug'] ) { echo 'style="display:none;"'; } ?>>
<th scope="row">
<label for="debug">Modalità DEBUG</label>
</th>
<td>
<input id="debug" name="wpgov_at[debug]" type="checkbox" value="1"
   <?php checked( '1', $options['debug'] ); ?> />
<br>
<small>Modalità DEBUG: utile in caso di test da parte del servizio di supporto. <b>Mantienila disattivata!</b></small>
</td>
</tr>
</th>
</tr>
  </table>

<?php
  echo '<p class="submit"><input type="submit" class="button-primary" value="'.__('Save Changes').'" /></p>';
  echo '</form>';
  if ( at_option('debug') ) {
    echo '<hr><h3>DEBUG</h3>';
    $terms = get_terms( array( 'taxonomy' => 'tipologie', 'hide_empty' => false ) );
    echo 'Numero sezioni installate: '.count($terms).'<br>';
    $count = 0;
    $merge = array();
    foreach ( amministrazionetrasparente_getarray() as $inner ) {
      $count+= count($inner[1]);
      $merge = array_merge( $merge, $inner[1] );
    }
    sort($merge);
    echo 'Numero sezioni supportate dal plugin: '.$count;
    echo '<hr>';
    echo '<div style="width:45%;float:left;"><h4>Installate:</h4>';
    echo '<ul>';
    foreach ( $terms as $term ) {
      echo '<li>' . $term->name . '</li>';
    }
    echo '</ul>';
    echo '</div>';
    echo '<div style="width:45%;float:left;"><h4>Supportate:</h4>';
    echo '<ul>';
    foreach ( $merge as $merge_item ) {
      echo '<li>' . $merge_item . '</li>';
    }
    echo '</ul>';
    echo '</div>';
    echo '<hr>';
  }
?>
