<div
    data-component="PropertiesMap"
    data-initial-lat="{{ $initial_lat ?? '51.5073509' }}"
    data-initial-lng="{{ $initial_lng ?? '-0.1277583' }}"
    data-initial-zoom="{{ $initial_zoom ?? '3' }}"
    data-view-name="{{ $marker_view_name ?? 'partials/rest/map-info-window' }}"
    data-map-initial-query='{{ isset($initial_query) ? $initial_query : '' }}'
    data-map-bind-query-to-events='["MAP_CHANGE_FILTERS"]'
    data-map-emit-shape-draw-change-events='["MAP_POLY_CHANGE"]'
    data-supports-drawing-mode="{{ $supports_drawing_mode ?? 'false' }}"
    data-map-drawing-options='{"fillColor":"#33aa7e","fillOpacity":0.4,"strokeWeight":2,"strokeColor":"#33aa7e"}'
    data-updates-window-query-vars={{ $updates_window_query_vars ?? 'true' }} 
    data-small-cluster-background={{ $small_cluster_background ?? '#0000ff' }} 
    data-large-cluster-background={{ $large_cluster_background ?? '#ff0000' }} 
    data-hide-map-if-no-results={{ $hide_map_if_no_results ?? 'false' }} 
    data-use-seo-permalinks={{ isset($use_seo_permalinks) && $use_seo_permalinks === true ? 'true' : 'false' }}
    id="search-map-results"
    class="search-map-results"
>

    <div class="tpj_load_info map-info">
        <div><strong>Loading Search Results...</strong></div>
    </div>

    <div class="tpj_map_no_results map-info">
        <div><strong>We couldn't find any properties with that search criteria.</strong></div>
    </div>
    
    @if(isset($supports_drawing_mode) && $supports_drawing_mode === true)
    <a href="#" class="tpj_draw_on_map_btn btn btn-success">Draw</a>
    <a href="#" class="tpj_exit_draw_btn btn btn-success">Exit draw mode</a>
    <a href="#" class="tpj_clear_drawing_on_map_btn btn btn-danger">Clear drawing</a>
    <a href="#" class="tpj_clear_bounds_shape_btn btn btn-danger">Clear selection</a>
    @endif
</div>

<div class="tpj_map_no_results_map_html_replacement" style="display: none;">
    <p>We couldn't find any properties with that search criteria.</p>
</div>