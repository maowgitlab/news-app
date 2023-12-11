@extends('layouts.dashboard.main')
@section('title', 'Data Berita')
@section('content')
    <div class="row mb-5">
        <div class="col-lg">
            @if (Auth::user()->status != 'non-aktif')
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><i class="fa-solid fa-sm fa-fw fa-circle-check"></i> Berhasil!</strong>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa-solid fa-fw fa-table"></i> List Data Berita
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped" id="post-table">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Gambar</th>
                                        <th class="text-center">Judul</th>
                                        <th class="text-center">Slug</th>
                                        <th class="text-center">Konten</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">Penting</th>
                                        <th class="text-center">Dibuat Tanggal</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td class="text-center" style="vertical-align: middle">{{ $loop->iteration }}
                                            </td>
                                            <td class="text-center" style="vertical-align: middle">
                                                <img class="img-fluid" src="{{ asset('storage/' . $post->gambar) }}"
                                                    width="200px" height="200px" />
                                            </td>
                                            <td style="vertical-align: middle">{{ $post->judul }}</td>
                                            <td style="vertical-align: middle">{{ $post->slug }}</td>
                                            <td style="vertical-align: middle">{!! Str::limit(strip_tags($post->konten), 100, '...') !!}</td>
                                            <td class="text-center" style="vertical-align: middle">
                                                @foreach ($post->categories as $category)
                                                    <span class="badge bg-dark">{{ $category->nama_kategori }}</span>
                                                @endforeach
                                            </td>
                                            <td style="vertical-align: middle" class="text-center">
                                                {{ $post->penting == 1 ? 'Ya' : 'Tidak' }}</td>
                                            <td style="vertical-align: middle">{{ $post->created_at }}</td>
                                            <td style="vertical-align: middle">
                                                <div class="d-flex">
                                                    <a href="{{ route('post.edit', $post->id) }}"
                                                        class="btn btn-sm btn-warning me-1"><i
                                                            class="fa-solid fa-sm fa-edit"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $post->id }}"
                                                        action="{{ route('post.destroy', $post->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" onclick="deletePost({{ $post->id }})"
                                                            class="btn btn-sm btn-danger"><i
                                                                class="fa-solid fa-sm fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-danger" role="alert">
                    <i class="fa-solid fa-circle-exclamation"></i> Akun anda dalam status <strong>Non Aktif</strong> Silahkan hubungi <strong>Admin</strong> untuk informasi lebih lanjut.
                </div>
            @endif
        </div>
    </div>
@endsection
