<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    // 👈 Kunci nama tabel agar sesuai dengan yang ada di file database migration dokumen
    protected $table = 'transaction_details'; 

    protected $fillable = ['transaction_id', 'product_id', 'qty', 'subtotal'];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}