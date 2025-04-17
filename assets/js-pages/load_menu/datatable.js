    $(document).ready(function () {
        const dataArray = [];
        for (let i = 1; i <= 30; i++) {
            dataArray.push({ data: 'feature'+i.toString(), name: 'feature'+i.toString() });
        }
        const basePath = document.documentElement.getAttribute('data-assets-path');
        $('#aio1').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: basePath + '420897a7-e723-45a5-9c6f-07e82b8c14f8',
            dataType: 'json',
            columns: [
                { data: 'no', name: 'no', orderable:false },
                { data: 'username', name: 'username' },
                ...dataArray,
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

        $('#aio2').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: basePath + '95f4c15d-ae9f-4c62-89ea-2a4b4d253f9e',
            dataType: 'json',
            columns: [
                { data: 'no', name: 'no', orderable:false },
                { data: 'username', name: 'username' },
                ...dataArray,
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

        $('#aio3').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: basePath + 'c6dee817-c33b-4bbd-b9c1-024d2cabbb30',
            dataType: 'json',
            columns: [
                { data: 'no', name: 'no', orderable:false },
                { data: 'username', name: 'username' },
                ...dataArray,
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