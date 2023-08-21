@extends('admin.app')
@section('content')
  <!-- DataTales Example -->
  <h3>Master Data Siswa</h3>
  <div class="col-lg-4 px-0">
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Detail Siswa</h6>
      </div>
      <div class="card-body">
        <img src="{{ asset('storage/' . $siswa->photo) }}" class="w-100 mb-3" style="height: 300px; object-fit: cover;"
          alt="..." style="width: 300px">
        <h3 class="card-title mb-2">{{ $siswa->name }}</h3>
        <p>
          {{ $siswa->about }}
        </p>
      </div>
    </div>
  </div>
@endsection
