<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Category;
use Illuminate\Http\Request;
use App\QueryBuilders\LikeQueryBuilder;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::activeItem($slug)->firstOrFail();

        if($category->child->isEmpty()){
            $units = Unit::whereHas('category', function($query) use($slug){
                return $query->where('slug', $slug);
            })
            ->activeItems()
            ->paginate(24);

            //$isDisabledVoteButton = isDisableVoteButton($category->id);

            $isDisabledVoteButton = true;

            return view("unit.index", compact(['category', 'units', 'isDisabledVoteButton']));
        }
        return view("category.index", compact(['category']));

    }
}
