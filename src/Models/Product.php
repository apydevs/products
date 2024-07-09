<?php

namespace Apydevs\Products\Models;

use App\Models\Scopes\DynamicLikeScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new DynamicLikeScope);
    }
}
