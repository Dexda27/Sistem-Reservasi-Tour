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
                    text: '<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add New Redeem</span>',
                    className: 'add-new btn btn-primary',
                    attr: {
                        'data-bs-toggle': 'offcanvas',
                        'data-bs-target': '#offcanvasAddUser',
                        'style': 'margin-left: 8px;'
                    }
                }
            ],
            scrollX: true,
            ajax: basePath + 'b29681ef-6e21-4128-a018-b34c8b79e4c4',
            dataType: 'json',
            columns: [
                { data: 'no', name: 'no', orderable:false },
                { data: 'code', name: 'code' },
                { data: 'expired', name: 'expired' },
                { data: 'limit', name: 'limit' },
                { data: 'category', name: 'category' },
                { data: 'value', name: 'value' },
                {
                    data: 'action',
                    name: 'action',
                    render: function (data) {
                        return '<button class="btn btn-primary btn-sm" style="margin-right: 5px;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUpdateFeature'+data+'"><i class="ti ti-edit"></i></button>' +
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

        $('#RedeemHistory').DataTable({
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
                    text: '<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Redeem Code</span>',
                    className: 'add-new btn btn-primary',
                    attr: {
                        'data-bs-toggle': 'modal',
                        'data-bs-target': '#redeem',
                        'style': 'margin-left: 8px;'
                    }
                }
            ],
            scrollX: true,
            ajax: basePath + 'fd72993a-5378-4d71-9f13-aa5708ef7d23',
            dataType: 'json',
            columns: [
                { data: 'no', name: 'no', orderable:false },
                { data: 'code', name: 'code' },
                { data: 'timestamp', name: 'timestamp' },
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