<?php

class MenuSide
{

    function styleMenu()
    {
        echo '<style>
                :root{
                --side-font:1.2rem;
                }
                
                @media (min-width: 768px) {
                    .collapse.dont-collapse-sm {
                        display: block;
                        height: auto !important;
                        visibility: visible;
                    }
                }
                
                a.collegamenti.btn{
                cursor: pointer;
                background: #a66300!important;
                border: 1px;
                text-transform: uppercase;
                margin-bottom: 10px;
                font-size:1.25rem!important; 
                }
                 a.title.btn{
                cursor: pointer;
                background: #a66300!important;
                border: 1px;
                text-transform: uppercase;
                margin-bottom: 10px;
                font-size:1.25rem!important; 
                }
                h1.title{
                cursor: pointer;
                background:lightgray!important;
                border: 1px;
                text-transform: uppercase;
                margin-bottom: 10px;
                font-size:1.25rem!important; 
                }
                div.menu > li {
                    font-size: 1.2em!important;
                }
                .widget-area a {
                font-weight: 600;
                font-size:var(--side-font);
                }
                [id$="dettaglio-testo"] .widget-area li a {
                font-size:var(--side-font);
}
                
        </style>';
    }

    function __construct()
    {
        console . log('Costruttore');
        $this->styleMenu();
    }

    function __destruct()
    {
        console . log('Eliminazione');
    }

    function sidebarMenuStructure($val='')
    {
        /**
         * Gestione della struttura del menu laterale di navigazione
         */

        //Deve essere indicato lo slug del menu da utilizzare e deve essere presente la variabile

       if (empty($val)) {
           $val = get_field('menusidebar');
       }

       if (!empty($val)) {

               echo '<a class="collegamenti btn btn-warning btn-lg btn-block " data-toggle="collapse" href="#collapseMenuSide" role="button" aria-expanded="false" aria-controls="collapseMenuSide">
        ' . __('Collegamenti utili', '360Positive') . '</a>';

//          echo '<div class="collapse dont-collapse-sm" id="collapseMenuSide">';
               echo '<div class="collapse" id="collapseMenuSide">';

               wp_nav_menu(array('menu' => '"' . $val . '""'), '<a>');
               echo '</div>';
           }


    }

    function sidebarMenuTrasparenza()
    {
        /**
         * Gestione della struttura del menu laterale di navigazione menu della trasparenza
         */
        //Deve essere indicato lo slug del menu da utilizzare e deve essere presente la variabile
        $obj_id = get_queried_object_id();
        $url = get_permalink($obj_id);

        //Verifica se è pagina della trasparenza
        if (strpos($url, 'amm-trasparente')) {

            echo '<a class="title btn btn-warning btn-lg btn-block mb-2" data-toggle="collapse" href="#collapseMenuTrasparenza" role="button" aria-expanded="false" aria-controls="collapseMenuTrasparenza">
        ' . __('Trasparenza', '360Positive') . '</a>';

            echo '<div class="collapse" id="collapseMenuTrasparenza">';
            echo do_shortcode('[at-head-collapse]');
            echo '</div>';
        }


    }

    function sideMenuPubblication($pub_id)
    {
        //devono essere presenti id anchor nella pagina
        if (!empty($pub_id) && is_array($pub_id)) {
            echo '<h1 class="title w-103 py-3 mt-2 mx-0 px-0 text-center">' . _('Elenco delle notizie') . '</h1>';
            foreach ($pub_id as $data) {

                echo '<hr>';
                echo '<div class="btn btn-info btn-block"><a href="#day' . $data . '" onclick="scrollto(\'#day' . $data . '\')">											<span style="font-size:1em!important">';
                echo $data;
                echo '</span></a></div>';
            }
        }

    }
}

?>



