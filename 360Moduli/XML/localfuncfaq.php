<?php

class XMLINTERPRETERFAQ
{

    protected $xml_voices = array();

    protected $id = 0;

    public function init()
    {
        $local = site_url();
        $files = array();

        $xmlurl = 'wp-content/themes/design-italia-child/360Moduli/XML/Faq/*.xml';
        foreach (glob($xmlurl) as $file) {
            array_push($files, $file);
        }

        foreach ($files as $file) {
            // print("<br>".$local . '/' . $file);
            $xmlurl = $local . '/' . $file;
            $xmlString = file_get_contents($xmlurl);
            $xml = new SimpleXMLElement($xmlString);

            array_push($this->xml_voices, $xml);
        }

        // print_r($this->xml_voices);
        $this->domande();
    }

    public function domande()
    {
        echo '<table id="faqtable" class="table table-striped" style="width: 100%">';
        echo '<thead>
                <th>Ufficio</th>
                <th>Domanda</th>
              </thead>';
        echo '<tbody>';
        foreach ($this->xml_voices as $ufficio) {
            foreach ($ufficio->entry as $voce) {
                $this->id += 1;
                $id = $this->id;

                $info = "";
                foreach ($voce->attributes() as $a => $b) {
                    print(empty($b));
                    if (! empty($b) or $b = "") {
                        $info .= "<strong class='text-capitalize " . $a . "'>" . $a . ' : </strong> ' . $b . " <br>";
                    }
                }
                echo '<tr>';
                echo '<td>';
                echo '<strong>', $ufficio['ufficio'], '</strong><br>';
                echo '</td>';
                echo '<td>';
                ?>
<div class="buttonfloat" id="accordion<?= $id ?>" data-toggle="toggle"
	data-target="#collapse<?= $id ?>" aria-expanded="true"
	aria-controls="collapse<?= $id ?>"
	style="word-wrap: break-word; cursor: pointer;">
                    <?= $voce->domanda; ?>
                </div>
<p id="collapse<?= $id ?>" class="collapse w-100 text-justify">

                    <?= $info . "<br>" . $voce->risposta; ?>

                </p>
<?php

                echo '</td>';
                echo '</tr>';
            }
        }
        echo '</tbody>';
        echo '</table>';

        for ($id = 0; $id < $this->id; $id ++) {
            ?>
<script>
                $('#accordion<?= $id ?>').click(
                    function () {
                        $('#collapse<?= $id ?>').toggle()
                    })

            </script>
<?php
        }

        echo '<style>
            .buttonfloat{
            background: #ffb402;
            padding: 2%;
            cursor: pointer;
            
            }
            </style>';
    }
}

?>