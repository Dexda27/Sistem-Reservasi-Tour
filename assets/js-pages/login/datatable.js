    $(document).ready(function () {
        const basePath = document.documentElement.getAttribute('data-assets-path');
        $('#dataTableUser').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: basePath + '22ce653b-551d-4ded-8af7-bc3e14fab857',
            dataType: 'json',
            columns: [
                { data: 'no', name: 'no', orderable:false },
                { data: 'username', name: 'username' },
                { data: 'ip', name: 'ip' },
                { data: 'timestamp', name: 'timestamp' },
                { data: 'login', name: 'login' }
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

        $('#userHistory').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: basePath + '6162a88b-2e20-47f9-8524-ac7b3c8ed726',
            dataType: 'json',
            columns: [
                { data: 'no', name: 'no', orderable:false },
                { data: 'ip', name: 'ip' },
                { data: 'timestamp', name: 'timestamp' },
                { data: 'login', name: 'login' }
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