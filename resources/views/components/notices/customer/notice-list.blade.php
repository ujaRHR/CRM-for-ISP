<div class="container">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h6 class="border-bottom pb-2 mb-0 fw-bold">Recent Notices</h6>
        <div id="noticesList"></div>
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

    document.addEventListener('DOMContentLoaded', function() {
        axios.get('/notice-list').then(function(response) {
            let noticesList = document.getElementById('noticesList');
            noticesList.innerHTMl = '';

            const colors = ['#34a853', '#f69128', '#6f42c1'];

            response.data.forEach(function(notice, index) {

                if (index < 7) {
                    let noticeBlock = `
                    <div class="d-flex text-body-secondary pt-3">
                        <svg class="flex-shrink-0 me-2 rounded bi bi-bell-fill" width="25" height="25" xmlns="http://www.w3.org/2000/svg" fill="${colors[index % colors.length]}" viewBox="0 0 16 16">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901"/>
                        </svg>

                    <div class="pb-3 mb-0 small lh-sm border-bottom">
                        <strong class="d-block text-gray-dark">${formatDate(notice.created_at)}</strong>
                        <span class="badge text-bg-danger rounded-pill m-1">${notice.title}</span>
                        <ul>
                        <li>${notice.description}</li>
                        </ul>
                    </div>
                    </div>`;

                    noticesList.insertAdjacentHTML('beforeend', noticeBlock);
                }
            });
        }).catch(function(error) {
            console.error('Error fetching notices information:', error);
        });
    });
</script>
@endpush