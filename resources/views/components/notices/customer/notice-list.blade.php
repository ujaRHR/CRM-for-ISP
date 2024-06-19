<div class="container">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h6 class="border-bottom pb-2 mb-0">Recent Notices</h6>
        <div id="ordersList"></div>
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

    document.addEventListener('DOMContentLoaded', function() {
        axios.post('/customer-orders').then(function(response) {
            let ordersList = document.getElementById('ordersList');
            ordersList.innerHTMl = '';

            const colors = ['#34a853', '#f69128', '#6f42c1'];

            response.data.forEach(function(order, index) {
                let orderBlock = `
          <div class="d-flex text-body-secondary pt-3">
          <svg class="flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
            <rect width="100%" height="100%" fill="${colors[index % colors.length]}"></rect>
          </svg>
          <div class="pb-3 mb-0 small lh-sm border-bottom">
            <strong class="d-block text-gray-dark">${formatDate(order.created_at)}</strong>
            <span>You placed an order for the <u>${order.plan.name}</u></span>
            <ul>
              <li>Download Speed: ${order.plan.dspeed}</li>
              <li>Total Price: ${parseInt(order.total_price)} BDT</li>
              <li>Payment Method: Cash</li>
              <li>Billing Cycle: Monthly</li>
            </ul>
          </div>
        </div>
        `;

                ordersList.insertAdjacentHTML('beforeend', orderBlock);
            });
        }).catch(function(error) {
            console.error('Error fetching orders information:', error);
        });
    });
</script>
@endpush