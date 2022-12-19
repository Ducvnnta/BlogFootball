<?php

namespace App\Traits;

use Illuminate\Pagination\LengthAwarePaginator;

trait RenderPagination {

    private function renderPagination(LengthAwarePaginator $paginator, callable $renderItem): array
    {
        return [
            'items' => $paginator->map($renderItem),
            'total'        => $paginator->total(),
            'has_more'     => $paginator->hasMorePages(),
            'current_page' => $paginator->currentPage(),
            'last_page'    => $paginator->lastPage(),
        ];
    }

}
