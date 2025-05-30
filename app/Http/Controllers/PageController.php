<?php

namespace App\Http\Controllers;


use App\Models\Page;
use App\Models\User;
use App\Models\Category;
use App\Models\CategoryDirection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    public function show($slug = ''){

        
        $page = Cache::rememberForever('page_' . $slug, function() use($slug) {
            return Page::activeItem($slug)->first();
        });

        if($page){

            if(view()->exists("page.$page->template.index")){
                return view("page.$page->template.index", ['page' => $page] );
            }

            return view('page.default.index', ['page' => $page]);
        }
        abort(404);
    }

    public function home()
    {
        $category_directions = Cache::rememberForever('home_page_category_direction', function() {
            return CategoryDirection::activeItems()->with([
                'categories' => fn ($query) => $query->activeItems()->where('category_id', NULL),
            ])->get();
       });

        $categories = Cache::rememberForever('home_page_category', function() {
             return Category::activeItems()->where('category_id', NULL)->get();
        });
        return view('page.home.index', [
            'category_directions' => $category_directions,
            'categories' => $categories
        ]);
    }

    public function contact()
    {
        return view('page.contact.index');
    }
}
