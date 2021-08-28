<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "name",
        "price",
        "category_id",
        "keyword",
        "content"
    ];

    /*    public function category()
        {
            return $this->belongsTo(Category::class);
        }*/

    /*    public function orders()
        {
            return $this->belongsToMany(Order::class, 'order_products', 'order_id', 'product_id');
        }*/

    public function orders()
    {
        return $this->morphedByMany(Order::class, 'genericable', 'generics');
    }

    public function category()
    {
        return $this->morphedByMany(Category::class, 'genericable', 'generics');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }


}
