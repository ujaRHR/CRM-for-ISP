<div class="content">
    <div class="container">
        <div class="page-title">
            <h3>Support Tickets</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-bordered" id="dataTables" width="100%">
                    <thead>
                        <tr>
                            <th width="12%">Date</th>
                            <th width="12%">Ticket ID</th>
                            <th width="15%">Customer</th>
                            <th width="12%">Phone</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th width="10%">Status</th>
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


    ticketList();

    async function ticketList() {
        await axios.get('/ticket-list').then(function(response) {
            let mainTable = $('#dataTables');
            let tableBody = $('#tableBody');
            let btnClass = ''

            mainTable.DataTable().clear().destroy();

            response.data.forEach(function(item, index) {
                const sortDate = new Date(item['created_at']).toISOString().split('T')[0];
                let newRow = `<tr>
                    <td data-sort="${sortDate}">${formatDate(response.data[index].created_at)}</td>
                    <td><span class="badge badge-pill badge-secondary bg-secondary">${response.data[index].ticket_id}</span></td>
                    <td>${response.data[index].customer.fullname}</td>
                    <td><span class="badge badge-pill badge-secondary bg-secondary">${(response.data[index].customer.phone)}</span></td>
                    <td>${response.data[index].title}</td>
                    <td>${response.data[index].description}</td>
                    <td>
                        <select class="statusBtn" data-id="${response.data[index].ticket_id}" onchange="updateTicket(this)">
                            <option value="active">Active</option>
                            <option value="closed">Resolved</option>
                        </select>
                    </td>
                </tr>`;
                tableBody.append(newRow);
                let status = response.data[index].status;
                let statusBtn = tableBody.find('tr:last-child .statusBtn');
                statusBtn.val(status);
                if (status == 'active') {
                    statusBtn.addClass('btn btn-sm btn-danger fw-bold');
                } else {
                    statusBtn.addClass('btn btn-sm btn-success fw-bold');
                }
            });

            mainTable.DataTable({
                "order": [
                    [0, "desc"]
                ]
            });
        })
    }

    function updateTicket(element) {
        let ticket_id = $(element).data('id');
        let status = $(element).val();

        let formData = {
            ticket_id: ticket_id,
            status: status
        }

        axios.post('/update-ticket', formData).then(function(response) {
            if (response.data.status == 'success' && response.status == 200) {
                toastr.success("Ticket Updated Successfully")
                ticketList();
            } else {
                toastr.error("Failed to Update the Ticket")
            }
        });

    }
</script>
@endpush