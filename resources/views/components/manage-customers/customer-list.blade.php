<div class="content">
  <div class="container">
    <div class="page-title">
      <h3>Users
        <a href="create-customer" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-user-plus"></i>
          Create Customer</a>
      </h3>
    </div>
    <div class="card">
      <div class="card-body">
        <table class="table table-hover" id="dataTables" width="100%">
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
          <tbody id="tableList"></tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
  getCustomer();

  async function getCustomer() {
    let res = await axios.get('/customer-list');

    let dataTable = $("#dataTables");
    let tableList = $("#tableList");

    res.data.forEach(function (item, index) {
      let newRow = `<tr>
        <td>${item['personal_id']}</td>
        <td>${item['fullname']}</td>
        <td>${item['email']}</td>
        <td>${item['phone']}</td>
        <td>${item['type']}</td>
        <td>${item['status']}</td>
        <td>
          <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
          <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
        </td>
      </tr>`

      tableList.append(newRow);
    });
  }

</script>