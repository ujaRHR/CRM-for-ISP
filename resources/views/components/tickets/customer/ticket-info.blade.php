<div class="content">
    <div class="container">
        <div class="page-title">
            <h3>Support Tickets
                <a data-bs-toggle="modal" data-bs-target="#createModal" class="btn btn-sm btn-primary float-end fw bold"><i class="fas fa-bug"></i>
                    Open New Ticket</a>
            </h3>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-bordered" id="dataTables" width="100%">
                    <thead>
                        <tr>
                            <th width="15%">Date</th>
                            <th width="15%">Ticket ID</th>
                            <th width="17%">Title</th>
                            <th>Description</th>
                            <th width="15%">Status</th>
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
    function formatDate(newDate) {
        const date = new Date(newDate);
        let text = date.toUTCString();
        let formattedDate = text.split(' ').slice(0, 4).join(' ');
        return formattedDate
    }


    customerTicketList();

    async function customerTicketList() {
        await axios.post('/customer-ticket-list').then(function(response) {
            let mainTable = $('#dataTables');
            let tableBody = $('#tableBody');
            let btnClass = ''

            mainTable.DataTable().clear().destroy();

            response.data.forEach(function(item, index) {
                const sortDate = new Date(item['created_at']).toISOString().split('T')[0];
                let status = response.data[index].status;
                let newRow = `<tr>
                    <td data-sort="${sortDate}">${formatDate(response.data[index].created_at)}</td>
                    <td>
                        <span class="badge bg-secondary">${response.data[index].ticket_id}</span>
                    </td>
                    <td>${response.data[index].title}</td>
                    <td>${response.data[index].description}</td>
                    <td><button type="button" class="statusBtn w-50 btn btn-sm" value=""></button>
                    </td>
                </tr>`;
                tableBody.append(newRow);
                let statusBtn = tableBody.find('tr:last-child .statusBtn');
                if (status == 'active') {
                    statusBtn.text('Pending');
                    statusBtn.addClass('btn-danger fw-bold');
                } else {
                    statusBtn.text('Resolved');
                    statusBtn.addClass('btn-success fw-bold');
                }
            });

            mainTable.DataTable({
                "order": [
                    [0, "desc"]
                ]
            });
        })
    }

    $('table tbody').on('click', '.updateBtn', function() {
        let id = $(this).data('id');
        $('#updateModal').modal('show');
        $('#updateID').val(id);
        getPlanInfo();
    })
</script>
@endpush