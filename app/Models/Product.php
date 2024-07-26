<?php

namespace App\Models;

use App\Traits\HandleImageTrait;
use App\Traits\Imaginable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const IMAGE_SAVE_PATH = 'public/upload/';
    const IMAGE_SHOW_PATH = 'storage/upload/';
    public function overProducts()
    {
        return $this->where("quantity", ">", 0)->where("quantity", "<", 10)->get();
    }
    protected $fillable = [
        'name',
        'description',
        'price',
        "quantity"
    ];

    public function details()
    {
        return $this->hasMany(ProductDetail::class, "product_id");
    }
    public function images()
    {
        // return Image::where("imageable_id",$this->id)->where("imageable_type","products")->get();
        return $this->hasMany(Image::class, "imageable_id", "id")->where("imageable_type", "products");
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}