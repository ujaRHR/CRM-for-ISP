<div class="content">
  <div class="container">
    <div class="page-title">
      <h3>Notices
        <a data-bs-toggle="modal" data-bs-target="#createModal" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-user-plus"></i>
          Create Notice</a>
      </h3>
    </div>
    <div class="card">
      <div class="card-body">
        <table class="table table-hover table-bordered" id="dataTables" width="100%">
          <thead>
            <tr>
              <th>Date</th>
              <th>Title</th>
              <th>Description</th>
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
  getNotices()

  function formatDate(newDate) {
    const date = new Date(newDate);
    let text = date.toUTCString();
    let formattedDate = text.split(' ').slice(0, 4).join(' ');
    return formattedDate
  }

  async function getNotices() {
    let res = await axios.get('/notice-list');
    let data = res.data;

    let mainTable = $('#dataTables');
    let tableBody = $('#tableBody');

    mainTable.DataTable().clear().destroy();

    data.forEach(function(item, index) {
      const sortDate = new Date(item['created_at']).toISOString().split('T')[0];

      let newRow = `<tr>
        <td data-sort="${sortDate}">${formatDate(item['created_at'])}</td>
        <td>${item['title']}</td>
        <td>${item['description']}</td>
        <td>
          <button type="button" onclick="getNoticeInfo()" class="updateBtn btn btn-outline-info btn-rounded" data-id="${item['id']}"><i class="fas fa-pen"></i></button>
          <button type="button" class="deleteBtn btn btn-outline-danger btn-rounded" data-id="${item['id']}"><i class="fas fa-trash"></i></button>
        </td>
      </tr>`
      tableBody.append(newRow);
    });

    mainTable.DataTable({"order": [[0, "desc"]]});
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
    getNoticeInfo()
  })
</script>
@endpush