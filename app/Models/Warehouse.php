<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $table = 'warehouse';

    protected $fillable = [
        'product_id',
        'sold',
        'sale_date',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
