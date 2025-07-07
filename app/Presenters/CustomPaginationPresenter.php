<?php

namespace App\Presenters;

use Illuminate\Pagination\LengthAwarePaginator;

class CustomPaginationPresenter
{
    protected $paginator;
    protected $limit;

    public function __construct(LengthAwarePaginator $paginator, $limit = 3)
    {
        $this->paginator = $paginator;
        $this->limit = $limit;
    }

    public function render()
    {
        $current = $this->paginator->currentPage();
        $lastPage = $this->paginator->lastPage();
        $half = floor($this->limit / 2);

        $start = max(1, $current - $half);
        $end = min($lastPage, $current + $half);

        return view('vendor.pagination.custom-bootstrap-4', [
            'paginator' => $this->paginator,
            'start' => $start,
            'end' => $end,
            'current' => $current,
        ])->render();
    }
}