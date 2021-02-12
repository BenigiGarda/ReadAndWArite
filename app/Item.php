<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
    protected $fillable=['item_name','item_typeid','item_stock','item_description','item_price','item_image'];
}
