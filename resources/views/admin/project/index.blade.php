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
  <h3>Master Data Project</h3>
  <div class="row">
    <div class="col-lg-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
          <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
          {{-- <a href="{{ route('admin.project.create') }}" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-plus"></i>
            </span>
            <span class="text">tambah data</span>
          </a> --}}
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($siswas as $i => $s)
                  <tr>
                    <td style="width: 2px;white-space: nowrap;">{{ $i + 1 }}</td>
                    <td style="white-space: nowrap;vertical-align: middle">{{ $s->name }}</td>
                    <td style="white-space: nowrap; vertical-align: middle; width: 9px; white-space: nowrap;">
                      <button onclick="show('{{ route('admin.project.show', $s->id) }}')" class="btn btn-info btn-circle">
                        <i class="fas fa-folder-open"></i>
                      </button>
                      <a href="{{ route('admin.project.edit', 1) }}" class="btn btn-success btn-circle">
                        <i class="fas fa-plus"></i>
                      </a>
                      {{-- <button onclick="handleDelete('{{ route('admin.project.destroy', 1) }}')"
                      class="btn btn-danger btn-circle" data-bs-toggle="modal" data-bs-target="#modal-delete">
                      <i class="fas fa-trash"></i>
                    </button> --}}
                    </td>
                  </tr>
                @endforeach
              </tbody>
              @push('scripts-stack')
                <script>
                  function show(url) {
                    // console.log(url);
                    $.get(url, function(data) {
                      if (data.length > 0) {
                        $("#wrapper-projects").empty();
                        data.forEach(p => {
                          $("#wrapper-projects").append(
                            `
                            <div class="col-lg-6">
                              <div class="card">
                                <div class="card-header">${p.project_name}</div>
                                <div class="card-body">
                                  <div class="mb-3">
                                    <h6>Tanggal</h6>
                                    <h6 class="fw-bold">${p.project_date}</h6>
                                  </div>
                                  <div class="mb-3">
                                    <h6>Photo</h6>
                                    <img style="width: 100%;" src="{{ asset('storage') }}/${p.photo}" alt="">
                                  </div>
                                </div>
                              </div>
                            </div>
                            `
                          );
                        });
                      } else {
                        $("#wrapper-projects").html('<h1>Data Kosong</h1>')
                      }
                      console.log(data.length);
                    });
                  }
                </script>
              @endpush
            </table>
          </div>
        </div>

      </div>
    </div>
    <div class="col-lg-8">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
          <h6 class="m-0 font-weight-bold text-primary">Data Project</h6>
          <a href="{{ route('admin.project.create') }}" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-plus"></i>
            </span>
            <span class="text">tambah data</span>
          </a>
        </div>
        <div class="card-body">
          <div class="row" id="wrapper-projects">

          </div>
        </div>
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
