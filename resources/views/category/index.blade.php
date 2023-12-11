@extends('layouts.dashboard.main')
@section('title', 'Data Kategori')
@section('content')
    <div class="row mb-5">
        <div class="col-lg">
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
                        <table class="table table-sm table-striped" id="category-table">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Kategori</th>
                                    <th class="text-center">Slug</th>
                                    <th class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $category->nama_kategori }}</td>
                                        <td class="text-center">{{ $category->slug }}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('category.edit', $category->id) }}"
                                                    class="btn btn-sm btn-warning me-1"><i
                                                        class="fa-solid fa-sm fa-edit"></i>
                                                </a>
                                                <form id="delete-form-{{ $category->id }}"
                                                    action="{{ route('category.destroy', $category->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" onclick="deleteCategory({{ $category->id }})"
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
        </div>
    </div>
@endsection
