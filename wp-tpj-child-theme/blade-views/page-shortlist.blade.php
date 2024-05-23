<div class="container-fluid mb-5">
    <div class="row p-0">
        <div class="col p-0">
            <div class="search-hero">
                <h2 class="search-hero__heading">YOUR SHORTLIST</h2>
                <p class="total-posts__count m-0">You have <b>{{ $total_posts }} properties</b> saved to your shortlist.</p>
            </div>
        </div>
    </div> 
</div>

<div class="container">
    <div class="row">
        <div class="col">
            @include('partials/search-advanced')
        </div>
    </div>      
    <div class="row my-4 py-3">
        <div class="col-sm-12 col-lg-3 d-flex align-items-center">
            <label for="orderby" class="sr-only">Highest or Lowest Price</label>
            <span class="styled-select">
                <select data-component="FormItem" data-onvaluechange-trigger-events='["ORDER_BY_CHANGE_EVENT", "SEARCH_CORE"]' data-form-url="{{ $global_options['dynamic_options']['search_results_list'] }}" name="orderby" id="orderby">
                    <option value="" selected disabled>Order by price:</option>
                    <option value="price_desc">Highest Price</option>
                    <option value="price_asc">Lowest Price</option>
                </select>
            </span>            
        </div>
        <div class="col-sm-12 col-lg d-flex align-items-center justify-content-end">
            <div class="sort-options">
            <a
            href="#"
            class="view-btn "
            ><svg enable-background="new 0 0 9 9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><path d="M9,2H0V0h9V2z"></path><path d="M9,9H0V7h9V9z"></path><path d="M9,5.5H0v-2h9V5.5z"></path></svg>
            List View </a>
            <a
            href="/search-grid/@php _e_blade_query_string() @endphp"
            class="view-btn"
            ><svg enable-background="new 0 0 9 9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><path d="M2,2H0V0h2V2z"></path><path d="M9,2H7V0h2V2z"></path><path d="M5.5,2h-2V0h2V2z"></path><path d="M2,9H0V7h2V9z"></path><path d="M9,9H7V7h2V9z"></path><path d="M5.5,9h-2V7h2V9z"></path><path d="M2,5.5H0v-2h2V5.5z"></path><path d="M9,5.5H7v-2h2V5.5z"></path><path d="M5.5,5.5h-2v-2h2V5.5z"></path></svg>
            Grid View </a>
            <a

            href="/search-map/@php _e_blade_query_string() @endphp"
            class="view-btn"
            ><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.2" overflow="visible" preserveAspectRatio="none" viewBox="0 0 33 38.900001525878906" xml:space="preserve" y="0px" x="0px"><g transform="translate(1, 1)"><g><g><path d="M15.4,21.5c3.4,0,6.2-2.7,6.2-6.1c0,0,0,0,0,0c0-3.4-2.7-6.3-6.2-6.4c-3.4,0-6.2,2.7-6.2,6.1 c0,0,0,0,0,0C9.3,18.5,12,21.3,15.4,21.5z M5,4.8c5.7-5.7,15-5.6,20.7,0.1c5.6,5.7,5.6,14.9,0,20.5L15.4,35.8L5,25.4 C-0.5,19.7-0.5,10.6,5,4.8z" vector-effect="non-scaling-stroke"/></g></g></g></svg>
            Map View </a>
            <a
            href="/saved-properties/"
            class="view-btn active"
            ><svg enable-background="new 0 0 9 9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg" class="icon__star"><path d="M4.7,0.1L5.9,3l2.9,0.3C8.9,3.3,9,3.4,9,3.5c0,0.1,0,0.1-0.1,0.1L6.8,5.9l0.5,2.9C7.4,8.8,7.3,9,7.2,9c0,0-0.1,0-0.1,0L4.5,7.6L2,9C1.8,9,1.7,9,1.7,8.9c0,0,0-0.1,0-0.1l0.5-2.8L0.1,3.7C0,3.6,0,3.4,0.1,3.3c0,0,0.1-0.1,0.1-0.1L3.1,3l1.2-2.9C4.3,0,4.5,0,4.6,0C4.6,0,4.7,0.1,4.7,0.1z"></path></svg>
            Your Shortlist </a>
        </div>
        </div>
    </div>     
</div>

@include('components/shortlist-large')

@include('debug/debug')