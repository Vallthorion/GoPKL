@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link" title="Halaman pertama"><i class="fa-solid fa-chevron-left"></i> Sebelumnya</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" title="Halaman sebelumnya"><i class="fa-solid fa-chevron-left"></i> Sebelumnya</a>
            </li>
        @endif

        {{-- Separator --}}
        <li class="page-separator" style="color:var(--gray-300);align-self:center;margin:0 2px">|</li>

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">{{ $element }}</span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page">
                            <span class="page-link" title="Halaman saat ini">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Separator --}}
        <li class="page-separator" style="color:var(--gray-300);align-self:center;margin:0 2px">|</li>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" title="Halaman selanjutnya">Selanjutnya <i class="fa-solid fa-chevron-right"></i></a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link" title="Halaman terakhir">Selanjutnya <i class="fa-solid fa-chevron-right"></i></span>
            </li>
        @endif
    </ul>
@endif

