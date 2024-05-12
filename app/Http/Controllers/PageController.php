<?php

namespace App\Http\Controllers;


use App\Models\Page;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    public function show($slug = ''){

        
        $page = Cache::rememberForever('page_' . $slug, function() use($slug) {
            return Page::activeItem($slug)->first();
        });
        $page = Page::activeItem($slug)->first();

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
        $categories = Category::activeItems()->where('category_id', NULL)->get();
        return view('page.home.index', compact('categories'));
    }

    public function contact()
    {
        return view('page.contact.index');
    }
}
