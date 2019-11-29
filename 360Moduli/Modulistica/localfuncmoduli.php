<?php


class XMLINTERPRETERMODULISTICA
{
    protected $module_voices = array();
    protected $id = 0;

    public function init($xmlurl)
    {
        $local = site_url();
        /**
         * Lettura dei file presenti nella cartelle e sotto directory
         */
        $dirs = array_filter(glob('wp-content/themes/design-italia-child/360Moduli/Modulistica/Moduli/*'), 'is_dir');
        //print_r( $dirs);

        foreach ($dirs as $dir) {
            //echo '<br><br>Letura dir: -<<br>'.$dir.'<br>';
            $exp = explode('/', $dir);
            $el = count($exp); //Numero di elementi presenti
            $dir_name = $exp[$el - 1]; //Estrazione del nome della directory
            //echo '<br><br>Nome dir: -<<br>'.$dir_name.'<br>';
            $files = glob($dir . '/*');
            //echo '<br><br>Files: -<<br>'.print_r($files).'<br>';
            array_push($this->module_voices, ["folder" => $dir_name, "file" => $files]);
        }


        //echo '<br><br><br>Struttura<br>';
        //print_r($this->module_voices);
    }


    public function createLayout()
    {
        echo '<table id="moduletable" class="table table-striped" style="width: 100%">';
        echo '<thead>
                <th>Ufficio</th>
                <th>Modulo</th>
                <th>Dimensione</th>
              </thead>';
        echo '<tbody>';
        foreach ($this->module_voices as $voci) {
            $ufficio = $voci['folder'];

            foreach ($voci['file'] as $file) {
                $this->id += 1;
                $id = $this->id;
                echo '<tr>';
                echo '<td>';
                echo '<strong style="text-transform: uppercase;">' . str_replace('-', ' ', str_replace('_', ' ', $ufficio)) . '</strong>';
                echo '</td>';
                echo '<td>';
                $ext = "." . pathinfo($file, PATHINFO_EXTENSION);
                $filename = basename($file);
                echo '<a target="_blank" style="text-transform: capitalize;" href="' . site_url() . '/' . $file . '" title="' . $filename . '"><i class="icofont-file-pdf"></i> ' . str_replace('-', ' ', str_replace('_', ' ', str_replace($ext, ' ', $filename))) . '</a>';
                echo '</td>';
                echo '<td>';
                //Get the file size in bytes.
                $fileSizeBytes = filesize($file);
                //Convert the bytes into MB.
                $fileSizeMB = ($fileSizeBytes / 1024);
                //Format it so that only 2 decimal points are displayed.
                $fileSizeMB = number_format($fileSizeMB, 2);
                echo $fileSizeMB . " KB";
                echo '</td>';
                echo '</tr>';

            }
        }
        echo '</tbody>';
        echo '</table>';

        for ($id = 0; $id < $this->id; $id++) {
            echo '
        <script>
        $(\'#accordion' . $id . '\').click(
function() {
    $(\'#collapse' . $id . '\').toggle()
})
$("#moduletable").DataTable();
        </script>';

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