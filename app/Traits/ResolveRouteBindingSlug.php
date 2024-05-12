<?php 
namespace App\Traits;


trait ResolveRouteBindingSlug
{
    public function resolveRouteBinding($value, $field = null)
    {
        return $this->active()->where('slug', $value)->firstOrFail();
    }
}