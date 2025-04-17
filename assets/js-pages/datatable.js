    $(document).ready(function () {
        const basePath = document.documentElement.getAttribute('data-assets-path');
        $('#dataTableDevice').DataTable({
            processing: true,
            serverSide: true,
            ajax: basePath + '056a5292-3149-11ee-be56-0242ac120002',
            dataType: 'json',
            rowCallback: function(row, data, index) {
                var api = this.api();
                var pageInfo = api.page.info();
                var rowNumber = pageInfo.start + index + 1;

                var noColumn = $(row).find('td:eq(1)');
                noColumn.text(rowNumber);
        
                noColumn.addClass('text-center');
            },
            columns: [
                { data: '' },
                { data: 'no', name: 'no' },
                { data: 'username', name: 'username' },
                { data: 'device1', name: 'device1' },
                { data: 'device2', name: 'device2' },
                { data: 'device3', name: 'device3' },
                { data: 'device4', name: 'device4' },
                { data: 'device5', name: 'device5' },
                { data: 'device6', name: 'device6' },
                { data: 'device7', name: 'device7' },
                { data: 'device8', name: 'device8' },
                { data: 'reset', name: 'reset' }
            ],
            columnDefs: [
            {
                className: 'control',
                orderable: false,
                targets: 0,
                searchable: false,
                render: function (data, type, full, meta) {
                return '';
                }
            }
            ],
            destroy: true,
            dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                header: function (row) {
                    var data = row.data();
                    return 'Details of ' + data['username'];
                }
                }),
                type: 'column',
                renderer: function (api, rowIdx, columns) {
                var filteredColumns = columns.filter(function (col) {
                    return col.title !== 'No';
                });
                var data = $.map(filteredColumns, function (col, i) {                    
                    return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                    ? '<tr data-dt-row="' +
                        col.rowIndex +
                        '" data-dt-column="' +
                        col.columnIndex +
                        '">' +
                        '<td>' +
                        col.title +
                        '</td> ' +
                        '<td>' +
                        ': ' +
                        col.data +
                        '</td>' +
                        '</tr>'
                    : '';
                }).join('');

                return data ? $('<table class="table"/><tbody />').append(data) : false;
                }
            }
        }
        });

        $('#dataTableUser').DataTable({
            processing: true,
            serverSide: true,
            dom:
            '<"row me-2"' +
            '<"col-md-2"<"me-3"l>>' +
            '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' +
            '>t' +
            '<"row mx-2"' +
            '<"col-sm-12 col-md-6"i>' +
            '<"col-sm-12 col-md-6"p>' +
            '>',
            buttons: [
                {
                    text: '<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add New User</span>',
                    className: 'add-new btn btn-primary',
                    attr: {
                        'data-bs-toggle': 'offcanvas',
                        'data-bs-target': '#offcanvasAddUser',
                        'style': 'margin-left: 8px;'
                    }
                }
            ],
            scrollX: true,
            ajax: basePath + '6dc5f286-315f-11ee-be56-0242ac120002',
            dataType: 'json',
            columns: [
                { data: 'no', name: 'no', orderable:false },
                { data: 'username', name: 'username' },
                { data: 'email', name: 'email' },
                { data: 'whatsapp', name: 'whatsapp' },
                { data: 'status', name: 'status' },
                { 
                    data: 'balance', 
                    name: 'balance',
                    render: function(data) {
                        return 'Rp. ' + parseFloat(data).toLocaleString('id-ID');
                    }
                },
                { 
                    data: 'out_balance',
                    name: 'out_balance',
                    render: function(data) {
                        return 'Rp. ' + parseFloat(data).toLocaleString('id-ID');
                    }
                },
                { data: 'expired', name: 'expired' },
                {
                    data: 'action',
                    name: 'action',
                    render: function (data) {
                        return '<button class="btn btn-primary btn-sm" style="margin-right: 5px;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUpdateUser'+data+'">Edit</button>' +
                            '<button class="btn btn-danger btn-sm" onclick="deleteAction(' + data + ')">Delete</button>';
                    }
                }
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