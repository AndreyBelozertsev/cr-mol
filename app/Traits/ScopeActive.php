<?php
namespace App\Traits;

trait ScopeActive
{
    public function scopeActive($query)
    {
        return $query->where('status',1);
    }
}
