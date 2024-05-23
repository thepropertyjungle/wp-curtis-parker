{{--
    ATTENTION
    =========
    /src/scss/partials/rest/shortlist-property.scss

    This partial is used to display your shortlisted
    properties.

    It's a copy of /blade-views/partials/list-property.blade.php
--}}

@php
    $hasImages = is_array($property['images'] ?? '') && count($property['images']) > 0;
@endphp

<section class="property{{ $property['featured'] ?? false ? ' property--featured' : '' }}" data-branch-name="{{ $property['branch']['name'] }}" data-branch-ID="{{ $property['branch']['meta']['branch_remote_id'] }}" data-property-remote-ID="{{ $property['tpj_remote_id'] }}" data-department="{{ $property['department'] }}" data-property-type="{{ $property['property_type'] }}">
    <a href="{{ $property['permalink'] ?? ''}}" class="card">
        @include('partials/search-results-corner-flash')
        <div class="row g-0">
            <div class="col-md-5">
                <div class="property__image">
                    @if ($hasImages)
                        <img src="{{ $property['images'][0]['optimised_image_url'] ?? '' }}/460" class="img-fluid rounded-start" alt="{{ $property['Address']['display_address'] ?? '' }}" data-media-update-date="{{ $property['images'][0]['media_update_date']}}" data-caption="{{ $property['images'][0]['caption'] }}">
                    @else
                        <img src="" class="img-fluid rounded-start" alt="Awaiting Images for {{ $property['Address']['display_address'] }}">
                    @endif
                </div>
            </div>
            <div class="col-md-7">
                <div class="card-body property__meta">
                    <h3 class="card-title property__address">
                        {{ $property['Address']['display_address'] ?? '' }}
                    </h3>
                    <h4 class="card-title property__price">
                        {{ isset($property['price_qualifier']) && $property['price_qualifier'] != 'Default' ? ($property['price_qualifier'] == 'POA' ? 'POA' : $property['price_qualifier']) : '' }}
                        £{{ number_format($property['price']) }} {{ $property['instruction_type'] == 'Letting' ? ($property['rent_frequency'] == 'Weekly' ? 'PW' : ($property['rent_frequency'] == 'Monthly' ? 'PCM' : ($property['rent_frequency'] == 'Yearly' ? 'PA' : ''))) : '' }}
                    </h4>
                    <p class="card-text property__summary">
                        {!! $property['summary'] ?? '' !!}
                    </p>
                    <ul class="property__rooms">
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
                    <button class="btn btn-primary">View Details</button>
                    <span data-component="ShortlistButtons" data-property-id="{{ $property['ID'] }}">
                        <button class="btn btn-success tpj_add_to_shortlist">Save</button>
                        <button class="btn btn-danger tpj_remove_from_shortlist">Remove</button>
                    </span>
                </div>
            </div>
        </div>
    </a>
</section>