<?php


/**
 * Classe per la gestione degli import dati da file xml specifici
 *
 **/
class XMLINTERPRETER
{
    /**
     * @var
     */

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

    public function init($xmlurl = "")
    {
        if (!empty($xmlurl)) {
            $xmlString = file_get_contents($xmlurl);


            $xml = new SimpleXMLElement($xmlString);

            $this->dirigente = $xml->dirigente;
            $this->luogo = $xml->luogo;
            $this->giorni = $xml->orario;
            $this->contatti = $xml->contatti;
            $this->scadenze = $xml->scadenze;
        }

    }

    public function orariList()
    {
        echo '<div class="row">';

        if (!empty($this->settimana)) {
            foreach ($this->settimana as $days) {
                echo '<div class="col">';
                echo '<table class="table"> 
            <thead class="thead-dark"><tr><th></th><th>Mattino</th><th>Pomeriggio</th></tr></thead><tbody>';

                if (!empty($days)) {
                    foreach ($days as $key => $value) {
                        echo '<tr><td>' . $value, '</td>';


                            $mat = $this->giorni->$key->mattino;
                            if (empty($mat)) {
                                echo '<td>Chiuso</td>';
                            } else {
                                echo '<td>';
                                $mat = $this->giorni->$key->mattino->attributes();
                                foreach ($mat as $a => $b) {
                                    echo $a, ' ', $b, ' ';
                                }
                                echo '</td>';
                            }

                            $pom = $this->giorni->$key->pomeriggio;
                            if (empty($pom)) {
                                echo '<td>Chiuso</td>';
                            } else {
                                echo '<td>';
                                $pom = $this->giorni->$key->pomeriggio->attributes();
                                foreach ($pom as $a => $b) {
                                    echo $a, ' ', $b, ' ';
                                }
                                echo '</td>';
                            }

                    }
                    echo '</tr>';
                }
                echo '</tbody></table>';
                echo '</div>';

            }
            echo '</div>';
        }
    }

    public function dirigenteList()
    {
        if (!empty($this->dirigente)) {
            echo " " . $this->dirigente . '<br>';
            foreach ($this->dirigente->attributes() as $a => $b) {
                echo $a, ' ', $b, "<br>";
            }
        }
    }

    public function luogoList()
    {
        if (!empty($this->luogo)) {
            echo " " . $this->luogo . '<br>';
            foreach ($this->luogo->attributes() as $a => $b) {
                echo $a, ' ', $b, "<br>";
            }
        }

    }

    public function contattiList()
    {
        if (!empty($this->contatti)) {
            foreach ($this->contatti->contatto as $contact) {
                echo  $contact;
                if (!empty($contact->attributes())) {
                    foreach ($contact->attributes() as $a => $b) {
                        echo $a, ' ', $b, "<br>";
                    }
                }
            }
        }


    }

    public function scadenzeList()
    {
        if (!empty($this->scadenze->scadenza)) {
            echo '<div class="row row-eq-height">';
            foreach ($this->scadenze->scadenza as $sentry) {
                echo '<div class="col"><div class="card h-100">
                  <div class="card-body">
                    <span class="badge badge-secondary">' . $sentry['diretto'] . '</span>
                    <h5 class="card-title">' . $sentry . '</h5>
                    <h6 class="card-subtitle mb-2 text-muted">' . $sentry['subtitle'] . '</h6>
                    <div> <strong>Scadenza ' . $sentry['tipologia'] . ' : </strong> ' . $sentry['data_termine'] . ' </div>
                    <p class="card-text">' . $sentry['description'] . '</p>
                  </div>
                  </div>
                </div>';
            }
            echo '</div>';
        }
    }
}

?>