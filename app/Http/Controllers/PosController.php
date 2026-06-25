<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PosController extends Controller
{
    public function index() {
        $products = Product::all();
        // Ambil isi keranjang dari session (jika kosong, kembalikan array [])
        $cart = session()->get('cart', []);
        return view('pos.index', compact('products', 'cart'));
    }

    public function addToCart(Product $product) {
        $cart = session()->get('cart', []);
        // Cek jika produk sudah ada di keranjang, tambah qty-nya
        if(isset($cart[$product->id])) {
            $cart[$product->id]['qty']++;
        } else {
            // Jika belum ada, masukkan sebagai data baru
            $cart[$product->id] = [
                "name" => $product->name,
                "qty" => 1,
                "price" => $product->price,
            ];
        }
        // Simpan pembaruan ke session
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        DB::beginTransaction();
        try {
            $total = 0;
            foreach($cart as $item) {
                $total += $item['price'] * $item['qty'];
            }

            // 1. Simpan tabel Induk Transaksi
            $transaction = Transaction::create([
                'user_id' => auth()->id(),
                'invoice_number' => 'INV-' . strtoupper(Str::random(10)),
                'total_price' => $total,
                'date' => now(),
            ]);

            // 2. Simpan setiap item di keranjang ke Detail Transaksi
            foreach($cart as $id => $item) {
                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $id,
                    'qty' => $item['qty'],
                    'subtotal' => $item['price'] * $item['qty'],
                ]);

                // 3. Kurangi stok barang aslinya!
                $product = Product::find($id);
                $product->decrement('stock', $item['qty']);
            }

            DB::commit(); // Berhasil simpan ke database
            session()->forget('cart'); // Bersihkan keranjang belanja dari session

            // 🚀 PROSES PEMBUATAN PDF STRUK (Dimasukkan ke sini sebelum return)
            $transaction->load('transactionDetails.product');
            $pdf = Pdf::loadView('pos.receipt', compact('transaction'));
            
            // Atur ukuran kertas thermal kasir (80mm x 150mm)
            $pdf->setPaper([0, 0, 226.77, 425.20], 'portrait');
            
            // Download file PDF
            return $pdf->download($transaction->invoice_number . '.pdf');

        } catch (\Exception $e) {
            DB::rollBack(); // Batalkan transaksi database jika gagal
            throw $e; 
        }
    }
}