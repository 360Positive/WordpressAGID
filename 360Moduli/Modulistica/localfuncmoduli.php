<?php

class XMLINTERPRETERMODULISTICA
{

    protected $module_voices = array();

    protected $id = 0;

    protected $categories = array();

    protected $base = "";

    public function get_all_directory_and_files($dir, $result)
    {
        $dh = new DirectoryIterator($dir);
        // Dirctary object
        foreach ($dh as $item) {
            if (! $item->isDot()) {
                if ($item->isDir()) {
                    $this->get_all_directory_and_files("$dir/$item", $result);
                } else {
                    $file = [
                        $dir . "/" . $item->getFilename(),
                        $dir,
                        $item->getFilename()
                    ];

                    if (empty($result[md5($dir)])) {
                        $result[md5($dir)] = [];
                        array_push($result[md5($dir)], $file);
                    } else {
                        array_push($result[md5($dir)], $file);
                    }
                }
            }
        }
        return $result;
    }

    public function init($xmlurl)
    {
        $result = [];
        $local = site_url();
        /**
         * Lettura dei file presenti nella cartelle e sotto directory
         */
        $this->base = 'wp-content/themes/design-italia-child/360Moduli/Modulistica/Moduli';
        $dirs = array_filter(glob($this->base . '/*'), 'is_dir');
        $dirs = array_slice($dirs, 0, count($dirs) - 1);

        foreach ($dirs as $dir) {
            // print($dir."<br>");
            $this->fileindir($dir, 0);
        }
        // print_r($this->categories);
    }

    public function addVect($dirb, $prof)
    {
        $dir_name = str_replace($this->base . '/', '', $dirb);
        // $exp = explode('/', $dirb);
        // $el = count($exp); //Numero di elementi presenti
        // $dir_name = implode(' | ', array_slice($exp, $el - 2, $el - 1)); //Estrazione del nome della directory
        $files = glob($dirb . '/*');
        // print("<br><br>FILES ".$dirb." IN DIR:".count($files));

        if ($dir_name == "." or $dir_name == "..") {} else {
            array_push($this->module_voices, [
                "folder" => $dir_name,
                "file" => $files
            ]);
            $this->categories[$dir_name] = count($files);
        }
    }

    public function fileindir($dir, $prof)
    {
        // print("<br>DIR : ".$dir."<br> P:".$prof);
        $this->addVect($dir, $prof);
        $sub = array_filter(glob($dir . '/*'), 'is_dir');
        // print_r($sub);
        // $sub = array_slice($sub, 1, count($sub)-1);

        if (! empty($sub)) {
            foreach ($sub as $subdir) {
                $this->fileindir($subdir, $prof ++);
            }
        } else {
            $prof --;
        }
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
                // Get the file size in bytes.
                $fileSizeBytes = filesize($file);
                // Convert the bytes into MB.
                $fileSizeMB = ($fileSizeBytes / 1024);
                // Format it so that only 2 decimal points are displayed.
                $fileSizeMB = number_format($fileSizeMB, 2);
                echo $fileSizeMB . " KB";
                echo '</td>';
                echo '</tr>';
            }
        }
        echo '</tbody>';
        echo '</table>';

        for ($id = 0; $id < $this->id; $id ++) {
            echo '<script>$(\'#accordion' . $id . '\').click(function() {$(\'#collapse' . $id . '\').toggle()})</script>';
        }

        echo '<style>
            .buttonfloat{
            background: #ffb402;
            padding: 2%;
            cursor: pointer;
            
            }
            </style>';
    }

    public function script()
    {
        ?>
<script type="text/javascript">
            let groupColumn = 0;
            $('#moduletable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Italian.json"
                },
            });

            $("#moduletable thead th").each(function (i) {

                if ($(this).text() !== '') {
                    var isStatusColumn = (($(this).text() == 'Ufficio') ? true : false);
                    var select = $('<select><option value=""></option></select>')
                        .appendTo($(this).empty())
                        .on('change', function () {
                            var val = $(this).val();
                            table.column(i)
                                .search(val ? '^' + $(this).val() + '$' : val, true, false)
                                .draw();
                        });

                    // Get the Status values a specific way since the status is a anchor/image
                    if (isStatusColumn) {
                        var statusItems = [];

                        /* ### IS THERE A BETTER/SIMPLER WAY TO GET A UNIQUE ARRAY OF <TD> data-filter ATTRIBUTES? ### */
                        table.column(i).nodes().to$().each(function (d, j) {
                            var thisStatus = $(j).attr("data-filter");
                            if ($.inArray(thisStatus, statusItems) === -1) statusItems.push(thisStatus);
                        });

                        statusItems.sort();

                        $.each(statusItems, function (i, item) {
                            select.append('<option value="' + item + '">' + item + '</option>');
                        });

                    }
                    // All other non-Status columns (like the example)
                    else {
                        table.column(i).data().unique().sort().each(function (d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>');
                        });
                    }

                }
            });

        </script>
<?php

}
}

?>