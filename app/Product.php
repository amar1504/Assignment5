<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps=false;
    protected $table="products";
    protected $fillable=['id','productname','productprice','productimage','category'];
    
    public function productCategory() {
        return $this->belongsTo(Category::class, 'id' );
    }

}
