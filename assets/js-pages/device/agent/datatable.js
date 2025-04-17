    $(document).ready(function () {
        const basePath = document.documentElement.getAttribute('data-assets-path');

        $('#dataTableDevice').DataTable({
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
                    text: '<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Register Device</span>',
                    className: 'add-new btn btn-primary',
                    action: function () {
                        window.location.href = basePath + 'device';
                    },
                    attr: {
                        'style': 'margin-left: 8px;'
                    }
                }
            ],            
            scrollX: true,
            ajax: basePath + '6e6141cd-30a2-4bb5-b89d-4eaf17b5b835',
            dataType: 'json',
            columns: [
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
                {
                    data: 'action',
                    name: 'action',
                    render: function (data) {
                        return '<button class="btn btn-primary btn-sm" style="margin-right: 5px;" data-bs-toggle="offcanvas" data-bs-target="#devices-'+data+'"><i class="ti ti-edit"></i></button>';
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