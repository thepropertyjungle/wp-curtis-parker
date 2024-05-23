{{--
    ATTENTION
    =========
    /src/partials/rest/map-info-window.scss

    This styles the info window on Google and LeafletJS
    property search maps.
--}}

@php
    $hasImages = is_array($property['images'] ?? '') && count($property['images']) > 0;
@endphp

<a href="{{ $property['permalink'] }}" rel="noopener noreferrer" target="_blank" data-branch-name="{{ $property['branch']['name'] }}" data-branch-ID="{{ $property['branch']['meta']['branch_remote_id'] }}" data-property-remote-ID="{{ $property['tpj_remote_id'] }}" data-department="{{ $property['department'] }}" data-property-type="{{ $property['property_type'] }}">
    <section class="map-info-window">
        @include('partials/search-results-corner-flash')
        <div class="map-info-window__image">
            @if ($hasImages)
                <img loading="lazy" src="{{ $property['images'][0]['optimised_image_url'] ?? '' }}/250" alt="{{ $property['Address']['display_address'] ?? '' }}" data-media-update-date="{{ $property['images'][0]['media_update_date']}}" data-caption="{{ $property['images'][0]['caption'] }}">
            @else
                <img loading="lazy" src="" class="img-fluid" alt="Awaiting Images for {{ $property['Address']['display_address'] }}">
            @endif
        </div>
        <div class="map-info-window__address">
            {{ $property['Address']['display_address'] ?? '' }}
        </div>
        <div class="map-info-window__price">
            {{ isset($property['price_qualifier']) && $property['price_qualifier'] != 'Default' ? ($property['price_qualifier'] == 'POA' ? 'POA' : $property['price_qualifier']) : '' }}
            £{{ number_format($property['price']) }} {{ $property['instruction_type'] == 'Letting' ? ($property['rent_frequency'] == 'Weekly' ? 'PW' : ($property['rent_frequency'] == 'Monthly' ? 'PCM' : ($property['rent_frequency'] == 'Yearly' ? 'PA' : ''))) : '' }}
        </div>
        <ul class="map-info-window__rooms">
            @if (!empty($property['bedrooms']))
                <li>{{ $property['bedrooms'] }} Bedroom{{ $property['bedrooms'] > 1 ? 's' : '' }}</li>
            @endif
            @if (!empty($property['bathrooms']))
            <li>{{ $property['bathrooms'] }} Bathroom{{ $property['bathrooms'] > 1 ? 's' : '' }}</li>
            @endif
            @if (!empty($property['reception_rooms']))
            <li>{{ $property['reception_rooms'] }} Reception{{ $property['reception_rooms'] > 1 ? 's' : '' }}</li>
            @endif
            @if (!empty($property['internal_area']))
            <li>{{ number_format($property['internal_area']) }} sq.ft</li>
            @endif
        </ul>
    </section>
</a>