<?php
namespace App\QueryBuilders;


use Illuminate\Database\Eloquent\Builder;

class UnitQueryBuilder extends Builder
{

    public function activeItem($value, $field = 'slug'): UnitQueryBuilder
    {
        return $this->active()
            ->where($field, $value)
            ->active()
            ->whereHas('category', function($q){
                $q->active();
            })
            ->with([
                'category' => fn ($query) => $query
                    ->select(['id','title','slug'])
            ])
            ->select(['id','title','slug','thumbnail','content', 'address', 'age','status', 'images', 'category_id']);
    }
    public function activeItems(): UnitQueryBuilder
    {
        return $this->active()
            ->orderBy('title', 'asc')
            ->select(['id','title','slug','thumbnail','description', 'status', 'category_id']);
    }
}