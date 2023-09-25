@if (count($projects) > 0)
  @foreach ($projects as $p)
    <div class="col-lg-6" id="project-{{ $p->id }}">
      <div class="card">
        <div class="card-header">{{ $p->project_name }}</div>
        <div class="card-body">
          <div class="mb-3">
            <h6>Tanggal</h6>
            <h6 class="fw-bold">{{ $p->project_date }}</h6>
          </div>
          <div class="mb-3">
            <h6>Photo</h6>
            <img style="width: 100%;" src="{{ asset('storage/' . $p->photo) }}" alt="">
          </div>
        </div>
        <div class="card-footer d-flex gap-2 justify-content-end">
          <a class="btn btn-warning" href="{{ route('admin.project.edit', $p->id) }}">Update</a>
          <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete"
            onclick="handleDelete('{{ route('admin.project.destroy', $p->id) }}', {{ $p->id }})">Delete</button>
        </div>
      </div>
    </div>
  @endforeach

  <!-- Modal Delete-->
  <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="modal-deleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modal-deleteLabel">Hapus Data</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Apa Anda yakin untuk menghapus data ini ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" onclick="deleteAction()">Delete</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    let formData = new FormData();
    formData.append('_token', "{{ csrf_token() }}");
    formData.append('_method', "DELETE");
    let URL = null
    let PROJECT_ID = null

    function handleDelete(url, project_id) {
      URL = url
      PROJECT_ID = project_id
    }
    async function deleteAction() {
      const response = await fetch(URL, {
        method: 'POST',
        body: formData
      })
      $("#modal-delete").modal('hide');
      $('#project-' + PROJECT_ID).remove();
      console.log(response);
    }
  </script>
@else
  <div class="alert alert-primary">
    <h3>Data Kosong</h3>
  </div>
@endif
