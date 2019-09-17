<?php


class XMLINTERPRETER
{
    protected $dirigente;
    protected $luogo;
    protected $giorni;
    protected $settimana = array(
        "lunedi" => "Lunedì",
        "martedi" => "Martedì",
        "mercoledi" => "Mercoledì",
        "giovedi" => "Giovedì",
        "venerdi" => "Venerdì",
        "sabato" => "Sabato",
        "domenica" => "Domenica"
    );
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
    {
        echo '<table class="table"> 
            <thead class="thead-dark"><tr><th>Giorni</th><th>Mattino</th><th>Pomeriggio</th></tr></thead><tbody>';

        foreach ($this->settimana as $key => $value) {
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
        echo '<div class="row">';
        foreach ($this->scadenze->scadenza as $sentry) {
            echo '<div class="col-3"><div class="card">
  <div class="card-body">
    <h5 class="card-title">' . $sentry . '</h5>
    <h6 class="card-subtitle mb-2 text-muted">' . $sentry['description'] . '</h6>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
  </div>
</div>';
        }
        echo '</div>';
    }
}

?>