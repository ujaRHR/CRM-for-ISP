<div class="modal fade" id="createModal" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Create New Notice</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-start">
        <form id="staff-form">
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" class="form-control" required></textarea>
          </div>
      </div>
      <div class="mb-3">
        <button onclick="createNotice()" type="button" class="btn btn-success">Create</button>
      </div>
      </form>
    </div>
  </div>
</div>

</div>

@push('other-scripts')
<script>
  function createNotice() {
    let title = $('#title').val();
    let description = $('#description').val();

    if (title.length < 4 || description.length < 6) {
      toastr.error("Please fill the required fields!")
    } else {
      formData = {
        title: title,
        description: description,
      }

      let res = axios.post('/create-notice', formData).then(function(response) {
        if (response.data.status == 'success' && response.status == 200) {
          toastr.success("Notice Created Successfully")
          $('#createModal').modal('hide');
          getNotices();
        } else {
          toastr.error("Something Went Wrong!")
        }
      });
    }
  }
</script>
@endpush