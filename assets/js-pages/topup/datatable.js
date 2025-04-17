    $(document).ready(function () {
        const basePath = document.documentElement.getAttribute('data-assets-path');
        $('#dataTableUser').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: basePath + '2435012a-841d-4848-8239-7f1e28a92a68',
            dataType: 'json',
            columns: [
                { data: 'no', name: 'no', orderable:false },
                { data: 'username', name: 'username' },
                { data: 'wallet', name: 'wallet' },
                { data: 'whatsapp', name: 'whatsapp' },
                { data: 'balance', name: 'balance',render: function(data) {
                    return 'Rp. ' + parseFloat(data).toLocaleString('id-ID');
                }},
                { data: 'proff', name: 'proff' },
                { data: 'timestamp', name: 'timestamp' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action' }
            ],
            rowCallback: function(row, data, index) {
                var api = this.api();
                var pageInfo = api.page.info();
                var rowNumber = pageInfo.start + index + 1;

                var noColumn = $(row).find('td:eq(0)');
                noColumn.text(rowNumber);
        
                noColumn.addClass('text-center');
            }
        });

        $('#topup_history').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: basePath + 'ff5852b7-ead3-4107-9daf-d9a23adf5ffa',
            dataType: 'json',
            columns: [
                { data: 'no', name: 'no', orderable:false },
                { data: 'wallet', name: 'wallet' },
                { data: 'whatsapp', name: 'whatsapp' },
                { data: 'balance', name: 'balance',render: function(data) {
                    return 'Rp. ' + parseFloat(data).toLocaleString('id-ID');
                }},
                { data: 'proff', name: 'proff' },
                { data: 'timestamp', name: 'timestamp' },
                { data: 'status', name: 'status' },
            ],
            rowCallback: function(row, data, index) {
                var api = this.api();
                var pageInfo = api.page.info();
                var rowNumber = pageInfo.start + index + 1;

                var noColumn = $(row).find('td:eq(0)');
                noColumn.text(rowNumber);
        
                noColumn.addClass('text-center');
            }
        });
    });