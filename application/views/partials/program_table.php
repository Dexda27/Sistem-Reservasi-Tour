<div class="pt-4">
	<table id="program-table" class="table mt-3">
		<thead class="thead-dark">
			<tr>
				<th>NO</th>
				<th>Nama Program</th>
				<th>Durasi</th>
				<th>Deskripsi</th>
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
                    <h5 class="modal-title" id="editModalTitle" style="text-transform: capitalize;">Edit Program</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 mb-4 mb-xl-0">
                            <div class="form-group">
                                <label for="editNamaProgram">Nama Program</label>
                                <input type="text" class="form-control" id="editNamaProgram" name="nama_program">
                            </div>
                            <div class="form-group">
                                <label for="editDurasi">Durasi</label>
                                <input type="text" class="form-control" id="editDurasi" name="durasi">
                            </div>
                            <div class="form-group">
                                <label for="editDeskripsi">Deskripsi</label>
                                <textarea class="form-control" id="editDeskripsi" name="deskripsi"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="editProduk">Produk</label>
                                <select class="form-select form-select-sm" id="editProduk" name="produk[]" multiple="multiple">
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
    const products = <?= json_encode($products) ?>;

    // Function to populate Info modal with data
    function populateInfoModal(data) {
        // Generate the product list
        let productList = '';
        data.produk.forEach(product => {
            productList += `<li>${product.nama_produk}</li>`;
        });

        // Populate modal content
        $('#modalTop').find('.modal-content').html(`
            <div class="modal-header">
                <h5 class="modal-title" id="modalTopTitle">${data.nama_program} Program Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="list-group">
                    <span class="list-group-item list-group-item-action">
                        <small class="fw-bold">Nama Program: </small><br>
                        ${data.nama_program}
                    </span>
                    <span class="list-group-item list-group-item-action">
                        <small class="fw-bold">Durasi: </small><br>
                        ${data.durasi}
                    </span>
                    <span class="list-group-item list-group-item-action">
                        <small class="fw-bold">Deskripsi: </small><br>
                        ${data.deskripsi}
                    </span>
                    <span class="list-group-item list-group-item-action">
                        <small class="fw-bold">Produk: </small><br>
                        <ul>${productList}</ul>
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

    // Function to populate Product Select2 dropdown
    function populateProductSelect(products, selectedProducts) {
        const productSelect = $('#editProduk');
        productSelect.empty();

        products.forEach(product => {
            const option = new Option(product.nama_produk, product.id);
            if (selectedProducts.includes(product.id)) {
                $(option).prop('selected', true);
            }
            productSelect.append(option);
        });

        productSelect.select2({
            width: '100%',
            dropdownParent: $('#editModal'), // Ensure dropdown is appended to modal
            dropdownCss: {
                zIndex: 1600 // Adjust the z-index as needed
            }
        }).val(selectedProducts).trigger('change'); // Set selected values and trigger change event
    }

    $(document).ready(function() {
        // Initialize DataTable
        let table = new DataTable('#program-table', {
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
                { "data": "nama_program" },
                { "data": "durasi" },
                { "data": "deskripsi" },
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
        $('#program-table tbody').on('click', 'button.btn-outline-info', function() {
            const programId = $(this).attr('data-id');

            // Fetch detailed program information via AJAX
            $.ajax({
                url: `${baseUrl}/${url}/get_with_details/${programId}`,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Populate modal with fetched data
                    populateInfoModal(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching program details:', error);
                    alert('Failed to fetch program details.');
                }
            });
        });

        // Handle Edit button click
        $('#program-table tbody').on('click', 'button.btn-outline-warning', function() {
            const dataId = $(this).attr('data-id');
            // Fetch the data for the specific program
            $.ajax({
                url: `${baseUrl}/${url}/get_with_details/${dataId}`,
                type: 'GET',
                success: function(data) {
					$('#editForm').attr('action', `${baseUrl}/${url}/edit/${dataId}`)
                    // Populate the form with the fetched data
                    $('#editNamaProgram').val(data.nama_program);
                    $('#editDurasi').val(data.durasi);
                    $('#editDeskripsi').val(data.deskripsi);

                    // Pre-select the associated products in select2
                    populateProductSelect(products, data.produk.map(product => product.id));

                    // Show the edit modal
                    $('#editModal').modal('show');
                },
                error: function() {
                    alert('Failed to fetch program data');
                }
            });
        });

        // Handle Delete button click
        $('#program-table tbody').on('click', 'button.btn-outline-danger', function() {
            const programId = $(this).attr('data-id');
            Swal.fire({
                icon: "question",
                title: "Are you sure you want to delete this program?",
                confirmButtonText: "Delete"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location = `${baseUrl}/${url}/delete/${programId}`;
                }
            });
        });
    });
</script>



