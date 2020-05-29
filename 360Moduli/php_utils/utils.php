<?php

function sidebarMenuStructure()
{
    /**
     * Gestione della struttura del menu laterale di navigazione
     */

    //Deve essere indicato lo slug del menu da utilizzare e deve essere presente la variabile
    $val = get_field('menusidebar');
    if (!empty($val)) {

        echo '<a class="btn btn-warning btn-lg btn-block" data-toggle="collapse" href="#collapseMenuSide" role="button" aria-expanded="false" aria-controls="collapseMenuSide">
        ' . __('Collegamenti utili', '360Positive') . '</a>';

        echo '<div class="collapse dont-collapse-sm" id="collapseMenuSide">';

        wp_nav_menu(array('menu' => '"' . $val . '""'), '<a>');
        echo '</div>';
    }

    echo '<style>
    @media (min-width: 768px) {
        .collapse.dont-collapse-sm {
            display: block;
            height: auto !important;
            visibility: visible;
        }
    }
    .btn:not(:disabled):not(.disabled) {
    cursor: pointer;
    background: #a66300;
    border: 1px;
    text-transform: uppercase;
    }
</style>';
}

?>



