<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryObserver
{
    /**
     * Handle the Client "saved" event.
     */
    public function saved(Category $category): void
    {
        Cache::forget('home_page_category');
    }
 
 
    /**
     * Handle the Client "deleted" event.
     */
    public function deleted(Category $category): void
    {
        Cache::forget('home_page_category');
    }
}
