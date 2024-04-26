<div class="modal fade" id="exampleModal" role="dialog" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Create New Customer</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-start">
        <!-- <form accept-charset="utf-8"> -->
          <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" id="fullname" class="form-control">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="form-control">
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="tel" id="phone" class="form-control">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" class="form-control">
          </div>
          <div class="mb-3">
            <button onclick="createCustomer()" type="submit" class="btn btn-success">Create</button>
          </div>
        <!-- </form> -->
      </div>
    </div>
  </div>

</div>


@section('custom-scripts')
<script>
  function createCustomer() {
    formData = {
      fullname: document.getElementById('fullname'),
      email: document.getElementById('email'),
      phone: document.getElementById('phone'),
      password: document.getElementById('password')
    }

    let res = axios.post('/customer-signup', formData);

    if (res.data.status == 'success' && res.status == 200) {
      toastr.success("Customer Created Successfully")
    } else {
      toastr.failed("Something Went Wrong!")
    }
  }

</script>
@endsection