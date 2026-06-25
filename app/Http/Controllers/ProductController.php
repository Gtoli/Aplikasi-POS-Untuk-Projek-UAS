<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index() {
    $products = Product::with('category')->get();
    return view('products.index', compact('products'));
}

public function create() {
    $categories = Category::all(); // Mengambil kategori untuk pilihan Dropdown
    return view('products.create', compact('categories'));
}

public function store(Request $request) {
    // Tambahkan 'unique:products,name' di bagian validasi nama produk
    $request->validate([
        'category_id' => 'required',
        'name' => 'required|unique:products,name', // 👈 Mencegah double sejak tahap input formulir
        'price' => 'required|numeric',
        'stock' => 'required|numeric'
    ], [
        // Pesan peringatan kustom jika namanya sudah ada
        'name.unique' => 'Nama produk ini sudah terdaftar di database, tidak boleh ganda!'
    ]);

    Product::create($request->all()); // 
    return redirect()->route('products.index'); // [cite: 156]
}
    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
{
    // Mengambil semua kategori untuk pilihan jika kategori ingin diubah
    $categories = Category::all();
    return view('products.edit', compact('product', 'categories'));
}

public function update(Request $request, Product $product)
{
    $request->validate([
        'category_id' => 'required',
        'name' => 'required|unique:products,name,' . $product->id, // Abaikan pengecekan unik untuk barang ini sendiri
        'price' => 'required|numeric',
        'stock' => 'required|numeric'
    ]);

    // Update data di database
    $product->update($request->all());

    return redirect()->route('products.index')->with('success', 'Data produk dan stok berhasil diperbarui!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        //
    }
}
