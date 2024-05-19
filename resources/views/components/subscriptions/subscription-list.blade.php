<div class="content">
  <div class="container">
    <div class="page-title">
      <h3>Subscriptions
        <a data-bs-toggle="modal" data-bs-target="#createModal" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-plus-square"></i>
          Create Subscription</a>
      </h3>
    </div>
    <div class="card">
      <div class="card-body">
        <table class="table table-hover table-bordered" id="dataTables" width="100%">
          <thead>
            <tr>
              <th>ID</th>
              <th>Customer</th>
              <th>Plan</th>
              <th>Created</th>
              <th>Next Billing</th>
              <th>Total Cost</th>
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

@push('other-scripts')
<script>
  getSubscriptions();

  async function getSubscriptions() {
    let res = await axios.get('/subscription-list');
    let data = res.data;

    let mainTable = $('#dataTables');
    let tableBody = $('#tableBody');
    let btnClass = ''

    mainTable.DataTable().clear().destroy();

    data.forEach(function(item, index) {
      let newRow = `<tr>
        <td>${index+1}</td>
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

  $('table tbody').on('click', '.deleteBtn', function() {
    let id = $(this).data('id');
    $('#deleteModal').modal('show');
    $('#deleteID').val(id);
  })

  $('table tbody').on('click', '.updateBtn', function() {
    let id = $(this).data('id');
    $('#updateModal').modal('show');
    $('#updateID').val(id);
    getPlanInfo();
  })
</script>
@endpush