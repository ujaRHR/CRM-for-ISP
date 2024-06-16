<div class="modal fade" id="cancelModal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Cancel Subscription</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <div class="alert alert-danger">
                    <h5 class="alert-title"><i class="fas fa-exclamation-triangle"></i> Danger</h5>
                    Are you sure you want to cancel this Subscription?
                </div>
            </div>
            <div class="modal-footer">
                <input type="number" id="cancelID" class="d-none" value="">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                <button onclick="cancelSubscription()" type="button" class="btn btn-danger">Proceed</button>
            </div>
        </div>
    </div>
</div>

@push('other-scripts')
<script>
    function cancelSubscription() {
        formData = {
            id: $('#cancelID').val()
        }

        let res = axios.post('/cancel-subscription', formData).then(function(response) {
            if (response.data.status == 'success' && response.status == 200) {
                toastr.success("Subscription Cancalled Successfully")
                $('#cancelModal').modal('hide');
                customerSubs()
                $('#status').removeClass('success-btn')
            } else {
                toastr.error("Something Went Wrong!")
            }
        });
    }
</script>
@endpush