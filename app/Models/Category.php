<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'depth',
        'user_id',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function trademarks(){
        return $this->belongsToMany(Trademark::class);
    }
}
