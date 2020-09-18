<form role="search" method="get" class="searchform-header w-100" action="<?= home_url('/'); ?>">
    <div class="row w-100 my-3">
        <div class="d-flex w-100" >
            <input class="h-100 w-100"
                   style="max-height:50px; max-width:250px; outline: none!important; box-shadow: none!important; border-bottom:0px "
                   type="search"
                   placeholder="Cerca"
                   value="<?= get_search_query() ?>"
                   name="s" title="<?= esc_attr_x('Search for:', 'label') ?>"/>
            <button class="h-100 w-100" style="max-height:50px; max-width:50px; outline: none!important; box-shadow: none!important; border-bottom:0px"
                    type="submit" title="Bottone cerca"><i class="icofont-search-1"></i>
                    <span class="d-none">Ricerca</span></button>
        </div>
    </div>
</form>