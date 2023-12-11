@extends('layouts.dashboard.main')
@section('title', 'Data User')
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
                    <i class="fa-solid fa-fw fa-table"></i> List Data User
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped" id="user-table">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Terakhir Login</th>
                                    <th class="text-center">Total Login</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $user->nama }}</td>
                                        <td class="text-center">{{ $user->username }}</td>
                                        <td class="text-center">{{ $user->role }}</td>
                                        <td class="text-center">{{ $user->created_at }}</td>
                                        <td class="text-center">{{ $user->total_login }} Kali</td>
                                        <td class="text-center">{{ $user->status }}</td>
                                        <td class="text-center">
                                            @if ($user->role == 'admin')
                                                <i class="fa-solid fa-fw fa-star text-warning"></i>
                                            @else
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('user.edit', $user->id) }}"
                                                    class="btn btn-sm btn-warning me-1"><i
                                                        class="fa-solid fa-sm fa-edit"></i>
                                                </a>
                                                <form id="delete-form-{{ $user->id }}"
                                                    action="{{ route('user.destroy', $user->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" onclick="deleteUser({{ $user->id }})"
                                                        class="btn btn-sm btn-danger"><i
                                                            class="fa-solid fa-sm fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            @endif
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
