<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inbound extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'qty', 'supplier_price', 'total_cost', 'date'];

    // Relasi ke tabel Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}