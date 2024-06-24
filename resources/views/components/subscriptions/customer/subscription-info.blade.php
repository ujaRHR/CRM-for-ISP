  <div class="container py-3">
    <h3>My Subscription</h3>
    <hr>
    <div class="row d-none" id="activePlan">
      <div class="col-md-8">
        <div class="card mb-3">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Active Plan</h5>
            <span class="badge bg-danger bg-success rounded-pill" id="status"></span>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <input type="number" class="d-none" id="id" value="">
                <span class="fw-bold">Plan Name:</span>
                <span id="name"></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="fw-bold">Download Speed:</span>
                <span>
                  <span id="dspeed"></span>
                  <i class="fas fa-download text-success"></i>
                </span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="fw-bold">Upload Speed:</span>
                <span>
                  <span id="uspeed"></span>
                  <i class="fas fa-upload text-success"></i>
                </span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="fw-bold">Data Limit:</span>
                <span>
                  <span id="limit"></span>
                  <i class="fas fa-ban text-success"></i>
                </span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="fw-bold">Billing Cycle:</span>
                <span id="billing_cycle"></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="fw-bold">Purchase Date:</span>
                <span id="start_date"></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="fw-bold">Next Billing Date:</span>
                <span id="next_billing_date"></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="fw-bold">Price:</span>
                <span id="total_cost"></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="fw-bold">Personal ID:</span>
                <span id="pid"></span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>


    <div class="row d-none" id="noPlan">
      <div id="no-plan" class="alert alert-secondary d-flex align-items-center" role="alert">
        <h4 class="m-0">No Active Plan</h4>
        <a onclick="pricingPage()" id="buyNowBtn" class="btn btn-success ms-5">Buy Now</a>
      </div>
    </div>
  </div>


  @push('other-scripts')
  <script>
    function formatDate(newDate) {
      const date = new Date(newDate);
      let text = date.toUTCString();
      let formattedDate = text.split(' ').slice(0, 4).join(' ');
      return formattedDate
    }

    function customerSubs() {
      let res = axios.post('/customer-subscription').then(function(response) {
        if (!response.data) {
          $('#noPlan').removeClass('d-none')
        } else {
          $('#activePlan').removeClass('d-none')
          if (response.data.status == 'active') {
            $('#status').removeClass('bg-danger')
          }
          $('#id').val(response.data.id)
          $('#status').text(response.data.status)
          $('#name').text(response.data.plan.name)
          $('#dspeed').text(response.data.plan.dspeed)
          $('#uspeed').text(response.data.plan.uspeed)
          $('#limit').text(response.data.plan.limit)
          $('#billing_cycle').text((response.data.plan.billing_cycle).toUpperCase())
          $('#start_date').text(formatDate(response.data.start_date))
          $('#next_billing_date').text(formatDate(response.data.next_billing_date))
          $('#total_cost').text(Math.round(response.data.total_cost) + ' BDT')
          $('#pid').text(response.data.customer.personal_id)
        }
      })
    }

    function pricingPage() {
      $('#noPlan').addClass('d-none')
      $('#buyPlan').removeClass('d-none')
    }

    customerSubs()
  </script>
  @endpush