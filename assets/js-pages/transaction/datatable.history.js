    $(document).ready(function () {
        const basePath = document.documentElement.getAttribute('data-assets-path');
        $('#dataTableUser').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: basePath + 'af796f4b-5935-4122-a322-9ea43ba917cb',
            dataType: 'json',
            columns: [
                { data: 'no', name: 'no', orderable:false },
                { data: 'username', name: 'username' },
                { data: 'title', name: 'title' },
                { data: 'timestamp', name: 'timestamp' },
                { data: 'price', name: 'price',render: function(data) {
                    return 'Rp. ' + parseFloat(data).toLocaleString('id-ID');
                } },
                { data: 'description', name: 'description' }
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

        $('#UserTransaction').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: basePath + '210c433b-55b4-4d56-9bac-bd23a6bd5688',
            dataType: 'json',
            columns: [
                { data: 'no', name: 'no', orderable:false },
                { data: 'title', name: 'title' },
                { data: 'timestamp', name: 'timestamp' },
                { data: 'price', name: 'price',render: function(data) {
                    return 'Rp. ' + parseFloat(data).toLocaleString('id-ID');
                } },
                { data: 'description', name: 'description' }
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