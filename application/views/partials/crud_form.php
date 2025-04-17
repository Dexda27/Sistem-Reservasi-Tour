<form action="<?= base_url($url . '/create') ?>" id="form" method="POST">
    <?php
    $prev_data = $prev_data ?? [];
    $fields_per_row = 3;
    $field_count = 0;

    foreach ($fields as $field) {
        if ($field['Key'] == 'PRI' || in_array($field['Field'], ['created_at', 'updated_at', 'created_by', 'updated_by'])) {
            continue;
        }

        if ($field_count % $fields_per_row == 0) {
            if ($field_count > 0) {
                echo '</div>';
            }
            echo '<div class="row">';
        }

        if (isset($field['foreign'])) {
            ?>
            <div class="form-group col-md-4">
                <label for="<?= $field['Field']; ?>"><?= ucwords(str_replace('_', ' ', $field['foreign_info']['form_name'])); ?></label>
                <select class="form-control" name="<?= $field['Field']; ?>" id="<?= $field['Field']; ?>">
                    <?php foreach ($field['foreign'] as $foreign) { ?>
                        <option
                            value="<?= $foreign['id']; ?>"
                            <?= isset($prev_data[$field['Field']]) && $prev_data[$field['Field']] == $foreign['id'] ? 'selected' : ''; ?>
                        ><?= $foreign[$field['foreign_info']['enum']]; ?></option>
                    <?php } ?>
                </select>
                <?= form_error($field['Field']); ?>
            </div>
            <?php
        } elseif (isset($field['enum'])) {
            ?>
            <div class="form-group col-md-4">
                <label for="<?= $field['Field']; ?>"><?= ucwords(str_replace('_', ' ', $field['Field'])); ?></label>
                <select class="form-control" name="<?= $field['Field']; ?>" id="<?= $field['Field']; ?>">
                    <?php foreach ($field['enum'] as $enum) { ?>
                        <option
                            value="<?= $enum; ?>"
                            <?= isset($prev_data[$field['Field']]) && $prev_data[$field['Field']] == $enum ? 'selected' : ''; ?>
                        ><?= $enum; ?></option>
                    <?php } ?>
                </select>
                <?= form_error($field['Field']); ?>
            </div>
            <?php
        } else {
            $input_type = 'text';
            if (strpos($field['Type'], 'int') !== false || strpos($field['Type'], 'double') !== false) {
                $input_type = 'number';
            } elseif (strpos($field['Type'], 'time') !== false) {
                $input_type = 'time';
            } elseif (strpos($field['Type'], 'date') !== false) {
                $input_type = 'date';
            }
            ?>
            <div class="form-group col-md-4">
                <label for="<?= $field['Field']; ?>"><?= ucwords(str_replace('_', ' ', $field['Field'])); ?></label>
                <!-- <input type="<?= $input_type; ?>" class="form-control" name="<?= $field['Field']; ?>" id="<?= $field['Field']; ?>" value="<?= isset($prev_data[$field['Field']]) ? $prev_data[$field['Field']] : ''; ?>"> -->
                <input type="<?= $input_type; ?>" class="form-control" name="<?= $field['Field']; ?>" id="<?= $field['Field']; ?>" value="<?= set_value($field['Field']) ?>">
                <?= form_error($field['Field']); ?>
            </div>
            <?php
        }

        $field_count++;
    }

    if ($field_count > 0) {
        echo '</div>';
    }
    ?>
    <div class="mt-2">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-danger" id="btn_reset">Cancel</button>
    </div>
</form>
