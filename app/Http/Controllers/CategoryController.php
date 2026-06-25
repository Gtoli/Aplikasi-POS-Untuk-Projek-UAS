<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
    $categories = Category::all();
    return view('categories.index', compact('categories'));
}

public function create() {
    return view('categories.create');
}

public function store(Request $request) {
    // Tambahkan 'unique:categories,name' pada aturan validasi
    $request->validate([
        'name' => 'required|string|max:255|unique:categories,name', // 👈 Mencegah nama kategori ganda
    ], [
        // Pesan error kustom jika nama kategori sudah ada
        'name.unique' => 'Nama kategori ini sudah terdaftar, silakan gunakan nama lain!'
    ]);

    Category::create($request->all()); // [cite: 135]
    return redirect()->route('categories.index'); // [cite: 136]
}

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        //
    }
}
