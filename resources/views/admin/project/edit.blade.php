@extends('admin.app')
@section('content')
    <h3>Master Data Project</h3>
    <div class="col-lg-8 ps-0 mt-4">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Edit Project</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.project.update', 1) }}" method="post" id="form-update">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control">
                    </div>
                </form>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button class="btn btn-primary" type="submit" form="form-update">Update</button>
            </div>
        </div>
    </div>
@endsection
