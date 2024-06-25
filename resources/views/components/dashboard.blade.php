<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12 page-header">
        <div class="page-pretitle">Overview</div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
        <div class="card">
          <div class="content">
            <div class="row">
              <div class="col-sm-4">
                <div class="icon-big text-center">
                  <i class="teal fas fa-shopping-cart"></i>
                </div>
              </div>
              <div class="col-sm-8">
                <div class="detail">
                  <p class="detail-subtitle">Total Orders</p>
                  <span class="number">{{ $orders }}</span>
                </div>
              </div>
            </div>
            <div class="footer">
              <hr />
              <div class="stats">
                <i class="fas fa-calendar"></i> For this Month
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
        <div class="card">
          <div class="content">
            <div class="row">
              <div class="col-sm-4">
                <div class="icon-big text-center">
                  <i class="olive fas fa-money-bill-alt"></i>
                </div>
              </div>
              <div class="col-sm-8">
                <div class="detail">
                  <p class="detail-subtitle">Revenue</p>
                  <span class="number"><span>{{ floor($revenue) }} BDT</span>
                  </span>
                </div>
              </div>
            </div>
            <div class="footer">
              <hr />
              <div class="stats">
                <i class="fas fa-calendar"></i> For this Month
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
        <div class="card">
          <div class="content">
            <div class="row">
              <div class="col-sm-4">
                <div class="icon-big text-center">
                  <i class="violet fas fa-eye"></i>
                </div>
              </div>
              <div class="col-sm-8">
                <div class="detail">
                  <p class="detail-subtitle">New Customer</p>
                  <span class="number">{{ $customers }}</span>
                </div>
              </div>
            </div>
            <div class="footer">
              <hr />
              <div class="stats">
                <i class="fas fa-stopwatch"></i> For this Month
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
        <div class="card">
          <div class="content">
            <div class="row">
              <div class="col-sm-4">
                <div class="icon-big text-center">
                  <i class="orange fas fa-envelope"></i>
                </div>
              </div>
              <div class="col-sm-8">
                <div class="detail">
                  <p class="detail-subtitle">Support Request</p>
                  <span class="number">{{ $tickets }}</span>
                </div>
              </div>
            </div>
            <div class="footer">
              <hr />
              <div class="stats">
                <i class="fas fa-envelope-open-text"></i> For this Month
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="content">
                <div class="head">
                  <h5 class="mb-0">Revenue Overview</h5>
                  <p class="text-muted">Current year revenue data</p>
                </div>
                <div class="canvas-wrapper">
                  <canvas class="chart" id="revenueChart"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="content">
                <div class="head">
                  <h5 class="mb-0">Customer Overview</h5>
                  <p class="text-muted">Current year customers data</p>
                </div>
                <div class="canvas-wrapper">
                  <canvas class="chart" id="customersChart"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@push('other-scripts')
<script>
  window.revenueData = @json($revenue_data);
  window.customerData = @json($customer_data);
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const ctx1 = document.getElementById('revenueChart').getContext('2d');
    const revenueData = window.revenueData;

    const revenueChart = new Chart(ctx1, {
      type: 'line',
      data: {
        labels: revenueData.labels,
        datasets: [{
          data: revenueData.data,
          backgroundColor: "rgba(48, 164, 255, 0.2)",
          borderColor: "rgba(48, 164, 255, 0.8)",
          fill: true,
          borderWidth: 1
        }]
      },
      options: {
        animation: {
          duration: 2000,
          easing: 'easeOutQuart',
        },
        plugins: {
          legend: {
            display: false,
            position: 'right',
          },
          title: {
            display: true,
            text: 'Monthly Subscription Revenue',
            position: 'left',
          },
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });


    const ctx2 = document.getElementById('customersChart').getContext('2d');
    const customerData = window.customerData;

    const customerChart = new Chart(ctx2, {
      type: 'bar',
      data: {
        labels: customerData.labels,
        datasets: [{
          label: 'Number of Customers',
          data: customerData.data,
          backgroundColor: "rgba(76, 175, 80, 0.5)",
          borderColor: "#6da252",
          borderWidth: 1
        }]
      },
      options: {
        animation: {
          duration: 2000,
          easing: "easeOutQuart",
        },
        plugins: {
          legend: {
            display: false,
            position: 'top',
          },
          title: {
            display: true,
            text: 'Number of Customers Registered Each Month',
            position: 'left',
          },
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  });
</script>
@endpush