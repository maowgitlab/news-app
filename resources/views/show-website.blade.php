@extends('layouts.dashboard.main')
@section('title', 'Lihat Website')
@section('content')
    <div class="row g-3 mb-5">
        <div class="col-lg">
            <div class="card shadow">
                <iframe src="{{ URL::to('/') }}" frameborder="0" height="100%"></iframe>
            </div>
        </div>
    </div>
@endsection
