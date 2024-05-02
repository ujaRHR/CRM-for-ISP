<div class="content">
  <div class="container">
    <div class="page-title">
      <h3>Plans
        <a data-bs-toggle="modal" data-bs-target="#createModal" class="btn btn-sm btn-outline-primary float-end"><i
            class="fas fa-user-plus"></i>
          Create Plan</a>
      </h3>
    </div>
    <div class="card">
      <div class="card-body">
        <table class="table table-hover table-bordered" id="dataTables" width="100%">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Price</th>
              <th>Billing Cycle</th>
              <th>Speed</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="tableBody"></tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@push('other-scripts')
<script>
  getCustomer();

  async function getCustomer() {
    let res = await axios.get('/plan-list');
    let data = res.data;

    let mainTable = $('#dataTables');
    let tableBody = $('#tableBody');
    let btnClass = ''

    mainTable.DataTable().clear().destroy();

    data.forEach(function (item, index) {
      let newRow = `<tr>
        <td>${item['id']}</td>
        <td>${item['name']}</td>
        <td>${item['price']}</td>
        <td>${item['billing_cycle']}</td>
        <td>${item['speed']}</td>
        <td>
          <button type="button" onclick="getPlanInfo()" class="updateBtn btn btn-outline-info btn-rounded" data-id="${item['id']}"><i class="fas fa-pen"></i></button>
          <button type="button" class="deleteBtn btn btn-outline-danger btn-rounded" data-id="${item['id']}"><i class="fas fa-trash"></i></button>
        </td>
      </tr>`
      tableBody.append(newRow);
    });

    mainTable.DataTable();
  }

  $('table tbody').on('click', '.deleteBtn', function () {
    let pid = $(this).data('id');
    $('#deleteModal').modal('show');
    $('#deletePID').val(pid);
  })

  $('table tbody').on('click', '.updateBtn', function () {
    let pid = $(this).data('id');
    $('#updateModal').modal('show');
    $('#updatePID').val(pid);
    getCustomerInfo()
  })

</script>
@endpush