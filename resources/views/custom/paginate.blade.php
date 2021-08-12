@if ($paginator->hasPages())
    <ul class="pager">

        @if ($paginator->onFirstPage())
            <li class="disabled"><span><i class="fa fa-arrow-left color"></i></span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-arrow-left color"></i></a>
            </li>
        @endif



        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active"><span>{{ $page }}</span></li>
                    @else
                        <li><a class="color" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach



        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fa fa-arrow-right color"></i></a></li>
        @else
            <li class="disabled"><span><i class="fa fa-arrow-right"></i></span></li>
        @endif
    </ul>
@endif
