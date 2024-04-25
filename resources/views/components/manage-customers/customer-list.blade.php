<div class="content">
  <div class="container">
    <div class="page-title">
      <h3>Customers
        <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-sm btn-outline-primary float-end"><i
            class="fas fa-user-plus"></i>
          Create Customer</a>
      </h3>
    </div>
    <div class="card">
      <div class="card-body">
        <table class="table table-hover table-bordered" id="dataTables" width="100%">
          <thead>
            <tr>
              <th>PID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Type</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="tableBody"></tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<!-- Create Modal -->
<div class="modal fade" id="exampleModal" role="dialog" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Create New Customer</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-start">
        <form id="create-customer" accept-charset="utf-8">
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
        </form>
      </div>
    </div>
  </div>

</div>


@section('custom-scripts')
<script>
  getCustomer();

  async function getCustomer() {
    let res = await axios.get('/customer-list');
    let data = res.data;

    let mainTable = $('#dataTables');
    let tableBody = $('#tableBody');
    let btnClass = ''

    mainTable.DataTable().clear().destroy();

    data.forEach(function (item, index) {
      if (item['status'] == 'active') {
        btnClass = "btn btn-sm btn-success"
      } else {
        btnClass = "btn btn-sm btn-danger"
      }
      let newRow = `<tr>
        <td>${item['personal_id']}</td>
        <td>${item['fullname']}</td>
        <td>${item['email']}</td>
        <td>${item['phone']}</td>
        <td>${item['type']}</td>
        <td><button class='${btnClass}'>${item['status']}</button></td>
        <td>
          <a href="" class="btn btn-outline-info btn-rounded" data-id="${item['personal_id']}"><i class="fas fa-pen"></i></a>
          <a href="" class="btn btn-outline-danger btn-rounded" data-id="${item['personal_id']}"><i class="fas fa-trash"></i></a>
        </td>
      </tr>`
      tableBody.append(newRow);
    });

    mainTable.DataTable();
  }

  
  function createCustomer(event) {
    event.preventDefault();

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