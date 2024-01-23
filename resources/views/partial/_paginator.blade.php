@if ($paginator->hasPages())
  <div class="list-wrapper">
    <ul class="flex">
      {{-- Previous Page Link --}}
      @if ($paginator->onFirstPage())
      @else
        <li class="page-item">
          <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="easy-bg-color">السابق</a>
        </li>
      @endif
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li>.......</li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                  @if ($page == $paginator->currentPage())
                    <li><a href="{{ $url }}" class="selected easy-bg-color">{{ $page }}</a></li>
                  @else
                    <li><a href="{{ $url }}" class="easy-bg-color">{{ $page }}</a></li>
                  @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
          <li>
            <a href="{{ $paginator->nextPageUrl() }}" class="easy-bg-color">التالى</a>
          </li>
        @endif
      </ul>
    </div> 
@endif