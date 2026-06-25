<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    // 👈 Kunci nama tabel menjadi transactions
    protected $table = 'transactions'; 

    protected $fillable = ['user_id', 'invoice_number', 'total_price', 'date'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function transactionDetails() {
        return $this->hasMany(TransactionDetail::class);
    }
}