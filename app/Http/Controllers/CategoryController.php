<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest('id')->get();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required'
        ], [
            'nama_kategori' => 'Nama Kategori tidak boleh kosong.'
        ]);
        Category::create([
            'nama_kategori' => $request->post('nama_kategori'),
            'slug' => Str::slug($request->post('nama_kategori'))
        ]);
        return redirect()->route('category.list')->with('success', 'Data Kategori berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required'
        ], [
            'nama_kategori' => 'Nama Kategori tidak boleh kosong.'
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'nama_kategori' => $request->post('nama_kategori'),
            'slug' => Str::slug($request->post('nama_kategori'))
        ]);
        return redirect()->route('category.list')->with('success', 'Data Kategori berhasil diupdate.');
    }
    
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.list')->with('success', 'Data Kategori berhasil dihapus.');

    }
}
