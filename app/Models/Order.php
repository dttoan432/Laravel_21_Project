<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'total_price',
        'status'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusTextAttribute(){
        if ($this->status == 0){
            return 'Chờ xác nhận';
        } elseif ($this->status == 1){
            return 'Đã xác nhận';
        } elseif ($this->status == 2){
            return 'Đang giao hàng';
        } elseif ($this->status == 3){
            return 'Đã hoàn thành';
        }
    }
}
