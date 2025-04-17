$(document).ready(function () {
    const basePath = document.documentElement.getAttribute('data-assets-path');
    $('#news').DataTable({
        processing: true,
        serverSide: true,
        ajax: basePath + 'getBlog',
        dataType: 'json',
        columns: [
            { data: 'no', name: 'no', orderable:false },
            { data: 'title', name: 'title' },
            {
                data: 'action',
                name: 'action',
                render: function (data) {
                    return '<a href="'+basePath+'blog/'+data+'" class="btn btn-info btn-sm" style="margin-right: 5px;" ><i class="ti ti-eye"></i></a>' +
                        '<button class="btn btn-danger btn-sm" onclick="deleteAction(`' + data + '`)"><i class="ti ti-trash"></i></button>';
                }
            }
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