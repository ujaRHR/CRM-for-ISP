<div class="modal fade" id="updateModal" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Update Staff</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-start">
        <form id="update-form">
          <div class="mb-3">
            <input type="number" class="d-none" id="updateID" value="">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" id="updateFullname" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="updateEmail" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="tel" id="updatePhone" class="form-control" required>
          </div>
          <div class="row">
            <div class="mb-3 col-6">
              <label for="position" class="form-label">Position</label>
              <select id="updatePosition" class="form-control" required>
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
              <input type="number" id="updateSalary" class="form-control" value="" min="0">
            </div>
          </div>
          <div class="mb-3">
            <button onclick="updateStaff()" type="button" class="btn btn-success">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>

@push('other-scripts')
<script>

  async function getStaffInfo() {
    let id = $('#updateID').val()

    let res = await axios.post('/staff-info', { id: id }).then(function (response) {
      $('#updateFullname').val(response.data.fullname)
      $('#updateEmail').val(response.data.email)
      $('#updatePhone').val(response.data.phone)
      $('#updatePosition').val(response.data.position)
      $('#updateSalary').val(response.data.salary)
    })
  }

  function updateStaff() {
    let id = $('#updateID').val()
    let fullname = $('#updateFullname').val();
    let email = $('#updateEmail').val();
    let phone = $('#updatePhone').val();
    let position = $('#updatePosition').val();
    let salary = $('#updateSalary').val();

    if (fullname.length < 4 || email.length < 6 || phone.length < 10 || position.length < 4 || salary.length < 1) {
      toastr.error("Please fill the required fields properly!")
    } else {
      formData = {
        id: id,
        fullname: fullname,
        email: email,
        phone: phone,
        position: position,
        salary: salary
      }

      let res = axios.post('/update-staff', formData).then(function (response) {
        if (response.data.status == 'success' && response.status == 200) {
          toastr.success("Staff Created Successfully")
          $('#updateModal').modal('hide');
          getStaffs();
        } else {
          toastr.error("Something Went Wrong!")
        }
      });
    }
  }

</script>
@endpush