

@if ($paginator->hasPages())

<ul class="pagination-list flex-wrap justify-content-center wow fadeInUp delay-0-2s">


    @if ($paginator->onFirstPage())

        <li class="page-item disabled d-none">
            <a href="{{ $paginator->previousPageUrl() }}" class="page-link"><i class="fas fa-angle-left"></i></a>
        </li>
    @else
        <li class="">
            <a href="{{ $paginator->previousPageUrl() }}" class="page-numbers"><i class="fas fa-angle-left"></i></a>
        </li>
    @endif

    @if($paginator->currentPage() > 3)

    <li class=""><a class="page-numbers" href="{{ $paginator->url(1) }}"> 1</a></li>
    @endif

    @if($paginator->currentPage() > 4)
    <li class="page-item disabled" aria-disabled="true"><span class="page-link seperate-pagination-link">...</span></li>

    @endif

    @foreach(range(1, $paginator->lastPage()) as $i)
        @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
            @if ($i == $paginator->currentPage())

                <li class="active">
                    <span class="page-numbers">
                    {{ $i }}
                        <span class="sr-only">(current)</span>
                    </span>
                </li>
            @else
                <li class=""><a class="white-color page-number" href="{{ $paginator->url($i) }}"> {{ $i }}</a></li>
            @endif
        @endif
    @endforeach
    @if($paginator->currentPage() < $paginator->lastPage() - 3)
    <li class="page-item disabled d-none" aria-disabled="true"><span class="page-link seperate-pagination-link">...</span></li>

    @endif

    @if($paginator->currentPage() < $paginator->lastPage() - 2)
        <li class=""><a class="page-numbers" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>

    @endif


    @if ($paginator->hasMorePages())

    <li class="">
        <a class="page-numbers" href="{{ $paginator->nextPageUrl() }}"><i class="fas fa-angle-right"></i></a>
    </li>
    @else

    @endif


</ul>



@endif



