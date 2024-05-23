@php
    $relatedProperties = array_slice($property['related_properties'], 0, 3);
    $hasImages = is_array($property['images'] ?? '') && count($property['images']) > 0;

    // Create a new variable for the property summary
    $property_sum = $property['summary'];
    // Create new variable, then strip HTML tags from the previous variable
    $property_sum_stripped = strip_tags($property_sum);
    // Create another variable, then use it to truncate the previous variable 250 chars
    $property_sum_sanitised = substr($property_sum_stripped, 0, 200);
@endphp

@if(!empty($property['related_properties']) && count($property['related_properties']) > 2)
<div class="related-wrapper">
    <div class="container">
        <p class="similar-heading">Similar Properties</p>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-5">
            @foreach ($relatedProperties as $relatedProperty)
            <div class="col">
                <div class="property-related{{ $relatedProperty['featured'] ?? false ? ' property__featured' : '' }}">
                    <a href="{{ $relatedProperty['permalink'] }}"  class="img-permalink">
                        @if ($hasImages)
                        <img src="{{ $relatedProperty['images'][0]['optimised_image_url'] ?? '' }}/425" class="img-fluid" alt="{{ $relatedProperty['Address']['display_address'] ?? '' }}">
                        @else
                        <img src="/path/to/custom-image.webp" alt="Awaiting Images for {{ $relatedProperty['Address']['display_address'] }}">
                        @endif
                    </a>
                    <ul class="product__features">
                        <li>
                            <svg enable-background="new 0 0 9 8" viewBox="0 0 9 8" xmlns="http://www.w3.org/2000/svg" class="icon__photo"><path d="M2.3,0.4h-1c-0.1,0-0.2,0.1-0.2,0.2v0.5L1,1.2c-0.1,0-0.1,0-0.2,0.1C0.3,1.3,0,1.7,0,2.2v4.8c0,0.5,0.4,0.9,0.9,0.9h7.1C8.6,7.9,9,7.5,9,6.9V2.2c0-0.5-0.4-0.9-0.9-0.9H7.2L7,0.5C7,0.3,6.8,0.1,6.5,0.1H3.9c-0.2,0-0.4,0.2-0.5,0.4L3.2,1.2l-0.3,0c-0.1,0-0.2,0-0.3-0.1l-0.1,0V0.6C2.5,0.5,2.4,0.4,2.3,0.4z M5.1,2.1c1.3,0,2.4,1.1,2.4,2.4S6.4,6.9,5.1,6.9S2.7,5.8,2.7,4.5S3.8,2.1,5.1,2.1z"></path></svg><span>8</span>
                        </li>
                        @if (!empty($relatedProperty['floor_plans']))
                        <li><svg enable-background="new 0 0 9 9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg" class="icon__floorplan"><path d="M0,9h2.6V8.1H0.9V6.8h1.8V6H0.9V0.9h3.2v5.8h0.9V0.9h3.2v3.2H6.3v2.7h0.9V4.9h1v3.2H4.2V9H9V0H0L0,9z"></path></svg></li>
                        @endif
                        @if (!empty($relatedProperty['virtual_tours']))
                        <li><svg enable-background="new 0 0 9 6" viewBox="0 0 9 6" xmlns="http://www.w3.org/2000/svg" class="icon__video"><path d="M8.4,0.5L5.8,2.2V0.7c0-0.3-0.3-0.6-0.6-0.6H0.6C0.3,0.1,0,0.4,0,0.7v4.6c0,0.3,0.3,0.6,0.6,0.6h4.6c0.3,0,0.6-0.3,0.6-0.6V3.8l2.6,1.7C8.6,5.7,9,5.5,9,5.2V0.9C9,0.6,8.7,0.4,8.4,0.5z"></path></svg></li>
                        @endif
                    </ul>
                    @if ($relatedProperty['availability'] !== 'Available')
                    <div class="availability">
                        <p>{{ $relatedProperty['availability'] === 'SSTC' ? 'Sold STC' : $relatedProperty['availability'] }}</p>
                    </div>
                    @endif
                    <div class="related-property__meta">
                        <div class="property__type">
                            <h1>{{ $relatedProperty['bedrooms'] }} Bed {{ $relatedProperty['property_type'] }} @if ($relatedProperty['instruction_type'] == 'Letting') to Let @else for Sale @endif</h1>
                        </div>
                        <div class="property__address">
                            {{ $relatedProperty['Address']['display_address'] ?? '' }}
                        </div>        
                        <div class="property__price">
                            {{ ($relatedProperty['price_qualifier'] != 'Default') ? ($relatedProperty['price_qualifier'] == 'POA' ? 'POA' : $relatedProperty['price_qualifier']) : '' }}
                            £{{ number_format($relatedProperty['price']) }} {{ $relatedProperty['instruction_type'] == 'Letting' ? ($relatedProperty['rent_frequency'] == 'Weekly' ? 'Per Week' : 'PCM') : '' }}
                        </div>
                        <ul class="property__rooms">
                            @if (!empty($relatedProperty['bedrooms']))
                            <li>
                                <svg enable-background="new 0 0 22 16" viewBox="0 0 22 16" xmlns="http://www.w3.org/2000/svg" class="icon__bed"><path d="M21.1,7.3c-0.1,0-0.2-0.1-0.2-0.2V0.4c0-0.2-0.2-0.4-0.4-0.4c0,0,0,0,0,0H1.5C1.3,0,1.1,0.2,1.1,0.4c0,0,0,0,0,0v6.7c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H0.4C0.2,7.3,0,7.4,0,7.6c0,0,0,0,0,0v5.8c0,0.2,0.2,0.4,0.4,0.4c0,0,0,0,0,0h0.5c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v1.6c0,0.2,0.2,0.4,0.4,0.4c0.2,0,0.4-0.2,0.4-0.4c0,0,0,0,0,0V14c0-0.1,0.1-0.2,0.2-0.2c0,0,0,0,0,0h18c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v1.6c0,0.2,0.2,0.4,0.4,0.4c0.2,0,0.4-0.2,0.4-0.4c0,0,0,0,0,0V14c0-0.1,0.1-0.2,0.2-0.2l0,0h0.5c0.2,0,0.4-0.2,0.4-0.4c0,0,0,0,0,0V7.6c0-0.2-0.2-0.4-0.4-0.4c0,0,0,0,0,0L21.1,7.3z M1.8,0.9c0-0.1,0.1-0.2,0.2-0.2c0,0,0,0,0,0h18c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v6.2c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0h-0.4c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0V4c0-0.2-0.2-0.4-0.4-0.4c0,0,0,0,0,0h-7.3c-0.2,0-0.4,0.2-0.4,0.4c0,0,0,0,0,0v3.1c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0h-0.4c-0.1,0-0.2-0.1-0.2-0.2l0,0V4c0-0.2-0.2-0.4-0.4-0.4H2.9C2.7,3.6,2.6,3.8,2.6,4c0,0,0,0,0,0v3.1c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H2c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0L1.8,0.9z M18.5,4.4c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v2.5c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0h-6.2c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0V4.5c0-0.1,0.1-0.2,0.2-0.2l0,0H18.5z M9.7,4.4c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v2.5c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H3.5c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0V4.5c0-0.1,0.1-0.2,0.2-0.2l0,0H9.7z M21.3,12.9c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H0.9c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0v-1.1c0-0.1,0.1-0.2,0.2-0.2c0,0,0,0,0,0h20.2c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0V12.9z M21.3,10.7c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H0.9c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0V8.2C0.7,8.1,0.8,8,0.9,8c0,0,0,0,0,0h20.2c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0V10.7z"></path></svg>
                                {{ $relatedProperty['bedrooms'] }} 
                            </li>
                            @endif
                            @if (!empty($relatedProperty['bathrooms']))
                            <li>
                                <svg enable-background="new 0 0 21 21" viewBox="0 0 21 21" xmlns="http://www.w3.org/2000/svg" class="icon__bath"><path d="M2.3,11.9c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0V2.6c0-0.9,0.7-1.6,1.6-1.6c0.1,0,0.1,0,0.2,0C4,1.1,4,1.2,4,1.2c0,0,0,0,0,0.1C3.7,1.7,3.5,2.1,3.5,2.6c0,0.7,0.2,1.3,0.7,1.8c0.1,0.1,0.4,0.1,0.5,0l3.1-3.1c0.1-0.1,0.1-0.4,0-0.5c0,0,0,0,0,0C7.4,0.3,6.8,0,6.2,0c-0.5,0-1,0.2-1.4,0.5c-0.1,0.1-0.2,0.1-0.3,0C4.2,0.4,3.9,0.4,3.7,0.4c-1.2,0-2.2,0.9-2.3,2.1c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0v9.3c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H0.3c-0.2,0-0.3,0.2-0.3,0.4c0,0.2,0.2,0.3,0.3,0.3h0.9c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v2.6c0,1.4,0.7,2.6,1.9,3.3c0.1,0.1,0.2,0.2,0.2,0.3v1.6c0,0.2,0.1,0.4,0.3,0.4c0.2,0,0.4-0.1,0.4-0.3c0,0,0,0,0,0v-1.4c0-0.1,0.1-0.1,0.2-0.1c0,0,0,0,0,0c0.3,0.1,0.6,0.1,0.9,0.1h10.5c0.3,0,0.6,0,0.9-0.1c0.1,0,0.2,0,0.2,0.1c0,0,0,0,0,0v1.4c0,0.2,0.2,0.3,0.4,0.3s0.4-0.2,0.4-0.3l0,0V19c0-0.1,0.1-0.2,0.2-0.3c1.2-0.7,1.9-2,1.9-3.3v-2.6c0-0.1,0.1-0.2,0.2-0.2h0.9c0.2,0,0.3-0.2,0.3-0.4c0-0.2-0.2-0.3-0.3-0.3L2.3,11.9z M4.8,1.3C5.2,1,5.7,0.7,6.2,0.7c0.2,0,0.5,0.1,0.7,0.2C7,0.9,7,1,6.9,1.1c0,0,0,0,0,0L4.6,3.4c-0.1,0.1-0.1,0-0.2,0c0,0,0,0,0,0C4.2,3.1,4.2,2.9,4.2,2.6C4.2,2.1,4.5,1.7,4.8,1.3z M18.9,15.4c0,1.7-1.4,3.1-3.2,3.1H5.2c-1.7,0-3.1-1.4-3.2-3.1v-2.6c0-0.1,0.1-0.2,0.2-0.2h16.5c0.1,0,0.2,0.1,0.2,0.2L18.9,15.4z"></path></svg>
                                {{ $relatedProperty['bathrooms'] }} 
                            </li>
                            @endif
                            @if (!empty($relatedProperty['reception_rooms']))
                            <li>
                                <svg enable-background="new 0 0 22 14" viewBox="0 0 22 14" xmlns="http://www.w3.org/2000/svg" class="icon__reception"><path d="M20.2,4.5h-0.4c-0.3,0-0.6,0.1-0.9,0.3c-0.1,0-0.2,0-0.2-0.1V1.9c0-1-0.8-1.9-1.8-1.9H5.1c-1,0-1.8,0.8-1.8,1.9v2.8c0,0.1-0.1,0.1-0.2,0.1C2.8,4.6,2.5,4.5,2.2,4.5H1.8C0.8,4.5,0,5.4,0,6.4v3.8c0,1,0.8,1.9,1.8,1.9h0.5c0.1,0,0.2,0.1,0.2,0.2l0,0v1.3c0,0.2,0.2,0.4,0.4,0.4c0.2,0,0.4-0.2,0.4-0.4c0,0,0,0,0,0v-1.3c0-0.1,0.1-0.2,0.2-0.2l0,0h15c0.1,0,0.2,0.1,0.2,0.2l0,0v1.3c0,0.2,0.2,0.4,0.4,0.4c0.2,0,0.4-0.2,0.4-0.4c0,0,0,0,0,0v-1.3c0-0.1,0.1-0.2,0.2-0.2l0,0h0.5c1,0,1.8-0.8,1.8-1.9V6.4C22,5.4,21.2,4.5,20.2,4.5z M4,1.9c0-0.6,0.5-1.1,1.1-1.1h11.7c0.6,0,1.1,0.5,1.1,1.1v5.3c0,0.2-0.2,0.4-0.4,0.4c0,0,0,0,0,0H4.4C4.2,7.6,4,7.4,4,7.2c0,0,0,0,0,0L4,1.9z M21.3,10.2c0,0.6-0.5,1.1-1.1,1.1H1.8c-0.6,0-1.1-0.5-1.1-1.1V6.4c0-0.6,0.5-1.1,1.1-1.1h0.4c0.6,0,1.1,0.5,1.1,1.1v0.8c0,0.6,0.5,1.1,1.1,1.1h13.2c0.6,0,1.1-0.5,1.1-1.1V6.4c0-0.6,0.5-1.1,1.1-1.1h0.4c0.6,0,1.1,0.5,1.1,1.1L21.3,10.2z"></path></svg>    
                                {{ $relatedProperty['reception_rooms'] }} 
                            </li>
                            @endif
                        </ul>
                        <p class="property__summary">{!! $property_sum_sanitised . '...' ?? '' !!}</p>     
                        <div data-component="ShortlistButtons" data-property-id="{{ $relatedProperty['ID'] }}" class="shortlist__btns">
                            <i class="tpj_add_to_shortlist">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14px" height="14px" viewBox="0 -0.5 21 21" version="1.1"><defs></defs><g id="Page-1" stroke="none" stroke-width="1"  fill-rule="evenodd"><g id="Dribbble-Light-Preview" transform="translate(-139.000000, -320.000000)"><g id="icons" transform="translate(56.000000, 160.000000)"><path d="M98.7860271,170.404 C97.7402268,171.416 97.2624767,172.872 97.5102768,174.301 L97.9691269,176.957 L95.5646263,175.703 C94.9304261,175.372 94.216426,175.197 93.5003258,175.197 C92.7831756,175.197 92.0691754,175.372 91.4349753,175.703 L89.0304747,176.957 L89.4903748,174.301 C89.7371249,172.872 89.2593748,171.416 88.2135745,170.404 L86.268974,168.523 L88.9569747,168.135 C90.402825,167.927 91.6512753,167.027 92.2980755,165.727 L93.5003258,163.31 L94.7025761,165.727 C95.3483262,167.027 96.5978265,167.927 98.0426269,168.135 L100.731678,168.523 L98.7860271,170.404 Z M103.423878,169.433 C104.551578,168.342 103.929978,166.441 102.370728,166.216 L98.408027,165.645 C97.7885268,165.556 97.2530267,165.17 96.9768766,164.613 L95.2044762,161.051 C94.8558761,160.35 94.1775759,160 93.5003258,160 C92.8220256,160 92.1437255,160.35 91.7951254,161.051 L90.0237749,164.613 C89.7465749,165.17 89.2110747,165.556 88.5926246,165.645 L84.6299236,166.216 C83.0706733,166.441 82.4480231,168.342 83.5757234,169.433 L86.4432741,172.206 C86.8916242,172.639 87.0963742,173.263 86.9903242,173.875 L86.313074,177.791 C86.102024,179.01 87.0785242,180 88.1862745,180 C88.4781746,180 88.7805746,179.931 89.0714247,179.779 L92.6151756,177.93 C92.8923756,177.786 93.1958257,177.713 93.5003258,177.713 C93.8037759,177.713 94.1072259,177.786 94.384426,177.93 L97.9292269,179.779 C98.2200769,179.931 98.521427,180 98.8133271,180 C99.9210773,180 100.897578,179.01 100.686528,177.791 L100.010327,173.875 C99.9042773,173.263 100.107977,172.639 100.556327,172.206 L103.423878,169.433 Z" id="star_favorite-[#1498]"></path></g></g></g></svg>
                            </i>
                            <i class="tpj_remove_from_shortlist">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14px" height="14px" viewBox="0 -0.5 21 21" version="1.1"><defs></defs><g id="Page-1" stroke="none" stroke-width="1"  fill-rule="evenodd"><g id="Dribbble-Light-Preview" transform="translate(-99.000000, -320.000000)"><g id="icons" transform="translate(56.000000, 160.000000)"><path d="M60.556381,172.206 C60.1080307,172.639 59.9043306,173.263 60.0093306,173.875 L60.6865811,177.791 C60.8976313,179.01 59.9211306,180 58.8133798,180 C58.5214796,180 58.2201294,179.931 57.9282291,179.779 L54.3844766,177.93 C54.1072764,177.786 53.8038262,177.714 53.499326,177.714 C53.1958758,177.714 52.8924256,177.786 52.6152254,177.93 L49.0714729,179.779 C48.7795727,179.931 48.4782224,180 48.1863222,180 C47.0785715,180 46.1020708,179.01 46.3131209,177.791 L46.9903714,173.875 C47.0953715,173.263 46.8916713,172.639 46.443321,172.206 L43.575769,169.433 C42.4480682,168.342 43.0707186,166.441 44.6289197,166.216 L48.5916225,165.645 C49.211123,165.556 49.7466233,165.17 50.0227735,164.613 L51.7951748,161.051 C52.143775,160.35 52.8220755,160 53.499326,160 C54.1776265,160 54.855927,160.35 55.2045272,161.051 L56.9769285,164.613 C57.2530787,165.17 57.7885791,165.556 58.4080795,165.645 L62.3707823,166.216 C63.9289834,166.441 64.5516338,168.342 63.423933,169.433 L60.556381,172.206 Z" id="star_favorite-[#1499]"></path></g></g></g></svg>
                            </i>
                        </div>
                    </div>
                    <div class="permalink__wrapper">
                        <a href="{{ $relatedProperty['permalink'] }}" class="property-details__permalink">
                            <svg enable-background="new 0 0 9 9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg" class="icon__plus"><path d="M5.2,9H3.8V0h1.5V9z"></path><path d="M9,5.3H0V3.8h9V5.3z"></path></svg>
                            More Details
                        </a>        
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif