<div class="modal fade" id="createModal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title fw-bold">Create Support Ticket</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <form id="plan-form">
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Title</label>
                        <select name="title" id="title" class="form-control" required>
                            <option value="General Enquiries">General Enquiries</option>
                            <option value="Billing Issues">Billing Issues</option>
                            <option value="Technical Support">Technical Support</option>
                            <option value="Feature Requests">Feature Requests</option>
                            <option value="Filing a Complaint">Filing a Complaint</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold">Description</label>
                        <textarea id="description" class="form-control" placeholder="" required></textarea>
                    </div>
                    <div class="mb-3">
                        <button onclick="createTicket()" type="button" class="btn btn-success">Create Ticket</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@push('other-scripts')
<script>
    function createTicket() {
        let title = $('#title').val();
        let description = $('#description').val();

        if (title.length < 1 || description.length < 1) {
            toastr.error("Please fill the required fields properly!")
        } else {
            formData = {
                title: title,
                description: description
            }

            axios.post('/create-ticket', formData).then(function(response) {
                if (response.data.status == 'success' && response.status == 200) {
                    toastr.success("Ticket Created Successfully")
                    $('#createModal').modal('hide');
                    customerTicketList();
                } else {
                    console.log(response.data)
                    toastr.error("Something Went Wrong!")
                }
            });
        }
    }
</script>
@endpush