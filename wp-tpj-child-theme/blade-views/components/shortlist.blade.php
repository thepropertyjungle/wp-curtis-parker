{{--
    ATTENTION
    =========
    /src/scss/components/shortlist.scss

    You can create a page in your website and
    display a shortlist within it using a shortcode.

    [blade_dynamic_shortcode view_name="components/shortlist"]

    Pay attention to the data-view-name, this points to the
    file that will present your property data.

    It's a copy of /blade-views/partials/list-property.blade.php
--}}

<div
    data-component="Shortlist" 
    data-view-name="partials/rest/shortlist-property"
>
    <div class="tpj_loading">Loading...</div>
    <div class="tpj_noresults">You don't have properties shortlisted</div>
</div>