
<div class="pt-4">
	<table id="guide-table" class="table mt-5">
		<thead class="thead-dark">
			<tr>
				<th>NO</th>
				<th>Nama Guide</th>
				<th>No Telp</th>
				<th>Action</th>
			</tr>
		</thead>
	</table>
</div>

<!-- Modal Detail-->
<div class="modal modal-top fade" id="modalTop" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		</div>
	</div>
</div>
<!-- Tutup Modal Detail -->

<!-- Modal Form-->
 <form id="editForm" action="/" method="POST">
    <div class="modal modal-top fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalTitle" style="text-transform: capitalize;">Edit bahasa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 mb-4 mb-xl-0">
                            <div class="form-group">
                                <label for="editNamaGuide">Nama Guide</label>
                                <input type="text" class="form-control" id="editNamaGuide" name="nama_guide">
                            </div>
                            <div class="form-group">
                                <label for="editNoTelp">No Telp</label>
								<input type="text" class="form-control" id="editNoTelp" name="no_telp">
                            </div>
                            <div class="form-group">
                                <label for="editBahasa">Bahasa</label>
                                <select class="form-select form-select-sm" id="editBahasa" name="bahasa[]" multiple="multiple">
                                    <!-- Options will be populated dynamically -->
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Tutup Modal Form -->


<script type="text/javascript">
    const baseUrl = "<?= base_url() ?>";
    const url = "<?= $url ?>";
    const bahasas = <?= json_encode($bahasas) ?>;

    // Function to populate Info modal with data
    function populateInfoModal(data) {
        // Generate the bahasa list
        let bahasaList = '';
        data.bahasa.forEach(bahasa => {
            bahasaList += `<li>${bahasa.nama_bahasa}</li>`;
        });

        // Populate modal content
        $('#modalTop').find('.modal-content').html(`
            <div class="modal-header">
                <h5 class="modal-title" id="modalTopTitle">${data.nama_guide} Guide Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="list-group">
                    <span class="list-group-item list-group-item-action">
                        <small class="fw-bold">Nama Guide: </small><br>
                        ${data.nama_guide}
                    </span>
                    <span class="list-group-item list-group-item-action">
                        <small class="fw-bold">No Telp: </small><br>
                        ${data.no_telp}
                    </span>
                    <span class="list-group-item list-group-item-action">
                        <small class="fw-bold">Bahasa: </small><br>
                        <ul>${bahasaList}</ul>
                    </span>
                    <span class="list-group-item list-group-item-action">
                        <small class="fw-bold">Created By: </small><br>
                        ${data.created_by}
                    </span>
                    <span class="list-group-item list-group-item-action">
                        <small class="fw-bold">Updated By: </small><br>
                        ${data.updated_by}
                    </span>
                    <span class="list-group-item list-group-item-action">
                        <small class="fw-bold">Created At: </small><br>
                        ${data.created_at}
                    </span>
                    <span class="list-group-item list-group-item-action">
                        <small class="fw-bold">Updated At: </small><br>
                        ${data.updated_at}
                    </span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        `);

        // Show the modal
        $('#modalTop').modal('show');
    }

    // Function to populate bahasa Select2 dropdown
    function populateBahasaSelect(bahasas, selectedbahasas) {
        const bahasaselect = $('#editBahasa');
        bahasaselect.empty();

        bahasas.forEach(bahasa => {
            const option = new Option(bahasa.nama_bahasa, bahasa.id);
            if (selectedbahasas.includes(bahasa.id)) {
                $(option).prop('selected', true);
            }
            bahasaselect.append(option);
        });

        bahasaselect.select2({
            width: '100%',
            dropdownParent: $('#editModal'), // Ensure dropdown is appended to modal
            dropdownCss: {
                zIndex: 1600 // Adjust the z-index as needed
            }
        }).val(selectedbahasas).trigger('change'); // Set selected values and trigger change event
    }

    $(document).ready(function() {
        // Initialize DataTable
        let table = new DataTable('#guide-table', {
            "ajax": {
                "url": `${baseUrl}/${url}/get_all`,
                "type": "GET",
                "dataSrc": ""
            },
            "columns": [
                {
                    "data": null,
                    "render": function (data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                { "data": "guide_name" },
                { "data": "no_telp" },
                {
                    "data": null,
                    "render": function (data, type, row) {
                        return `
                            <button class="btn btn-outline-info btn-sm" data-id="${row.id}">
                                <label class="fa fa-info"></label>
                            </button>
                            <button class="btn btn-outline-warning btn-sm" data-id="${row.id}">
                                <label class="fa fa-pencil"></label>
                            </button>
                            <button class="btn btn-outline-danger btn-sm" data-id="${row.id}">
                                <label class="fa fa-trash"></label>
                            </button>
                        `;
                    }
                }
            ]
        });

        // Handle Info button click
        $('#guide-table tbody').on('click', 'button.btn-outline-info', function() {
            const bahasaId = $(this).attr('data-id');

            // Fetch detailed bahasa information via AJAX
            $.ajax({
                url: `${baseUrl}/${url}/get_with_details/${bahasaId}`,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Populate modal with fetched data
                    populateInfoModal(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching bahasa details:', error);
                    alert('Failed to fetch bahasa details.');
                }
            });
        });

        // Handle Edit button click
        $('#guide-table tbody').on('click', 'button.btn-outline-warning', function() {
            const dataId = $(this).attr('data-id');
            // Fetch the data for the specific bahasa
            $.ajax({
                url: `${baseUrl}/${url}/get_with_details/${dataId}`,
                type: 'GET',
                success: function(data) {
					$('#editForm').attr('action', `${baseUrl}/${url}/edit/${dataId}`)
                    // Populate the form with the fetched data
                    $('#editNamaGuide').val(data.nama_guide);
                    $('#editNoTelp').val(data.no_telp);

                    // Pre-select the associated bahasas in select2
                    populateBahasaSelect(bahasas, data.bahasa.map(bahasa => bahasa.id));

                    // Show the edit modal
                    $('#editModal').modal('show');
                },
                error: function() {
                    alert('Failed to fetch bahasa data');
                }
            });
        });

        // Handle Delete button click
        $('#guide-table tbody').on('click', 'button.btn-outline-danger', function() {
            const bahasaId = $(this).attr('data-id');
            Swal.fire({
                icon: "question",
                title: "Are you sure you want to delete this bahasa?",
                confirmButtonText: "Delete"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location = `${baseUrl}/${url}/delete/${bahasaId}`;
                }
            });
        });
    });
</script>



