<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inword extends Model
{
    use HasFactory;
    protected $fillable=['pid','qty','price'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'pid', 'id');
    }
}
