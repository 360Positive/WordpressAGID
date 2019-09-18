<?php


class XMLINTERPRETER
{
    protected $dirigente;
    protected $luogo;
    protected $giorni;
    protected $settimana = array(array(
        "lunedi" => "Lunedì",
        "martedi" => "Martedì",
        "mercoledi" => "Mercoledì"
    )
    , array(
        "giovedi" => "Giovedì",
        "venerdi" => "Venerdì",
        "sabato" => "Sabato"
    ));

    protected $times = ['mattino', 'pomeriggio'];

    public function init($xmlurl)
    {
        //$xmlurl=get_field('xml');
        $xmlString = file_get_contents($xmlurl);
        $xml = new SimpleXMLElement($xmlString);

        $this->dirigente = $xml->dirigente;
        $this->luogo = $xml->luogo;
        $this->giorni = $xml->orario;
        $this->contatti = $xml->contatti;
        $this->scadenze = $xml->scadenze;
    }

    public function orariList()
    {   echo '<div class="row">';
        foreach ($this->settimana as $days) {
            echo '<div class="col">';
            echo '<table class="table"> 
            <thead class="thead-dark"><tr><th></th><th>Mattino</th><th>Pomeriggio</th></tr></thead><tbody>';

            foreach ($days as $key => $value) {
                echo '<tr><td>' . $value, '</td>';
                $mat = $this->giorni->$key->mattino->attributes();
                $pom = $this->giorni->$key->pomeriggio->attributes();

                if (!$mat) {
                    echo '<td>Chiuso</td>';
                } else {
                    echo '<td>';
                    foreach ($mat as $a => $b) {
                        echo $a, ' ', $b, ' ';
                    }
                    echo '</td>';
                }
                if (!$pom) {
                    echo '<td>Chiuso</td>';
                } else {
                    echo '<td>';
                    foreach ($pom as $a => $b) {
                        echo $a, ' ', $b, ' ';
                    }
                    echo '</td>';
                }
            }
            echo '</tr></tbody></table>';
            echo '</div>';

        }
        echo '</div>';
    }

    public function dirigenteList()
    {
        echo " " . $this->dirigente . '<br>';
        foreach ($this->dirigente->attributes() as $a => $b) {
            echo $a, ' ', $b, "<br>";
        }
    }

    public function luogoList()
    {
        echo " " . $this->luogo . '<br>';
        foreach ($this->luogo->attributes() as $a => $b) {
            echo $a, ' ', $b, "<br>";
        }

    }

    public function contattiList()
    {

        foreach ($this->contatti->contatto as $contact) {
            echo '<strong>', $contact, '</strong><br>';
            foreach ($contact->attributes() as $a => $b) {
                echo $a, ' ', $b, "<br>";
            }
        }


    }

    public function scadenzeList()
    {
        echo '<div class="row row-eq-height">';
        foreach ($this->scadenze->scadenza as $sentry) {
          echo '<div class="col"><div class="card h-100">
                  <div class="card-body">
                    <span class="badge badge-secondary">' . $sentry['diretto'] . '</span>
                    <h5 class="card-title">' . $sentry . '</h5>
                    <h6 class="card-subtitle mb-2 text-muted">' . $sentry['subtitle'] . '</h6>
                    <div> <strong>Scadenza '. $sentry['tipologia'] . ' : </strong> ' . $sentry['data_termine'] . ' </div>
                    <p class="card-text">' . $sentry['description'] . '</p>
                  </div>
                  </div>
                </div>';
        }
        echo '</div>';
    }
}

?>