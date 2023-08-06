@extends('admin.app')
@section('content')
    <!-- DataTales Example -->
    <h3>Master Data Siswa</h3>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Detail Siswa</h6>
        </div>
        <div class="card-body">
            {{ $id }}
        </div>
    </div>
@endsection
