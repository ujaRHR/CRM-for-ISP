<div class="modal fade" id="deleteModal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Staff Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <div class="alert alert-danger">
                    <h5 class="alert-title"><i class="fas fa-exclamation-triangle"></i> Danger</h5>
                    Are you sure you want to delete this Staff?
                </div>
            </div>
            <div class="modal-footer">
                <input type="number" id="deleteID" class="d-none" value="">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                <button onclick="deleteStaff()" type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

@push('other-scripts')
<script>
    function deleteStaff() {
        formData = {
            id: $('#deleteID').val()
        }

        let res = axios.post('/delete-staff', formData).then(function (response) {
            if (response.data.status == 'success' && response.status == 200) {
                toastr.success("Staff Deleted Successfully")
                $('#deleteModal').modal('hide');
                getStaffs();
            } else {
                toastr.error("Something Went Wrong!")
            }
        });
    }

</script>
@endpush