@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="pagination is-rounded">
        <div class="">
            @if ($paginator->onFirstPage())
                <span class="pagination-previous">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="pagination-previous">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="pagination-next">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="pagination-next">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="">
            <div>
                <p class="text-sm text-gray-700 leading-5">
                    {!! __('Showing') !!}
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <!-- <span class="pagination-previous" aria-hidden="true">
                              <i class="fas fa-arrow-left"></i>
                            </span> -->
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination-previous" aria-label="{{ __('pagination.previous') }}">
                           <i class="fas fa-arrow-left"></i>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="pagination-link">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="pagination-link is-current">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="pagination-link" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="pagination-next" aria-label="{{ __('pagination.next') }}">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="" aria-hidden="true">
                                
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif






<!-- 
@if ($paginator->hasPages())
    
    <nav class="pagination is-rounded" role="navigation">
        <ul class="pagination-list">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled">
                    <span class="pagination-previous"><i class="fas fa-arrow-left"></i></span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}">
                        <span class="pagination-previous"><i class="fas fa-arrow-left"></i></span>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagination-link is-current"><span>{{ $page }}</span></li>
                        @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                            <a href="{{ $url }}"><li class="pagination-link">{{ $page }}</li></a>
                        @elseif ($page == $paginator->lastPage() - 1)
                            <li class="pagination-ellipsis"><i class="fa fa-ellipsis-h"></i></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}">
                        <span class="pagination-previous"><i class="fas fa-arrow-right"></i></span>
                    </a>
                </li>
            @else
                <li class="disabled">
                    <span class="pagination-previous"><i class="fas fa-arrow-right"></i></span>
                </li>
            @endif
        </ul>
    </nav>
    
@endif
 -->















