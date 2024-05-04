<div class="modal fade" id="createModal" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Create New Plan</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-start">
        <form id="plan-form">
          <div class="mb-3">
            <label for="name" class="form-label">Plan Name</label>
            <input type="text" id="name" class="form-control" required>
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
          <div class="row">
            <div class="mb-3 col-sm-6">
              <label for="price" class="form-label">Price</label>
              <input type="number" id="price" class="form-control" required>
            </div>
            <div class="mb-3 col-sm-6">
              <label for="speed" class="form-label">Speed</label>
              <input type="text" id="speed" class="form-control" required>
            </div>
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
    let speed = $('#speed').val();

    if (name.length < 4 || price.length < 2 || billingCycle.length < 5 || speed.length < 1) {
      toastr.error("Please fill the required fields properly!")
    } else {
      formData = {
        name: name,
        price: price,
        billing_cycle: billingCycle,
        speed: speed
      }

      let res = axios.post('/create-plan', formData).then(function (response) {
        if (response.data.status == 'success' && response.status == 200) {
          toastr.success("Plan Created Successfully")
          $('#createModal').modal('hide');
          getPlans();
        } else {
          console.log(response)
          toastr.error("Something Went Wrong!")
        }
      });
    }
  }

</script>
@endpush