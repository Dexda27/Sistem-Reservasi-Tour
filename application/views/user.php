<?= $this->session->flashdata('notif'); ?>
<div class="container">
    <?php echo validation_errors(); ?>

	<div class="col-12 pb-4">
        <div class="card">
          	<h5 class="card-header py-2">Add new <?= $url ?></h5>
          	<div class="card-body border-top">
        		<div class="row pt-4">

					<form action="<?= base_url('user/create') ?> " id="form" method="POST">
						<div class="form-group">
							<label for="nama">Name</label>
							<input type="text" class="form-control" name="nama" id="nama">
						</div>

						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" name="username" id="username">
						</div>

						<div class="form-group mb-3">
							<label for="email">Email</label>
							<input type="text" class="form-control" name="email" id="email">
						</div>
						<div class="form-group mb-3">
									<label for="role">Role</label>
									<div>
										<select id="role" class="form-select" data-allow-clear="true" name="role" required>
											<option disbaled >Input Role</option>
											<?php
											$this->db->where('id !=', '1');
											$result = $this->db->get('role')->result_array();

											foreach ($result as $d): ?>
											<option value="<?= $d['id']  ?>"><?= ucfirst($d['role']);  ?></option>
										<?php endforeach; ?>
										</select>
									</div>
								</div>
						<button type="submit" class="btn btn-primary">Submit</button>
						<button type="reset" class="btn btn-danger" id="btn_reset">Cancel</button>
					</form>

				</div>
			</div>
		</div>
	</div>


	<div class="col-12 pb-4">
        <div class="card">
          	<h5 class="card-header py-2"><?= $url ?> List</h5>
          	<div class="card-body border-top">
        		<div class="row pt-4">

					<table class="table mt-3" id="table">
						<thead class="thead-dark">
							<tr id="header-row">
								<th scope="col">No</th>
								<th scope="col">Nama</th>
								<th scope="col">Username</th>
								<th scope="col">Email</th>
								<th scope="col">Role</th>
								<th scope="col">Actions</th>
							</tr>
						</thead>
						<tbody id="table-body">
							<?php $i = 0; ?>
							<?php
							foreach ($users as $usr):
							$i++;
							?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $usr['nama']; ?></td>
									<td><?php echo $usr['username']; ?></td>
									<td><?php echo $usr['email']; ?></td>
									<td><?php echo $usr['role']; ?></td>
									<td>
										<button class="btn btn-sm btn-primary" id="update-<?= $usr['id']; ?> ">Edit</button>
										<button class="btn btn-sm btn-danger" onclick="hapus('<?= $usr['id']; ?>');">Delete</button>
									</td>
								</tr>
							<?php
							endforeach;
							?>
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>

</div>
<script>
    function hapus(id) {
        Swal.fire({
            icon: "question",
            title: "Apakah yakin ingin menghapus data ini?",
            confirmButtonText: "Hapus"
        }).then((result) => {
            if (result.isConfirmed) {
                document.location = '<?= base_url('user/delete/'); ?>'+id;
            }
        });
    }

    $(document).ready(function () {


        $('[id^=update]').on('click', function () {
            var id = $(this).attr('id').split('-')[1];
            $.ajax({
                url: '<?= base_url('User/get_data/'); ?>'+id,
                type: 'GET',
                dataType: 'json',
                success: function (response) {

                    $('#form').attr('action', '<?= base_url('User/editUser/') ?>'+id);
                    $('#text-users').text('Edit User');

                    $('#nama').val(response[0]['nama']);
                    $('#username').val(response[0]['username']);
                    $('#email').val(response[0]['email']);
                    $('#role').val(response[0]['role_id']);
                },
                error: function (xhr, status, error) {
                    console.error('gagal mengubah form' + error);
                }
            });
        });


        $('#btn_reset').on('click', function () {
            $('#text-users').text('Add New User');
            $('#form').attr('action', '<?= base_url('User/create') ?>');
        });

    });
    let table = new DataTable('#table');
</script>
