<div class="modal fade" id="deleteModal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Customer Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <div class="alert alert-danger">
                    <h5 class="alert-title"><i class="fas fa-exclamation-triangle"></i> Danger</h5>
                    Are you sure you want to delete this customer?
                </div>
            </div>
            <div class="modal-footer">
                <input type="number" id="deletePID" class="d-none" value="">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                <button onclick="deleteCustomer()" type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

@push('other-scripts')
<script>
    function deleteCustomer() {
        formData = {
            pid: $('#deletePID').val()
        }

        let res = axios.post('/delete-customer', formData).then(function (response) {
            if (response.data.status == 'success' && response.status == 200) {
                toastr.success("Customer Deleted Successfully")
                $('#deleteModal').modal('hide');
                getCustomers();
            } else {
                toastr.error("Something Went Wrong!")
            }
        });
    }

</script>
@endpush