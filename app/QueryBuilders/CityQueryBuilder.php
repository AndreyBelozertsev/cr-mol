<?php
namespace App\QueryBuilders;


use Illuminate\Database\Eloquent\Builder;

class CityQueryBuilder extends Builder
{

    public function activeItems(): CityQueryBuilder
    {
        return $this
            ->orderBy('sort', 'asc')
            ->select(['id','title','sort']);
    }
}