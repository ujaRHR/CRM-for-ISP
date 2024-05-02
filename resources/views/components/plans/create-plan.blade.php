<div class="modal fade" id="createModal" role="dialog" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Create New Plan</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-start">
        <form id="customer-form">
          <div class="mb-3">
            <label for="name" class="form-label">Plan Name</label>
            <input type="text" id="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" id="price" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="tel" id="phone" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="billing_cycle" class="form-label">Billing Cycle</label>
            <select id="billingCycle" class="form-control" required>
              <option selected>Select Billing Cycle</option>
              <option value="monthly">Monthly Plan (30 Days)</option>
              <option value="yearly">Yearly Plan (12 Months)</option>
              <option value="semi-annual">Semi Annual (6 Months)</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="speed" class="form-label">Speed</label>
            <input type="text" id="speed" class="form-control" required>
          </div>
          <div class="mb-3">
            <button onclick="createPlan()" type="button" class="btn btn-success">Create Plan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>

@push('other-scripts')
<script>
  function createPlan() {
    let name = $('#name').val();
    let price = $('#price').val();
    let billingCycle = $('#billingCycle').val();
    let password = $('#password').val();

    if (fullname.length < 4 || email.length < 6 || phone.length < 10 || password.length < 6) {
      toastr.error("Please fill the required fields!")
    } else {
      formData = {
        fullname: fullname,
        email: email,
        phone: phone,
        password: password
      }

      let res = axios.post('/customer-signup', formData).then(function (response) {
        if (response.data.status == 'success' && response.status == 200) {
          toastr.success("Customer Created Successfully")
          $('#createModal').modal('hide');
          getCustomer();
        } else {
          toastr.error("Something Went Wrong!")
        }
      });
    }
  }

</script>
@endpush