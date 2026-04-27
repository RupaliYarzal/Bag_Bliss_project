<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['catg_id','pname','pimage','desc','price',];

    // Assumes stocks table has a pid column that references products.id.
    public function stock()
    {
        return $this->hasOne(Stock::class, 'pid', 'id');
    }
}
