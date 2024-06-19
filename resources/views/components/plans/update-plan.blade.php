<div class="modal fade" id="updateModal" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Update Plan</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-start">
        <form id="update-form">
          <div class="mb-3">
            <input type="text" id="updateID" value="" class="d-none">
            <label for="name" class="form-label fw-bold">Plan Name</label>
            <input type="text" id="updateName" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="billing_cycle" class="form-label fw-bold">Billing Cycle</label>
            <select id="updateBillingCycle" class="form-control" required>
              <option selected>Select Billing Cycle</option>
              <option value="monthly">Monthly Plan (30 Days)</option>
              <option value="yearly">Yearly Plan (12 Months)</option>
              <option value="semi-annual">Semi Annual (6 Months)</option>
            </select>
          </div>
          <div class="row">
            <div class="mb-3 col-sm-6">
              <label for="price" class="form-label fw-bold">Price</label>
              <input type="number" id="updatePrice" class="form-control" required>
            </div>
            <div class="mb-3 col-sm-6">
              <label for="limit" class="form-label fw-bold">Limit</label>
              <input type="text" id="updateLimit" class="form-control" required>
            </div>
          </div>
          <div class="row">
            <div class="mb-3 col-sm-6">
              <label for="dspeed" class="form-label fw-bold">Download Speed</label>
              <input type="text" id="updateDSpeed" class="form-control" required>
            </div>
            <div class="mb-3 col-sm-6">
              <label for="uspeed" class="form-label fw-bold">Upload Speed</label>
              <input type="text" id="updateUSpeed" class="form-control" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label fw-bold">Description</label>
            <textarea id="updateDescription" class="form-control" required></textarea>
          </div>

          <div class="mb-3">
            <button onclick="updatePlan()" type="button" class="btn btn-success">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>

@push('other-scripts')
<script>
  async function getPlanInfo() {
    let id = $('#updateID').val()

    let res = await axios.post('/plan-info', {
      id: id
    }).then(function(response) {
      $('#updateName').val(response.data.name)
      $('#updateBillingCycle').val(response.data.billing_cycle)
      $('#updatePrice').val(response.data.price)
      $('#updateLimit').val(response.data.limit)
      $('#updateDSpeed').val(response.data.dspeed)
      $('#updateUSpeed').val(response.data.uspeed)
      $('#updateDescription').val(response.data.description)
    })
  }

  function updatePlan() {
    let id = $('#updateID').val()
    let name = $('#updateName').val();
    let billing_cycle = $('#updateBillingCycle').val();
    let price = $('#updatePrice').val();
    let limit = $('#updateLimit').val();
    let dspeed = $('#updateDSpeed').val();
    let uspeed = $('#updateUSpeed').val();
    let description = $('#updateDescription').val();

    if (name.length < 3 || price.length < 2 || billing_cycle.length < 1 || dspeed.length < 1 || uspeed.length < 1 || limit.length < 1 || description.length < 1) {
      toastr.error("Please fill the required fields properly!")
    } else {
      formData = {
        id: id,
        name: name,
        price: price,
        billing_cycle: billing_cycle,
        dspeed: dspeed,
        uspeed: uspeed,
        limit: limit,
        description: description
      }

      let res = axios.post('/update-plan', formData).then(function(response) {
        if (response.data.status == 'success' && response.status == 200) {
          toastr.success("Plan Updated Successfully")
          $('#updateModal').modal('hide');
          getPlans();
        } else {
          toastr.error("Something Went Wrong!")
        }
      });
    }
  }
</script>
@endpush