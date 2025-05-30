<?php

namespace App\Models;

use App\Traits\ScopeActive;
use Illuminate\Database\Eloquent\Model;
use App\QueryBuilders\CategoryDirectionQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryDirection extends Model
{
    use HasFactory, ScopeActive;

    protected $fillable = [
        'title',
        'status',
        'sort'
    ];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }


    public function newEloquentBuilder($query): CategoryDirectionQueryBuilder 
    {
         return new CategoryDirectionQueryBuilder($query);
    }
}
