@if ($paginator->hasPages())
        <div class="center">
            <div class="pagination">
            @if (!$paginator->onFirstPage())
                <a href="{{ $paginator->previousPageUrl() }}" class="prev">&laquo;</a>
            @endif

            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                           <a class="active">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="next">&raquo;</a>
            @endif
            </div>
        </div>
@endif