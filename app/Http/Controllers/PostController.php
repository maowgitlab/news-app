<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\PostCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('diupload_oleh', Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('post.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'gambar' => 'nullable|file|mimes:png,jpg,jpeg|max:300',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ], [
            'judul.required' => 'Judul tidak boleh kosong.',
            'konten.required' => 'Konten tidak boleh kosong.',
            'gambar.file' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format file gambar harus png, jpg, atau jpeg.',
            'gambar.max' => 'Ukuran file gambar tidak boleh lebih dari 300kb.',
            'categories.*.exists' => 'Pilih kategori yang valid.',
            'categories' => 'Kategori tidak boleh kosong.'
        ]);

        $post = Post::findOrFail($id);

        if ($request->hasFile('gambar')) {
            unlink(public_path('storage/' . $post->gambar));
            $post->update([
                'diupload_oleh' => Auth::user()->id,
                'judul'         => $request->post('judul'),
                'slug'          => Str::slug($request->post('judul')),
                'konten'        => $request->post('konten'),
                'gambar'        => $request->file('gambar')->store('img'),
                'penting'       => $request->has('penting') ? true : false
            ]);
            $post->categories()->sync($request->post('categories'));
            return redirect()->route('post.list')->with('success', 'Berhasil mengupdate Konten dan gambar Data Berita.');
        } else {
            $post->update([
                'diupload_oleh' => Auth::user()->id,
                'judul'         => $request->post('judul'),
                'slug'          => Str::slug($request->post('judul')),
                'konten'        => $request->post('konten'),
                'penting'       => $request->has('penting') ? true : false
            ]);
            $post->categories()->sync($request->post('categories'));
            return redirect()->route('post.list')->with('success', 'Berhasil mengupdate Konten Data Berita.');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'gambar' => 'required|file|mimes:png,jpg,jpeg|max:300',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ], [
            'judul.required' => 'Judul tidak boleh kosong.',
            'konten.required' => 'Konten tidak boleh kosong.',
            'gambar.required' => 'Gambar tidak boleh kosong.',
            'gambar.file' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format file gambar harus png, jpg, atau jpeg.',
            'gambar.max' => 'Ukuran file gambar tidak boleh lebih dari 300kb.',
            'categories.*.exists' => 'Pilih kategori yang valid.',
            'categories' => 'Kategori tidak boleh kosong.'
        ]);

        $post = Post::create([
            'diupload_oleh' => Auth::user()->id,
            'judul'         => $request->post('judul'),
            'slug'          => Str::slug($request->post('judul')),
            'konten'        => $request->post('konten'),
            'gambar'        => $request->file('gambar')->store('img'),
            'penting'       => $request->has('penting') ? true : false
        ]);
        $post->categories()->attach($request->post('categories'));

        return redirect()->route('post.list')->with('success', 'Berita berhasil ditambahkan dan diupload.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->gambar != null) {
            unlink(public_path('storage/' . $post->gambar));
        }
        $post->delete();
        return redirect()->route('post.list')->with('success', 'Berita berhasil dihapus.');
    }
}
