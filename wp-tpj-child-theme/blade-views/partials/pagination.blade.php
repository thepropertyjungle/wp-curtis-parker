@if($paginate['hasPagination'] ?? false)
<nav aria-label="Search Results Navigation">
    <ul class="pagination">
        {{-- Render first page link if available --}}
        @isset($paginate['firstPageUrl'])
            <li class='page-item'>
                <a href="{{ $paginate['firstPageUrl'] }}" class='page-link' aria-label="First Page">&laquo;</a>
            </li>
        @endisset

        {{-- Render previous page link if available --}}
        @isset($paginate['previousPageUrl'])
            <li class='page-item'>
                <a href="{{ $paginate['previousPageUrl'] }}" class='page-link' aria-label="Previous">&lsaquo;</a>
            </li>
        @endisset

        {{-- Render page links --}}
        @if(is_array($paginate['pages'] ?? ''))
            @foreach ($paginate['pages'] as $page)
                <li class="page-item {{ $page['active_class'] }}">
                    <a href="{{ $page['pageUrl'] }}" class='page-link'>{{ $page['pageNo'] }}</a>
                </li>
            @endforeach
        @endif

        {{-- Render next page link if available --}}
        @isset($paginate['nextPageUrl'])
            <li class='page-item'>
                <a href="{{ $paginate['nextPageUrl'] }}" class='page-link' aria-label="Next">&rsaquo;</a>
            </li>
        @endisset

        {{-- Render last page link if available --}}
        @isset($paginate['lastPageUrl'])
            <li class='page-item'>
                <a href="{{ $paginate['lastPageUrl'] }}" class='page-link' aria-label="Last Page">&raquo;</a>
            </li>
        @endisset
    </ul>
</nav>
@endif