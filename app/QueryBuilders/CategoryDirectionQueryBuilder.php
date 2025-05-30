<?php
namespace App\QueryBuilders;


use Illuminate\Database\Eloquent\Builder;

class CategoryDirectionQueryBuilder extends Builder
{
    public function activeItems(): CategoryDirectionQueryBuilder
    {
        return $this->active()
            ->orderBy('sort', 'asc')
            ->select(['id','title','sort','status']);
    }

}