<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Additem extends Model
{
  use HasFactory;

    protected $table = 'additemtable';

    protected $fillable = [
        'name',
        'category',
        'cost_price',
        'sale_price',
        'gst',
        'stock',
        'barcode',
    ];
        protected $casts = [
        'sale_price' => 'decimal:2',
        'gst' => 'decimal:2',
        'stock' => 'integer'
    ];
}
