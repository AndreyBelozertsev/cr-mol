<?php
namespace App\Models;

use App\QueryBuilders\CityQueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class City extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */

    protected $fillable = [
        'title',
        'sort',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }


    public function newEloquentBuilder($query): CityQueryBuilder 
    {
         return new CityQueryBuilder($query);
    }
}
