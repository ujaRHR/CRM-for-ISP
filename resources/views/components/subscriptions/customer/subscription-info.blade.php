  <div class="container py-3">
    <h3>My Subscription</h3>
    <hr>
    <div class="row">
      <div class="col-md-8">
        <div class="card mb-3">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Active Plan</h5>
            <span class="badge bg-success rounded-pill">Active</span>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="fw-bold">Plan Name:</span>
                <span id="name">Silver</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="fw-bold">Download Speed:</span>
                <span id="dspeed">200 Mbps <i class="fas fa-download text-success"></i></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="fw-bold">Upload Speed:</span>
                <span id="uspeed">50 Mbps <i class="fas fa-upload text-success"></i></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="fw-bold">Data Limit:</span>
                <span id="limit">1000 GB</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="fw-bold">Billing Cycle:</span>
                <span id="billing_cycle">Monthly</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="fw-bold">Purchase Date:</span>
                <span id="start_date">May 10, 2024</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="fw-bold">Next Billing Date:</span>
                <span id="next_billing_date">June 10, 2024</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="fw-bold">Price:</span>
                <span id="total_cost">$49.99</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="fw-bold">Personal ID:</span>
                <span>638263474</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="fw-bold">Manage Plan:</span>
                <a href="#" class="btn btn-sm btn-danger">Cancel Plan</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>


    <div id="no-plan" class="alert alert-secondary d-flex align-items-center" role="alert">
      <h4 class="m-0">No Active Plan</h4>
      <a href="#" class="btn btn-primary ms-auto">Buy Now</a>
    </div>
  </div>