<form role="search" method="get" class="searchform-header" action="<?= home_url('/'); ?>">
    <div class="row">
        <div class="col-10 mx-0 px-0">
            <input class="h-100 w-100"
                   style="outline: none!important; box-shadow: none!important; border-bottom:0px "
                   type="search"
                   placeholder="Cerca"
                   value="<?= get_search_query() ?>"
                   name="s" title="<?= esc_attr_x('Search for:', 'label') ?>"/></div>
        <div class="col-2 mx-0 px-0">
            <button class="h-100 w-100"
                    style="outline: none!important; box-shadow: none!important;
border-bottom:0px"
                    type="submit"><i class="icofont-search-1"></i></button>
        </div>

    </div>
</form>