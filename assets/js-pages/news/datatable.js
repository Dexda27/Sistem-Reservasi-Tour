    $(document).ready(function () {
        const basePath = document.documentElement.getAttribute('data-assets-path');
        $('#news').DataTable({
            processing: true,
            serverSide: true,
            ajax: basePath + '377bc979-4c13-44da-b676-d0f08529be1a',
            dataType: 'json',
            columns: [
                { data: 'no', name: 'no', orderable:false },
                { data: 'content', name: 'content' }
            ],
            scrollX: false,
            autoWight: true,
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