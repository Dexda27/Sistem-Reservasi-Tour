<div class="container">
	<form action="<?=base_url('guide/create')?>" method="POST">
		<div class="row">
			<div class="col-lg">
				<div class="form-group">
					<label for="nama_guide">
						Nama Guide
					</label>
					<input value="<?= set_value('nama_guide') ?>" name="nama_guide" id="nama_guide" type="text" class="form-control">
					<?= form_error('nama_guide') ?>
				</div>
				<div class="form-group">
					<label for="no_telp">
						No Telp
					</label>
					<input value="<?= set_value('no_telp') ?>" name="no_telp" id="no_telp" type="text" class="form-control">
					<?= form_error('no_telp') ?>
				</div>

				<div class="form-group">
					<label for="bahasa">
						Bahasa
					</label>
					<select class="select2-multiple form-select form-select-sm" name="bahasa[]" multiple="multiple">
						<?php foreach ($bahasas as $b): ?>
							<option <?=  set_select('bahasa[]', $b['id']); ?> value="<?= $b['id']; ?>"><?= $b['nama_bahasa']; ?></option>
						<?php endforeach ?>
					</select>
					<?= form_error('bahasa[]') ?>
				</div>

				<div class="form-group mt-2">
					<button class="btn btn-primary" type="submit">Submit</button>
					<button class="btn btn-danger" type="reset">Reset</button>
				</div>
			</div>
		</div>
	</form>
</div>
