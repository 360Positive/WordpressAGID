<?php


class XMLINTERPRETERFAQ
{
    protected $xml_voices = array();
    protected $id=0;

    public function init($xmlurl)
    {
        $local = site_url();
        $files = array();



        if (!$xmlurl) {
            /**
             * Lettura dei file presenti nella cartella
             */

            $xmlurl = 'wp-content/themes/design-italia-child/360Moduli/XML/Faq/*.xml';

            foreach (glob($xmlurl) as $file) {
                array_push($files, $file);
            }
            //print_r($files);
        }

        foreach ($files as $file) {
            //print("<br>".$local . '/' . $file);
            $xmlurl = $local . '/' . $file;
            $xmlString = file_get_contents($xmlurl);
            $xml = new SimpleXMLElement($xmlString);

            array_push($this->xml_voices, $xml);
        }

        //print_r($this->xml_voices);
        $this->domande();

    }


    public function domande()
    {
        echo '<table id="faqtable" class="display compact">';
        echo '<thead>
                <th>Ufficio</th>
                <th>Domanda</th>
              </thead>';
        echo '<tbody>';
        foreach ($this->xml_voices as $ufficio) {

            foreach ($ufficio->entry as $voce) {
                $this->id+=1;
                $id=$this->id;

                $info = "";
                foreach ($voce->attributes() as $a => $b) {
                    $info .= $a . ' ' . $b . "<br>";
                }
                echo '<tr>';
                echo '<td>';
                echo '<strong>', $ufficio['ufficio'], '</strong><br>';
                echo '</td>';
                echo '<td>';
                echo '
                <div class="accordion" id="accordion'.$id.'">
  <div class="card">
    <div class="card-header" id="heading'.$id.'">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse'.$id.'" aria-expanded="true" aria-controls="collapse'.$id.'">
          '.$voce->domanda .'
        </button>
      </h2>
    </div>

    <div id="collapse'.$id.'" class="collapse show" aria-labelledby="heading'.$id.'" data-parent="#accordion'.$id.'">
      <div class="card-body">
        '.$info."<br>".$voce->risposta .'
          </div>
    </div>
  </div>
 </div>
</div>';
                echo '</td>';
                echo '</tr>';

            }
        }
        echo '</tbody>';
        echo '</table>';

    }

}

?>