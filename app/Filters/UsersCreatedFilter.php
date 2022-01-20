<?php

namespace App\Filters;

use Carbon\Carbon;
use LaravelViews\Filters\DateFilter;
use Illuminate\Database\Eloquent\Builder;

class UsersCreatedFilter extends DateFilter
{
    /**
     * Modify the current query when the filter is used
     *
     * @param Builder $query Current query
     * @param Carbon $date Carbon instance with the date selected
     * @return Builder Query modified
     */
    public function apply(Builder $query, Carbon $date, $request): Builder
    {
        $query->where('created_at', $date);
    }
}
