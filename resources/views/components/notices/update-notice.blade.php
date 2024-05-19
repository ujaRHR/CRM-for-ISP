<div class="modal fade" id="updateModal" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Update Notice</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-start">
        <form id="update-form">
          <div class="mb-3">
            <input type="text" id="updateID" value="" class="d-none">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="updateTitle" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="updateDescription" class="form-control" required></textarea>
          </div>
          <div class="mb-3">
            <button onclick="updateNotice()" type="button" class="btn btn-success">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>

@push('other-scripts')
<script>
  async function getNoticeInfo() {
    let id = $('#updateID').val()

    let res = await axios.post('/notice-info', {
      id: id
    }).then(function(response) {
      $('#updateTitle').val(response.data.title)
      $('#updateDescription').val(response.data.description)
    })
  }

  function updateNotice() {
    let id = $('#updateID').val()
    let title = $('#updateTitle').val();
    let description = $('#updateDescription').val();

    if (title.length < 4 || description.length < 6) {
      toastr.error("Please fill the required fields properly!")
    } else {
      formData = {
        id: id,
        title: title,
        description: description
      }

      let res = axios.post('/update-notice', formData).then(function(response) {
        if (response.data.status == 'success' && response.status == 200) {
          toastr.success("Notice Updated Successfully")
          $('#updateModal').modal('hide');
          getNotices();
        } else {
          toastr.error("Something Went Wrong!")
        }
      });
    }
  }
</script>
@endpush