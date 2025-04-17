<div class="container">
	<form action="<?=base_url('program/create')?>" method="POST">
		<div class="row">
			<div class="col-lg">
				<div class="form-group">
					<label for="nama_program">
						Nama Program
					</label>
					<input value="<?= set_value('nama_program') ?>" name="nama_program" id="nama_program" type="text" class="form-control">
					<?= form_error('nama_program') ?>
				</div>
				<div class="form-group">
					<label for="deskripsi">
						Deskripsi
					</label>
					<textarea name="deskripsi" id="deskripsi" class="form-control"><?= set_value('deskripsi') ?></textarea>
					<?= form_error('deskripsi') ?>
				</div>
				<div class="form-group">
					<label for="durasi">
						Durasi
					</label>
					<input value="<?= set_value('durasi') ?>" type="number" name="durasi" id="durasi" class="form-control">
					<?= form_error('durasi') ?>
				</div>

				<div class="form-group">
					<label for="produk">
						Produk
					</label>
					<select class="select2-multiple form-select form-select-sm" name="produk[]" multiple="multiple">
						<?php foreach ($products as $p): ?>
							<option <?=  set_select('produk[]', $p['id']); ?> value="<?= $p['id']; ?>"><?= $p['nama_produk']; ?></option>
						<?php endforeach ?>
					</select>
					<?= form_error('produk[]') ?>
				</div>

				<div class="form-group mt-2">
					<button class="btn btn-primary" type="submit">Submit</button>
					<button class="btn btn-danger" type="reset">Reset</button>
				</div>
			</div>
		</div>
	</form>
</div>
