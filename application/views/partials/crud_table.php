<h2 class="mt-4" id="title"></h2>
<table class="table mt-3" id="table">
    <thead class="thead-dark">
        <tr id="header-row"></tr>
    </thead>
    <tbody id="table-body"></tbody>
</table>

<script>
    const url = <?= json_encode(base_url($url)) ?>;
    const fields = <?= json_encode($fields) ?>;
    const data = <?= json_encode($data) ?>;
    const show = <?= json_encode($show) ?>;
    const roleId = <?= json_encode($this->session->userdata("role_id")) ?>;
    const hidden = ['created_at', 'updated_at', 'created_by', 'updated_by'];

    function encodedStr(rawStr) {
        if (typeof rawStr !== 'string') return rawStr;
        return rawStr.replace(/[\u00A0-\u9999<>\&]/g, i => '&#' + i.charCodeAt(0) + ';');
    }

    function hapus(id) {
        Swal.fire({
            icon: "question",
            title: "Apakah yakin ingin menghapus data ini?",
            confirmButtonText: "Hapus"
        }).then(result => {
            if (result.isConfirmed) {
                document.location = '<?= base_url($url . '/delete/'); ?>' + id;
            }
        });
    }

    function createTableHeaders() {
        const headerRow = document.getElementById('header-row');
        headerRow.innerHTML = '<th>No</th>' + fields.filter(field => show.includes(field.Field) && field.Key !== 'PRI')
            .map(field => `<th>${ucwords(field.foreign ? field.foreign_info.form_name : field.Field.replace('_', ' '))}</th>`).join('') + '<th>Action</th>';
    }

    function populateTableBody() {
        const tableBody = document.getElementById('table-body');
        tableBody.innerHTML = data.map((d, index) => {
            let rowHtml = `<tr><td>${index + 1}</td>`;
            rowHtml += fields.filter(field => show.includes(field.Field) && field.Key !== 'PRI')
                .map(field => {
                    let cellData = field.foreign ? field.foreign.find(f => f.id == d[field.Field]) : d[field.Field];
                    if (cellData && field.foreign_info) cellData = cellData[field.foreign_info.enum];
                    return `<td>${encodedStr(cellData) || ''}</td>`;
                }).join('');
            
            rowHtml += `<td>
                <div class="d-flex">
                    ${roleId == "1" || roleId == "3" ? `
                    <button class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalTop-${index + 1}">
                        <label class="fa fa-info"></label>
                    </button>
                    <button class="btn btn-outline-warning btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#modalTopForm-${index + 1}">
                        <label class="fa fa-pencil"></label>
                    </button>
                    <button class="btn btn-outline-danger btn-sm" onclick="hapus(${d.id});">
                        <label class="fa fa-trash"></label>
                    </button>` : `
                    <button class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalTop-${index + 1}">
                        <label class="fa fa-info"></label>
                    </button>`}
                </div>
            </td></tr>`;
            return rowHtml;
        }).join('');
    }

    function createModals() {
        data.forEach((d, index) => {
            const detailFields = fields.filter(field => field.Key !== 'PRI');
            const infoModalHtml = generateModalHtml(index, d, detailFields, true);
            const editModalHtml = generateModalHtml(index, d, detailFields, false);
            document.body.innerHTML += infoModalHtml + editModalHtml;
        });
    }

    function generateModalHtml(index, dataRow, detailFields, isInfoModal) {
        const modalId = isInfoModal ? `modalTop-${index + 1}` : `modalTopForm-${index + 1}`;
        const modalTitle = isInfoModal ? `Details of ${dataRow[fields[0].Field]}` : `Edit ${dataRow[fields[0].Field]}`;
        const modalContent = detailFields.map(field => {
            let cellData = field.foreign ? field.foreign.find(f => f.id == dataRow[field.Field]) : dataRow[field.Field];
            if (cellData && field.foreign_info) cellData = cellData[field.foreign_info.enum];
            const fieldName = ucwords(field.foreign ? field.foreign_info.form_name : field.Field.replace('_', ' '));
            return isInfoModal ?
                `<div class="col-lg-6"><div class="list-group"><span class="list-group-item list-group-item-action"><small class="fw-bold">${fieldName}: </small><br>${encodedStr(cellData) || ''}</span></div></div>` :
                generateEditFieldHtml(field, dataRow);
        }).join('');

        return `<div class="modal modal-top fade" id="${modalId}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="${modalId}Title" style="text-transform: capitalize;">${modalTitle}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= base_url($url . '/edit/'); ?>${dataRow.id}" method="post">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12 mb-4 mb-xl-0">
                                    <div class="demo-inline-spacing mt-3">
                                        <div class="row">${modalContent}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                            ${!isInfoModal ? '<button type="submit" class="btn btn-sm btn-primary">Submit</button>' : ''}
                        </div>
                    </form>
                </div>
            </div>
        </div>`;
    }

    function generateEditFieldHtml(field, dataRow) {
        if (hidden.includes(field.Field)) return '';
        const type = getFieldType(field.Type);
        const value = encodedStr(dataRow[field.Field]) || '';
        return field.foreign ?
            `<div class="col-lg-6">
                <div class="form-group">
                    <label for="${field.Field}">${ucwords(field.foreign_info.form_name)}</label>
                    <select class="form-control" name="${field.Field}" id="${field.Field}">
                        ${field.foreign.map(f => `<option value="${f.id}" ${f.id == dataRow[field.Field] ? 'selected' : ''}>${f[field.foreign_info.enum]}</option>`).join('')}
                    </select>
                </div>
            </div>` :
            `<div class="col-lg-6">
                <div class="form-group">
                    <label for="${field.Field}">${ucwords(field.Field.replace('_', ' '))}</label>
                    <input type="${type}" class="form-control" name="${field.Field}" value="${value}">
                </div>
            </div>`;
    }

    function getFieldType(type) {
        if (type.includes('double') || type.includes('int')) return 'number';
        if (type.includes('time')) return 'time';
        if (type.includes('date')) return 'date';
        return 'text';
    }

    function ucwords(str) {
        return str.replace(/\b\w/g, txt => txt.toUpperCase());
    }

    createTableHeaders();
    populateTableBody();
    createModals();
    let table = new DataTable('#table');
</script>
