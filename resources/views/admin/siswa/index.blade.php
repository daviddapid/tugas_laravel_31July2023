@extends('admin.app')
@section('head')
  <link href="{{ asset('admin_assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('scripts')
  <script src="{{ asset('admin_assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin_assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable();

    });

    function handleDelete(url) {
      console.log(url);
      $('#form-delete').attr('action', url);
    }
  </script>
@endsection
@section('content')
  <!-- DataTales Example -->
  <h3>Master Data Siswa</h3>
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
      <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
      <a href="{{ route('admin.siswa.create') }}" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">tambah data</span>
      </a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>About</th>
              <th>Photo</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($siswas as $i => $s)
              <tr>
                <td style="vertical-align: middle">{{ $i + 1 }}</td>
                <td style="white-space: nowrap;vertical-align: middle">{{ $s->name }}</td>
                <td style="vertical-align: middle;">{{ Str::substr($s->about, 0, 50) }}</td>
                <td style="width: 100px;"><img class="w-100" src="{{ asset('storage/' . $s->photo) }}" alt="">
                </td>
                <td style="white-space: nowrap; vertical-align: middle;width: 19px;">
                  <a href="{{ route('admin.siswa.show', $s->id) }}" class="btn btn-info btn-circle">
                    <i class="fas fa-info-circle"></i>
                  </a>
                  <a href="{{ route('admin.siswa.edit', $s->id) }}" class="btn btn-warning btn-circle">
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                  <button onclick="handleDelete('{{ route('admin.siswa.destroy', $s->id) }}')"
                    class="btn btn-danger btn-circle" data-bs-toggle="modal" data-bs-target="#modal-delete">
                    <i class="fas fa-trash"></i>
                  </button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Modal delete -->
  <div class="modal fade" id="modal-delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modal-deleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modal-deleteLabel">Hapus Data ?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="POST" id="form-delete">
            @csrf
            @method('delete')
            apa anda yakin menghapus data ini
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-danger" type="submit" form="form-delete">Delete</button>
        </div>
      </div>
    </div>
  </div>
@endsection
