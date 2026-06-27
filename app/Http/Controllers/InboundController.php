<?php

namespace App\Http\Controllers;

use App\Models\Inbound;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InboundController extends Controller
{
    // Menampilkan Halaman Laporan & Form Pemasukan
    public function index()
    {
        $products = Product::all();
        
        // Ambil riwayat barang masuk dari supplier
        $inbounds = Inbound::with('product')->orderBy('date', 'desc')->get();

        // 📊 Hitung Total Finansial untuk Laporan Kas
        $totalPengeluaranModal = Inbound::sum('total_cost'); // Total uang keluar ke supplier
        $totalPemasukanKasir = Transaction::sum('total_price'); // Total uang masuk dari POS
        $labaKotor = $totalPemasukanKasir - $totalPengeluaranModal;

        return view('inbound.index', compact('products', 'inbounds', 'totalPengeluaranModal', 'totalPemasukanKasir', 'labaKotor'));
    }

    // Memproses Barang Masuk (Inbound) dari Supplier
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1',
            'supplier_price' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        DB::beginTransaction();
        try {
            $totalCost = $request->qty * $request->supplier_price;

            // 1. Catat ke log riwayat inbound
            Inbound::create([
                'product_id' => $request->product_id,
                'qty' => $request->qty,
                'supplier_price' => $request->supplier_price,
                'total_cost' => $totalCost,
                'date' => $request->date,
            ]);

            // 2. Otomatis Tambah Stok Barang aslinya di Gudang!
            $product = Product::find($request->product_id);
            $product->increment('stock', $request->qty);

            DB::commit();
            return redirect()->back()->with('success', 'Barang masuk berhasil dicatat. Stok otomatis bertambah!');

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
                
    }
    // Menampilkan halaman Edit Inbound
    public function edit(Inbound $inbound)
    {
        $products = Product::all();
        return view('inbound.edit', compact('inbound', 'products'));
    }

    // Memproses Pembaruan Data Inbound & Koreksi Stok Gudang
    public function update(Request $request, Inbound $inbound)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1',
            'supplier_price' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        DB::beginTransaction();
        try {
            // 1. Ambil produk terkait
            $product = Product::find($inbound->product_id);

            // 2. KOREKSI STOK: Kembalikan dulu stok lama sebelum di-update
            $product->decrement('stock', $inbound->qty);

            // 3. Hitung total cost baru
            $totalCost = $request->qty * $request->supplier_price;

            // 4. Update data inbound
            $inbound->update([
                'product_id' => $request->product_id,
                'qty' => $request->qty,
                'supplier_price' => $request->supplier_price,
                'total_cost' => $totalCost,
                'date' => $request->date,
            ]);

            // 5. Tambahkan stok baru hasil inputan edit ke gudang
            $product->increment('stock', $request->qty);

            DB::commit();
            return redirect()->route('inbound.index')->with('success', 'Laporan inbound berhasil diperbarui & stok gudang telah dikoreksi!');

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    // Menghapus Data Inbound & Memotong Stok Kembali
    public function destroy(Inbound $inbound)
    {
        DB::beginTransaction();
        try {
            // Potong stok produk di gudang karena nota inbound ini dibatalkan/dihapus
            $product = Product::find($inbound->product_id);
            $product->decrement('stock', $inbound->qty);

            // Hapus data log dari database
            $inbound->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Data inbound berhasil dihapus & stok gudang otomatis dikurangi!');
            
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}