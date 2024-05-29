<div class="modal fade" id="editModal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Edit Profile</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <form id="update-form">
                    <div class="mb-3">
                        <input type="number" class="d-none" id="editPID" value="">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" id="editFullname" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="editEmail" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" id="editPhone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" id="editAddress" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">New/Old Password</label>
                        <input type="password" id="editPassword" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <button onclick="updateCustomer()" type="button" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@push('other-scripts')
<script>
    async function getCustomerInfo() {
        let pid = $('#editPID').val();
        let res = axios.post('/customer-info', {
            pid: pid
        }).then(function(response) {
            const {
                address
            } = response.data;

            $('#editFullname').val(response.data.fullname);
            $('#editEmail').val(response.data.email);
            $('#editPhone').val(response.data.phone);
            $('#editAddress').val(address?.trim() ? address : 'N/A');
        });
    }

    function updateCustomer() {
        let pid = $('#editPID').val()
        let fullname = $('#editFullname').val();
        let email = $('#editEmail').val();
        let phone = $('#editPhone').val();
        let address = $('#editAddress').val();
        let password = $('#editPassword').val();

        if (fullname.length < 4 || email.length < 6 || phone.length < 10 || address.length < 2 || password.length < 6) {
            toastr.error("Please fill the required fields!")
        } else {
            formData = {
                pid: pid,
                fullname: fullname,
                email: email,
                phone: phone,
                address: address,
                password: password
            }

            let res = axios.post('/update-customer', formData).then(function(response) {
                if (response.data.status == 'success' && response.status == 200) {
                    toastr.success("Profile Updated Successfully")
                    $('#editModal').modal('hide');
                    customerProfileInfo();
                } else {
                    toastr.error("Something Went Wrong!")
                }
            });
        }
    }
</script>
@endpush