<div class="modal fade" id="createModal" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title fw-bold">Create New Plan</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-start">
        <form id="plan-form">
          <div class="mb-3">
            <label for="name" class="form-label fw-bold">Plan Name</label>
            <input type="text" id="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="billing_cycle" class="form-label fw-bold">Billing Cycle</label>
            <select id="billingCycle" class="form-control" required>
              <option selected>Select Billing Cycle</option>
              <option value="monthly" selected>Monthly Plan (30 Days)</option>
              <option value="yearly">Yearly Plan (12 Months)</option>
              <option value="semi-annual">Semi Annual (6 Months)</option>
            </select>
          </div>
          <div class="row">
            <div class="mb-3 col-sm-6">
              <label for="price" class="form-label fw-bold">Price</label>
              <input type="number" id="price" class="form-control" placeholder="1500" required>
            </div>
            <div class="mb-3 col-sm-6">
              <label for="limit" class="form-label fw-bold">Limit</label>
              <input type="text" id="limit" class="form-control" required>
            </div>
          </div>

          <div class="row">
            <div class="mb-3 col-sm-6">
              <label for="dspeed" class="form-label fw-bold">Download Speed</label>
              <input type="text" id="dspeed" class="form-control" required>
            </div>
            <div class="mb-3 col-sm-6">
              <label for="uspeed" class="form-label fw-bold">Upload Speed</label>
              <input type="text" id="uspeed" class="form-control" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label fw-bold">Description</label>
            <textarea id="description" class="form-control" placeholder="Ideal For: Gaming, Streaming" required></textarea>
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
    let billingCycle = $('#billingCycle').val();
    let price = $('#price').val();
    let limit = $('#limit').val();
    let dspeed = $('#dspeed').val();
    let uspeed = $('#uspeed').val();
    let description = $('#description').val();

    if (name.length < 3 || price.length < 2 || billingCycle.length < 1 || dspeed.length < 1 || uspeed.length < 1 || limit.length < 1 || description.length < 1) {
      toastr.error("Please fill the required fields properly!")
    } else {
      formData = {
        name: name,
        price: price,
        billing_cycle: billingCycle,
        dspeed: dspeed,
        uspeed: uspeed,
        limit: limit,
        description: description
      }

      let res = axios.post('/create-plan', formData).then(function(response) {
        if (response.data.status == 'success' && response.status == 200) {
          toastr.success("Plan Created Successfully")
          $('#createModal').modal('hide');
          getPlans();
        } else {
          toastr.error("Something Went Wrong!")
        }
      });
    }
  }
</script>
@endpush