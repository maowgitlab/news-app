@extends('layouts.dashboard.main')
@section('title', 'Dashboard')
@section('content')
    <div class="row g-3 mb-5">
        <h4>Informasi Anda</h4>
        <div class="col-lg-6">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Nama
                    <span class="badge bg-dark rounded-pill">{{ Auth::user()->nama }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Username
                    <span class="badge bg-dark rounded-pill">{{ Auth::user()->username }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Role
                    <span class="badge bg-dark rounded-pill">{{ Auth::user()->role }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Status
                    @if (Auth::user()->status == 'aktif')
                        <span class="badge bg-success rounded-pill">{{ Auth::user()->status }}</span>
                    @else
                        <span class="badge bg-danger rounded-pill">{{ Auth::user()->status }}</span>
                    @endif
                </li>
            </ul>
        </div>
        <div class="col-lg-6">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Terakhir Login
                    <span
                        class="badge bg-dark rounded-pill">{{ Auth::user()->terakhir_login == null ? 'Belum Tercatat' : Auth::user()->terakhir_login . ' | UTC+8' }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Total Login
                    <span class="badge bg-dark rounded-pill">{{ Auth::user()->total_login }} Kali</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Didaftarkan pada
                    <span class="badge bg-dark rounded-pill">{{ Auth::user()->created_at }} | UTC+8</span>
                </li>
            </ul>
        </div>
    </div>
@endsection
