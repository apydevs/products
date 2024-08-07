<?php

namespace Apydevs\Products\Models;

use App\Models\BestSeller;
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



    public function category(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Category::class,'id','category_id');
    }


    public function bestSeller(): \Illuminate\Database\Eloquent\Relations\hasOne
    {
        return $this->hasOne(BestSeller::class,'product_id','id');
    }


    public function mainImage(): \Illuminate\Database\Eloquent\Relations\hasOne
    {
        return $this->hasOne(BestSeller::class,'product_id','id');
    }
}
