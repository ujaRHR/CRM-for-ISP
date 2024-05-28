<div class="content">
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                <h4>Profile Information
                    <a data-bs-toggle="modal" data-bs-target="#editModal" class="btn btn-sm btn-success float-end fw-bold" id="edit-profile-btn"> <i class="fas fa-user-edit"> </i> Edit Profile</a>
                </h4>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item fw-bold">Personal ID: <span class="fw-normal" id="pid"></span></li>
                    <li class="list-group-item fw-bold">Full Name: <span class="fw-normal" id="fullname"></span></li>
                    <li class="list-group-item fw-bold">Email: <span class="fw-normal" id="email"></span></li>
                    <li class="list-group-item fw-bold">Phone: <span class="fw-normal" id="phone"></span></li>
                    <li class="list-group-item fw-bold">Password: <span class="fw-normal" id="password">•••••••••••••</span></li>
                </ul>
            </div>

            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item fw-bold">Account Type: <span class="fw-normal" id="type"></span></li>
                    <li class="list-group-item fw-bold">Status: <span class="fw-normal" id="type"></span></li>
                    <li class="list-group-item fw-bold">Address: <span class="fw-normal" id="address"></span></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p class="text-danger fw-bold fs-6 mb-3"> <i class="fas fa-info-circle"></i>
                        Please ensure all information provided is accurate. Submission of false or misleading information will result in immediate termination of your account and services.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('other-scripts')
<script>
    function customerProfileInfo() {
        let res = axios.post('/customer-profile').then(function(response) {
            $('#pid').text(response.data.personal_id);
            $('#fullname').text(response.data.fullname);
            $('#email').text(response.data.email);
            $('#phone').text(response.data.phone);
            $('#type').text(response.data.type);
            $('#status').text(response.data.status);
            $('#address').text(response.data.address);
        });
    }

    customerProfileInfo();
</script>
@endpush