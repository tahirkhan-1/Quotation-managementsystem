<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Create_Quotation extends Model
{
    use HasFactory;

    protected $table = 'create__quotations';

    protected $fillable = [
        'customer_name',
        'phone',
        'datetime',
        'validity_date',
        'address',
    ];

        public function customer()
    {
        return $this->belongsTo(CostumerDetail::class, 'customer_id');
    }

    public function items()
    {
        return $this->belongsToMany(Additem::class, 'quotation_items')
                    ->withPivot('quantity', 'price', 'gst')
                    ->withTimestamps();
    }
}
