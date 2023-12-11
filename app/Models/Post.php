<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y H:i');
    }

    public function scopeFilter($query, $search = null, $category = null)
    {
        return $query->when($search, function($query) use ($search) {
            $query->where('judul', 'like', '%' .$search. '%');
        })
        ->when($category, function($query) use ($category) {
            $query->whereHas('categories', function($categoryQuery) use ($category) {
                $categoryQuery->where('slug', $category);
            });
            // $query->join('post_categories', 'posts.id', '=', 'post_categories.post_id')
            // ->join('categories', 'post_categories.category_id', '=', 'categories.id')
            // ->where('categories.nama_kategori', $category);
        });
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_categories', 'post_id', 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'diupload_oleh');
    }
}
