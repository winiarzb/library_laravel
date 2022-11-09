<?php

// AuthorFilter.php

namespace App\Filters;

use App\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class AuthorFilter extends AbstractFilter
{
    protected $filters = [
        'name' => NameFilter::class
    ];
}
