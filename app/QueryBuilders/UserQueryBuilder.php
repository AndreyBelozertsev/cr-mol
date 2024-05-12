<?php
namespace App\QueryBuilders;


use Illuminate\Database\Eloquent\Builder;

class UserQueryBuilder extends Builder
{

    public function activeItems(): UserQueryBuilder
    {
        return $this
            ->select(['id','title','slug']);
    }


}