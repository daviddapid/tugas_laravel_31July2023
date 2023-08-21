@extends('admin.app')
@section('scripts')
  <script>
    $('.dropify').dropify({
      tpl: {
        message: '<div class="dropify-message"><span class="file-icon" /> <p></p></div>',
      }
    });
  </script>
@endsection
@section('content')
  <h3>Master Data Siswa</h3>
  <div class="col-lg-8 ps-0 mt-4">
    <div class="card shadow-sm">
      <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Edit Siswa</h6>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.siswa.update', $siswa) }}" method="post" id="form-update"
          enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $siswa->name }}">
          </div>
          <div class="mb-3">
            <label for="about" class="form-label">about</label>
            <input type="text" name="about" id="about" class="form-control" value="{{ $siswa->about }}">
          </div>
          <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="dropify" name="photo"
              data-default-file="{{ asset('storage/' . $siswa->photo) }}" />
          </div>
        </form>
      </div>
      <div class="card-footer d-flex justify-content-end">
        <button class="btn btn-primary" type="submit" form="form-update">Update</button>
      </div>
    </div>
  </div>
@endsection
