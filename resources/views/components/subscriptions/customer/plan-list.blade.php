<div class="container py-3 d-none" id="buyPlan">
  <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <h2 class="display-5 fw-normal">Pricing</h2>
    <p class="fs-5 text-muted">Explore our variety of pricing plans designed to fit different needs and budgets. Whether you need internet for personal use or for your business, we have a plan that's right for you.</p>
  </div>
  <div id="planList" class="row text-center"></div>
</div>

@push('other-scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    axios.get('/plan-list').then(function(response) {
        var planList = document.getElementById('planList');
        planList.innerHTML = '';

        response.data.forEach(function(plan) {
          var planBlock = `
                    <div class="col-md-3">
                        <div class="card mb-4 rounded-3 shadow-sm">
                            <div class="card-header py-3">
                                <h4 class="my-0 fw-bold">${plan.name}</h4>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title pricing-card-title">৳${plan.price}<small class="text-muted fw-light">/month</small></h3>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>Speed: ${plan.dspeed} MBPS</li>
                                    <li>Uptime: 99.9%</li>
                                    <li>Limit: ${plan.limit}</li>
                                    <li>${plan.description}</li>
                                </ul>
                                <button onclick="proceedCheckout(this)" type="button" data-pack="${plan.id}" class="btn btn-success">Buy Now</button>
                            </div>
                        </div>
                    </div>
                `;
          planList.insertAdjacentHTML('beforeend', planBlock);
        });
      })
      .catch(function(error) {
        console.error('Error fetching plan information:', error);
      });
  });

  function proceedCheckout(button) {
    let selectedPack = $(button).data('pack');
    localStorage.setItem('selectedPack', selectedPack)

    window.location.href = '/customer-checkout';
  }
</script>
@endpush