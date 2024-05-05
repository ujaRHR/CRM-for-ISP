<div class="modal fade" id="createModal" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Create New Staff</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-start">
        <form id="staff-form">
          <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" id="fullname" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="tel" id="phone" class="form-control" required>
          </div>
          <div class="row">
            <div class="mb-3 col-6">
              <label for="position" class="form-label">Position</label>
              <select id="position" class="form-control" required>
                <option selected>Select Staff Position</option>
                <option value="default">Default</option>
                <option value="engineer">Engineer</option>
                <option value="sales">Sales</option>
                <option value="technician">Technician</option>
                <option value="field_worker">Field Worker</option>
              </select>
            </div>
            <div class="mb-3 col-6">
              <label for="salary" class="form-label">Salary</label>
              <input type="number" id="salary" class="form-control" value="" min="0">
            </div>
          </div>
          <div class="mb-3">
            <button onclick="createStaff()" type="button" class="btn btn-success">Create</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>

@push('other-scripts')
<script>
  function createStaff() {
    let fullname = $('#fullname').val();
    let email = $('#email').val();
    let phone = $('#phone').val();
    let position = $('#position').val();
    let salary = $('#salary').val();

    if (fullname.length < 4 || email.length < 6 || phone.length < 10 || position.length < 4 || salary.length < 1) {
      toastr.error("Please fill the required fields!")
    } else {
      formData = {
        fullname: fullname,
        email: email,
        phone: phone,
        position: position,
        salary: salary
      }

      let res = axios.post('/staff-signup', formData).then(function (response) {
        if (response.data.status == 'success' && response.status == 200) {
          toastr.success("Staff Created Successfully")
          $('#createModal').modal('hide');
          getStaffs();
        } else {
          toastr.error("Something Went Wrong!")
        }
      });
    }
  }

</script>
@endpush