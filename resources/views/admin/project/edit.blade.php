@extends('admin.app')
@section('content')
  <h3>Create project for: <span class="text-primary fw-bold">{{ $project->siswa->name }}</span></h3>
  <div class="col-lg-8 ps-0 mt-4">
    <div class="card shadow-sm">
      <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Create Project</h6>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.project.update', $project->id) }}" method="post" id="form-store"
          enctype="multipart/form-data">
          @csrf
          @method('put')
          <input type="hidden" value="{{ $project->siswa->id }}" name="siswa_id">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="project_name" id="name"
              value="{{ old('project_name') ?? $project->project_name }}"
              class="form-control @error('project_name') is-invalid @enderror">
            @error('project_name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="project_date" id="date"
              value="{{ old('project_date') ?? $project->project_date }}"
              class="form-control  @error('project_date') is-invalid @enderror">
            @error('project_date')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="dropify" data-allowed-file-extensions="jpg jpeg png webp" name="photo"
              value="{{ old('photo') }}" data-default-file="{{ asset('storage/' . $project->photo) }}" />
            @error('photo')
              <style>
                .dropify-wrapper {
                  border: 1px solid red;
                }
              </style>
              <small class="text-danger">
                {{ $message }}
              </small>
            @enderror
          </div>
        </form>
      </div>
      <div class="card-footer d-flex justify-content-end">
        <button class="btn btn-primary" type="submit" form="form-store">Update</button>
      </div>
    </div>
  </div>
@endsection
