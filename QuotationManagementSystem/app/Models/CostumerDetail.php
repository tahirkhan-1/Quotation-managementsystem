<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CostumerDetail extends Model
{

    protected $table = 'additemtable';   // set to your actual DB table
    protected $fillable = [
        'name', 'category', 'barcode', 'sale_price', 'gst_rate', 'stock'
    ];
}

