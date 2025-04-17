    $(document).ready(function () {
        const basePath = document.documentElement.getAttribute('data-assets-path');
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
                        return '<button class="btn btn-primary btn-sm" style="margin-right: 5px;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUpdateUser'+data+'"><i class="ti ti-edit"></i></button>' +
                            '<button class="btn btn-danger btn-sm" onclick="deleteAction(' + data + ')"><i class="ti ti-trash"></i></button>';
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